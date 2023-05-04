<!DOCTYPE html>
<html>
<head>
	<title>Chiffre d'affaire par client</title>
	<script type="text/javascript" src="js/ChiffreAff.js"></script>
	<style type="text/css">
	th,table
	{
		border:1px solid black;
		border-collapse:collapse;
	}
#lienFacture
{
	border:1px solid black ;
	padding :auto;
	margin: 2px 400px 2px 400px;
	border-radius:5px;
	background-color:#555;
	color:white;
	padding:3px 3px 3px 3px;
	font-size:15px;
	text-decoration:none;
}
#lienFacture:hover
{
	cursor:pointer;
	background-color:#800;	
}
	</style>
</head>
<body onload="javascript:envoyerReqChiffreAjax('ChiffreAjax.php',document.getElementById('annee').value)" >

	<p><h2 style="font-family:algerian;font-size:25px;">CHIFFRE D' AFFAIRE DE CHAQUE CLIENT</h2>
		<span style="border:1px solid none;float:left;margin-left:300px;">Annee:
			<select id="annee" name='select' onchange="javascript:envoyerReqChiffreAjax('ChiffreAjax.php',this.value)">
				<option>2019</option>
				<option>2018</option>
				<option>2017</option>
				<option>2016</option>
				<option>2015</option>
				<option>2014</option>
			</select>
		</span>	
	</p><br><br>
	<span id="Chiffre">
	</span><br>
	<a id="lienFacture" href="#"  onClick="javascript:generePdf('chiffrepdf.php',document.getElementById('annee').value)" >Generer du pdf</a>
	<br><br>
	
	<br>
			<a id="lienFacture" onClick="javascript:hrefHistogramme(document.getElementById('annee').value)" style="margin:auto;">Histogramme de CHIFFRE D' AFFAIRE DE CHAQUE CLIENT</a><br>
	<br>
	
</body>
</html>