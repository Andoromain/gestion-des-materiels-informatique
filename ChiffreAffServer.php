<?php
	function annee()
	{
		header("cache-control:no-cache,must-revalidate");
		header("content-type:text/plain;charset=ISO-8859-1");
			$connect=@mysql_connect("localhost","root");
			mysql_select_db("ventedematerielinformatique",$connect);
			$req=mysql_query("select distinct year(date_achat) from achat;",$connect);
			$res=mysql_fetch_assoc($req);
			if($req)
			{
				$resultat=$res["year(date_achat)"];
				$res=mysql_fetch_assoc($req);	
			}else
			{
				$resultat="";
			}
			while($res)
			{
				$resultat=$resultat."/".$res["year(date_achat)"];
			$res=mysql_fetch_assoc($req);
		}
		mysql_close($connect);
		echo $resultat;
	}
annee();

?>	