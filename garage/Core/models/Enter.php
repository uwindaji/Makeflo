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
$recept =  new service\Seed('RECEPT');
$take =  new service\Seed('TAKE');

// get information customer, staff, car 
// i must have id car, id staff, id customer

$inf_cars = service\Tools::search_with ('*', 'CARS', 'WHERE id_car ='.$_GET['id']);
$inf_staff = service\Tools::search_with ('*', 'Admin', 'WHERE id ='.$_SESSION['login'][0]);
$inf_mark = service\Tools::search_with ('mark', 'MARK', 'WHERE id_mark ='.$inf_cars[0]['id_mark']);
$id_customer = service\Tools::search_with ('id_customer', 'HAVE', 'WHERE id_car ='.$_GET['id']);
$id_cust = $id_customer[0]['id_customer'];
$inf_customer = service\Tools::search_with ('*', 'CUSTOMER', 'WHERE id_customer ='.$id_cust);



$array = array("id_car"=>$_GET['id'], "id"=>$_SESSION['login'][0], "date"=>date('Y-m-d H:i:s'), "ext"=>"FALSE");
$src_ad = $recept->insert_in_table($array);

$data = array("id_car"=>$_GET['id']);
$delete = $take->delete_in_table ($data);



//  generate pdf  file
use app\kernel\service\fpdf as fpdf;

	$date      = date("d/m/y");
	$code     = "V".$_GET['id']."S".$_SESSION['login'][0]."C".$inf_customer[0]['id_customer']."T".strtotime(date('Y-m-d H:i:s'));
	$dcode     = $inf_customer[0]['mail'];

	$pdf = new fpdf\Code();
	$pdf->AddPage();
	$pdf->SetFont('Arial', '', 10);

	$pdf->Rect(0, 5, 210, 20, "DF");
	$pdf->Image('./img/logo.png',  150, 10, 50, 10);
	$pdf->Image('./img/wall.png',  0, 0, 210, 297);
	$pdf->Code128(140, 30, $code, 60, 10);


	$pdf->SetTextColor(0, 0, 0);
	$pdf->SetFont('arial', '', 14);
	$pdf->SetTextColor(0, 0, 0);

	$pdf->SetXY(140, 40);
	$pdf->SetFont('arial', '', 10);
    $pdf->MultiCell(140, 4, utf8_decode($code));
    
	$pdf->SetXY(60, 50);
	$pdf->SetFont('arial', 'BU', 24);
	$att = "ATTESTATION DEPOT";
	$pdf->MultiCell(140, 4, utf8_decode($att));


	
	$pdf->SetFont('arial', '', 12);
	$pdf->SetXY(20, 80);
    $text =strtoupper ($inf_customer[0]['first_name'])." ".strtoupper ($inf_customer[0]['name'])."
".strtoupper ($inf_customer[0]['address'])." 
".strtoupper ($inf_customer[0]['zip'])." ".strtoupper ($inf_customer[0]['city'])."
".strtoupper ($inf_customer[0]['tel'])."
".strtoupper ($inf_customer[0]['mail']);
	$text = iconv('utf-8', 'cp1252', $text);
	$pdf->MultiCell(90, 6, $text, 0, "L");

		
	$pdf->SetFont('arial', '', 12);
	$pdf->SetXY(130, 85);
	$text = " GALE VEHICLE
15 rue marchand 
75012 PRIS
tél : 01.48.43.52.56.
E-mail: contact@gale.com
Web: www.gale.com";
	$text = iconv('utf-8', 'cp1252', $text);
	$pdf->MultiCell(90, 6, "".strtoupper ($text), 0, "L");

	$pdf->SetTextColor(0, 0, 0);
	$pdf->SetFont('arial', '', 10);
	$pdf->SetTextColor(0, 0, 0);
	$pdf->SetXY(20, 140);
	$text = "PARIS le ".date('d-m-Y');
	$text = iconv('utf-8', 'cp1252', $text);
	$pdf->MultiCell(170, 8, "".$text, 0, "R");

	$pdf->SetTextColor(0, 0, 0);
	$pdf->SetFont('arial', '', 12);
	$pdf->SetTextColor(0, 0, 0);
	$pdf->SetXY(20, 170);
	$text = "Le garage GALE VEHICLE représenté par M. ".strtoupper ($inf_staff[0]['first_name'])." ".strtoupper ($inf_staff[0]['name']).", agissant en qualité de Chef attelier, a pris le ".date("d-m-Y")." à ".date("H:s")." heur la voiture de M. ".strtoupper ($inf_customer[0]['first_name'])." ".strtoupper ($inf_customer[0]['name'])."
			Marque: ".strtoupper ($inf_mark[0]['mark']).". 
			Model: ".strtoupper ($inf_cars[0]['model']).". 
			Matricule: ".strtoupper ($inf_cars[0]['registration_number']).". 
			Kilometrage: ".strtoupper ($inf_cars[0]['kilometers']).". 
			pour réparation.";
	$text = iconv('utf-8', 'cp1252', $text);
	$pdf->MultiCell(170, 8, "".$text, 0, "L");


	$pdf->Code128(10, 277, $dcode, 60, 15);


	$facture = "./Core/app/docs/depot/".$code.".pdf";
    $pdf->Output($facture, 'f');