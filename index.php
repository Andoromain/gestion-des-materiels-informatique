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
						   <input type="submit" value="search" class="b_moteur"  style="background-color:#777bb5;">
						 </form>
					  </div>
					  <div style="float:right;margin-right:5px;">
					     <img src="sary/lecompte_non.png" title="Non connecté(e)" style="cursor:pointer;" onclick='window.open("identification.php","_self");'>
					  </div>
					</div>
				</div>
		   </header> 
		   <!--Ando-->  
		   <section id="page">
				<article id="article1">	
					<h2></h2>
						<p><span id="N">N</span>otre entreprise vend des mate&#769riels informatiques comme :<b>telephone portable, ordinateur, imprimante, et des outils informatiques...</b> Nos marchandises sont <strong style="color: #197100;font-size: 15px;">des qualite&#769s supe&#769rieurs</strong>. On peut aussi e&#769changer les mate&#769riels si vous le souhaitez. Tous les prix sont a&#768 debatre, c'est a dire on peut negocier avec les clients. Nous avons aussi des techniciens alors on peut re&#769parer vos materiels. En outre,vous pouvez acheter vos materiels ici, et c'est nous qui occupent la livraison de vos mate&#769riels commande&#769s. Nous proposons a&#768 la vente des ordinateurs fixes ou portables spe&#769cifiques a&#768 votre m&#769tier adapte&#768s a&#768 vos besoins et vos budgets.
							Fort de notre expe&#769rience, nous vous conseillons et analysons ensemble les mode&#768les de plusieurs marque. Nous sommes partenaire <strong>ASUS</strong>et <strong>APPLE</strong> mais proposons e&#769galement les marques <strong>HP, DELL, TOSHIBA...</strong></p><br> </span>
						<img src="sary/vente.jpg" width="650px" height="300px" alt="vente de materiels informatiques" id="vente">
						<p>Choisissez ce que vous voulez et rendez vous sur <a href="pageAchat.php">la page d'achat</a>.</p>
				</article>
				<aside id="echantillon">
					<p style="text-decoration:underline;font-size: 15px;color:RGB(21,181,234);">Voici quelques e&#769chantillons de nos materiels:</p><br>
					<img src="sary/ordi/1.jpg" width="200px" height="170px" id="machine">
					<p>Ordinateur,Imprimante,carte graphique...<br>Tout avec de prix ide&#769ale et avec <strong class="kits">des kits offertes gratuits</strong> pour les clients.</p>
					<p class="justify">
						Tous nos mate&#769riels sont des vrais marques et ce sont des nouveaux produits. Si vous avez besoin d'information sur nos mate&#769riels et nos fournisseurs, n'hesitez pas de nous contacter.    
					</p>
						<marquee>
							<img src="sary/liste.png" width="270px" height="140px" >
						</marquee>	
				</aside>

				<article id="article2">
					<aside>
						<img src="sary/ordi/yoga.png" width="100px" height="75px" style="border:2px solid none;border-radius: 4px;float: left;margin:10px 4px 4px 4px;">
						<p><strong>YOGA</strong>:
							Ordinateur 4<sup>e&#768me</sup> ge&#769ne&#769ration avec<br> 
							<span>Processeur :</span> 3.20Hrz<br>
							<span> RAM :</span> 8Go<br>
							<span> HDD :</span> 1To<br>
							<span >Graphique :</span><strong>NVIDIA GTX 1050, Intel 2000</strong></p> 	

					</aside>
					<aside>
						<img src="sary/ordi/carte_graphique.jpg" width="90px" height="67px" style="border:2px solid none;border-radius: 4px;float: left;margin:16px 4px 4px 4px;">
						   <p><strong>Carte Graphique NVIDIA GTX 2100</strong><br>
						   	<span> Memoire :</span> 16Go<br>
						   	<span> Constructeur : </span>NVIDIA<br>
						   	<span> Type de processeur : </span>GeForce GTX 2100<br>
						   	C'est une catre graphique pour les gamers.
						   </p> 
					</aside>
					<aside>
						<img src="sary/ordi/acer.jpg" width="110px" height="60px" style="border:2px solid none;border-radius: 4px;float: left;margin:16px 4px 4px 4px;">
							<p><strong>ACER</strong>:
							Ordinateur 7<sup>e&#768me</sup> ge&#769ne&#769ration avec<br> 
							<span>Processeur :</span> 2.80Hrz<br>
							<span> RAM :</span> 8Go<br>
							<span> HDD :</span> 500Go<br>
							<span >Graphique :</span><strong>NVIDIA GTX 1050</strong></p> 	
					</aside>	
				</article><br><br>
				<article id="article3">
					<img src="sary/pub.jpg" width="1050px" height="260px" alt="image" id="futur">
				</article>
					<span id="grand_texte"> Un bon choix de mate&#769riel, vous assure compe&#769titivite&#769 et efficacite&#769.</span><br>
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
		<footer>
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