<?php
	header("cache-control:no-cache,must-revalidate");
	$connect=@mysql_connect("localhost","root") or die(mysql_error());
	mysql_select_db("ventedematerielinformatique",$connect) or die(mysql_error());
	$req=mysql_query("insert into client values('".$_POST['numClient']."',
		'".$_POST['nom']."');",$connect) or die(mysql_error());
	echo "Le client est ajoute a la base de donnee";	
	?>	
