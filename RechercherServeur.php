<?php
	header("cache-control:no-cache,must-revalidate");
	header("content-type:text/plain;charset=ISO-8859-1");
	$connect=@mysql_connect("localhost","root");
	mysql_select_db("ventedematerielinformatique",$connect);
		$req=mysql_query("select numClient from client where numClient like '".$_POST['MotRecherche']."%' union select nom from client where nom like '".$_POST['MotRecherche']."%';",$connect);
	$res=mysql_fetch_assoc($req);
		if($res)
		{
			$resultat=$res["numClient"];
			$res=mysql_fetch_assoc($req);
		}
		else
		{
			$resultat="";
		}
		while($res)
		{
			$resultat=$resultat."/".$res["numClient"];
			$res=mysql_fetch_assoc($req);
		}
		mysql_close($connect);
		echo $resultat; 
?>