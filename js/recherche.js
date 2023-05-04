	function image1()
		{
			document.images["machine"].src="sary/ordi/2.png";		
		}
		function image2()
		{
			document.images["machine"].src="sary/ordi/3.jpg";		
		}
		function image3()
		{
			document.images["machine"].src="sary/ordi/5.jpg";		
		}
		function image4()
		{
			document.images["machine"].src="sary/ordi/6.jpg";		
		}
		setInterval("image1()",15000);
		setInterval("image2()",10000);
		setInterval("image3()",7000);
		setInterval("image4()",13000); 
		
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

//**********************************affichage des resultats sur le dataliste**************************************//

function envoyerRequeteR(url,MotRecherche)
{
	var requeteHttp=getRequete();
	if(requeteHttp==null)
	{
		alert("on ne peut pas utiliser Ajax sur ce navigateur!");
	}
	else
	{
		if(MotRecherche=="" )
		{
			document.getElementById('select').style.visibility='hidden';
		}
		else
		{
		requeteHttp.open("POST",url,true);
		requeteHttp.onreadystatechange=function(){recevoirReponseR(requeteHttp);}
		requeteHttp.setRequestHeader("content-type","application/x-www-form-urlencoded");
		requeteHttp.send("MotRecherche="+escape(MotRecherche));
		}
	}
	
return;	
}
function recevoirReponseR(requeteHttp)
{
	if(requeteHttp.readyState==4)
	{
		if(requeteHttp.status==200)
		{
			traiterReponseR(requeteHttp.responseText);
		}	}
}
function traiterReponseR(reponse)
{
	if(reponse=="")
	{
		
	}
	else
	{
	var nb,mot,selectMot;
	mot=reponse.split('/');
	selectMot=document.getElementById('data');
	nb=mot.length;
	selectMot.length=nb;
	for(i=0;i<nb;i++)
	{
		selectMot.options[i].text=mot[i];
	}
	}
}
//****************************************Fin***********************************************//

/////////////////////////////////////*function afficher liste des recherche******************************************/

function envoyerRequeteRep(url,mot)
{
	var expSearch=new RegExp("^[a-zA-Z][a-zA-Z0-9]+$");
	if(expSearch.test(mot))
	{
			var requeteHttp=getRequete();
		if(requeteHttp==null)
		{
			alert("impossible d'utiliser Ajax sur ce navigateur!!");
		}else{
			requeteHttp.open("GET",url+"?motR="+escape(mot),true);
			requeteHttp.onreadystatechange=function(){recevoirReponseRep(requeteHttp);}
			requeteHttp.send(null);
		}
		return;
	}else{
		document.getElementById("reponse").innerHTML="pas de client";
	}

	
}

function recevoirReponseRep(requeteHttp)
{
	if(requeteHttp.readyState==4)
	{
		if(requeteHttp.status==200)
		{
			traiterReponseRep(requeteHttp.responseText);
		}
	}
}
function traiterReponseRep(reponse)
{
	if(reponse=="")
	{
		document.getElementById("reponse").innerHTML="pas de client";
	}
	else
	{
		document.getElementById("reponse").innerHTML=reponse;
	}
}
//****************************************Fin***********************************************//

function montrerPourRecherche(numClient,nom)
{
	document.location.href="pagePersoClient.php?numClient="+escape(numClient)+"&nom="+escape(nom);
}

//______________________++++++++++++CLient+++++++++++++++++++++++++___________________________________


//*********************************Ajout de Client****************************
function envoyerRequeteAjoutCli(url,numClient,nom)
{
	var expNumClient= new RegExp("^(C)[0-9]{3,3}$","g");
	var expNom=new RegExp("^[A-Z][a-zA-Z]*$","g");
	
	document.getElementById("numClient").style.borderColor="white";
	document.getElementById("nom").style.borderColor="white";	
	
	if(expNom.test(nom))
	{
		if(expNumClient.test(numClient))
		{
			var requeteHttp=getRequete();
				if(requeteHttp==null)
				{
					alert("on ne peut pas utiliser Ajax sur cette navigateur");
				}
				else
				{
					requeteHttp.open("POST",url,true);
					requeteHttp.onreadystatechange=function(){recevoirReponseAjoutCli(requeteHttp);}
					requeteHttp.setRequestHeader("content-type","application/x-www-form-urlencoded");
					requeteHttp.send("numClient="+escape(numClient)+"&nom="+escape(nom));
				}
				return;
		}else{
					alert("le numero du client saisi est invalide!!");
					document.getElementById("numClient").style.borderColor="";
					document.getElementById("numClient").style.boxShadow="2px -2px 2px rgba(255,0,0,0.8)";
			}
	}else{	
		if(expNumClient.test(numClient))
		{
			alert("le nom de client saisi est invalide!!");
			document.getElementById("nom").style.borderColor="red";
		}else{
			alert("le numero et le nom du client saisi est invalide!!");
			document.getElementById("numClient").style.borderColor="red";
			document.getElementById("nom").style.borderColor="red";
		}
	}
}


function recevoirReponseAjoutCli(requeteHttp)
{
	if(requeteHttp.readyState==4)
	{
		if(requeteHttp.status==200)
		{
			traiterReponseAjoutCli(requeteHttp.responseText);
		}
	}
}
function traiterReponseAjoutCli(reponse)
{
	alert(reponse);
	rafraichir();
}
//****************************************Fin***********************************************//



//**********************************click sur les numero de client*******************************//

function modifier(numClient,nom)
{
	document.getElementById("numClient").style.borderColor="white";
	document.getElementById("nom").style.borderColor="white";	
	document.getElementById("numClient").value=numClient;
	document.getElementById("nom").value=nom;
	document.getElementById("modif").style.visibility="visible";
	
	document.forms["form"].elements['numClient'].disabled=true;
	document.forms["form"].elements['nom'].disabled=true;
	document.forms["form"].elements["ajouter"].disabled=true;
}
//****************************************Fin***********************************************//
function load()
{
	document.getElementById("numClientModif").value="";
	document.getElementById("nomModif").value="";
}
function annuler()
{
	document.getElementById("numClientModif").value="";
	document.getElementById("nomModif").value="";
	document.forms["form"].elements['numClientModif'].style.borderColor="white";
	document.forms["form"].elements['nomModif'].style.borderColor="white";
	document.getElementById("numClient").value="";
	document.getElementById("nom").value="";
	document.getElementById("modif").style.visibility="hidden";
	document.forms["form"].elements['numClient'].disabled=false;
	document.forms["form"].elements['nom'].disabled=false;
	document.forms["form"].elements["ajouter"].disabled=false;
	
}
function rafraichir()
{
	document.getElementById("numClient").value="";
	document.getElementById("nom").value="";
	window.location.reload();
}
//***********************************Modifier avec ajax***************************//

function envoyerRequeteModifCli(url,numClientModif,nomModif,numClient)
{
	document.forms["form"].elements['numClient'].style.borderColor="inerit";
	document.forms["form"].elements['nom'].style.borderColor="inerit";
	document.forms["form"].elements['numClientModif'].style.borderColor="inerit";
	document.forms["form"].elements['nomModif'].style.borderColor="inerit";
	
	var expNumClient= new RegExp("^(C)[0-9]{3,3}$","g");
	var expNom=new RegExp("^[A-Z][a-zA-Z]*$","g");

	if(expNom.test(nomModif))
	{
		if(expNumClient.test(numClientModif))
		{
				var requeteHttp=getRequete();
				if(requeteHttp==null)
				{
					alert("on ne peut pas utiliser Ajax sur cette navigateur");
				}
				else
				{
					requeteHttp.open("POST",url,true);
					requeteHttp.onreadystatechange=function(){recevoirReponseModifCli(requeteHttp);}
					requeteHttp.setRequestHeader("content-type","application/x-www-form-urlencoded");
					requeteHttp.send("numClientModif="+escape(numClientModif)+"&nomModif="+escape(nomModif)+"&numClient="+escape(numClient));
				}
					return;
		}else{
			alert("le numero du client saisi est invalide!!");
			document.getElementById("numClientModif").style.borderColor="red";
		}
	}else{	
		if(expNumClient.test(numClientModif))
		{
			alert("le nom de client saisi est invalide!!");
			document.getElementById("nomModif").style.borderColor="red";
		}else{
			alert("le numero et le nom du client saisi est invalide!!");
			document.getElementById("numClientModif").style.borderColor="red";
			document.getElementById("nomModif").style.borderColor="red";
		}
	}	
}	

function recevoirReponseModifCli(requeteHttp)
{
	if(requeteHttp.readyState==4)
	{
		if(requeteHttp.status==200)
		{
			
			annuler();
			traiterReponseAjoutCli(requeteHttp.responseText);
		}
	}
}
//****************************************Fin***********************************************//

//*********************************Ajout de Materiel****************************//
function envoyerRequeteAjoutMat(url,numMat,design,Pu,Stock)
{
	var expNumMat=new RegExp("^(M)[0-9]{3,3}$","g");
	var expDesign=new RegExp("^[a-zA-Z\s\ ]+$","g");
	var expPu=new RegExp("^[0-9]+$","g");
	var expStock=new RegExp("^[0-9]+$","g");

	if(expNumMat.test(numMat))
	{document.getElementById("numMat").style.borderColor="inerit";
		}else{document.getElementById("numMat").style.borderColor="red";}	
	if(expDesign.test(design))
	{document.getElementById("design").style.borderColor="inerit";
		}else{document.getElementById("design").style.borderColor="red";}
	if(expPu.test(Pu))
	{document.getElementById("Pu").style.borderColor="inerit";
		}else{document.getElementById("Pu").style.borderColor="red";}
	if(expStock.test(Stock))
	{document.getElementById("Stock").style.borderColor="inerit";
		}else{document.getElementById("Stock").style.borderColor="red";}
		
	envoyerAjoutMat(url,numMat,design,Pu,Stock);
		
}
function envoyerAjoutMat(url,numMat,design,Pu,Stock)
{	var expNumMat=new RegExp("^(M)[0-9]{3,3}$","g");
	var expDesign=new RegExp("^[a-zA-Z\s\ ]+$","g");
	var expPu=new RegExp("^[0-9]+$","g");
	var expStock=new RegExp("^[0-9]+$","g");
	
		
	if(expNumMat.test(numMat))
	{	
		if(expDesign.test(design))
		{
			if(expPu.test(Pu))
			{
				if(expStock.test(Stock))
				{
					var requeteHttp=getRequete();
					if(requeteHttp==null)
					{
						alert("on ne peut pas utiliser Ajax sur cette navigateur");
					}
					else
					{
						requeteHttp.open("POST",url,true);
						requeteHttp.onreadystatechange=function(){recevoirReponseAjoutMat(requeteHttp);}
						requeteHttp.setRequestHeader("content-type","application/x-www-form-urlencoded");
						requeteHttp.send("numMat="+escape(numMat)+"&design="
							+escape(design)+"&Pu="+escape(Pu)+"&Stock="+escape(Stock));
					}
						return;
				}
			}
		}
	}
}
function recevoirReponseAjoutMat(requeteHttp)
{
	if(requeteHttp.readyState==4)
	{
		if(requeteHttp.status==200)
		{
			traiterReponseAjoutMat(requeteHttp.responseText);
		}
	}
}
function traiterReponseAjoutMat(reponse)
{
	alert(reponse);
	AnnulerPourMat();
	rafraichirPourMat();
}
//**************************************FIN****************************************//


//****************************Click sur le numMat****************************************//
function modifierMat(numMat,design,Pu,stock)
{
	document.getElementById("modifierMat").style.visibility="visible";
	document.forms['form1'].elements["numMat"].value=numMat;
	document.forms['form1'].elements["design"].value=design;
	document.forms['form1'].elements["Pu"].value=Pu;
	document.forms['form1'].elements["Stock"].value=stock;
		//******disabled**********//
	document.forms['form1'].elements["numMat"].disabled=true;
	document.forms['form1'].elements["design"].disabled=true;
	document.forms['form1'].elements["Pu"].disabled=true;
	document.forms['form1'].elements["Stock"].disabled=true;
	
	document.forms['form1'].elements["numMatModif"].style.borderColor="inherit";
	document.forms['form1'].elements["designModif"].style.borderColor="inherit";
	document.forms['form1'].elements["PuModif"].style.borderColor="inherit";
	document.forms['form1'].elements["StockModif"].style.borderColor="inherit";
	
	document.forms['form1'].elements["ajouter"].disabled=true;
}

//***************************envoie de requete de modification *************************//
function envoyerRequeteModifMat(url,numMatModif,designModif,PuModif,StockModif,numMat)
{
	var expNumMat=new RegExp("^(M)[0-9]{3,3}$","g");
	var expDesign=new RegExp("^[a-zA-Z\s\ ]+$","g");
	var expPu=new RegExp("^[0-9]+$","g");
	var expStock=new RegExp("^[0-9]+$","g");

	if(expNumMat.test(numMatModif))
	{document.getElementById("numMatModif").style.borderColor="inerit";
		}else{document.getElementById("numMatModif").style.borderColor="red";}	
	if(expDesign.test(designModif))
	{document.getElementById("designModif").style.borderColor="inerit";
		}else{document.getElementById("designModif").style.borderColor="red";}
	if(PuModif!="")
	{document.getElementById("PuModif").style.borderColor="inerit";
		}else{document.getElementById("PuModif").style.borderColor="red";}
	if(StockModif!="")
	{document.getElementById("StockModif").style.borderColor="inerit";
		}else{document.getElementById("StockModif").style.borderColor="red";}
	envoyerModifMat(url,numMatModif,designModif,PuModif,StockModif,numMat);
		
}



function envoyerModifMat(url,numMatModif,designModif,PuModif,StockModif,numMat)
{
	var expNumMat=new RegExp("^(M)[0-9]{3,3}$","g");
	var expDesign=new RegExp("^[a-zA-Z\s\ ]+$","g");
	var expPu=new RegExp("^[0-9]+$","g");
	var expStock=new RegExp("^[0-9]+$","g");
	
	if(expNumMat.test(numMatModif))
	{	
		if(expDesign.test(designModif))
		{
			if(expPu.test(PuModif))
			{
				if(expStock.test(StockModif))
				{
					var requeteHttp=getRequete();
					if(requeteHttp==null)
					{
						alert("on ne peut pas utiliser Ajax sur cette navigateur");
					}
					else
					{
						requeteHttp.open("POST",url,true);
						requeteHttp.onreadystatechange=function(){recevoirReponseModifMat(requeteHttp);}
						requeteHttp.setRequestHeader("content-type","application/x-www-form-urlencoded");
						requeteHttp.send("numMatModif="+escape(numMatModif)+"&designModif="
							+escape(designModif)+"&PuModif="+escape(PuModif)+"&StockModif="+escape(StockModif)
							+"&numMat="+escape(numMat));
					}
						return;
				}
			}
		}
	}
}
function recevoirReponseModifMat(requeteHttp)
{
	if(requeteHttp.readyState==4)
	{
		if(requeteHttp.status==200)
		{
			traiterReponseModifMat(requeteHttp.responseText);
		}
	}
}
function traiterReponseModifMat(reponse)
{
	alert(reponse);
	AnnulerPourMat();
	rafraichirPourMat();
}
//*******************************Rafraichir Liste des materiel*********************************//
function rafraichirPourMat()
{
	window.location.reload();
}
//**************************************FIN****************************************//

//*******************************Annuler Liste modif materiel*********************************//
function AnnulerPourMat()
{
	document.getElementById("modifierMat").style.visibility="hidden";
	document.getElementById("numMat").value="";
	document.getElementById("design").value="";
	document.getElementById("Pu").value="";
	document.getElementById("Stock").value="";
	
	document.getElementById("numMatModif").value="";
	document.getElementById("designModif").value="";
	document.getElementById("PuModif").value="";
	document.getElementById("StockModif").value="";
	
	document.forms['form1'].elements["numMat"].disabled=false;
	document.forms['form1'].elements["design"].disabled=false;
	document.forms['form1'].elements["Pu"].disabled=false;
	document.forms['form1'].elements["Stock"].disabled=false;
	
	document.forms['form1'].elements["numMatModif"].style.borderColor="white";
	document.forms['form1'].elements["designModif"].style.borderColor="white";
	document.forms['form1'].elements["PuModif"].style.borderColor="white";
	document.forms['form1'].elements["StockModif"].style.borderColor="white";
	
	document.forms['form1'].elements["ajouter"].disabled=false;
}
//**************************************FIN****************************************//


//*****************Ajax pour Liste de materiel achetee par un client entre deux date*******************************//

function envoyerReqDate(url,numClient,ancien_date,recent_date)
{
	if(ancien_date=="" && recent_date=="")
	{
		alert("Entrez les dates pour voir les materiels achete!!");
	}else{
		if(ancien_date=="" || recent_date=="" )
		{
			alert("Entrez les dates pour voir les materiels achete!!");
		}else{
			var requeteHttp=getRequete();
			if(requeteHttp==null)
			{
				alert("imposible d'utiliser Ajax sur cette navigateur!!");
				exit();
			}
			else
			{
				requeteHttp.open("POST",url,"true");
				requeteHttp.onreadystatechange=function(){recevoirRepDate(requeteHttp);};
				requeteHttp.setRequestHeader("content-type","application/x-www-form-urlencoded");
				requeteHttp.send("numClient="+numClient+"&ancien_date="+ancien_date+"&recent_date="+recent_date);
			}
		}
	}
		
}
function recevoirRepDate(requeteHttp)
{
	if(requeteHttp.readyState==4)
	{
		if(requeteHttp.status==200)
		{
			traiterRepDate(requeteHttp.responseText);
		}
	}
}
function traiterRepDate(reponse)
{
	document.getElementById("RepDate").innerHTML=reponse;
}
//********************Ajax pour liste de materiel achetee par un client dans un mois******************//


function envoyerReqMois(url,numClient,mois)
{
	var requeteHttp=getRequete();
		if(requeteHttp==null)
		{
			alert("impossible d'utiliser Ajax sur ce navigateur!!");
		}
		else{
			requeteHttp.open("POST",url,true);
			requeteHttp.onreadystatechange=function(){recevoirRepMois(requeteHttp);}
			requeteHttp.setRequestHeader("content-type","application/x-www-form-urlencoded");
			requeteHttp.send("numClient="+numClient+"&mois="+mois);
		}
}

function recevoirRepMois(requeteHttp)
{
	if(requeteHttp.readyState==4)
	{
		if(requeteHttp.status==200)
		{
			traiterRepMois(requeteHttp.responseText);
		}
}
}

function traiterRepMois(reponse)
{
	document.getElementById('RepMois').innerHTML=reponse;
}

//*****************************Affichage de l'annee******************************//


function envoyerReqAffAnnee(url)
{
	
	var requeteHttp=getRequete();
		if(requeteHttp==null)
		{
			alert("On ne peut pas utiliser Ajax sur ce navigateur");	
		}
		else
		{
			requeteHttp.open("GET",url,true);
			requeteHttp.onreadystatechange=function(){recevoirReqAffAnnee(requeteHttp);}
			requeteHttp.send(null);
		}
}

function recevoirReqAffAnnee(requeteHttp)
{
	
	if(requeteHttp.readyState==4)
	{
		if(requeteHttp.status==200)
		{
			traiterReqAffAnnee(requeteHttp.responseText);
		}
	}	
}
function traiterReqAffAnnee(reponse)
{
	
	if(reponse=="")
	{
		alert('pas d\'annee');
	}
	else{
		var nb,select,rep,i,select2;
		rep=reponse.split("/");
		select=document.getElementById('annee');
		select2=document.getElementById('ans');
		nb=rep.length;
		select.length=nb;
		select2.length=nb
		for(i=0;i<nb;i++)
		{
			select.options[i].text=rep[i];
			select2.options[i].text=rep[i];
		}
		envoyerReqChiffreAjax("chiffreAjax.php",select.options[0].text);
	}

}
//********************Ajax pour la liste des materiel achetee pa le client dans une annee********************/

function envoyerReqAnnee(url,numClient,annee)
{
	var requeteHttp=getRequete();
		if(requeteHttp==null)
		{
			alert("On ne peut pas utiliser Ajax sur ce navigateur");	
		}
		else
		{
			requeteHttp.open("POST",url,true);
			requeteHttp.onreadystatechange=function(){recevoirRepAnnee(requeteHttp);}
			requeteHttp.setRequestHeader("content-type","application/x-www-form-urlencoded");
			requeteHttp.send("numClient="+numClient+"&annee="+annee);
		}
}

function recevoirRepAnnee(requeteHttp)
{
	if(requeteHttp.readyState==4)
	{
		if(requeteHttp.status==200)
		{
			traiterRepAnnee(requeteHttp.responseText);
		}
	}	
}
function traiterRepAnnee(reponse)
{
	document.getElementById('RepAnnee').innerHTML=reponse;	
}	

//*************************facture*******************************//

function envoyerReqFacture(url,numClient,nom,annee)
{
	var requeteHttp=getRequete();
		if(requeteHttp==null)
		{
			alert("On ne peut pas utiliser Ajax sur ce navigateur");	
		}
		else
		{
			requeteHttp.open("POST",url,true);
			requeteHttp.onreadystatechange=function(){recevoirRepFacture(requeteHttp);}
			requeteHttp.setRequestHeader("content-type","application/x-www-form-urlencoded");
			requeteHttp.send("numClient="+numClient+"&nom="+nom+"&annee="+annee);
		}
}

function recevoirRepFacture(requeteHttp)
{
	if(requeteHttp.readyState==4)
	{
		if(requeteHttp.status==200)
		{
			traiterRepFacture(requeteHttp.responseText);
		}
	}	
}
function traiterRepFacture(reponse)
{
	document.getElementById('facture').innerHTML=reponse;	
}	

//______________________________fonction pour les Achat__________________________________

//++++++++++++++++++++++++++++++verification des date*******************************//

function CheckDate(d)
{
	var amin=1999, amax=2019,j=(d.substring(8,10)),m=(d.substring(5,7)), a=(d.substring(0,4)),ok=1;
		if ((j=="") || (m=="") || (a==""))
		{
			alert("la date est invalide");ok=0;
		}else 
		{
			if (((j<1)||(j>31)) && (ok==1)) {
				alert("Le jour n'est pas correct."); ok=0;
			}
			if (((m<1)||(m>12)) && (ok==1)) {
				alert("Le mois n'est pas correct."); ok=0;
			}
			if (((a<amin)||(a>amax)) && (ok==1) ) {
				alert("L'année n'est pas correcte."); ok=0;
			}
		}	
		
		if (ok==1){
			var d2=new Date();
			j2=d2.getDate();
			m2=d2.getMonth()+1;
			a2=d2.getFullYear();
			if((a==a2) && (m==m2)) 
			{
				if(j>j2)
				{
							 alert("La date "+d+" n' est pas encore existe!");
							 ok=0;
				}	
			}
		}
		return ok;
}



function AjoutAchat(url,numClient,numMat,qte,date_achat)
{
	var expNumClient= new RegExp("^(C)[0-9]{3,3}$","g");
	var expNumMat=new RegExp("^(M)[0-9]{3,3}$","g");
	var expQte=new RegExp("^[0-9]+$","g");
	
	if(expNumClient.test(numClient))
	{document.getElementById("numClient").style.borderColor="white";
		}else{document.getElementById("numClient").style.borderColor="red";}	
	if(expNumMat.test(numMat))
	{document.getElementById("numMat").style.borderColor="white";
		}else{document.getElementById("numMat").style.borderColor="red";}
	if(expQte.test(qte))
	{document.getElementById("qte").style.borderColor="white";	
		}else{document.getElementById("qte").style.borderColor="red";}
	if(CheckDate(date_achat)==1)
	{
		document.getElementById("date_achat").style.borderColor="white";
	}else{document.getElementById("date_achat").style.borderColor="red";}	
		
	envoyerRequeteAjoutAchat(url,numClient,numMat,qte,date_achat);
}

//*******************Ajout d'achat***************************//
function envoyerRequeteAjoutAchat(url,numClient,numMat,qte,date_achat)
{
	var expNumClient= new RegExp("^(C)[0-9]{3,3}$","g");
	var expNumMat=new RegExp("^(M)[0-9]{3,3}$","g");
	var expQte=new RegExp("^[0-9]+$","g");
	
	if(expNumClient.test(numClient))
	{
		if(expNumMat.test(numMat))
		{
			if(expQte.test(qte))
			{
				if(CheckDate(date_achat)==1)
				{
					var requeteHttp=getRequete();
					if(requeteHttp==null)
					{
						alert("on ne peut pas utiliser Ajax sur cette navigateur");
					}
					else
					{
						requeteHttp.open("POST",url,true);
						requeteHttp.onreadystatechange=function(){recevoirReponseAjoutAchat(requeteHttp);}
						requeteHttp.setRequestHeader("content-type","application/x-www-form-urlencoded");
						requeteHttp.send("numClient="+escape(numClient)+"&numMat="+escape(numMat)+
						"&qte="+escape(qte)+"&date_achat="+escape(date_achat));
					}
					return;
				}	
			}
		}
	}	
}
function recevoirReponseAjoutAchat(requeteHttp)
{
	if(requeteHttp.readyState==4)
	{
		if(requeteHttp.status==200)
		{
			traiterReponseAjoutAchat(requeteHttp.responseText);
		}
	}
}
function traiterReponseAjoutAchat(reponse)
{
	alert(reponse);
	rafraichirPourAchat();
}

function annulerPourAchat()
{
	document.getElementById('modif').style.visibility="hidden";
	document.getElementById('numClientModif').value="";
	document.getElementById('numMatModif').value="";
	document.getElementById('qteModif').value="";
	document.getElementById('date_achatModif').value="";
	
	document.forms['origine'].elements['numClient'].disabled=false;
	document.forms['origine'].elements['numMat'].disabled=false;
	document.forms['origine'].elements['qte'].disabled=false;
	document.forms['origine'].elements['date_achat'].disabled=false;
	document.forms['origine'].elements["nouveau"].disabled=false;
	
	document.getElementById("numClient").style.borderColor="white";
	document.getElementById("numMat").style.borderColor="white";
	document.getElementById("qte").style.borderColor="white";
	document.getElementById("date_achat").style.borderColor="white";
	
	document.getElementById("numClientModif").style.borderColor="white";
	document.getElementById("numMatModif").style.borderColor="white";
	document.getElementById("qteModif").style.borderColor="white";
	document.getElementById("date_achatModif").style.borderColor="white";
	
	document.getElementById('numClient').value="";
	document.getElementById('numMat').value="";
	document.getElementById('qte').value="";
	document.getElementById('date_achat').value="";
	rafraichirPourAchat();
}
function modifierPourAchat(id,numClient,numMat,qte,date_achat)
{
	document.getElementById('numClient').value=numClient;
	document.getElementById('numMat').value=numMat;
	document.getElementById('qte').value=qte;
	document.getElementById("date_achat").value=date_achat;
	document.getElementById('id').value=id;
	document.getElementById('modif').style.visibility="visible";
	
	document.forms['origine'].elements['numClient'].disabled=true;
	document.forms['origine'].elements['numMat'].disabled=true;
	document.forms['origine'].elements['qte'].disabled=true;
	document.forms['origine'].elements['date_achat'].disabled=true;
	document.forms['origine'].elements["nouveau"].disabled=true;
	
	document.getElementById("numClient").style.borderColor="white";
	document.getElementById("numMat").style.borderColor="white";
	document.getElementById("qte").style.borderColor="white";
	document.getElementById("date_achat").style.borderColor="white";
	
	document.getElementById("numClientModif").style.borderColor="white";
	document.getElementById("numMatModif").style.borderColor="white";
	document.getElementById("qteModif").style.borderColor="white";
	document.getElementById("date_achatModif").style.borderColor="white";
}

function rafraichirPourAchat()
{
	document.getElementById("numClient").value="";
	document.getElementById("numMat").value="";
	document.getElementById("qte").value="";
	document.getElementById("date_achat").value="";
	
	document.getElementById("numClientModif").value="";
	document.getElementById("numMatModif").value="";
	document.getElementById("qteModif").value="";
	document.getElementById("date_achat").value="";
	
	document.getElementById("numClient").style.borderColor="white";
	document.getElementById("numMat").style.borderColor="white";
	document.getElementById("qte").style.borderColor="white";
	document.getElementById("date_achat").style.borderColor="white";
	
	document.getElementById("numClientModif").style.borderColor="white";
	document.getElementById("numMatModif").style.borderColor="white";
	document.getElementById("qteModif").style.borderColor="white";
	document.getElementById("date_achatModif").style.borderColor="white";
	window.location.reload();
}

function supprimerPourAchat(id,numClient,numMat,qte,date_achat)
{
	if(confirm("Etes vous vouloir supprimer cette achat?"))
	{
		envoyerReqSupprAchat("SupprAchat.php",id,numClient,numMat,qte,date_achat);
	}else{
		alert("pas supprime!");
	}
}

//***********************Suppression avec Ajax************************//
function envoyerReqSupprAchat(url,id,numClient,numMat,qte,date_achat)
{
	var requeteHttp=getRequete();
		if(requeteHttp==null)
		{
			alert("on ne peut pas utiliser Ajax sur cette navigateur");
		}
		else
		{
			requeteHttp.open("POST",url,true);
			requeteHttp.onreadystatechange=function(){recevoirRepSupprAchat(requeteHttp);}
			requeteHttp.setRequestHeader("content-type","application/x-www-form-urlencoded");
			requeteHttp.send("id="+id+"&numClient="+escape(numClient)+"&numMat="+escape(numMat)+
				"&qte="+escape(qte)+"&date_achat="+escape(date_achat));
		}
				return;
}
function recevoirRepSupprAchat(requeteHttp)
{
	if(requeteHttp.readyState==4)
	{
		if(requeteHttp.status==200)
		{
			traiterRepSupprAchat(requeteHttp.responseText);
		}
	}
}
function traiterRepSupprAchat(reponse)
{
	alert(reponse);
	rafraichirPourAchat();
}

//*************************Modification d'achat*************************//

function ModifAchat(url,id,numClient,numMat,qte,date_achat,qteAncien)
{
	var expNumClient= new RegExp("^(C)[0-9]{3,3}$","g");
	var expNumMat=new RegExp("^(M)[0-9]{3,3}$","g");
	var expQte=new RegExp("^[0-9]+$","g");
	
	if(expNumClient.test(numClient))
	{document.getElementById("numClientModif").style.borderColor="white";
		}else{document.getElementById("numClientModif").style.borderColor="red";}	
	if(expNumMat.test(numMat))
	{document.getElementById("numMatModif").style.borderColor="white";
		}else{document.getElementById("numMatModif").style.borderColor="red";}
	if(expQte.test(qte))
	{document.getElementById("qteModif").style.borderColor="white";	
		}else{document.getElementById("qteModif").style.borderColor="red";}
	if(CheckDate(date_achat)==1)
	{
		document.getElementById("date_achatModif").style.borderColor="white";
	}else{document.getElementById("date_achatModif").style.borderColor="red";}	
		
	envoyerReqModifierAchat(url,id,numClient,numMat,qte,date_achat,qteAncien);
}


function envoyerReqModifierAchat(url,id,numClient,numMat,qte,date_achat,qteAncien)
{
	var expNumClient= new RegExp("^(C)[0-9]{3,3}$","g");
	var expNumMat=new RegExp("^(M)[0-9]{3,3}$","g");
	var expQte=new RegExp("^[0-9]+$","g");
	
		
	if(expNumClient.test(numClient))
	{
		if(expNumMat.test(numMat))
		{
			if(expQte.test(qte))
			{
				if(CheckDate(date_achat)==1)
				{
					QteReste=qteAncien-qte;
					var requeteHttp=getRequete();
					if(requeteHttp==null)
					{
						alert("on ne peut pas utiliser Ajax sur cette navigateur");
					}
					else
					{
					QteReste=qteAncien-qte;
					AbsQteReste=Math.abs(QteReste);
			
					requeteHttp.open("POST",url,true);
					requeteHttp.onreadystatechange=function(){recevoirRepModifierAchat(requeteHttp);}
					requeteHttp.setRequestHeader("content-type","application/x-www-form-urlencoded");
					requeteHttp.send("id="+id+"&numClient="+escape(numClient)+"&numMat="+escape(numMat)+
					"&qte="+escape(qte)+"&date_achat="+escape(date_achat)+"&qteReste="+QteReste+"&AbsQteReste="+AbsQteReste);
					}
				}		
			}
		}
	}	
}
function recevoirRepModifierAchat(requeteHttp)
{
	if(requeteHttp.readyState==4)
	{
		if(requeteHttp.status==200)
		{
			traiterRepModifierAchat(requeteHttp.responseText);
		}
	}
}
function traiterRepModifierAchat(reponse)
{
	alert(reponse);
	rafraichirPourAchat();
}

//********************************Etat de stock**********************************

function envoyerReqStock(url,annee)
{
	var requeteHttp=getRequete();
	if(requeteHttp==null)
	{
		alert("on ne peut pas utiliser Ajax sur cette navigateur");
	}
	else
	{
		requeteHttp.open("POST",url,true);
		requeteHttp.onreadystatechange=function(){recevoirRepStock(requeteHttp);}
		requeteHttp.setRequestHeader("content-type","application/x-www-form-urlencoded");
		requeteHttp.send("annee="+escape(annee));
	}	
}

function recevoirRepStock(requeteHttp)
{
	if(requeteHttp.readyState==4)
	{
		if(requeteHttp.status==200)
		{
			traiterRepStock(requeteHttp.responseText);
		}
	}
}

function traiterRepStock(reponse)
{
	document.getElementById("rep").innerHTML=reponse;
}

function histogrammeEtatStock(annee)
{
	document.location.href="pageHistogrammeEtatStock.php?annee"+annee;
}
	