function getRequete()
{
	if(window.XMLHttpRequest)
	{
		return new XMLHttpRequest;
	}
	else
	{
		if(window.ActiveXObject)
		{
			try
			{
				return new ActiveXObject("Msxml2.XMLHTTP");
			}
			catch(e)
			{
				try
				{
					return new ActiveXObject("Microsoft.XMLHTTP");
				}
				catch(e)
				{
					return null;
				}
			}
		}
	}
}
//**********************Affichage des chiffres d'affaires********************************//

function envoyerReqChiffreAjax(urlA, annee)
{
	var requeteHttp=getRequete();
		if(requeteHttp==null)
		{
			alert("On ne peut pas utiliser Ajax sur ce navigateur");	
		}
		else
		{
			requeteHttp.open("GET",urlA+"?annee="+escape(annee),true);
			requeteHttp.onreadystatechange=function(){recevoirReqChiffreAjax(requeteHttp);}
			requeteHttp.send(null);
		}
}

function recevoirReqChiffreAjax(requeteHttp)
{
	if(requeteHttp.readyState==4)
	{
		if(requeteHttp.status==200)
		{
			traiterReqChiffreAjax(requeteHttp.responseText);
		}
	}	
}
function traiterReqChiffreAjax(reponse)
{
	document.getElementById("Chiffre").innerHTML=reponse;
}

//***********************generer du pdf*************************//
function generePdf(url,annee)
{
	window.location='chiffrepdf.php?annee='+annee;
}

function hrefHistogramme(annee)
{
	document.location.href="pageHistogramme.php?annee="+annee;
}