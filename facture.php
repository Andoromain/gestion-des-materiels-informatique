<?php
		echo "<div id='divFacture'>
				<div style=\" text-align:center;\">
					<label>FACTURE N<sup>o</sup> :</label>
					<input type=\"text\" name=\"numFact\" value=\"".$_POST['numClient'].$_POST['annee']."\" readOnly /><br>
				</div>
				<div style=\"border:1px solid none ;display:inline-block;margin-left:40px;\">	
					<label>N<sup>o </sup>de CLIENT:  </label>".$_POST["numClient"]."
					<br><label>Nom:  </label>".$_POST["nom"]."
				</div>";	
		echo "<div style=\"border:1px solid none; display:inline;float:right;margin-right:20px;\">
				<label >Annee:</label><input type='text' readOnly value='".$_POST['annee']."'><br>
			   </div>";
		$connect=@mysql_connect("localhost","root");
		mysql_select_db("ventedematerielinformatique",$connect);
		$req=mysql_query("select distinct materiel.design,materiel.Pu,sum(achat.qte) as quantite,materiel.Pu*sum(achat.qte) as montant from materiel,client,achat where materiel.numMat=achat.numMat and client.numClient=achat.numClient and client.numClient='".$_POST['numClient']."' and year(achat.date_achat)=".$_POST['annee']." group by materiel.design asc;") or die("<br><br><p  style=\"display:inline-block;font-size:25px;color:red;font-family:broadway;\"><marquee>pas encore d'achat</marquee></p><br><br>");
		echo "<table><tr><th>DESIGNATION</th><th>PU</th><th>QUANTITE</th><th>MONTANT</th></tr>";
		$resultat1=mysql_num_rows($req);
		if($resultat1>0)
		{
			$req=mysql_query("select distinct materiel.design,materiel.Pu,sum(achat.qte) as quantite,materiel.Pu*sum(achat.qte) as montant from materiel,client,achat where materiel.numMat=achat.numMat and client.numClient=achat.numClient and client.numClient='".$_POST['numClient']."' and year(achat.date_achat)=".$_POST['annee']." group by materiel.design asc;");
			while($res=mysql_fetch_assoc($req))
			{
				echo "<tr><td>".$res['design']."</td>";
				echo "<td>".$res['Pu']."</td>";
				echo "<td>".$res['quantite']."</td>";
				echo "<td>".$res['montant']."</td></tr>";
			}
				$req2=mysql_query("select sum(materiel.Pu*achat.qte) as Total from materiel,achat,client where materiel.numMat=achat.numMat and client.numClient=achat.numClient and client.numClient='".$_POST['numClient']."' and year(achat.date_achat)=".$_POST['annee'].";");
					$res2=mysql_fetch_assoc($req2);
					echo "<tr><td colspan='2' style='border-color:#cccccc;border-right:black;'></td><td >TOTAL</td><td>".$res2["Total"]."</td></tr>";
					echo "</table><br>";
					
						include("main.php");
						echo "<div style=\"text-align:center\">Arrete&#769 la presente facture a la somme de <strong>";
						echo millieme($res2["Total"])." Ar</strong></div><br></div><br>";
						
					echo "<a  id=\"lienFacture\" href=\"createdynpdf.php?numClient=".$_POST['numClient']."&nom=".$_POST['nom']."&annee=".$_POST['annee']."&numFact=".$_POST['numClient'].$_POST['annee']."\">Generer du pdf</a>";
		}
		else
		{
			echo "<tr><td colspan='4'>Vide</td></tr></table></div>";
		}
		mysql_close($connect);	
?>
