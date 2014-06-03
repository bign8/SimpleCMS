<?php
	require_once('/home/sleepdia/libinc/site_inc.php');

	switch($_POST['action']){
		case 'getProductList':
			echo GetProductList($_POST['itmType']);
			break;
	}

	function dbConnect(){
		$db = new myPDO();
		return $db;
	}

	function GetProductList($prodType){
		$db = dbConnect();
		$pstmt = $db->prepare("SELECT * FROM  products WHERE category = ? ORDER BY manufacturer");
		$pstmt->execute($prodType);
		echo json_encode($pstmt->fetchAll(PDO::FETCH_ASSOC));
	}
?>