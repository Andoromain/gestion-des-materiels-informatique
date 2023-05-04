<?php
	$connect=@mysql_connect("localhost","root") or die(mysql_error());
	mysql_select_db("ventedematerielinformatique",$connect) or die(mysql_error());
	$req1=mysql_query("delete from achat where id=".$_POST['id'].";");	
	$req2=mysql_query("update materiel set stock=stock+".$_POST["qte"]." where numMat='".$_POST["numMat"]."';")or die(mysql_error());
	
	echo " L'acht est supprime avec succes!";
?>