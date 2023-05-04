<!DOCTYPE html>
<html>
   <head>
      <title>Acceuil</title>
	  <meta charset= "UTF-8">
	  <link rel = "stylesheet" type = "text/CSS" href = "CSS/Project.css">
	  <script language="javascript" src="js/recherche.js">
	</script>
   </head>
	<body onload="javascript:envoyerReqAffAnnee('ChiffreAffServer.php')">
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
						     <a href="index.php" target="_self" style="color:#999; "> Accueil</a>
						   </li>
						 </ul>
					  </div>
					  <div class="monmenu">
					     <ul>
						   <li style="background-color:RGB(21,181,234);">
						     <a href="pageClient.php" target="_self" style="color:#000000; " <!--style="color:#777bb5;-->">Client</a>
						   </li>
						</ul>
					  </div>
					  <div class="monmenu">
					     <ul>
						   <li>
						     <a href="pageMateriel.php" target="_self" style="color: #999;" <!--style="color:#777bb5;-->">Materiel</a>
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
						   <input type="submit" value="search" class="b_moteur" style="background-color:#777bb5;">
						 </form>
					  </div>
					  <div style="float:right;margin-right:5px;">
					     <img src="sary/lecompte_non.png" title="Non connecté(e)" style="cursor:pointer;" onclick='window.open("identification.php","_self");'>
					  </div>
					</div>
				
		   </header> 
		   <section id="contenu_pageMateriel"> 
	<?php
		echo "<div id=\"profil\"><img src=\"sary/avatar.png\" width=\"90px\" height=\"90px\"><br><span id=\"numNom\">".$_GET["numClient"]." ".$_GET["nom"]."</span></div><br><br><br>"
	?>
	<span id="persoClient">Liste de materiel achete&#769 par le client</span><br><br>
	<div id="divPersoClient">
	<p>
		<form name="date"><span><span class="spanPersoClient">Entre deux date:</span>
			<input type="date" name="dateAncien" title="Date plus ancien" id="dateAncien"><span class="spanPersoClient"> et</span> 
			<input type="date" name="dateRecent" title="date plus recent">
	<?php
		echo " <input type='button' name='voirDate' value='voir' onclick=\"javascript:envoyerReqDate('RepDate.php','".$_GET["numClient"]."',document.forms['date'].elements['dateAncien'].value,
		document.forms['date'].elements['dateRecent'].value)\">"
	?>	
		</form>	
	</p>
			<span id="RepDate"></span>	
	<p><span class="spanPersoClient">Dans un mois:</span>	
		<select  id="mois">
			<option>January</option>
			<option>February</option>
			<option>March</option>
			<option>April</option>
			<option>Mai</option>
			<option>June</option>
			<option>July</option>
			<option>August</option>
			<option>September</option>
			<option>October</option>
			<option>November</option>
			<option>December</option>
		</select>
	<?php	
		echo "<input type=\"button\" name=\"voirMois\" value=\"voir\" onclick=\"javascript:envoyerReqMois('RepMois.php','".$_GET["numClient"]."',document.getElementById('mois').value)\">";
	?>	
	</p>
			<span id="RepMois"></span>
	<p><span class="spanPersoClient">Dans une annee:</span>
		<select id="annee">
		</select>
		<?php	
			echo "<input type=\"button\" name=\"voirMois\" value=\"voir\" onclick=\"javascript:envoyerReqAnnee('RepAnnee.php','".$_GET["numClient"]."',document.getElementById('annee').value)\">";
		?>
	</p>	
			<span id="RepAnnee"></span><br>
			
		</div><br><br>	
		<?php
			echo "<div id=\"lienFacture\">
					<a href='#' style=\"color:white;font-size:15px;text-decoration:none;\" onclick=\"envoyerReqFacture('facture.php','".$_GET['numClient']."','".$_GET['nom']."',document.getElementById('ans').value)\">Facture du client</a>
					<select id='ans' name='ans'></select><br>
				</div><br><br>";
		?>	
			<span id="facture"></span><br><br>
			<fieldset id="article2">
				<legend class="fieldset">Voici quelques materiels inte&#769ressants: </legend>
					<aside>
						<img src="sary/ordi/bureau.jfif" width="100px" height="75px" style="border:2px solid none;border-radius: 4px;float: left;margin:10px 4px 4px 4px;">
						<p><strong>ACER</strong>:
							Ordinateur de bureau 6<sup>e&#768me</sup> avec<br> 
							<span>Processeur :</span> 3.30Hrz<br>
							<span> RAM :</span> 8Go<br>
							<span> HDD :</span> 640To<br>
							<span >Graphique :</span><strong>NVIDIA GTX 1060, Intel 3000</strong></p> 	

					</aside>
					<aside>
						<img src="sary/ordi/ventilo.jpg" width="90px" height="67px" style="border:2px solid none;border-radius: 4px;float: left;margin:16px 4px 4px 4px;">
						   <p><strong>VENTILLATEUR de marque TOSHIBA</strong><br>
						   	<span>  tour/s:</span> 7500 *2<br>
						   	<span> Constructeur : </span>TOSHIBA<br>
						   	<span> AVEC : </span> Double ventillateur<br>
						   	C'est une ventillateur pour les gamers.
						   </p> 
					</aside>
					<aside>
						<img src="sary/ordi/notebook.png" width="110px" height="60px" style="border:2px solid none;border-radius: 4px;float: left;margin:16px 4px 4px 4px;">
							<p><strong>HP</strong>:
							Ordinateur 8<sup>e&#768me</sup> ge&#769ne&#769ration avec<br> 
							<span>Processeur :</span> 2.60Hrz<br>
							<span> RAM :</span> 16Go<br>
							<span> HDD :</span> 1To<br>
							<span >Graphique :</span><strong>NVIDIA GTX 1060</strong></p> 	
					</aside>		
			</fieldset><br>
			
			<article id="commentaire">
				<p style="font-size:20px;font-family:Times new roman;color:black;">Vous pouvez mettre un commentaire en bas si vous e&#770tes satisfait de notre socie&#768te&#769:<p>
				<fieldset id="commente" >
					<legend class="fieldset">Commentaire</legend>
					<label>Description :</label>
					<input type="text" name="sujet"><br><br>
					<label> </label>
					<textarea > </textarea><br>
					<input type="button" value="envoyer">	
				</fieldset>
			</article><br>
			
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