<?php
	$connect=@mysql_connect("localhost","root")or die(mysql_error());
	mysql_select_db("ventedematerielinformatique",$connect)or die(mysql_error());
	$req=mysql_query("update materiel set numMat='".$_POST["numMatModif"]."',design='"
		.$_POST["designModif"]."',Pu=".$_POST["PuModif"].",stock=".$_POST["StockModif"]."
		 where numMat='".$_POST["numMat"]."';",$connect)or die(mysql_error());
	echo "Le materiel de numero ".$_POST['numMat']." a ete modifie avec sucess!!";
?>