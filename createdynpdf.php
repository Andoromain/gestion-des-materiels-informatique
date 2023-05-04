<?php
	   include("main.php");
	   $numFacture=$_GET['numFact'];
	   $numClient=$_GET['numClient'];
	   $nom=$_GET['nom'];
	   $annee=$_GET['annee'];
	   
	   //this statement includes the file into this file. If it failes to find the file, an error is produced and stops the script
	  require('../fpdf/fpdf.php');
	   
	   //create a new instance of FPDF to allocate memore for it
	   $pdf = new FPDF();
	   
	   //add a new page to your PDF doc
	   $pdf->AddPage();
	   
	   //Sets the font used to print character strings.
	   // 1. Font Family
	   // 2. Font Style-B, I, U
	   // 3. Font Size in points
	   $pdf->SetFont("arial","B",12);
	   
	   //Prints a cell (rectangulaire area) with optinal borders, background color and character string.
	   // 1. Cell Width
	   // 2. Cell Height
	   // 3. String to print
	   // 4. Indicates if borders must be drawn around the cell. The value can be a number or a string. 0 for no border, 1 for fram
	   // 5. Line. -Indicates where the current position should go after the call. 1 equals to the beginning of the next line
	   // 6. Allows to center or align the text. C for Center
	   // 7. Fill. -Indicates if the cell background maust be painted (true) or transparent (false). Default value:false;
	   // 8. Link. -URL or identifier returned by AddLink().
	   //$pdf->Cell(0,10,"Welcome($nom)",1,1,'C');
	   
	   $pdf->Cell(0,10,"FACTURE N: {$numFacture}",0,1,'C');
	   
	   
	   $pdf->Cell(50,10,"N CLIENT: $numClient",0,0,0);
	   $pdf->Cell(110,10,"ANNEE: $annee",0,1,0);
	   $pdf->Cell(50,10,"NOM: $nom",0,1,0);
	   $pdf->Cell(50,10,"DESIGNATION",1,0,'C');
	   $pdf->Cell(35,10,"PU",1,0,'C');
	   $pdf->Cell(39,10,"QUANTITE",1,0,'C');
	    $pdf->Cell(0,10,"MONTANT",1,1,'C');
	   
	   $connect=@mysql_connect("localhost","root");
		mysql_select_db("ventedematerielinformatique",$connect);
		$req=mysql_query("select distinct materiel.design,materiel.Pu,sum(achat.qte) as quantite,materiel.Pu*sum(achat.qte) as montant from materiel,client,achat where materiel.numMat=achat.numMat and client.numClient=achat.numClient and client.numClient='".$numClient."' and year(achat.date_achat)=".$annee." group by materiel.design asc;");
		
		$resultat1=mysql_num_rows($req);
		if($resultat1>0)
		{
			$req=mysql_query("select distinct materiel.design,materiel.Pu,sum(achat.qte) as quantite,materiel.Pu*sum(achat.qte) as montant from materiel,client,achat where materiel.numMat=achat.numMat and client.numClient=achat.numClient and client.numClient='".$numClient."' and year(achat.date_achat)=".$annee." group by materiel.design asc;");
			$pdf->SetFont("arial","",12);
			while($res=mysql_fetch_assoc($req))
			{
				$pdf->Cell(50,10,$res['design'],1,0,'C');
				$pdf->Cell(35,10,$res['Pu'],1,0,'C');
				$pdf->Cell(39,10,$res['quantite'],1,0,'C');
				$pdf->Cell(0,10,$res['montant'],1,1,'C');
			}
			$req2=mysql_query("select sum(materiel.Pu*achat.qte) as Total from materiel,achat,client where materiel.numMat=achat.numMat and client.numClient=achat.numClient and client.numClient='".$numClient."' and year(achat.date_achat)=".$annee.";");
				$res2=mysql_fetch_assoc($req2);
			 //espace pour atteindre TOTAL
			 
			$pdf->Cell(50,10,"",0,0,'C');
			$pdf->Cell(35,10,"",0,0,'C');
			
			$pdf->SetFont("arial","B",12);
			
			$pdf->Cell(39,10,"TOTAL",1,0,'C');
			
			$pdf->SetFont("arial","",12);
			
			$pdf->Cell(0,10,$res2["Total"],1,1,'C');
			
			//appel de fonction de transformation de chiffre en lettre
			$var=millieme($res2["Total"]);
			
			$pdf->Cell(70,20,"Arrete la presente facture a la somme de ",0,0,'C');
			$pdf->SetFont("arial","B",12);
			$pdf->Cell(126,20,$var." Ar",0,0,'C');
			
		}else
		{
			$pdf->Cell(124,10,"Vide",1,1,'C');
		}			
	  
	   mysql_close($connect);	
	   
	   
	   
	   // Leaving Output function with no arguments will display the in browser
	   // Send the document to a given destination: browser, file or string.
	   $pdf->Output();

?>