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
						   <li style="background-color:RGB(21,181,234);">
						     <a href="pageClient.php" target="_self" style="color: #000000;" <!--style="color:#777bb5;-->">Client</a>
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
						   <input type="submit" value="search" class="b_moteur" >
						 </form>
					  </div>
					  <div style="float:right;margin-right:5px;">
					     <img src="sary/lecompte_non.png" title="Non connecté(e)" style="cursor:pointer;" onclick='window.open("identification.php","_self");'>
					  </div>
					</div>
				
		   </header> 
		   <section id="contenu_pageMateriel">
		   
				<?php include('chiffreAffaire.php'); ?>
			
			<article id="article2">
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
				</article><br>

				<article id="article3">
					<img src="sary/pub.jpg" width="1050px" height="260px" alt="image" id="futur">
				</article>
			<br>
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