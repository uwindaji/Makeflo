<?php
// name of project Miramis.
// Author :  lakhdar.
// Create in  2018-09-10 at 12:17:45.
// Contact : lakhdar-rouibah@live.fr.
// Web : rouibah.fr

// page to login

namespace models ;
use models as models;
use app\kernel\service as service;
use  Core\app\controlers as controlers;

// instantiate table CUSTOMER
$ext =  new service\Seed('EXT');
$recept =  new service\Seed('RECEPT');
$car =  new service\Seed('CAR');
$admin =  new service\Seed('Admin');
$mended =  new service\Seed('MENDED');
$mend =  new service\Seed('MEND');

// get date of recept
$rec_date = service\Tools::search_with("date", "RECEPT", "WHERE id_car = ".$_GET['id']." AND ext = 0");
// store date of recepr in variable $date_enter
$date_enter = $rec_date[0]['date'];

// get id of mend and store it in variable $rec_id_mend
$rec_id_mend = service\Tools::search_with("id_mend", "MENDED", "WHERE id_car = ".$_GET['id']." AND date > ".$date_enter);

// init variable $array_mend
$array_mend = array();

foreach($rec_id_mend as $val){

	// search in table MEND price and mend 
	$rec_mend = service\Tools::search_with("*", "MEND", "WHERE id_mend = ".$val['id_mend']);
	// push in array the result of seach like a table
    array_push($array_mend, $rec_mend[0]);

}

// get all form table GOT condition id_car and date 
$rec_got = service\Tools::search_with("*", "GOT", "WHERE id_car = ".$_GET['id']." AND date > ".$date_enter);

$array_pieces = array();

foreach($rec_got as $val):
	$rec_pieces = service\Tools::search_with("*", "PIECES", "WHERE id_pieces = ".$val['id_pieces']);
	array_push($array_pieces, $rec_pieces[0]);

endforeach;

// get id_customer 
$rec_id_customer = service\Tools::search_with("id_customer", "HAVE", "WHERE id_car = ".$_GET['id']);

$id_customer = $rec_id_customer[0]['id_customer'];
// get customer table
$rec_customer = service\Tools::search_with("*", "CUSTOMER", "WHERE id_customer = ".$id_customer);

// get Admin table
$rec_admin = service\Tools::search_with("*", "Admin", "WHERE id = ".$_SESSION['login'][0]);

// get car table
$rec_car = service\Tools::search_with("*", "CARS", "WHERE id_car = ".$_GET['id']);



// get car model
$rec_mark = service\Tools::search_with("*", "MARK", "WHERE id_mark = ".$rec_car[0]['id_mark']);




//  generate pdf  file
use app\kernel\service\fpdf as fpdf;

	$date      = date("d-m-Y");
	// $code     = "V".$_GET['id']."S".$_SESSION['login'][0]."C".$inf_customer[0]['id_customer']."T".strtotime(date('Y-m-d H:i:s'));
    // $dcode     = $inf_customer[0]['mail'];
    
    $code = "V".$_GET['id']."S".$_SESSION['login'][0]."C".$_SESSION['login'][0]."T".strtotime(date('Y-m-d H:i:s'));;
    $dcode = $rec_customer[0]['mail'];
	define('EURO',chr(128));

	$pdf = new fpdf\Code();
	$pdf->AddPage();
	$pdf->SetFont('Arial', '', 10);

	$pdf->Rect(0, 5, 210, 20, "DF");
	$pdf->Image('./img/logo.png',  150, 10, 50, 10);
	$pdf->Image('./img/wall.png',  0, 0, 210, 297);
	$pdf->Code128(140, 30, $dcode, 60, 10);


	$pdf->SetTextColor(0, 0, 0);
	$pdf->SetFont('arial', '', 14);
	$pdf->SetTextColor(0, 0, 0);

	$pdf->SetXY(50, 50);
	$pdf->SetFont('arial', 'BU', 24);
	$att = "ATTESTATION REPRISE";
	$pdf->MultiCell(140, 4, utf8_decode($att));

	
	$pdf->SetFont('arial', '', 12);
	$pdf->SetXY(20, 80);
	$text = strtoupper ( $rec_customer[0]['first_name']." ".$rec_customer[0]['name'])."
".$rec_customer[0]['address']." 
".$rec_customer[0]['zip']." ".$rec_customer[0]['city']."
tél : ".$rec_customer[0]['tel'].".
E-mail: ".$rec_customer[0]['mail'].".";
	$text = iconv('utf-8', 'cp1252', $text);
	$pdf->MultiCell(90, 6, "".$text, 0, "L");

		
	$pdf->SetFont('arial', '', 12);
	$pdf->SetXY(140, 85);
	$text = " GALE VEHICLE
	15 rue marchand 75012 PRIS
	tél : 01.48.43.52.56.
	E-mail: contact@gale.com
	Web: www.gale.com";
	$text = iconv('utf-8', 'cp1252', $text);
	$pdf->MultiCell(90, 6, "".$text, 0, "L");

	$pdf->SetTextColor(0, 0, 0);
	$pdf->SetFont('arial', '', 10);
	$pdf->SetTextColor(0, 0, 0);
	$pdf->SetXY(20, 130);
	$text = "PARIS ".$date;
	$text = iconv('utf-8', 'cp1252', $text);
	$pdf->MultiCell(170, 8, "".$text, 0, "R");

	$pdf->SetTextColor(0, 0, 0);
	$pdf->SetFont('arial', '', 12);
	$pdf->SetTextColor(0, 0, 0);
	$pdf->SetXY(20, 170);
	$text = "Le garage GALE VEHICLE représenté par M. ".strtoupper ($rec_admin[0]['first_name']." ".$rec_admin[0]['name']).", agissant en qualité de Chef attelier, a remis le ".$date.". à ".date('H:i:s')." heur la voiture de M. ".strtoupper ( $rec_customer[0]['first_name']." ".$rec_customer[0]['name'])."
			Mark: ".$rec_mark[0]['mark'].". 
			Model: ".$rec_car[0]['model'].". 
			Matricule: ".$rec_car[0]['registration_number'].". 
			Kilometrage: ".$rec_car[0]['kilometers'].". 
			a sont proprietaire.";
	$text = iconv('utf-8', 'cp1252', $text);
	$pdf->MultiCell(170, 8, "".$text, 0, "L");


	$pdf->Code128(10, 277, $dcode, 60, 15);


	$facture = $dcode.".pdf";

//________________________________________________________________
	$pdf->AddPage();
	$pdf->SetFont('Arial', '', 10);

    $pdf->Rect(0, 0, 210, 20, "DF");
	$pdf->Image('./img/logo.png',  150, 5, 50, 10);
	$pdf->Image('./img/facture.png',  0, 0, 210, 297);
	$pdf->Code128(140, 25, $dcode, 60, 10);


	$pdf->SetTextColor(0, 0, 0);
	$pdf->SetFont('arial', '', 14);
	$pdf->SetTextColor(0, 0, 0);

	$pdf->SetXY(85, 40);
	$pdf->SetFont('arial', 'BU', 24);
	$att = "FACTURE";
	$pdf->Cell(140, 4, utf8_decode($att));

	
	$pdf->SetFont('arial', '', 8);
	$pdf->SetXY(20, 50);
	$text =strtoupper (  $rec_customer[0]['first_name']." ".$rec_customer[0]['name'])."
".$rec_customer[0]['address']." 
".$rec_customer[0]['zip']." ".$rec_customer[0]['city']."
tél : ".$rec_customer[0]['tel'].".
E-mail: ".$rec_customer[0]['mail'].".";
	$text = iconv('utf-8', 'cp1252', $text);
	$pdf->MultiCell(90, 4, $text, 0, "L");

		
	$pdf->SetFont('arial', '', 8);
	$pdf->SetXY(140, 55);
	$text = " GALE VEHICLE
	15 rue marchand 75012 PRIS
	tél : 01.48.43.52.56.
	E-mail: contact@gale.com
	Web: www.gale.com";
	$text = iconv('utf-8', 'cp1252', $text);
	$pdf->MultiCell(90, 4, "".$text, 0, "L");

	$pdf->SetTextColor(0, 0, 0);
	$pdf->SetFont('arial', '', 10);
	$pdf->SetTextColor(0, 0, 0);
	$pdf->SetXY(20, 40);
	$text = "PARIS ".$date;
	$text = iconv('utf-8', 'cp1252', $text);
	$pdf->MultiCell(170, 8, "".$text, 0, "R");


	$pdf->SetFont('arial', 'B', 16);
	$pdf->SetXY(20, 87);
	$att = "DESIGNATION";
	$pdf->Cell(140, 4, utf8_decode($att));


	$pdf->SetXY(170, 87);
	$att = "PRIX";
	$pdf->Cell(140, 4, utf8_decode($att));

	//============================================== mend ===================================
	$totale = 0;
	$pdf->SetFont('arial', 'i', 11);
	$pdf->SetXY(20, 105);
	$text = "====================== MEND =======================";
	$text = iconv('utf-8', 'cp1252', $text);
	$pdf->Cell(90, 4, "".$text, 0, "L");
    $x =105; 
    for ($i=0; $i<count($array_mend); $i++):
        $x += 7;
        $pdf->SetFont('arial', 'i', 11);
        $pdf->SetXY(20, $x);
        $text = $array_mend[$i]['mend'];
        $text = iconv('utf-8', 'cp1252', $text);
        $pdf->Cell(90, 4, "".$text, 0, "L");
	endfor;

    $p = 105;
	for ($i=0; $i<count($array_mend); $i++):
		$totale+= floatval($array_mend[$i]['price']);
        $p += 7;
        $pdf->SetXY(180, $p);
        $text = $array_mend[$i]['price'];
        $text = iconv('utf-8', 'cp1252', $text);
        $pdf->Cell(90, 4, "".$text, 0, "L");
	endfor;	
	
	$pdf->SetXY(20, $x+20);
	$text = "====================== PIECES =======================";
	$text = iconv('utf-8', 'cp1252', $text);
	$pdf->Cell(90, 4, "".$text, 0, "L");
	//======================================== poieces =======================================

	$x += 20;
    for ($i=0; $i<count($array_pieces); $i++):
        $x += 7;
        $pdf->SetFont('arial', 'i', 11);
        $pdf->SetXY(20, $x);
        $text = $array_pieces[$i]['bar_code']."-".$array_pieces[$i]['name_pieces'];
        $text = iconv('utf-8', 'cp1252', $text);
        $pdf->Cell(90, 4, "".$text, 0, "L");
    endfor;
	
	$p += 20;
	for ($i=0; $i<count($array_pieces); $i++):
		$totale+= floatval(($rec_got[$i]['qt'] * $array_pieces[$i]['price_ht']));
        $p += 7;
        $pdf->SetXY(180, $p);
        $text = $rec_got[$i]['qt']." x ".$array_pieces[$i]['price_ht'] ;
        $text = iconv('utf-8', 'cp1252', $text);
        $pdf->Cell(90, 4, "".$text, 0, "L");
    endfor;
	//============================================ ------->
	$pdf->SetXY(20, 264);
	$pdf->SetFont('arial', 'B', 16);
	$att = "TOTALE";
	$pdf->Cell(140, 4, utf8_decode($att));

	$pdf->SetXY(155, 264);
	$att = $totale;
	$pdf->Cell(140, 4, $att." ".EURO);

	$pdf->Code128(10, 277, $dcode, 60, 15);

    $facture = "./Core/app/docs/facture/".$code.".pdf";
    $pdf->Output($facture, 'f');
