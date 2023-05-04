<!DOCTYPE html>
<html>
   <head>
      <title>Acceuil</title>
	  <meta charset= "UTF-8">
	  <link rel = "stylesheet" type = "text/CSS" href = "CSS/Project.css">
	  <link rel = "stylesheet" type = "text/CSS" href = "style.css">
	  <link rel = "stylesheet" type = "text/CSS" href = "video.css">
	  <script language="javascript" src="js/recherche.js">
	</script>
   </head>
	<body onload="javascript:envoyerReqStock('stockage.php',document.getElementById('SelectDate').value)">
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
						   <input type="submit" value="search" class="b_moteur" >
						 </form>
					  </div>
					  <div style="float:right;margin-right:5px;">
					     <img src="sary/lecompte_non.png" title="Non connecté(e)" style="cursor:pointer;" onclick='window.open("identification.php","_self");'>
					  </div>
					</div>
				
		   </header> 
		   <section id="contenu_pageMateriel">
				<p ><h2 style="font-family:algerian;font-size:25px;">Etat de sock et Mouvements des Stocks dans Une Annee</h2>
			<span style="border:1px solid none;float:left;margin-left:300px;">Annee:
			<select id="SelectDate" onChange="javascript:envoyerReqStock('stockage.php',this.value);">
				<option>2019</option>
				<option>2018</option>
				<option>2017</option>
				<option>2016</option>
				<option>2015</option>
				<option>2014</option>
				<option>2013</option>
				<option>2012</option>
			</select>
			</span>
			<br>
				</p>
			<span id="rep"></span>
			<br>
			<br>
			<div>
			<div id="conteneur">
	</div>	
	<div id="contenue">
	<div id="lecteur">
		<video width="800" controls src="video.mp4" poster="sary/materiel.jpg"></video>	
			Acheter des materiels informatiques haut de gamme <a href="pageAchat.php" id="ici">ici</a>
		</video>
	</div>
	<div id="snapback">
			&nbsp;&nbsp<h3>Accessoire</h3>
		<div class="pic">
			<img src="img/B1.png" height=280px width=220px/>&nbsp;ECOUTEUR BLUETOOTH<br />&nbsp;<font color="red">45 000 Ar</font>
		</div>
		<div class="pic">
			<img src="img3/B2.jpg" height=280px width=220px/>&nbsp;SPEAKER BLUETOOTH<br />&nbsp;<font color="red">80 000 Ar</font>
		</div>
		<div class="pic">
			<img src="img3/C12.jpg" height=280px width=220px/>&nbsp;FLASH DISK <br />&nbsp;<font color="red">50 000 Ar</font>
		</div>
		<div class="pic">
			<img src="img3/A12.jpg" height=280px width=220px/>&nbsp;STICKER POUR CLAVIER<br />&nbsp;<font color="red">30 000 Ar</font>
		</div>
	</div>
	</div>
			
			</div>
	<br><br><br><br><br><br><br><br>
	<br><br><br><br><br><br><br><br>
	<br><br><br><br><br><br><br><br>
	<br><br><br><br><br><br><br><br>
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