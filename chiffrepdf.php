<?php
	require('../fpdf/fpdf.php');
	$pdf=new FPDF("P",'mm','A4');
	$pdf->AddPage();
	$pdf->SetFont('Times','BU');
	$pdf->Cell(180,20,'Chiffre d\'affaire par client',0,1,'C');
	$pdf->Cell(30,20,'Annee:',0,0);
	$pdf->SetFont('Times','');
	$pdf->Cell(30,20,$_GET['annee'],0,1);
	$pdf->Ln(3);
	$pdf->SetFont('Times','B');
	$pdf->Cell(60,10,'Numero de client',1,0,'C');
	$pdf->Cell(60,10,'NOM',1,0,"C");
	$pdf->Cell(60,10,'CHIFFRE D\'AFFAIRE',1,1,"C");
	$connect=@mysql_connect("localhost","root");
		mysql_select_db("ventedematerielinformatique",$connect);
	$req=mysql_query(" select Client.numClient,Client.nom,sum(materiel.Pu*achat.qte) as Chiffre_affaire from materiel,achat,client where client.numClient=achat.numClient and materiel.numMat=achat.numMat and year(achat.date_achat)=".$_GET["annee"]." group by numClient  ;") or die("Pas encore de chiffre d'affaire");
		$res=mysql_fetch_assoc($req);
		$pdf->SetFont('Times','');
		if(empty($res))
			{
				$pdf->Cell(180,10,"Vide",1,1,"C");
			}
			else
			{
				$req=mysql_query(" select Client.numClient,Client.nom,sum(materiel.Pu*achat.qte) as Chiffre_affaire from materiel,achat,client where client.numClient=achat.numClient and materiel.numMat=achat.numMat and year(achat.date_achat)=".$_GET["annee"]." group by numClient  ;");
				while($res=mysql_fetch_array($req))
				{
					$pdf->Cell(60,7,$res["numClient"],1,0,'C');
					$pdf->Cell(60,7,$res["nom"],1,0,'C');
					$pdf->Cell(60,7,$res["Chiffre_affaire"],1,1,'C');
				}	
			}
		mysql_close($connect);
	$pdf->output('Chiffre_affaire.pdf','I');
?>