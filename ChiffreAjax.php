<?php
	
		function tableauChiffreAffaire()
		{
			$connect=@mysql_connect("localhost","root");
			mysql_select_db("ventedematerielinformatique",$connect);
			$req=mysql_query(" select Client.numClient,Client.nom,sum(materiel.Pu*achat.qte) as Chiffre_affaire from materiel,achat,client where client.numClient=achat.numClient and materiel.numMat=achat.numMat and year(achat.date_achat)=".$_GET["annee"]." group by numClient  ;")or die("<p  style=\"display:inline-block;font-size:25px;color:red;font-family:broadway;\"><marquee>pas encore d'achat</marquee></p><br><br>");
			echo "<table id='tableau'><thead><tr><th>NumClient</th><th>Nom</th><th>Chiffe d'affaire</th></tr></thead><tbody>";
			$res=mysql_fetch_assoc($req);
			if(empty($res))
			{
				echo "<tr><td colspan=\"2\" >vide</td></tr>";
			}
			else
			{
				$req=mysql_query(" select Client.numClient,Client.nom,sum(materiel.Pu*achat.qte) as Chiffre_affaire from materiel,achat,client where client.numClient=achat.numClient and materiel.numMat=achat.numMat and year(achat.date_achat)=".$_GET["annee"]." group by numClient  ;");
				while($res=mysql_fetch_array($req))
				{
					echo "<tr><td>".$res["numClient"]."</td>";
					echo "<td>".$res["nom"]."</td>";
					echo "<td>".$res["Chiffre_affaire"]."</td></tr>";
				}
			}
			echo "</tbody></table>";
			mysql_close($connect);
		}
			tableauChiffreAffaire();
	
	?>