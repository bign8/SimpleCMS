<?php
	ini_set('display_errors', 0);
	require_once('/home/sleepdia/libinc/site_inc.php');
	require_once('/home/sleepdia/libinc/html2pdf_v4.03/html2pdf.class.php');

	//Retrieve data to be added to the generated PDF document
	//$db = dbConnect();
	$content = '<style type="text/css">';
	$content .= '<!-- ';
    $content .= 'table.page_header {width: 100%; border: none; background-color: #0c371d; }'; 
    $content .= 'table.page_footer {width: 100%; border: none; background-color: #0c371d; color: #fff;}';
    $content .= 'div.note {border: solid 1mm #DDDDDD;background-color: #EEEEEE; padding: 2mm; border-radius: 2mm; width: 100%; }';
    $content .= 'ul.main { width: 95%; list-style-type: square; }';
    $content .= 'ul.main li { padding-bottom: 2mm; }';
    $content .= 'h1 { text-align: center; font-size: 20mm}';
    $content .= 'h3 { text-align: center; font-size: 14mm}';
    $content .= 'th { font-weight: bold; text-align: center; border-bottom: solid thin black; }';
	$content .= '--> ';
	$content .= '</style>';
	$content .= '<page backtop="28mm" backbottom="14mm" backleft="10mm" backright="10mm" style="font-size: 10pt">';
	$content .= '<page_header>';
	$content .= '<table border="0" class="page_header">';
    $content .= '<tr><td style="width: 100%; height: 65px; font-size: 18pt; text-align: left; color: #fff; padding-left: 10px;">Sleep Diagnostics Inc.</td></tr>';
    $content .= '</table>';
	$content .= '</page_header>';
	$content .= '<page_footer>';
	$content .= '<table class="page_footer">';
    $content .= '<tr><td style="width: 40%; text-align: left;">Copyright &copy; Sleep Diagnostics Inc. 2012 - '.date("Y").'</td>';
    $content .= '<td style="width: 30%; text-align: center">&nbsp;</td>';
    $content .= '<td style="width: 30%; text-align: right">Page [[page_cu]]/[[page_nb]]</td></tr></table>';
	$content .= '</page_footer>';

	$db = new myPDO();
	$pstmt = $db->prepare("SELECT * FROM terms ORDER BY term");
	$pstmt->execute();
	$content .= '<table border="1" cellpadding="10" cellspacing="0" style="border-collapse: collapse; width: 100%;"><tbody>';
	$content .= '<tr><td colspan="2" style="border: none;"><h4>Term &amp; Definitions</h4></td></tr>';
	$content .= '<tr style="background-color: #0c371d; color: #fff;"><th>Term</th><th>Definition</th></tr>';
	while($row = $pstmt->fetch(PDO::FETCH_ASSOC)){
		$content .= '<tr><td style="background-color: #0c371d; color: #fff; width: 25%;">'.$row['term'].'</td><td style="width: 75%;">'.$row['definition'].'</td></tr>';
	}
	$content .= '</tbody></table>';
	$content .= '</page>';
	//echo $content; die;
	try
    {
        // init HTML2PDF
        $html2pdf = new HTML2PDF('L', 'P4', 'en', true, 'UTF-8', array(0, 0, 0, 0));

        // display the full page
        $html2pdf->pdf->SetDisplayMode('fullpage');

        // convert
        $html2pdf->writeHTML($content, isset($_GET['vuehtml']));

        // add the automatic index
        //$html2pdf->createIndex('Sommaire', 30, 12, false, true, 1);

        // send the PDF
        $html2pdf->Output('ReplacementSchedule.pdf');
    }
    catch(HTML2PDF_exception $e) {
        echo $e;
        exit;
    }
?>