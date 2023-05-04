<!DOCTYPE html>
<html>
   <head>
      <title>Acceuil</title>
	  <meta charset= "UTF-8">
	  <link rel = "stylesheet" type = "text/CSS" href = "CSS/Chart.css">
	  <link rel = "stylesheet" type = "text/CSS" href = "CSS/Project.css">
	  <script src="js/Chart.js"></script>
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
		   
				<h2 style="font-family:algerian;font-size:25px;">Histogramme de CHIFFRE D' AFFAIRE DE CHAQUE CLIENT </h2>
		   <?php
		   $connect=@mysql_connect("localhost","root");
			mysql_select_db("ventedematerielinformatique",$connect);
			$req=mysql_query(" select Client.numClient,Client.nom,sum(materiel.Pu*achat.qte) as Chiffre_affaire from 		  materiel,achat,client where client.numClient=achat.numClient and materiel.numMat=achat.numMat and year(achat.date_achat)=".$_GET["annee"]." group by numClient  ;")or die("<p  style=\"display:inline-block;font-size:25px;color:red;font-family:broadway;\"><marquee>pas encore d'achat</marquee></p><br><br>");
				
				$res0=mysql_fetch_assoc($req);
				if(empty($res0))
				{
					echo "<p style='color:blue;font-family:harrington;font-size:25px;border:1px solid none;'>Aucun client n'effectue un achat</p><br>";
				}
				else
				{
					
					echo " 
					<canvas id=\"barChiffreAffaire\" ></canvas>
					<script >
					    new Chart(document.getElementById(\"barChiffreAffaire\"), {
						type: 'bar',
						data: {
							labels: [";
							
				$req=mysql_query(" select Client.numClient,Client.nom,sum(materiel.Pu*achat.qte) as Chiffre_affaire from materiel,achat,client where client.numClient=achat.numClient and materiel.numMat=achat.numMat and year(achat.date_achat)=".$_GET["annee"]." group by numClient  ;")or die("");
							
								while($res=mysql_fetch_array($req))
								{
									echo "'".$res["numClient"]." ".$res["nom"]."',";
								}
								
								echo "],
							datasets: [
								{
									label: 'Chiffre Affaire(Mille)',
									backgroundColor: ['#3e95cd', '#8e5ea2','#3cba9f','#e8c3b9','#c45850','#8e5ea2','#3e95cd'],
									data: [";
							$req2=mysql_query(" select Client.numClient,Client.nom,sum(materiel.Pu*achat.qte) as Chiffre_affaire from materiel,achat,client where client.numClient=achat.numClient and materiel.numMat=achat.numMat and year(achat.date_achat)=".$_GET["annee"]." group by numClient  ;")or die("");
							
								while($res2=mysql_fetch_array($req2))
								{	
									echo ($res2["Chiffre_affaire"]/1000).",";
								}			
									
									echo "]
								}
							]
						},
						options: {
							legend: { display: false },
							title: {
								fontSize:'18',
								display: true,
								text: 'Chiffre d\'Affaire de Chaque Client de l\'annee 2019'
							}
						}
					});
				</script>";
				}
		   
		   ?><br>
		   <br>
		   <br>
		   <article id="article2">
					<div id="LettreHisto">
						<b>L'informatique </b>est partout aujourd'hui.Depuis les affichages publics en passant par votre slaon, votre decodeur TV et jusqqi'a&#768 votre te&#769le&#769phone. Nous vous proposons ube immense se&#769lection de produits afin de profiter de toutes les possibilite&#769s actuelles de l'informatique. Avec notre syste&#768me de fltres complet vous trouverez facilement ce que vous cherchez et pourrez profiter d toute la puissance et de tout le confort de l'informatique moderne! Nous vous proposons tout d'abord notre cate&#769gorie phare des pie&#768ces informatique. Avec tous les produits que nous vous proposons vous pourrez cre&#769er votre syste&#768me de toutes pie&#768ces, que vous ayez . 
					</div>
					<img src="sary/img1.jpg" width="200px" height="120px" onMouseOver="this.style.width='250px';this.style.height='130px';">
				</article><br>

				<article id="article3">
					<img src="sary/histo.jpg" width="1050px" height="260px" alt="image" id="futur">
				</article>
			<br>
			
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