<?php

class PageClass {
	public $pageVals	= array();
	public $content		= array();
	public $dynInclude	= array();
	public $blocks		= array();
	
	// bolean values for page magic
	private $is404		= false;
	private $isEditer	= false;
	
	// handles for things
	private $DBH; // DataBase Handle
	
	public function __construct(){
		$this->DBH = new myPDO();
	}
	
	public function Run() {
		// print_r($_SERVER);
		// return 'done';

		$page = '/';
		if (isset($_SERVER['REQUEST_URI'])) {
			$page = $_SERVER['REQUEST_URI'];
		}
		// $page = ?$_SERVER['REDIRECT_URL']:'/'; // $_SERVER['REDIRECT_URL']; // or 'SCRIPT_URL'
		//$page = substr( $page, 0, strrpos( $page, "?"));

		if(strrchr($page, "/") == "/") {
			$page .= 'index'; // add index to each directory
		} else {
			if (config::Extension != '') {
				$page = substr( $page, 0, strrpos( $page, '.'.config::Extension ) ); // enforce extensions
			}
		}
		// echo 'Page: ', $page, '<pre>', print_r($_SERVER, true), '</pre>';
		//asdf
		// return $page;

		self::getPage($page);
		
		// return 'after getPage';

		$smarty	= new SmartyConfig();
		$tpl	= $smarty->createTemplate('runner.tpl');
		
		//*
		$tpl->assign('header',		$this->pageVals['header']); // just pass whole array
		$tpl->assign('body',		$this->pageVals['body']); // would have to rewrite pagevals
		$tpl->assign('footer',		$this->pageVals['footer']); // see below for attempt
		$tpl->assign('keywords',	$this->pageVals['keywords']);
		$tpl->assign('desc',		$this->pageVals['description']);
		$tpl->assign('title',		$this->pageVals['title']);
		$tpl->assign('vfsID',		$this->pageVals['vfsID']);
		/*/
		$tpl->assign('pageVals', $this->pageVals); // smarty test - fail :(
		//*/
		
		$tpl->assign('content',		$this->content);
		$tpl->assign('dynInclude',	$this->dynInclude);
		$tpl->assign('blocks',		$this->blocks);
		$tpl->assign('isEditer',	$this->isEditer);
		$tpl->assign('is404',		$this->is404);
		
		$tpl->display();
	}
	
	private function getPage($url) {
		$edit = (isset($_REQUEST['mode']) && $_REQUEST['mode'] == 'edit');

		$pageSTH = $this->DBH->prepare("SELECT * FROM `web_v_page` WHERE `path`= ? ;");
		$pageSTH->execute( $url );

		// echo $url;
		if ($url == '/404') {
			header('HTTP/1.0 404 Not Found');
			// echo '<pre>';
			// print_r($_SERVER);
			// die('404\'ed');
		}
		// print_r($pageSTH);

		if ( $pageSTH->rowCount() != 0 ) {
			$rec = $pageSTH->fetch( PDO::FETCH_ASSOC );
			if($rec['secure'] == "yes" && $_SERVER['SERVER_PORT'] == "80"){
				header('Location: https://sleepdiag.com'.$url.'.sd');
			}
			else if($rec['secure'] == "no" && $_SERVER['SERVER_PORT'] == "443"){
				header('Location: http://sleepdiag.com'.$url.'.sd');
			}
			$this->pageVals = $rec;
			
			// update time on login certificate or remove cookie if not logged in
			if ( ! User::verify(false) ) { 
				setcookie('hash', '', time() - 3600);
			} else {
				User::refresh();
			}
			
			// has editing privliges for location
			$this->isEditer = User::verify();
			
			// Edit specefic processing
			if ( $edit ) {
				
				// re-direct away from editing if on an error page

				// Check credentials!
				if (!$this->isEditer) die("<script>alert('You are not authorized to edit this web page.\\nIf you feel this is an error, please contact the Webmaster.');window.location.href = \"{$_SERVER['REDIRECT_URL']}\";</script>");
				
				// add block names for edit mode
				$editSTH = $this->DBH->query("SELECT blockID, name, description FROM `web_block`;");
				$this->blocks = $editSTH->fetchAll( PDO::FETCH_ASSOC );
			}
			
			// get page content
			$contentSTH = $this->DBH->prepare("SELECT * FROM `web_v_content` WHERE `vfsID` = ? ORDER BY `orders` ASC;");
			$contentSTH->execute( $rec['vfsID'] );
			while ($row = $contentSTH->fetch( PDO::FETCH_ASSOC )) {
				$this->content[$row['locName']][] = $row; // special encoding, no fetchAll possible
			}
			
			// load dynamic includes // optimize this query
			$scrSTH = $this->DBH->prepare("SELECT * FROM `web_v_scripts` WHERE `edit` = ? AND `blockID` IN (SELECT distinct(blockID) FROM web_content WHERE vfsID = ?) ORDER BY `loadOrder` ASC;");
			$scrSTH->execute( ($edit?'yes':'no') , $rec['vfsID'] );
			$this->dynInclude = $scrSTH->fetchAll( PDO::FETCH_ASSOC );
			
		} else {
			// send proper error messages including refferer and client ip address
			
			$this->is404 = true;
			self::getPage("/404");
		}
	}
}
