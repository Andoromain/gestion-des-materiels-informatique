<?php
	$connect=mysql_connect("localhost","root")or die("impossible de connecter au serveur ".mysql_error());
		mysql_select_db("ventedematerielinformatique")or die("impossible d'acces au base de donne&#768e".mysql_error());
		
		$req0=mysql_query("select datediff('".$_POST["recent_date"]."','".$_POST["ancien_date"]."') as difference;");
		$res0=mysql_fetch_array($req0);
	if($res0['difference']<0)
	{
		echo "La date que vous avez saisis est invalide!!";
	}else{

		$req1=mysql_query(" select distinct materiel.numMat,materiel.design from materiel,achat ,client where materiel.numMat=achat.numMat and client.numClient=achat.numClient and client.numClient='".$_POST["numClient"]."' and achat.date_achat between '".$_POST["ancien_date"]."' and '".$_POST["recent_date"]."';",$connect);

		$res=mysql_num_rows($req1);
	
		if($res>0)
		{
			echo"<table id='tableau'><thead><tr><th>numMat</th><th>design</th></tr></thead><tbody>";
			
			while($res=mysql_fetch_array($req1))
			{
				echo "<tr><td>".$res["numMat"]."</td>";
				echo "<td>".$res["design"]."</td></tr>";
			}
				echo"</tbody></table>";
				
				$req2=mysql_query("select sum(materiel.Pu*achat.qte) as somme_totale from materiel,achat,client where client.numClient=achat.numClient and materiel.numMat=achat.numMat and client.numClient='".$_POST["numClient"]."' and achat.date_achat between '".$_POST["ancien_date"]."' and '".$_POST["recent_date"]."';",$connect);
				$res2=mysql_fetch_array($req2);
				echo "<p>La Somme totale est :".$res2["somme_totale"]." Ar.</p>";
		}else{	
			echo " Vous n'effectuent pas d'achat entre ces deux dates!!";
		}
	}
	
		
?>