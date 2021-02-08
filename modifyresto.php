<?
include_once("../include/config.php");
include_once("session.php");

$res = mysql_query("select * from $tb_resto where `RestoID` = '$RestoID'") or die (mysql_error());
$row = mysql_fetch_array($res);
?>
<html>
<head>
<title>Proposer un restaurant</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<script language="javascript" type="text/javascript" src="js/script.js"></script>
<link rel="stylesheet" type="text/css" href="css/style.css">
<style type="text/css">
<!--
.style5 {color: #00FF00}
.style1 {color: #00FF00}
body {
	background-image: url(../images/mainbg.gif);
}
.STYLE6 {
	color: #f68e11;
	font-weight: bold;
}
.STYLE7 {
	color: #F68E11;
	font-weight: bold;
}
.STYLE8 {
	color: #F38B16;
	font-weight: bold;
}
.STYLE9 {color: #F68E11}
-->
</style>
<script language="javascript">
function check()
{
  if (addnew.Name.value=="") {
		alert("Remplissez nom du restaurant S.V.P!");
		addnew.Name.focus();		
		    return (false);
  }
  else if (addnew.Adresse.value=="") {
		alert("Remplissez l'adresse S.V.P!");
		addnew.Adresse.focus();		
		    return (false);
  }
 else if (addnew.Telephone.value == "") {
		alert("Remplissez le telephone S.V.P!");
		addnew.Telephone.focus();		
		    return (false);
  }
  else if (addnew.Ville.value=="") {
		alert("Remplissez ville S.V.P!");
		addnew.Ville.focus();		
		    return (false);
  }
  else if (addnew.Post.value=="") {
		alert("Remplissez code de post S.V.P!");
		addnew.Post.focus();		
		    return (false);
  }
  else
  {
  	for(i=0; i<addnew.length; i++)
	{
		if(addnew.elements[i].type == 'checkbox' && addnew.elements[i].id == 'Cuisine')
		{
			if(addnew.elements[i].checked == true)
			{
				return true
			}
		}
	}
  }

	alert("Choisissez le type de cuisine S.V.P!");
	addnew.Cuisine[0].focus();		
	return (false);
}

</script>
</head>

<body >
<table border="0"  align="left" width="100%" cellspacing="0" cellpadding="0">
<tr>
	<td colspan="2" height="20px"><?php include ("top.php"); ?></td>
</tr>
<tr>
<td valign="top" width="100%">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <!--<td width="100%">&nbsp;</td>-->
    <td width="100%"><table border="0" cellspacing="0" cellpadding="0" width="100%" bgcolor="#FFA54F">
      <tr>
        <td valign="top" colspan="3"><img src="../images/maintop.gif" width="450" border="0" /></td>
      </tr>
      <tr>
        <td colspan="3" align="left"><table width="222" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td width="28" bgcolor="#FFA54F">&nbsp;</td>
              <td width="178" bgcolor="#FFA54F"><span class="header2">Proposer un restaurant </span></td>
              <td width="16"><img src="../images/round.gif" width="14" height="21" /></td>
            </tr>
        </table></td>
      </tr>
      <tr>
        <td width="20" valign="top"><font size="1">&nbsp;</font></td>
        <td width="651" colspan="2" valign="top" bgcolor="#FFA54F"><form action="saveresto.php" method="post" name="addnew" id="addnew" onSubmit="return check();">
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td height="10" colspan="4" align="center"><span class="style1">*</span> chambre obligatoire </td>
              </tr>
              <tr>
                <td width="22%" height="30" align="right"><span class="STYLE6">Nom du restaurant: </span></td>
                <td height="30" colspan="3"><input  value="<?=$row[Name];?>" name="Name" class="input2" id="Name3" size="50" />
                    <span class="style5">*</span></td>
              </tr>
              
              
              <tr>
                <td height="30" align="right"><span class="STYLE7">Adresse:</span></td>
                <td height="30" colspan="3"><input name="Adresse" class="input2" id="Adresse" size="40" value="<?=$row[Adresse];?>"/>
                    <span class="style5">*</span></td>
              </tr>
              <tr>
                <td height="30" align="right"><span class="STYLE7">Ville:</span></td>
                <td width="27%" height="30"><input name="Ville" class="input2" id="Ville4" size="20" value="<?=$row[Ville];?>"/>
                    <span class="style5">*</span></td>
                <td width="15%" height="30" align="right"><span class="STYLE8">Code Postal:</span></td>
                <td width="36%" height="30"><input name="Post" 
            type="text" class="input2" id="Post" size="20" value="<?=$row[Post];?>"/>
                    <span class="style5">*</span></td>
              </tr>
              <tr>
                <td height="30" align="right"><span class="STYLE7">Telephone:</span></td>
                <td height="30"><input name="Telephone" class="input2" id="Telephone" size="20" value="<?=$row[Telephone];?>"/>
                    <span class="style5">*</span></td>
                <td height="30" align="right"><span class="STYLE8">Fax:</span></td>
                <td height="30"><input name="Fax" 
            type="text" class="input2" id="Fax" size="20" value="<?=$row[Fax];?>"/></td>
              </tr>
              <tr>
                <td height="30" align="right"><span class="STYLE7">Siret:</span></td>
                <td height="30"><input name="Siret" class="input2" id="Ville5" size="20" value="<?=$row[Siret];?>"/></td>
                <td height="30" align="right"><span class="STYLE8">Email:</span></td>
                <td height="30"><input name="Email" 
            type="text" class="input2" id="Email" size="20" value="<?=$row[Email];?>"/>                </td>
              </tr>
              <tr>
                <td height="30" align="right"><span class="STYLE7">Sous Domaine:</span></td>
                <td height="30" colspan="3"><input name="Domaine" 
            type="text" class="input2" id="Domain2" size="30" value="<?=$row[Domaine];?>"/></td>
              </tr>
              <tr>
                <td height="30" align="right"><span class="STYLE7">Nombre de table:</span></td>
                <td height="30"><input name="Table" class="input2" id="Table" size="15" value="<?=$row[Table];?>"/></td>
                <td height="30" align="right"><span class="STYLE9"><strong>Sp&eacute;lialit&eacute;:</strong></span></td>
                <td height="30"><input name="Special" type="text" class="input2" id="Special" size="20" value="<?=$row[Special];?>"/></td>
              </tr>
              <tr>
                <td height="30" align="right"><span class="STYLE7"><font 
                              face="Arial">M&eacute;tro le plus proche:&nbsp;</font></span></td>
                <td height="30" colspan="3"><font 
                              face="Arial">
                  <select name="Metro" class="input2" id="select">
                    <option value="<?=$row[Metro];?>" selected="selected"><?=$row[Metro];?></option>
                    <option value="Abbesses">Abbesses </option>
                    <option value="Alesia">Alesia </option>
                    <option value="Alexandre Dumas">Alexandre Dumas </option>
                    <option value="Alma Marceau">Alma Marceau </option>
                    <option value="Anvers">Anvers </option>
                    <option value="Argentine">Argentine </option>
                    <option value="Arts et Metiers">Arts et Metiers </option>
                    <option value="Assemblee Nationale">Assemblee Nationale </option>
                    <option value="Auber">Auber </option>
                    <option value="Avenue Emile Zola">Avenue Emile Zola </option>
                    <option value="Avron">Avron </option>
                    <option value="Balard">Balard </option>
                    <option value="Barbes Rochechouart">Barbes Rochechouart </option>
                    <option value="Bastille">Bastille </option>
                    <option value="Bel Air">Bel Air </option>
                    <option value="Belleville">Belleville </option>
                    <option value="Bercy ">Bercy </option>
                    <option value="Bir Hakeim ">Bir Hakeim </option>
                    <option value="Blanche ">Blanche </option>
                    <option value="Boissiere ">Boissiere </option>
                    <option value="Bolivar ">Bolivar </option>
                    <option value="Bonne Nouvelle ">Bonne Nouvelle </option>
                    <option value="Botzaris ">Botzaris </option>
                    <option value="Boucicaut ">Boucicaut </option>
                    <option value="Boulets Montreuil ">Boulets Montreuil </option>
                    <option value="Boulevard Massena ">Boulevard Massena </option>
                    <option value="Boulevard Victor ">Boulevard Victor </option>
                    <option value="Bourse ">Bourse </option>
                    <option value="Breguet Sabin ">Breguet Sabin </option>
                    <option value="Brochant ">Brochant </option>
                    <option value="Buttes Chaumont ">Buttes Chaumont </option>
                    <option value="Buzenval ">Buzenval </option>
                    <option value="Cadet ">Cadet </option>
                    <option value="Cambronne ">Cambronne </option>
                    <option value="Campo Formio ">Campo Formio </option>
                    <option value="Cardinal Lemoine ">Cardinal Lemoine </option>
                    <option value="Censier Daubenton ">Censier Daubenton </option>
                    <option value="Champ de Mars Tour Eiffel ">Champ de Mars Tour Eiffel </option>
                    <option value="Champs-Elysees Clemenceau ">Champs-Elysees Clemenceau </option>
                    <option value="Chardon Lagache ">Chardon Lagache </option>
                    <option value="Charles de Gaulle-Etoile ">Charles de Gaulle-Etoile </option>
                    <option value="Charles Michels ">Charles Michels </option>
                    <option value="Charonne ">Charonne </option>
                    <option value="Chateau d'Eau ">Chateau d'Eau </option>
                    <option value="Chateau Landon ">Chateau Landon </option>
                    <option value="Chateau Rouge ">Chateau Rouge </option>
                    <option value="Chatelet ">Chatelet </option>
                    <option value="Chatelet Les Halles ">Chatelet Les Halles </option>
                    <option value="Chaussee d'Antin La Fayette ">Chaussee d'Antin La Fayette </option>
                    <option value="Chemin Vert ">Chemin Vert </option>
                    <option value="Chevaleret ">Chevaleret </option>
                    <option value="Cite ">Cite </option>
                    <option value="Cite Universitaire ">Cite Universitaire </option>
                    <option value="Cluny La Sorbonne ">Cluny La Sorbonne </option>
                    <option value="Colonel Fabien ">Colonel Fabien </option>
                    <option value="Commerce ">Commerce </option>
                    <option value="Concorde ">Concorde </option>
                    <option value="Convention ">Convention </option>
                    <option value="Corentin Cariou ">Corentin Cariou </option>
                    <option value="Corvisart ">Corvisart </option>
                    <option value="Courcelles ">Courcelles </option>
                    <option value="Couronnes ">Couronnes </option>
                    <option value="Danube ">Danube </option>
                    <option value="Daumesnil ">Daumesnil </option>
                    <option value="Denfert Rochereau ">Denfert Rochereau </option>
                    <option value="Dugommier ">Dugommier </option>
                    <option value="Dupleix ">Dupleix </option>
                    <option value="Duroc ">Duroc </option>
                    <option value="Ecole Militaire ">Ecole Militaire </option>
                    <option value="Edgar Quinet ">Edgar Quinet </option>
                    <option value="Eglise d'Auteuil ">Eglise d'Auteuil </option>
                    <option value="Etienne Marcel ">Etienne Marcel </option>
                    <option value="Europe ">Europe </option>
                    <option value="Exelmans ">Exelmans </option>
                    <option value="Faidherbe Chaligny ">Faidherbe Chaligny </option>
                    <option value="Falguiere ">Falguiere </option>
                    <option value="Felix Faure ">Felix Faure </option>
                    <option value="Filles du Calvaire ">Filles du Calvaire </option>
                    <option value="Franklin-D. Roosevelt ">Franklin-D. Roosevelt </option>
                    <option value="Gaite ">Gaite </option>
                    <option value="Gambetta ">Gambetta </option>
                    <option value="Gare d'Austerlitz ">Gare d'Austerlitz </option>
                    <option value="Gare de Lyon ">Gare de Lyon </option>
                    <option value="Gare du l'Est ">Gare du l'Est </option>
                    <option value="Gare du Nord ">Gare du Nord </option>
                    <option value="George V ">George V </option>
                    <option value="Glaciere ">Glaciere </option>
                    <option value="Goncourt ">Goncourt </option>
                    <option value="Grands Boulevards ">Grands Boulevards </option>
                    <option value="Guy Moquet ">Guy Moquet </option>
                    <option value="Havre Caumartin ">Havre Caumartin </option>
                    <option value="Hotel de Ville ">Hotel de Ville </option>
                    <option value="Iena ">Iena </option>
                    <option value="Invalides ">Invalides </option>
                    <option value="Jacques Bonsergent ">Jacques Bonsergent </option>
                    <option value="Jasmin ">Jasmin </option>
                    <option value="Jaures ">Jaures </option>
                    <option value="Javel ">Javel </option>
                    <option value="Jourdain ">Jourdain </option>
                    <option value="Jules Joffrin ">Jules Joffrin </option>
                    <option value="Jussieu ">Jussieu </option>
                    <option value="Kleber ">Kleber </option>
                    <option value="La Chapelle ">La Chapelle </option>
                    <option value="La Fourche ">La Fourche </option>
                    <option value="La Motte-Picquet Grenelle ">La Motte-Picquet Grenelle </option>
                    <option value="La Muette ">La Muette </option>
                    <option value="La Tour Maubourg ">La Tour Maubourg </option>
                    <option value="Lamarck Caulaincourt ">Lamarck Caulaincourt </option>
                    <option value="Laumiere ">Laumiere </option>
                    <option value="Le Peletier ">Le Peletier </option>
                    <option value="Ledru Rollin ">Ledru Rollin </option>
                    <option value="Les Gobelins ">Les Gobelins </option>
                    <option value="Les Halles ">Les Halles </option>
                    <option value="Liege ">Liege </option>
                    <option value="Louis Blanc ">Louis Blanc </option>
                    <option value="Lourmel ">Lourmel </option>
                    <option value="Louvre Rivoli ">Louvre Rivoli </option>
                    <option value="Luxembourg ">Luxembourg </option>
                    <option value="Mabillon ">Mabillon </option>
                    <option value="Madeleine ">Madeleine </option>
                    <option value="Maison Blanche ">Maison Blanche </option>
                    <option value="Malesherbes ">Malesherbes </option>
                    <option value="Maraichers ">Maraichers </option>
                    <option value="Marcadet Poissoniers ">Marcadet Poissoniers </option>
                    <option value="Marx Dormoy ">Marx Dormoy </option>
                    <option value="Maubert Mutualite ">Maubert Mutualite </option>
                    <option value="Menilmontant ">Menilmontant </option>
                    <option value="Michel-Ange Auteuil ">Michel-Ange Auteuil </option>
                    <option value="Michel-Ange Molitor ">Michel-Ange Molitor </option>
                    <option value="Michel Bizot ">Michel Bizot </option>
                    <option value="Mirabeau ">Mirabeau </option>
                    <option value="Miromesnil ">Miromesnil </option>
                    <option value="Monceau ">Monceau </option>
                    <option value="Montgallet ">Montgallet </option>
                    <option value="Montparnasse Bienvenue ">Montparnasse Bienvenue </option>
                    <option value="Mouton Duvernet ">Mouton Duvernet </option>
                    <option value="Musee d'Orsay ">Musee d'Orsay </option>
                    <option value="Nation ">Nation </option>
                    <option value="Nationale ">Nationale </option>
                    <option value="Notre-Dame de Lorette ">Notre-Dame de Lorette </option>
                    <option value="Notre-Dame des Champs ">Notre-Dame des Champs </option>
                    <option value="Oberkampf ">Oberkampf </option>
                    <option value="Odeon ">Odeon </option>
                    <option value="Opera ">Opera </option>
                    <option value="Ourcq ">Ourcq </option>
                    <option value="Palais Royal Musee du Louvre ">Palais Royal Musee du Louvre </option>
                    <option value="Parmentier ">Parmentier </option>
                    <option value="Passy ">Passy </option>
                    <option value="Pasteur ">Pasteur </option>
                    <option value="Pelleport ">Pelleport </option>
                    <option value="Pere Lachaise ">Pere Lachaise </option>
                    <option value="Pernety ">Pernety </option>
                    <option value="Philippe Auguste ">Philippe Auguste </option>
                    <option value="Picpus ">Picpus </option>
                    <option value="Pigalle ">Pigalle </option>
                    <option value="Place d'Italie ">Place d'Italie </option>
                    <option value="Place de Clichy ">Place de Clichy </option>
                    <option value="Place des Fetes ">Place des Fetes </option>
                    <option value="Place Monge ">Place Monge </option>
                    <option value="Plaisance ">Plaisance </option>
                    <option value="Poissonniere ">Poissonniere </option>
                    <option value="Pont de l'Alma ">Pont de l'Alma </option>
                    <option value="Pont Marie ">Pont Marie </option>
                    <option value="Pont Neuf ">Pont Neuf </option>
                    <option value="Port Royal ">Port Royal </option>
                    <option value="Porte d'Auteuil ">Porte d'Auteuil </option>
                    <option value="Porte d'Italie ">Porte d'Italie </option>
                    <option value="Porte d'Ivry ">Porte d'Ivry </option>
                    <option value="Porte d'Orleans ">Porte d'Orleans </option>
                    <option value="Porte Dauphine ">Porte Dauphine </option>
                    <option value="Porte de Bagnolet ">Porte de Bagnolet </option>
                    <option value="Porte de Champerret ">Porte de Champerret </option>
                    <option value="Porte de Charenton ">Porte de Charenton </option>
                    <option value="Porte de Choisy ">Porte de Choisy </option>
                    <option value="Porte de Clichy ">Porte de Clichy </option>
                    <option value="Porte de Clignancourt ">Porte de Clignancourt </option>
                    <option value="Porte de la Chapelle ">Porte de la Chapelle </option>
                    <option value="Porte de la Vilette ">Porte de la Vilette </option>
                    <option value="Porte de Montreuil ">Porte de Montreuil </option>
                    <option value="Porte de Pantin ">Porte de Pantin </option>
                    <option value="Porte de Saint-Cloud ">Porte de Saint-Cloud </option>
                    <option value="Porte de Saint-Ouen ">Porte de Saint-Ouen </option>
                    <option value="Porte de Vanves ">Porte de Vanves </option>
                    <option value="Porte de Versailles ">Porte de Versailles </option>
                    <option value="Porte de Vincennes ">Porte de Vincennes </option>
                    <option value="Porte des Lilas ">Porte des Lilas </option>
                    <option value="Porte Doree ">Porte Doree </option>
                    <option value="Porte Maillot ">Porte Maillot </option>
                    <option value="Pre-Saint-Gervais ">Pre-Saint-Gervais </option>
                    <option value="Pyramides ">Pyramides </option>
                    <option value="Pyrenees ">Pyrenees </option>
                    <option value="Quai de la Gare ">Quai de la Gare </option>
                    <option value="Quai de la Rapee ">Quai de la Rapee </option>
                    <option value="Quatre Septembre ">Quatre Septembre </option>
                    <option value="Rambuteau ">Rambuteau </option>
                    <option value="Ranelagh ">Ranelagh </option>
                    <option value="Raspail ">Raspail </option>
                    <option value="Reaumur-Sebastopol ">Reaumur-Sebastopol </option>
                    <option value="Rennes ">Rennes </option>
                    <option value="Republique ">Republique </option>
                    <option value="Reuilly Diderot ">Reuilly Diderot </option>
                    <option value="Richard Lenoir ">Richard Lenoir </option>
                    <option value="Richelieu Drouot ">Richelieu Drouot </option>
                    <option value="Riquet ">Riquet </option>
                    <option value="Rome ">Rome </option>
                    <option value="Rue de Bac ">Rue de Bac </option>
                    <option value="Rue de la Pompe ">Rue de la Pompe </option>
                    <option value="Saint-Ambroise ">Saint-Ambroise </option>
                    <option value="Saint-Fargeau ">Saint-Fargeau </option>
                    <option value="Saint-Francois Xavier ">Saint-Francois Xavier </option>
                    <option value="Saint-Georges ">Saint-Georges </option>
                    <option value="Saint-Germain des Pres ">Saint-Germain des Pres </option>
                    <option value="Saint-Jacques ">Saint-Jacques </option>
                    <option value="Saint-Lazare ">Saint-Lazare </option>
                    <option value="Saint-Marcel ">Saint-Marcel </option>
                    <option value="Rue Saint-Maur ">Rue Saint-Maur </option>
                    <option value="Saint-Michel ">Saint-Michel </option>
                    <option value="Saint-Michel Notre-Dame ">Saint-Michel Notre-Dame </option>
                    <option value="Saint-Paul ">Saint-Paul </option>
                    <option value="Saint-Philippe du Roule ">Saint-Philippe du Roule </option>
                    <option value="Saint-Placide ">Saint-Placide </option>
                    <option value="Saint-Sebastien Froissart ">Saint-Sebastien Froissart </option>
                    <option value="Saint-Sulpice ">Saint-Sulpice </option>
                    <option value="Segur ">Segur </option>
                    <option value="Sentier ">Sentier </option>
                    <option value="Sevres Babylone ">Sevres Babylone </option>
                    <option value="Sevres Lecourbe ">Sevres Lecourbe </option>
                    <option value="Simplon ">Simplon </option>
                    <option value="Saint-Augustin ">Saint-Augustin </option>
                    <option value="Solferino ">Solferino </option>
                    <option value="Stalingrad ">Stalingrad </option>
                    <option value="Strasbourg St-Denis ">Strasbourg St-Denis </option>
                    <option value="Sully Morland ">Sully Morland </option>
                    <option value="Telegraphe ">Telegraphe </option>
                    <option value="Temple ">Temple </option>
                    <option value="Ternes ">Ternes </option>
                    <option value="Tolbiac ">Tolbiac </option>
                    <option value="Trinite ">Trinite </option>
                    <option value="Trocadero ">Trocadero </option>
                    <option value="Tuileries ">Tuileries </option>
                    <option value="Vaneau ">Vaneau </option>
                    <option value="Varenne ">Varenne </option>
                    <option value="Vaugirard ">Vaugirard </option>
                    <option value="Vavin ">Vavin </option>
                    <option value="Victor Hugo ">Victor Hugo </option>
                    <option value="Villiers ">Villiers </option>
                    <option value="Volontaires ">Volontaires </option>
                    <option value="Voltaire ">Voltaire </option>
                    <option value="Wagram">Wagram</option>
                  </select>
                </font></td>
              </tr>
              <tr>
                <td height="30" colspan="4"><table width="100%"  border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td width="2%">&nbsp;</td>
                      <td width="98%" align="left"><table width="90%"  border="0" align="left" cellpadding="0" cellspacing="0">
                          <tr>
                            <td><strong><span class="STYLE9">Type de cuisine:</span> <span class="style5">*</span></strong></td>
                          </tr>
                          <tr>
                            <td height="19"><hr size="1" color="#B7AA0F" /></td>
                          </tr>
                      </table></td>
                    </tr>
                    <tr>
                      <td>&nbsp;</td>
                      <td><? getCuisine2($row[RestoID]);?></td>
                    </tr>
                </table></td>
              </tr>
              
              <tr>
                <td height="30" colspan="4"><table width="100%"  border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td width="2%">&nbsp;</td>
                      <td width="98%" align="left"><table width="90%"  border="0" align="left" cellpadding="0" cellspacing="0">
                          <tr>
                            <td><span class="STYLE9"><strong>Paiements: </strong></span></td>
                          </tr>
                          <tr>
                            <td height="19"><hr size="1" color="#B7AA0F" /></td>
                          </tr>
                      </table></td>
                    </tr>
                    <tr>
                      <td>&nbsp;</td>
                      <td><table width="80%"  border="0" cellspacing="5" cellpadding="0">
                          <tr>
                            <td><font 
                              face="Arial">
                              <input name="Cheque" type="checkbox" id="Cheque3" 
                              value="1" <? if($row[Cheque] == 1) echo "checked=\"checked\"";?>/>
                              Ch&egrave;ques</font></td>
                            <td><font 
                              face="Arial">
                              <input name="Carte" 
                              type="checkbox" id="Carte3" value="1" <? if($row[Carte] == 1) echo "checked=\"checked\"";?> />
                              Carte Bancaire</font></td>
                            <td><font 
                              face="Arial">
                              <input 
                              name="Ticket" type="checkbox" id="Ticket3" value="1" <? if($row[Ticket] == 1) echo "checked=\"checked\"";?> />
                              Titres Restaurant </font></td>
                          </tr>
                      </table></td>
                    </tr>
                </table></td>
              </tr>
              <tr>
                <td height="55" colspan="4"><table width="100%"  border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td width="2%">&nbsp;</td>
                      <td width="98%" align="left"><table width="90%"  border="0" align="left" cellpadding="0" cellspacing="0">
                          <tr>
                            <td><span class="STYLE9"><strong>Service et prestations </strong></span></td>
                          </tr>
                          <tr>
                            <td height="19"><hr size="1" color="#B7AA0F" /></td>
                          </tr>
                      </table></td>
                    </tr>
                    <tr>
                      <td>&nbsp;</td>
                      <td><table width="94%"  border="0" cellpadding="0" cellspacing="8">
                          <tr>
                            <td width="34%"><font face="Arial">
                              <input name="Internet" type="checkbox" id="Internet" 
                              value="1" <? if($row[Internet] == 1) echo "checked=\"checked\"";?>/>
                              Internet support</font></td>
                            <td width="38%"><font face="Arial">
                              <input name="Fumer" type="checkbox" id="Fumer" 
                              value="1" <? if($row[Fumer] == 1) echo "checked=\"checked\"";?>/>
                              Vrai Espace Non fumeur </font></td>
                            <td width="28%"><font face="Arial">
                              <input 
                              name="Pets" type="checkbox" id="Pets2" 
                              value="1" <? if($row[Animal] == 1) echo "checked=\"checked\"";?>/>
                              Animaux accept&eacute;s</font></td>
                          </tr>
                          <tr>
                            <td><input name="ServiceAP" type="checkbox" id="ServiceAP" value="1" <? if($row[ServiceAp] == 1) echo "checked=\"checked\"";?>/>
                              Service AP 22 heures </td>
                            <td><input name="OpenYear" type="checkbox" id="OpenYear" value="1" <? if($row[Open365] == 1) echo "checked=\"checked\"";?>/>
                              Ouvert 365 jours/an </td>
                            <td><input name="Sunday" type="checkbox" id="Sunday" value="1" <? if($row[OpenSunday] == 1) echo "checked=\"checked\"";?>/>
                              Ouvert le dimanche </td>
                          </tr>
                          <tr>
                            <td><input name="Handicape" type="checkbox" id="Handicape" value="1" <? if($row[Handicape] == 1) echo "checked=\"checked\"";?>/>
                              Acc&egrave;s handicap&eacute;s</td>
                            <td><input name="Parking" type="checkbox" id="Parking" value="1" <? if($row[Parking] == 1) echo "checked=\"checked\"";?>/>
                              Parking</td>
                            <td><input name="AirCondition" type="checkbox" id="AirCondition" value="1" <? if($row[AirCondition] == 1) echo "checked=\"checked\"";?>/>
                              Air conditionn&eacute; </td>
                          </tr>
                          <tr>
                            <td><input name="Salon" type="checkbox" id="Salon" value="1" <? if($row[SalonPrive] == 1) echo "checked=\"checked\"";?>/>
                              Salon priv&eacute; </td>
                            <td><input name="Vegetable" type="checkbox" id="Vegetable" value="1" <? if($row[PlatVegetarien] == 1) echo "checked=\"checked\"";?>/>
                              Plat v&eacute;g&eacute;tarien </td>
                            <td><input name="MenuKid" type="checkbox" id="MenuKid" value="1" <? if($row[MenuEnfant] == 1) echo "checked=\"checked\"";?>/>
                              Menu enfant </td>
                          </tr>
                      </table></td>
                    </tr>
                </table></td>
              </tr>
              <tr>
                <td height="40" colspan="4"><table width="100%"  border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td width="2%">&nbsp;</td>
                      <td width="98%" align="left"><table width="90%"  border="0" align="left" cellpadding="0" cellspacing="0">
                          <tr>
                            <td><span class="STYLE9"><strong>Type du restaurant: </strong></span></td>
                          </tr>
                          <tr>
                            <td height="19"><hr size="1"  color="#B7AA0F" /></td>
                          </tr>
                      </table></td>
                    </tr>
                    <tr>
                      <td>&nbsp;</td>
                      <td><table width="80%"  border="0" cellspacing="3" cellpadding="0">
                          <tr>
                            <td><input name="Traditional" type="checkbox" id="Traditional" value="1" <? if($row[Traditional] == 1) echo "checked=\"checked\"";?>/>
                              Un Restaurant Traditionnel</td>
                            <td><input name="Rapide" type="checkbox" id="Rapide" value="1" <? if($row[Rapide] == 1) echo "checked=\"checked\"";?>/>
                              Un Restaurant Rapide</td>
                          </tr>
                          <tr>
                            <td><input name="Emporter" type="checkbox" id="Emporter" value="1" <? if($row[Emporter] == 1) echo "checked=\"checked\"";?>/>
                              Des Plats &agrave; Emporter</td>
                            <td><input name="Livraison" type="checkbox" id="Livraison" value="1" <? if($row[Livraison] == 1) echo "checked=\"checked\"";?>/>
                              Une livraison &agrave; domicile </td>
                          </tr>
                      </table></td>
                    </tr>
                </table></td>
              </tr>
              <tr>
                <td height="1" colspan="4"><table width="80%"  border="0" align="center" cellpadding="0" cellspacing="5" id="tableform">
                    <tr>
                      <td height="1">

					  <table width="100%"  border="0" cellspacing="5" cellpadding="0">
					  <tr>
					  <td height="25" colspan="4"><span class="STYLE8">Les quatiers pour livraison: </span></td>
					  </tr>
					  <tr>
					  <td width="25%" height="25"><input type="checkbox" name="region[]" value="75001" <? if(checkRegion($row[RestoID], 75001)) echo "checked";?>>75001</td>
					  <td width="30%" height="25"><input type="checkbox" name="region[]" value="75002" <? if(checkRegion($row[RestoID], 75002)) echo "checked";?>>75002</td>
					  <td width="22%" height="25"><input type="checkbox" name="region[]" value="75003" <? if(checkRegion($row[RestoID], 75003)) echo "checked";?>>75003</td>
					  <td width="23%" height="25"><input type="checkbox" name="region[]" value="75004" <? if(checkRegion($row[RestoID], 75004)) echo "checked";?>>75004</td>
					  </tr>
					  <tr>
					  <td height="25"><input type="checkbox" name="region[]" value="75005" <? if(checkRegion($row[RestoID], 75005)) echo "checked";?>>75005</td>
					  <td height="25"><input type="checkbox" name="region[]" value="75006" <? if(checkRegion($row[RestoID], 75006)) echo "checked";?>>75006</td>
					  <td height="25"><input type="checkbox" name="region[]" value="75007" <? if(checkRegion($row[RestoID], 75007)) echo "checked";?>>75007</td>
					  <td height="25"><input type="checkbox" name="region[]" value="75008" <? if(checkRegion($row[RestoID], 75008)) echo "checked";?>>75008</td>
					  </tr>
					  <tr>
					  <td height="25"><input type="checkbox" name="region[]" value="75009" <? if(checkRegion($row[RestoID], 75009)) echo "checked";?>>75009</td>
					  <td height="25"><input type="checkbox" name="region[]" value="75010" <? if(checkRegion($row[RestoID], 75010)) echo "checked";?>>75010</td>
					  <td height="25"><input type="checkbox" name="region[]" value="75011" <? if(checkRegion($row[RestoID], 75011)) echo "checked";?>>75011</td>
					  <td height="25"><input type="checkbox" name="region[]" value="75012" <? if(checkRegion($row[RestoID], 75012)) echo "checked";?>>75012</td>
					  </tr>
					  <tr>
					  <td height="25"><input type="checkbox" name="region[]" value="75013" <? if(checkRegion($row[RestoID], 75013)) echo "checked";?>>75013</td>
					  <td height="25"><input type="checkbox" name="region[]" value="75014" <? if(checkRegion($row[RestoID], 75014)) echo "checked";?>>75014</td>
					  <td height="25"><input type="checkbox" name="region[]" value="75015" <? if(checkRegion($row[RestoID], 75015)) echo "checked";?>>75015</td>
					  <td height="25"><input type="checkbox" name="region[]" value="75016" <? if(checkRegion($row[RestoID], 75016)) echo "checked";?>>75016</td>
					  </tr>
					  <tr>
					  <td height="25"><input type="checkbox" name="region[]" value="75017" <? if(checkRegion($row[RestoID], 75017)) echo "checked";?>>75017</td>
					  <td height="25"><input type="checkbox" name="region[]" value="75018" <? if(checkRegion($row[RestoID], 75018)) echo "checked";?>>75018</td>
					  <td height="25"><input type="checkbox" name="region[]" value="75019" <? if(checkRegion($row[RestoID], 75019)) echo "checked";?>>75019</td>
					  <td height="25"><input type="checkbox" name="region[]" value="75020" <? if(checkRegion($row[RestoID], 75020)) echo "checked";?>>75020</td>
					  </tr>
					  <tr>
					    <td height="25" align="right"><span class="STYLE8">L'autre quatier: </span></td>
					    <td height="25" colspan="3"><input name="otherregion" value="<?=getOtherRegion($row[RestoID]);?>" type="text" id="otherregion" size="30" class="input2"><span class="style5">separer par ;</span></td>
						</tr>
					</table>
					  </td>
                    </tr>
                </table></td>
              </tr>
              <tr>
                <td align="right"><strong>Note:</strong></td>
                <td colspan="3"><textarea name="Note" cols="50" rows="5" class="input2" id="Note"><?=$row[Note];?></textarea></td>
              </tr>
              <tr>
                <td align="right">&nbsp;</td>
                <td colspan="3">
                  <br>
                  <input name="Submit" type="submit" class="submitcss" value="Modifier" /></td>
              </tr>
            </table>
        </form></td>
      </tr>
      <tr>
        <td valign="top" colspan="3"><img src="../images/mainbot.gif" width="450" border="0" /></td>
      </tr>
    </table></td>
    <td width="66">&nbsp;</td>
  </tr>
</table>


</td></tr>
<tr>
	<td colspan="2"><?php include ("bottom.php"); ?></td>
</tr>
</table>

</body>
</html>
