<?php
	ini_set('display_errors', 0);
	require_once('/home/sleepdia/libinc/site_inc.php');

	switch($_REQUEST['action']){
		case 'getReplaceList':
			GetReplaceList();
			break;
		case 'getTerms':
			getTerms();
			break;
	}

	function dbConnect(){
		$db = new myPDO();
		return $db;
	}
	function GetReplaceList(){
		$db = dbConnect();
		$pstmt = $db->prepare("SELECT * FROM prodReplaceTime ORDER BY product");
		$pstmt->execute();
		$html = "<table border='0' cellpadding='2' cellspacing='0' style='border-collapse: collapse; width: 100%;'><tbody>";
		$html .= "<tr><th>Product</th><th>HCPC Code</th><th>Frequency of Replacement</th>";
		while($row = $pstmt->fetch(PDO::FETCH_ASSOC)){
			$html .= "<tr><td>".$row['product']."</td><td style='text-align: center;'>".$row['hcpc_code']."</td><td>".$row['min']." - ".$row['max']."</td></tr>";
		}
		$html .= "<tr><td colspan='3'>&nbsp;</td></tr>";
		$html .= "<tr><td colspan='3'><strong><u><em>Note:</em></u></strong> The <strong>Mask Cushion</strong> is the most important part of your replacement program. We recognized that economizing is on everyone's mind these days, but the seal of your cushion is imperative to the success of your treatment.";
		$html .= "</tbody></table>";
		echo $html;
	}
	function getTerms(){
		$db = dbConnect();
		$pstmt = $db->prepare("SELECT * FROM terms ORDER BY term");
		$pstmt->execute();
		$html = "<table border='1' cellpadding='2' cellspacing='0' style='border-collapse: collapse; width: 100%;'><tbody>";
		$html .= "<tr><th>Term</th><th>Definition</th></tr>";
		while($row = $pstmt->fetch(PDO::FETCH_ASSOC)){
			$html .= "<tr><td>".$row['term']."</td><td>".$row['definition']."</td></tr>";
		}
		$html .= "</tbody></table>";
		echo $html;
	}
?>