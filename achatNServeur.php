<?php
	$connect=@mysql_connect("localhost","root") or die(mysql_error());
	mysql_select_db("ventedematerielinformatique",$connect) or die(mysql_error());
	
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

					if($res["stock"]>=$_POST["qte"])
					{
						$req1=mysql_query("insert into achat values('".$_POST["numClient"]."','".$_POST["numMat"].
							"',".$_POST["qte"].",'".$_POST["date_achat"]."',null);") or die(mysql_error());
						$req2=mysql_query("update materiel set stock=stock-".$_POST["qte"]." where numMat='".$_POST["numMat"]."';")or die(mysql_error());
							echo "Le achat est ajoute avec succes!";
					}else if($res["stock"]==0){
						$req3=mysql_query("select design from materiel where numMat='".$_POST["numMat"]."';",$connect) or die(mysql_error());
						$res1=mysql_fetch_assoc($req3);
						echo "Il n'y a plus de ".$res1["design"]." sur notre stock";
					}else{
						$req3=mysql_query("select design from materiel where numMat='".$_POST["numMat"]."';",$connect) or die(mysql_error());
						$res1=mysql_fetch_assoc($req3);
						echo "Il n' y a que ".$res["stock"]." de ".$res1["design"]." sur notre stock!";
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
?> 