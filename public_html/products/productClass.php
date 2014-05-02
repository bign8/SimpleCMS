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
		switch($prodType){
			case 'machine':
				$imgPath = '/products/machines/imgs/';
				break;

			case 'maskfullface':
				$imgPath = '/products/masks/imgs/FullFace/';
				break;

			case 'masknasal':
				$imgPath = '/products/masks/imgs/Nasal/';
				break;

			case 'masknasalpillow':
				$imgPath = '/products/masks/imgs/NasalPillow/';
				break;
		}
		$i = 0;
		$db = dbConnect();
		$pstmt = $db->prepare( "SELECT * FROM products WHERE category = ? ORDER BY manufacturer" );
		$pstmt->execute( $prodType );
		$retStr = '<table width="120%" border="1" cellpadding="3" cellspacing="0" style="border-collapse: collapse;"><tbody>';
		$retStr .= '<tr><th>Manufacturer</th><th>Model</th><th>&nbsp;</th><th>&nbsp;</th></tr>';
		while($row = $pstmt->fetch( PDO::FETCH_ASSOC)){
			$retStr .= '<tr><td>'.$row['manufacturer'].'</td><td>'.$row['modelName'].'</td>';
			$retStr .= '<td style="text-align: center; vertical-align: middle;">';
			$retStr .= '<a href="'.$imgPath.$row['picture'].'" class="nyroModal" title="'.$row['manufacturer'].'-'.$row['modelName'].'">';
			$retStr .= '<img src="'.$imgPath.$row['picture'].'" width="35" height="35"/></a> <em style="font-size: .8em;">(Click to Enlarge)</em></td>';
			$retStr .= '<td style="width: 10%;"><input id="btnProd'.$row['prodID'].'" type="button" value="Show Details" onclick="showDtl(\'#prodID'.$row['prodID'].'\', \'#btnProd'.$row['prodID'].'\')"/></td></tr>';
			switch($prodType){
				case 'machine':
					$retStr .= '<tr id="prodID'.$row['prodID'].'" style="display: none;"><td colspan="4">';
					$retStr .= '<form id="frmProd'.$row['prodID'].'">';
					$retStr .= '<table border="0" cellpadding="2" cellspacing="0" style="width: 100%;"><tbody>';
					$retStr .= '<tr><td style="vertical-align: top;"><div style="font-weight: bold; text-decoration: underline;">Filters</div>';
					$retStr .= '<input type="checkbox" value="Non-Disposable Grey Filter - '.$row['manufacturer'].": ".$row['modelName'].'" /> Non-Disposable Grey Filter<br />';
					$retStr .= '<input type="checkbox" value="Disposable White Filter - '.$row['manufacturer'].": ".$row['modelName'].'"> Disposable White Filter<br /></td>';
					$retStr .= '<td style="vertical-align: top;"><div style="font-weight: bold; text-decoration: underline;">Tubing</div>';
					$retStr .= '<input type="checkbox" value="6 Foot Non-Heated - '.$row['manufacturer'].": ".$row['modelName'].'" /> 6\' Non-Heated Tubing<br />';
					$retStr .= '<input type="checkbox" value="8 Foot Non-Heated - '.$row['manufacturer'].": ".$row['modelName'].'" /> 8\' Non-Heated Tubing<br />';
					$retStr .= '<input type="checkbox" value="Heated Tubing - '.$row['manufacturer'].": ".$row['modelName'].'" /> Heated Tubing<br /></td>';
					$retStr .= '<td style="vertical-align: top;"><div style="font-weight: bold; text-decoration: underline;">Miscellaneous</div>';
					$retStr .= '<input type="checkbox" value="Humidifier Chamber - '.$row['manufacturer'].": ".$row['modelName'].'"/> Humidifier Chamber<br />';
					$retStr .= '<input type="checkbox" value="Replacement Humidifier - '.$row['manufacturer'].": ".$row['modelName'].'"/> Replacement Humidifier<br />';
					$retStr .= '<input type="checkbox" value="Power Cord - '.$row['manufacturer'].": ".$row['modelName'].'"/> Power Cord<br /></td>';
					$retStr .= '<td style="vertical-align: top;"><div style="font-weight: bold; text-decoration: underline;">Machine</div>';
					$retStr .= '<input type="checkbox":" value="'.$row['manufacturer'].": ".$row['modelName'].' Machine"> Machine<br /></td>';
					$retStr .= '</tr>';
					$retStr .= '<tr><td colspan="4" style="text-align: center;"><input type="button" value="Add Selected To Cart" onclick="addCart(\'frmProd'.$row['prodID'].'\')"/></td></tr>';
					$retStr .= '</tbody></table></form></tr>';
					break;
				default:
					$retStr .= '<tr id="prodID'.$row['prodID'].'" style="display: none;"><td colspan="4">';
					$retStr .= '<form id="frmProd'.$row['prodID'].'">';
					$retStr .= '<table border="0" cellpadding="2" cellspacing="0" style="width: 100%;"><tbody>';
					$retStr .= '<tr><td style="vertical-align: top; width: 25%;""><div style="font-weight: bold; text-decoration: underline;">New Mask</div>';
					$retStr .= '<input type="radio" name="maskSize" value="X-Small - '.$row['manufacturer'].": ".$row['modelName'].' Mask"/> X-Small<br />';
					$retStr .= '<input type="radio" name="maskSize" value="Small - '.$row['manufacturer'].": ".$row['modelName'].' Mask"/> Small<br />';
					$retStr .= '<input type="radio" name="maskSize" value="Medium - '.$row['manufacturer'].": ".$row['modelName'].' Mask"/> Medium<br />';
					$retStr .= '<input type="radio" name="maskSize" value="Large - '.$row['manufacturer'].": ".$row['modelName'].' Mask"/> Large<br />';
					$retStr .= '<input type="radio" name="maskSize" value="X-Large - '.$row['manufacturer'].": ".$row['modelName'].' Mask"/> X-Large<br />';
					$retStr .= '<input type="radio" name="maskSize" value="Standard - '.$row['manufacturer'].": ".$row['modelName'].' Mask"/> Standard<br />';
					$retStr .= '<input type="radio" name="maskSize" value="Petite" - '.$row['manufacturer'].": ".$row['modelName'].' Mask/> Petite<br />';
					$retStr .= '<input type="radio" name="maskSize" value="Wide - '.$row['manufacturer'].": ".$row['modelName'].' Mask"/> Wide<br /></td>';
					$retStr .= '<td style="vertical-align: top; width: 25%;"><div style="font-weight: bold; text-decoration: underline;">Cushion Replacement</div>';
					$retStr .= '<input type="radio" name="cushionSize" value="X-Small - '.$row['manufacturer'].": ".$row['modelName'].' Cushion Replacement"/> X-Small<br />';
					$retStr .= '<input type="radio" name="cushionSize" value="Small - '.$row['manufacturer'].": ".$row['modelName'].' Cushion Replacement"/> Small<br />';
					$retStr .= '<input type="radio" name="cushionSize" value="Medium - '.$row['manufacturer'].": ".$row['modelName'].' Cushion Replacement"/> Medium<br />';
					$retStr .= '<input type="radio" name="cushionSize" value="Large - '.$row['manufacturer'].": ".$row['modelName'].' Cushion Replacement"/> Large<br />';
					$retStr .= '<input type="radio" name="cushionSize" value="X-Large - '.$row['manufacturer'].": ".$row['modelName'].' Cushion Replacement"/> X-Large<br />';
					$retStr .= '<input type="radio" name="cushionSize" value="Standard - '.$row['manufacturer'].": ".$row['modelName'].' Cushion Replacement"/> Standard<br />';
					$retStr .= '<input type="radio" name="cushionSize" value="Petite - '.$row['manufacturer'].": ".$row['modelName'].' Cushion Replacement"/> Petite<br />';
					$retStr .= '<input type="radio" name="cushionSize" value="Wide - '.$row['manufacturer'].": ".$row['modelName'].' Cushion Replacement"/> Wide<br /></td>';
					$retStr .= '<td style="vertical-align: top; width: 25%;"><div style="font-weight: bold; text-decoration: underline;">Adjustable Chin Strap</div>';
					$retStr .= '<input type="radio" name="adjChin" value="X-Small - '.$row['manufacturer'].": ".$row['modelName'].' Adjustable Chin Strap"/> X-Small<br />';
					$retStr .= '<input type="radio" name="adjChin" value="Small - '.$row['manufacturer'].": ".$row['modelName'].' Adjustable Chin Strap"/> Small<br />';
					$retStr .= '<input type="radio" name="adjChin" value="Medium - '.$row['manufacturer'].": ".$row['modelName'].' Adjustable Chin Strap"/> Medium<br />';
					$retStr .= '<input type="radio" name="adjChin" value="Large - '.$row['manufacturer'].": ".$row['modelName'].' Adjustable Chin Strap"/> Large<br />';
					$retStr .= '<input type="radio" name="adjChin" value="X-Large - '.$row['manufacturer'].": ".$row['modelName'].' Adjustable Chin Strap"/> X-Large<br />';
					$retStr .= '<input type="radio" name="adjChin" value="Standard - '.$row['manufacturer'].": ".$row['modelName'].' Adjustable Chin Strap"/> Standard<br />';
					$retStr .= '<input type="radio" name="adjChin" value="Petite - '.$row['manufacturer'].": ".$row['modelName'].' Adjustable Chin Strap"/> Petitie<br />';
					$retStr .= '<input type="radio" name="adjChin" value="Wide - '.$row['manufacturer'].": ".$row['modelName'].' Adjustable Chin Strap"/> Wide<br /></td>';
					$retStr .= '<td style="vertical-align: top;"><div style="font-weight: bold; text-decoration: underline;">Non-Adjustable Chin Strap</div>';
					$retStr .= '<input type="radio" name="chin" value="X-Small - '.$row['manufacturer'].": ".$row['modelName'].' Non-Adjustable Chin Strap"/> X-Small<br />';
					$retStr .= '<input type="radio" name="chin" value="Small - '.$row['manufacturer'].": ".$row['modelName'].' Non-Adjustable Chin Strap"/> Small<br />';
					$retStr .= '<input type="radio" name="chin" value="Medium - '.$row['manufacturer'].": ".$row['modelName'].' Non-Adjustable Chin Strap"/> Medium<br />';
					$retStr .= '<input type="radio" name="chin" value="Large - '.$row['manufacturer'].": ".$row['modelName'].' Non-Adjustable Chin Strap"/> Large<br />';
					$retStr .= '<input type="radio" name="chin" value="X-Large - '.$row['manufacturer'].": ".$row['modelName'].' Non-Adjustable Chin Strap"/> X-Large<br />';
					$retStr .= '<input type="radio" name="chin" value="Standard - '.$row['manufacturer'].": ".$row['modelName'].' Non-Adjustable Chin Strap"/> Standard<br />';
					$retStr .= '<input type="radio" name="chin" value="Petite - '.$row['manufacturer'].": ".$row['modelName'].' Non-Adjustable Chin Strap"/> Petite<br />';
					$retStr .= '<input type="radio" name="chin" value="Wide - '.$row['manufacturer'].": ".$row['modelName'].' Non-Adjustable Chin Strap"/> Wide<br /></td></tr>';
					$retStr .= '<tr><td colspan="4" style="text-align: center;"><input type="button" value="Add Selected To Cart" onclick="addCartMask(\'frmProd'.$row['prodID'].'\')"/></td></tr>';
					$retStr .= '</tbody></table>';
					$retStr .= '</form></tr>';
			}
			$i++;
		}
		$retStr .= '</tbody></table>';
		return $retStr;
	}
?>