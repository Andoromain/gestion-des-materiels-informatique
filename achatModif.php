<?php
	$connect=@mysql_connect("localhost","root") or die(mysql_error());
	mysql_select_db("VenteDeMaterielInformatique",$connect);
	
	$req=mysql_query("select stock from materiel where numMat='".$_POST["numMat"]."';",$connect) or die(mysql_error());
	$res=mysql_fetch_assoc($req);

	$reqNumMat=mysql_query("select numMat from materiel where numMat='".$_POST["numMat"]."';") or die(mysql_error());
		$resNumMat=mysql_fetch_assoc($reqNumMat);
	$reqNumClient=mysql_query("select numClient from client where numClient='".$_POST["numClient"]."';") or die(mysql_error());
			$resNumClient=mysql_fetch_assoc($reqNumClient);
		if($resNumMat["numMat"]==$_POST["numMat"])
		{
			
				if($resNumClient['numClient']==$_POST["numClient"])
				{

					if($_POST["qteReste"]>=0)
					{
						$req1=mysql_query("update achat set numClient='".$_POST['numClient']."',numMat='".$_POST['numMat']."',qte=".$_POST['qte'].",date_achat='".$_POST['date_achat']."' where id='".$_POST['id']."';");
						$req2=mysql_query("update materiel set Stock=Stock+".$_POST['qteReste']." where numMat='".$_POST['numMat']."'");
							echo "Votre achat a ete modifie avec succes!!";
					}else {
							
						if($res["stock"]>=$_POST["AbsQteReste"])
						{
							$req1=mysql_query("update achat set numClient='".$_POST['numClient']."',numMat='".$_POST['numMat']."',qte=".$_POST['qte'].",date_achat='".$_POST['date_achat']."' where id='".$_POST['id']."';");
						$req2=mysql_query("update materiel set Stock=Stock+".$_POST['qteReste']." where numMat='".$_POST['numMat']."'");
							echo "Votre achat a ete modifie avec succes!!";
						}else{

						$req3=mysql_query("select design from materiel where numMat='".$_POST["numMat"]."';",$connect) or die(mysql_error());
						$res1=mysql_fetch_assoc($req3);
						echo "Il n' y a que ".$res["stock"]." de ".$res1["design"]." sur notre stock!";
						}
					}
				}else{
					echo "le client  numero ".$_POST["numClient"]." n'est pas encore enregistre sur la base de donnee";
				}
		}else{
				if($resNumClient['numClient']==$_POST["numClient"])
				{
					echo "Le materiel numero ".$_POST["numMat"]." n'est pas encore enregistre sur la base de donnee";
				}else{
					echo  "le client  numero ".$_POST["numClient"]."et le materiel numero ".$_POST["numMat"]." n'est pas encore enregistre sur la base de donnee";
				}
		}								
	mysql_close($connect);
?>