<!DOCTYPE html>
<html>
   <head>
      <title>Acceuil</title>
	  <meta charset= "UTF-8">
	  <link rel = "stylesheet" type = "text/CSS" href = "CSS/Project.css">
	  <link rel = "stylesheet" type = "text/CSS" href = "style.css">
	  <script language="javascript" src="js/recherche.js">
	</script>
   </head>
	<body >
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
						   <li style="background-color:RGB(21,181,234);">
						     <a href="index.php" target="_self" style="color: #000000;"> Accueil</a>
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
				<div id="pied_page">
	  <?php
         // declaration des constantes de connexion
		 define ('NOM_SERVEUR',"root");
		 define ('MOT_PASSE',"");
		 define ('SERVEUR', "127.0.0.1");
		 define ('mon_base', "ventedematerielinformatique");
		 
		 $connexion=mysql_connect("localhost","root","");
		// mysql_select_db("mon_base") or die("la base de donnees est introvable.");
		 //Connection au serveur
		// $connexion = mysql_pconnect (SERVEUR, NOM_SERVEUR, MOT_PASSE);
		 
		 //Test connexion au serveur
		 if(!$connexion)
		 {
			 echo "imposible de ce connecter au serveur MYSQL";
			 exit;
		 }
		 
		 //Test acces a la Base de Donnees
		 if(!mysql_select_db(mon_base,$connexion))
		 {
			 echo "impossible de ce connecter a la Base de Donnees";
			 exit;
		 }
		 
		 //Recuperation de tous les enregistrements de la table utilisateurs
		 $resultat = mysql_query ("select numClient,nom from client where numClient like '%".$_POST['search']."%'
			or nom like '%".$_POST['search']."%';", $connexion);
		 if($resultat)
		 {
			 echo "<h1 style=\"font-size:30px;\">Resultat de votre recherche</h1>";
			 
			 //nombre de ligne contenu dans resultat
			 $nbUtilisateur = mysql_num_rows($resultat);
			 if($nbUtilisateur > 0)
			 {
				echo"<div id=\"resultat_Recherche\">";
				 //recuperation de chaque ligne
				 echo "<table border='1'>\n";
				   echo "<tr>\n";
				     echo "<td> <strong>Numero du Client</strong></td>\n";
					 echo "<td> <strong>Nom</strong></td>\n";
				   echo "</tr>\n";
				   while($utilisateur = mysql_fetch_array($resultat))
				   {
					   echo "<tr>\n";
					     echo "<td><a href='#' onClick=\"javascript:montrerPourRecherche(this.text,'".$utilisateur["nom"]."')\">" .$utilisateur["numClient"]."</a></td>\n";
						 echo "<td><a id='nom'>" .$utilisateur["nom"]."</a></td>\n";
					   echo "</tr>\n";
				   }
				 echo "</table>\n";
				 echo "</div>";
			 }
			 else
			 {
				 //si zero utilisateur
				 echo "<p class='sansReponse'>Desole, il n'y a pas de reponse correspondant a votre recherche.</p>";
			 }/*
			 else
			 {
				 echo "erreure dans l'execution de la requete</br>";
				 echo "le message d'erreure est: ".mysql_error($connexion);
			 }*/
		 }
	  ?>
	  
	  
	  
	  
	  <br><br><br>
		<div>
				<div id="slider">
	
				<span id="sl_play" class="sl_command"></span>  
				<span id="sl_pause" class="sl_command"></span>  
   
				<span id="sl_i1" class="sl_command sl_i"></span>  
				<span id="sl_i2" class="sl_command sl_i"></span>  
				<span id="sl_i3" class="sl_command sl_i"></span>  
				<span id="sl_i4" class="sl_command sl_i"></span> 
			
		<section id="slideshow">  
                     
               
       <!--COMMANDE PLAY NEXT-->
				<a class="play_commands pause" href="#sl_pause" title="Vous avez arretez le slide">Pause</a>  
				<a class="play_commands play" href="#sl_play" title="Cliquez ici pour voir des animations">Play</a> 
            
			
	<div class="container"> 
		<div class="c_slider"></div>
	<div class="slider">  
                <figure><img src="img2/f.png" alt="" width="640" height="310" />  
				<figcaption>Nouvelle Techonologie</figcaption>
				</figure><!-- 
				--><figure><img src="img/p.jpg" alt="" width="640" height="310" />  
				<figcaption>Produit de qualite</figcaption>  
				</figure><!-- 
				--><figure><img src="img2/c.jpg" alt="" width="640" height="310" />  
				<figcaption>Ordinateur haut de gamme</figcaption>  
				</figure><!-- 
				--><figure><img src="img2/e.jpg" alt="" width="640" height="310" />  
				<figcaption>Le meuilleur Son</figcaption>  
				</figure>  
	</div>  
    </div>  
              
				<span id="timeline"></span>  
			<ul class="dots_commands"><!-- 
				--><li><a title="Afficher la slide 1" href="#sl_i1">Slide 1</a></li><!-- 
				--><li><a title="Afficher la slide 2" href="#sl_i2">Slide 2</a></li><!-- 
				--><li><a title="Afficher la slide 3" href="#sl_i3">Slide 3</a></li><!-- 
				--><li><a title="Afficher la slide 4" href="#sl_i4">Slide 4</a></li>
			</ul>  
	</section>  
	</div>
    <style type="text/css">
		
   </style>

   <div id="putforward">
	<ul class="putforward">
					<li  id="putforward-4">
				<a href="#">
					<span>Ordinateur</span>
				</a>
			</li>
								<li  id="putforward-5">
				<a href="#">
					<span>Telephone</span>
				</a>
			</li>
								<li class="last"  id="putforward-6">
				<a href="#">
					<span>Accessoires</span>
				</a>
			</li>
	</ul>
</div>
		
		</div>
		<br><br><br><br>
		
		
		
		
	  
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