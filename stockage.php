<?php
		$connect=@mysql_connect("localhost","root") or die(mysql_error());
			mysql_select_db("ventedematerielinformatique",$connect) or die(mysql_error());
		$req=mysql_query(" select distinct materiel.numMat,materiel.design,materiel.Stock,sum(achat.qte) as Sortie from materiel,achat where materiel.numMat=achat.numMat and year(achat.date_achat)=".$_POST["annee"]." group by materiel.numMat;
		;",$connect);
		$res=mysql_fetch_assoc($req);
			echo "<table id='tableau'><thead><tr><th>Numero du materiel</th><th>Design</th><th>Stock</th><th>Materiel Sortie</th></tr></thead><tbody>";
			if(empty($res))
			{
				echo "<tr><td>vide</td></tr>";
			}else
			{
				$req=mysql_query("select distinct materiel.numMat,materiel.design,materiel.Stock,sum(achat.qte) as Sortie from materiel,achat where materiel.numMat=achat.numMat and year(achat.date_achat)=".$_POST["annee"]." group by materiel.numMat;",$connect);
				while($res1=mysql_fetch_assoc($req))
				{
					echo "<tr><td>".$res1["numMat"]."</td>";
					echo "<td>".$res1["design"]."</td>";
					echo "<td>".$res1["Stock"]."</td>";
					echo "<td>".$res1["Sortie"]."</td></tr>";
				}
			}
			echo "</tbody></table>";
		mysql_close($connect);			
?>