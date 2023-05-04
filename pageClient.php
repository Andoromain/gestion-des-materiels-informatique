<!DOCTYPE html>
<html>
   <head>
      <title>Acceuil</title>
	  <meta charset= "UTF-8">
	  <link rel = "stylesheet" type = "text/CSS" href = "CSS/Project.css">
	  <script language="javascript" src="js/recherche.js">
	</script>
   </head>
	<body onload="javascript:load()">
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
						     <a href="index.php" target="_self" style="color: #999; "> Accueil</a>
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
				<h2>Informations du Client</h2>
				
				<form name='form' class="formClient">
						<div style="border:1px solid none;float:left;margin: 2px 60px 2px 43px;">
							<label for="numClient">Numero du Client:</label><br>
							<input type="text" name="numClient" id="numClient" placeholder="Exemple: C001" ><br>
						</div >
						<div style="border:1px solid none;margin-right:40px;display:inline;">
							<label for="nom">Nom du client:</label><br>
							<input type="text" name="nom" id="nom" placeholder="exemple: Bema">
						</div>
							<input type="button" name="ajouter" onClick="javascript:envoyerRequeteAjoutCli('CliAjax.php',
							document.forms['form'].elements['numClient'].value,document.forms['form'].elements['nom'].value)" value="Ajouter">
							<input type="button" onClick="javascript:rafraichir()" value="Valider"><br>
							
					<div id="modif" style="visibility:hidden;">	
						
						<div style="border:1px solid none;float:left;margin: 2px 20px 2px -199.2px;">	
							<label for="numClientModif">Nouveau Numero du Client:</label><br>
							<input type="text" name="numClientModif" id="numClientModif" placeholder="Exemple: C001"><br>
						</div>
						<div style="border:1px solid none;margin-right:40px;margin-left:-px;display:inline;">	
							<label for="nomModif">nouveau Nom du client:</label><br>
							<input type="text" name="nomModif" id="nomModif"placeholder="Exemple: Maso">
						</div>	
							<input  type="button" value="Modifier" onClick="javascript:envoyerRequeteModifCli('modifierCli.php',document.forms['form'].elements['numClientModif'].value,document.forms['form'].elements['nomModif'].value,document.forms['form'].elements['numClient'].value)">
							<input type="button" value="Annuler" onClick="javascript:annuler();">
					</div>	
							
				</form><br>
				<a id="lienFacture">Liste des Clients</a><br><br>
				<span id="rep"></span>
			
		<div class="formClient">		
			<table id="tableau">
				<thead>
					<th>Nume&#769ro de Client</th>
					<th>Nom du Client</th>
					<th>Modifier</th>
				</thead>
				<tbody>
	<?php
		$connect=@mysql_connect("localhost","root");
		if(!$connect)
		{
			echo "on ne peut pas connecter au serveur pour le moment";
		}
		else
		{
			mysql_select_db("VenteDeMaterielInformatique",$connect);
			$req=mysql_query("select * from client;",$connect);
			$res=mysql_fetch_assoc($req);
			if(empty($res))
			{
				echo "<tr><td colspan=\"2\" >vide</td></tr>";
			}
			else
			{
				$req=mysql_query("select * from client;",$connect);
				while($res=mysql_fetch_array($req))
				{
					echo "<tr><td>".$res['numClient']."</td>";
					echo "<td>".$res['nom']."</td>";
					echo "<td><a href=\"#\" onClick=\"javascript:modifier('".$res['numClient']."','".$res['nom']."')\">Modifier</a></td></tr>";
				}
			}
			mysql_close($connect);
		}
		?>
				</tbody>
			</table>
		</div>	
					<input type="button" onClick="window.location='pageChiffreAffaire.php'" id="lienFacture" value="chiffre d'affaire par client"><br>
			<article id="article2" class="article2">
				<p><span class="T"> T</span>ous les mode&#768les vendus chez nous be&#769ne&#769ficient <span style="color:red;font-size:17px;"><b> d'une garantie "constructeur" (1 a&#768 3 ans) </b></span>assure&#769e par le distributeur officiel de la marque a&#768 Madagascar. La plupart de nos mod&#768les d'ordinateurs sont vendus "Free Dos", sans syste&#768me d'exploitation, afin d'en abaisser le cout d'achat et de vous laisser la liberte&#769 d'installer le syste&#768me de votre choix: Windows ou Linux peuvent etre fournis en sus.</p>
				<p> Dote&#769s de processeurs Intel de 3e&#768me ou 4e&#768me ge&#769ne&#769ration, ils satisferont les plus exigeants.</p>
				<aside id="article3">
					<img src="img2/f.png" width="945px" height="260px" alt="image" id="futur">
				</aside><br>
				
			</article>
			<article id="aricle4">
				
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