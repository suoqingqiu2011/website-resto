// Opacity
function opacity(id, opacStart, opacEnd, millisec) {
    //speed for each frame
    var speed = Math.round(millisec / 100);
    var timer = 0;

    //determine the direction for the blending, if start and end are the same nothing happens
    if(opacStart > opacEnd) {
        for(i = opacStart; i >= opacEnd; i--) {
            setTimeout("changeOpac(" + i + ",'" + id + "')",(timer * speed));
            timer++;
        }
    } else if(opacStart < opacEnd) {
        for(i = opacStart; i <= opacEnd; i++)
            {
            setTimeout("changeOpac(" + i + ",'" + id + "')",(timer * speed));
            timer++;
        }
    }
}

//change the opacity for different browsers
function changeOpac(opacity, id) {
    var object = document.getElementById(id).style;
    object.opacity = (opacity / 100);
    object.MozOpacity = (opacity / 100);
    object.KhtmlOpacity = (opacity / 100);
    object.filter = "alpha(opacity=" + opacity + ")";
}
function calcul_qte(article,operation) {
	qte=document.getElementById(article).value;
	if (operation=="plus") {qte++;}
	else if (operation=="moins") {qte--;}
	if (qte<1) {qte=1;}
	if (qte>100) {qte=100;}
	document.getElementById(article).value=qte;
}
function verif_form() {
	verif=false;
	erreur=0;
	txt_erreur="";
	// Verif email
	valide_email=false;
	email = document.getElementById('email').value;	
	for(var j=1;j<(email.length);j++){
		if(email.charAt(j)=='@'){
			if(j<(email.length-4)){
				for(var k=j;k<(email.length-2);k++){
					if(email.charAt(k)=='.') valide_email=true;
				}
			}
		}
	}
	if(valide_email==false) {
		erreur++;
		txt_erreur+="Votre email n'est pas valide\n";
	}
	// Fin Verif email
	
	// Verif Password
	pass=document.getElementById('pass').value;
	pass2=document.getElementById('pass2').value;
	if (pass!=pass2) {
		erreur++;
		txt_erreur+="Vous n'avez pas recopié correctement votre mot de passe\n";
	}
	if(pass.length<6) {
		erreur++;
		txt_erreur+="Votre mot de passe doit faire 6 caractères minimum\n";
	}
	// Fin Verif Password
	
	// Verif Nom
	if(document.getElementById('nom').value=="") {
		erreur++;
		txt_erreur+="Veuillez renseigner votre nom\n";
	}
	// Fin Verif Nom
	
	// Verif Prénom
	if(document.getElementById('prenom').value=="") {
		erreur++;
		txt_erreur+="Veuillez renseigner votre prénom\n";
	}
	// Fin Verif Prénom
	
	// Verif Adresse
	if(document.getElementById('adresse').value=="") {
		erreur++;
		txt_erreur+="Veuillez renseigner votre adresse\n";
	}
	// Fin Verif Adresse
	
	// Verif Telephone
	if(document.getElementById('telephone').value=="") {
		erreur++;
		txt_erreur+="Veuillez renseigner votre téléphone\n";
	}
	// Fin Verif Telephone
	
	// Verif Code Postal
	if(document.getElementById('Post2').value=="0") {
		erreur++;
		txt_erreur+="Veuillez renseigner votre code postal\n";
	}
	// Fin Verif CP
	
	// Dernière etape
	if (erreur==0) {verif=true;}
	else {verif=false;alert(txt_erreur);}
	return verif;
}
function code_postal(cp) {
	if (cp>=75001 && cp<=75020) {document.getElementById('ville').value="Paris";}
	else {
		if (document.getElementById('ville').value=="Paris") {document.getElementById('ville').value="";}
	}
}
function afficher_la_date() {
	today=new Date;
	heure=today.getHours();
	minute=today.getMinutes();
	if (minute<10) {minute="0"+minute;}
	phrase=heure+"h"+minute;
	document.getElementById('dateheure').innerHTML=phrase;
	setTimeout("afficher_la_date()",10000);
}

// Défilement du div menus
			var currentScroller;

			function myScroll2(content, value) {
				document.getElementById(content).scrollLeft += value;
			}
// Affichage de l'image du menu et les boutons pour ajouter au panier 
function affiche_produit(MenuID) {
	changeOpac(0,"photo_menu");
	nb_div=list_div.length;
	for (i=0;i<nb_div;i++) {
	document.getElementById(list_div[i]).style.display="none";	
	document.getElementById('qte_'+MenuID).value=1;
	}
	document.getElementById(MenuID).style.display="block";
	document.getElementById("photo_menu").src=list_img[MenuID];
	opacity('photo_menu',0,100,500);
	document.getElementById("name_produit").innerHTML="<strong>"+list_name[MenuID]+"</strong>";
	document.getElementById("note_produit").innerHTML=list_note[MenuID];
}
// Affichage/Masquage du menu de login
function ouvre_ferme_login() {
	if (document.getElementById('connexion_membre').style.display=="block") 
	{
		document.getElementById('connexion_membre').style.display="none";
		document.getElementById('fond_connexion_membre').style.display="none";
	}	
	else 
	{
		document.getElementById('fond_connexion_membre').style.display="block";
		opacity('fond_connexion_membre',0,85,500);
		document.getElementById('connexion_membre').style.display="block";
		opacity('connexion_membre',0,100,500);
	}
}