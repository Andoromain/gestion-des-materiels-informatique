<?php
	header("cache-control:no-cache,must-revalidate");
	$connect=@mysql_connect("localhost","root") or die(mysql_error());
	mysql_select_db("ventedematerielinformatique",$connect) or die(mysql_error());
	$req=mysql_query("update client set numClient=\"".$_POST['numClientModif']."\",
		nom='".$_POST['nomModif']."' where numClient='".$_POST['numClient']."';",$connect) or die(mysql_error());
	echo "Le client est modifie avec succes!!";	
?>