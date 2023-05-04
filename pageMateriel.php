<!DOCTYPE html>
<html>
   <head>
      <title>Acceuil</title>
	  <meta charset= "UTF-8">
	  <link rel = "stylesheet" type = "text/CSS" href = "CSS/Project.css">
	  <script language="javascript" src="js/recherche.js">
	</script>
   </head>
	<body>
      <div class = "div_conteneur_parent">
      	<header>
         <div class = "div_conteneur_page">
		     <a> <img id = "sary1" src = "sary/le_formateur.ico" style="width:50px;border:none;" alt="formateur informatique" align="left"></a>
			   <div class = "titre_page">
				  <h1>VENTE DE MATERIELS INFORMATIQUES</h1>
			      <!--<h1>Formulaire PHP de mise à jour des données</h1>-->
				    <div class="contenur_menu">
					  <div class="monmenu" >
					     <ul>
						   <li >
						     <a href="index.php" target="_self" style="color: #999;"> Accueil</a>
						   </li>
						 </ul>
					  </div>
					  <div class="monmenu">
					     <ul>
						   <li>
						     <a href="pageClient.php" target="_self" style="color: #999;" <!--style="color:#777bb5;-->">Client</a>
						   </li>
						</ul>
					  </div>
					  <div class="monmenu">
					     <ul>
						   <li style="background-color:RGB(21,181,234);">
						     <a href="pageMateriel.php" target="_self" style="color: #000000;" <!--style="color:#777bb5;-->">Materiel</a>
					       </li>
						 </ul>
					  </div>
					  <div class="monmenu">
					     <ul>
						   <li>
						     <a href="pageAchat.php" target="_self" style="color: #999;" <!--style="color:#777bb5;-->"> Achat</a>
						   </li>
						 </ul>
					  </div>
					  <!-- recherche -->
					  <div class="div_moteur">
					     <form action="pageRecherche.php" method="POST" name="form_moteur">
					       <input type="text" id="search" value="Recherche..." name="search" onfocus='if(this.value=="Recherche...")this.value=""' onblur='if(this.value=="")this.value="Recherche..."' list="data" onkeyup="javascript:envoyerRequeteR('RechercherServeur.php',this.value)" style="border:#777bb5 1px solid;color:white">
					        <datalist id="data">
								<option></option>
								<option></option>
								<option></option>
								<option></option>
								<option></option>
								<option></option>
								<option></option>
								<option></option>
								<option></option>
								<option></option>
								<option></option>
								<option></option>
		  					</datalist>
						   <input type="submit" value="search" class="b_moteur">
						 </form>
					  </div>
					  <div style="float:right;margin-right:5px;">
					     <img src="sary/lecompte_non.png" title="Non connecté(e)" style="cursor:pointer;" onclick='window.open("identification.php","_self");'>
					  </div>
					</div>
				
		   </header> 
		   <section id="contenu_pageMateriel">
		   
				<h2>Informations du Mate&#769riel </h2>
				<form name="form1" class="formMateriel">	
					<div style="border:1px solid none;float:left;margin: 2px 60px 2px 43px;">	
						<label for="numMat">Numero de Materiel:</label><br>
						<input type="text" name="numMat" id="numMat" placeholder="Exemle : M001" ><br>
						<label for="design">Design du Materiel:</label><br>
						<input type="text" name="design" id="design" placeholder="ordinateur">
					</div>	
					<div style="border:1px solid none;float:left;margin: 2px 60px 2px 43px;">	
						<label for="Pu">Prix Unitaire du Materiel:</label><br>
						<input type="number" name="Pu" id="Pu"><a>Ar</a><br>	
						<label for="Stock">Stock:</label><br>
						<input type="number" name="Stock" id="Stock"><br>
					</div>	
					<div style="border:1px solid none; margin-top:20px;">	
						<input type="button" value="Ajouter" name="ajouter" onClick="javascript:envoyerRequeteAjoutMat('materielNouveauServeur.php',
						document.forms['form1'].elements['numMat'].value,document.forms['form1'].elements['design'].value,
						document.forms['form1'].elements['Pu'].value,document.forms['form1'].elements['Stock'].value)" ><br><br>
						<input type="button" value="Valider" onClick="javascript:rafraichirPourMat()">
					</div><br>	
					<div id="modifierMat" style='visibility:hidden;display:block;'>
						<div style="border:1px solid none;float:left;margin: 2px 60px 2px 43px;">	
							<label for="numMatModif">Numero de Materiel:</label><br>
							<input type="text" name="numMatModif" id="numMatModif" placeholder="Exemle : M004"><br>
							<label for="designModif">Design du Materiel:</label><br>
							<input type="text" name="designModif" id="designModif"  placeholder="Arduino">
						</div>
						<div style="border:1px solid none;float:left;margin: 2px 60px 2px 43px;">	
							<label for="PuModif">Prix Unitaire du Materiel:</label><br>
							<input type="number" name="PuModif" id="PuModif"><a>Ar</a><br>
							<label for="StockModif">Stock:</label><br>
							<input type="number" name="StockModif" id="StockModif">
						</div><br>
						<div style="border:1px solid none; margin-top:0px;">	
							<input type="button" value="Modifier" OnClick="javascript:envoyerRequeteModifMat('MaterielModif.php',
							document.forms['form1'].elements['numMatModif'].value,document.forms['form1'].elements['designModif'].value,
							document.forms['form1'].elements['PuModif'].value,document.forms['form1'].elements['StockModif'].value,
							document.forms['form1'].elements['numMat'].value)">	<br><br>
							<input type="button" value="Annuler" OnClick="javascript:AnnulerPourMat()">	
						</div>	
					</div>
						
				</form><br>
				<a id="lienFacture">Liste des Materiels</a><br><br>
					<span id="rep"></span>
	
				<table id="tableau">
					<thead>
						<tr >
							<th>numMat</th>
							<th>design</th>
							<th>Pu</th>
							<th>Stock</th>
							<th>Modifier</th>
						</tr>
					</thead>
					</tbody>	
	<?php
		$connect=@mysql_connect("localhost","root");
		if(!$connect)
		{
			echo "on ne peut pas connecter au serveur pour le moment";
		}
		else
		{
			mysql_select_db("VenteDeMaterielInformatique",$connect);
			$req=mysql_query("select * from materiel;",$connect);
			$res=mysql_fetch_assoc($req);
			if(empty($res))
			{
				echo "<tr><td colspan=\"4\" >vide</td></tr>";
			}
			else
			{
				$req=mysql_query("select * from Materiel;",$connect);
				while($res=mysql_fetch_array($req))
				{
					echo "<tr><td>".$res['numMat']."</a></td>";
					echo "<td>".$res['design']."</td>";
					echo "<td>".$res['Pu']."</td>";
					echo "<td>".$res['stock']."</td>";
					echo "<td><a href=\"#\" onClick=\"javascript:modifierMat('".$res['numMat']."','".$res['design']."',".
							$res['Pu'].",".$res['stock'].")\">Modifier</a></td></tr>";
				}
			}
			mysql_close($connect);
		}
	?>				</tbody>
				</table><br>
				<u id="lienFacture">Liste des materiels vendus</u><br><br>
					<table id="tableau">
						<thead>
							<tr>
								<th>Nume&#769ro du mate&#769riel </th>
								<th>Design</th>
								<th>Quatite&#769s achete&#769es </th>
							</tr>
						</thead>
						<tbody>	
			<?php
				$connect=mysql_connect("localhost","root")or die("impossible de connecter au serveur ".mysql_error());
				mysql_select_db("ventedematerielinformatique")or die("imossible d'acces au base de donne&#768e".mysql_error());
				$req0=mysql_query(" select distinct materiel.numMat,materiel.design,sum(achat.qte) as quantite from materiel,achat ,client where materiel.numMat=achat.numMat and client.numClient=achat.numClient group by materiel.numMat;",$connect);
				$res0=mysql_fetch_array($req0);
				if(!$res0)
				{
					echo "<tr><td></td><td  >Aucun Materiel est vendu</td><td></td></tr></table>";
				}else{
					$req1=mysql_query(" select distinct materiel.numMat,materiel.design,sum(achat.qte) as quantite from materiel,achat ,client where materiel.numMat=achat.numMat and client.numClient=achat.numClient group by materiel.numMat;",$connect);

					while($res=mysql_fetch_assoc($req1))
					{
						echo "<tr><td>".$res["numMat"]."</td>";
						echo "<td>".$res["design"]."</td>";
						echo "<td>".$res["quantite"]."</td></tr>";
					}
				echo"</table>";
				
				$req2=mysql_query("select sum(materiel.Pu*achat.qte) as somme_totale from materiel,achat,client where client.numClient=achat.numClient and materiel.numMat=achat.numMat;");
				$res2=mysql_fetch_array($req2);
				echo "<p style=\"font-size:20px;\">La Somme totale est :".$res2["somme_totale"]."Ar.</p>";
				}
			?>
							</tbody>
						</table><br>
						
					<a id="lienFacture" href="pageStock.php">Etat de stock</a>  <br><br> 
					
					<h3 style="font-size:19px; color:RGB(17,17,238);text-decoration:underline;">Voici les marques des machines les plus connus au Monde:</h3>
			<article id="marqueOrdi">
				<img src="sary/logoMat/logo7.jpg" width="120px" height="50px">
				<img src="sary/logoMat/logo2.jpg" width="120px" height="50px">
				<img src="sary/logoMat/logo3.jpg" width="120px" height="50px">
				<img src="sary/logoMat/logo4.jpg" width="120px" height="50px">
				<img src="sary/logoMat/logo5.jpg" width="120px" height="50px">
				<img src="sary/logoMat/logo6.jpg" width="120px" height="50px">
				<img src="sary/logoMat/logo1.jpg" width="120px" height="50px">
				<img src="sary/logoMat/logo0.png" width="120px" height="50px">
			</article>	
			
			</section>	
		    <footer id="footMateriel">
				<p>
					<a href="#">Besoin d'aide<img src="sary/aide.png" width="20px" height="20px"></a><br>
					<a href="#">Contactez-nous</a><br>
					<a href="#">Partager sur re&#769seau sociaux<img src="sary/logo_facebook.jpg" width="20px" height="20px">
					<img src="sary/logo_twitter.jpg" width="20px" height="20px"><img src="sary/gmail.png" width="20px" height="20px"></a><br>	
				</p>
			</footer> 	
		</div> 
   </body>
</html>