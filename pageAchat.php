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
						   <li >
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
						   <li style="background-color:RGB(21,181,234);">
						     <a href="pageAchat.php" target="_self" style="color: #000000;" <!--style="color:#777bb5;-->"> Achat</a>
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
				
				<span style="border:1px solid none;display:inline; padding-top:20px;"><img src="sary/achat.png" style="width:40px;height:40px;"></span>
		   		<h2 style="display:inline">Informations sur l'Achat</h2>
				<div class="formAchat">
					<form name="origine" >
						<div style="border:1px solid none;float:left;margin: 2px 60px 2px 43px;">
							<label for="numClient">Numero du Client:</label><br>
							<input type="text" name="numClient" id="numClient" placeholder="Exemple: C001" onkeyup="javascript:verifierNumClient(this.value)"><br>
							<label for="numMat">Numero de Materiel:</label><br>
							<input type="text" name="numMat" id="numMat" placeholder="exemple: M001"><br>
						</div>
						<div style="border:1px solid none;float:left;margin: 2px 60px 2px 43px;">		
							<label for="qte">Quantite a acheter:</label><br>
							<input type="number" name="qte" id="qte" ><br>
							<label for="date_achat">Date d'Achat:</label><br>
							<input type="date" name="date_achat" id="date_achat"><br>
							<input type="number" id='id' name='id' style="visibility:hidden" ><br>			
						</div><br>
						<div style="border:1px solid none; margin-top:1px;">
							<input type="button"  id="nouveau" value="Nouveau Achat" onClick="javascript:AjoutAchat('achatNServeur.php',
							document.forms['origine'].elements['numClient'].value,document.forms['origine'].elements['numMat'].value,
							document.forms['origine'].elements['qte'].value,document.forms['origine'].elements['date_achat'].value)" ><br><br>
							<input type="button" value="Valider" onclick="javascript:rafraichirPourAchat()">
						</div><br>	
					</form><br>
					<div id="modif" style="visibility:hidden">
					<form name="modifier">
						<div style="border:1px solid none;float:left;margin: 2px 60px 2px 43px;">
							<label for="numClientModif">Numero du Client:</label><br>
							<input type="text" name="numClientModif" id="numClientModif" placeholder="Exemple: C001" onkeyup=			"javascript:verifierNumClient(this.value)"><br>
							<label for="numMatModif">Numero de Materiel:</label><br>
							<input type="text" name="numMatModif" id="numMatModif" placeholder="exemple: M001"><br>
						</div>
						<div style="border:1px solid none;float:left;margin: 2px 60px 2px 43px;">
							<label for="qteModif">Quantite a acheter:</label><br>
							<input type="number" name="qteModif" id="qteModif" ><br>
							<label for="date_achatModif">Date d'Achat:</label><br>
							<input type="date" name="date_achatModif" id="date_achatModif"><br>
						</div><br>
						<input type="button" value="Modifier" onclick="javascript:ModifAchat('achatModif.php',document.forms['origine'].elements['id'].value,document.forms['modifier'].elements['numClientModif'].value,document.forms['modifier'].elements['numMatModif'].value,document.forms['modifier'].elements['qteModif'].value,document.forms['modifier'].elements['date_achatModif'].value,document.forms['origine'].elements['qte'].value)" ><br><br>
						<input type="button" value="Annuler" onClick="javascript:annulerPourAchat();">	
					</form>
					</div>	
				</div><br>
					<a id="lienFacture">Liste des Achats effetue&#769s par les Clients</a><br><br>
			<span id="rep"></span>
		<br>
		<table id="tableau">
			<thead>
				<tr >
					<th>numClient</th>
					<th>numMat</th>
					<th>qte</th>
					<th>date_achat</th>
					<th>Modifier</th>
					<th>Supprimer</th>
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
			$req=mysql_query("select numClient,numMat,qte,date_achat from Achat;",$connect);
			$res=mysql_fetch_assoc($req);
			if(empty($res))
			{
				echo "<tr><td colspan=\"4\" >vide</td></tr>";
			}
			else
			{
				$req=mysql_query("select numClient,numMat,qte,date_achat,id from achat;",$connect);
				while($res=mysql_fetch_array($req))
				{
					echo "<tr><td>".$res['numClient']."</a></td>";
					echo "<td>".$res['numMat']."</a></td>";	
					echo "<td>".$res['qte']."</td>";
					echo "<td>".$res['date_achat']."</td>";
					echo "<td><a href=\"#\" onClick=\"javascript:modifierPourAchat('".$res['id']."','".$res["numClient"]."','".$res['numMat']."',".
						$res['qte'].",'".$res['date_achat']."')\"
						>Modifier</td>";
					echo "<td><a href=\"#\" onClick=\"javascript:supprimerPourAchat('".$res['id']."','".$res["numClient"]."','".$res['numMat']."',".
						$res['qte'].",'".$res['date_achat']."')\">Supprimer</td></tr>";	
				}
			}
			mysql_close($connect);
		}
		?>
				</tbody>
			</table>
		
			<br>
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
					<img src="sary/pub1.jpg" width="1050px" height="260px" alt="image" id="futur">
				</article>
					<span id="grand_texte"> Un bon choix de mate&#769riel, vous assure compe&#769titivite&#769 et efficacite&#769.</span>	
		
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