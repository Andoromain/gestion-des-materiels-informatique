<?php
	$connect=mysql_connect("localhost","root")or die("impossible de connecter au serveur ".mysql_error());
		mysql_select_db("ventedematerielinformatique")or die("impossible d'acces au base de donne&#768e".mysql_error());
	$req1=mysql_query(" select materiel.numMat,materiel.design from materiel,achat,client where materiel.numMat=achat.numMat and client.numClient=achat.numClient and client.numClient='".$_POST["numClient"]."' and monthname(achat.date_achat)='".$_POST["mois"]."';",$connect)or die(mysql_error());
	$res1=mysql_num_rows($req1);
		if($res1>0)
		{
			echo"<table id='tableau'><thead><tr><th>numMat</th><th>design</th></tr></thead><tbody>";
			while($res=mysql_fetch_assoc($req1))
			{
				echo "<tr><td>".$res["numMat"]."</td>";
				echo "<td>".$res["design"]."</td></tr>";
			}
				echo"</tbody></table>";
				$req2=mysql_query("select sum(materiel.Pu*achat.qte) as somme_totale from materiel,achat,client where client.numClient=achat.numClient and materiel.numMat=achat.numMat and client.numClient='".$_POST["numClient"]."' and monthname(achat.date_achat)='".$_POST['mois']."';");
				$res2=mysql_fetch_array($req2);
				echo "<p>La Somme totale est :".$res2["somme_totale"]." Ar.</p>";
		}else{
			echo " Vous n'effectuent pas d'achat dans le mois de ".$_POST['mois']."!!";
		}
?>