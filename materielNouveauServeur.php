<?php
	$connect=@mysql_connect("localhost","root") or die(mysql_error());
	mysql_select_db("ventedematerielinformatique",$connect) or die(mysql_error());
	$req=mysql_query("insert into materiel values('".$_POST["numMat"]."','".$_POST["design"].
		"',".$_POST["Pu"].",".$_POST["Stock"].");") or die(mysql_error());
	echo "Le materiel est ajoute avec succes!";
?>