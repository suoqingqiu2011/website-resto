<?
// NOTE : Pour ajouter une langue, ajouter un fichier tel que celui-ci avec les traductions et rajouter le nom de la langue dans liste.php
// ***************** ATTENTION ********************
// Certains textes, specialement les textes sur les boutons ne doivent pas être trop longs pour ne pas dépasser et ruiner la mise en page
// Les fichiers de langues doivent ABSOLUMENT être sauvegardés au format UTF-8 sans BOM
// **************************************************

// FR - Français


//right.php
define("voir_tous_commandes","Voir les commandes");
define("Bienvenue","Bienvenue");
define("les_com_liv_aujourdhui","Les commandes &agrave; livrer aujourd'hui");
define("les_com_liv_demain","Les commandes &agrave; livrer demain");
define("les_der_com_passe","Les derni&egrave;res commandes pass&eacute;es");
define("com_passe_le","Commande pass&eacute;e le :");
define("com_a_liv_ajou_a","Commande &agrave; livrer aujourd'hui &agrave; :");
define("client","Client");
define("montant","Montant");
define("detail","D&eacute;tail");
define("com_a_liv_demain","Commande &agrave; livrer demain &agrave; :");
define("com_a_liv_le","Commande &agrave; livrer le :");

//Lieux de livraison
define("t_lieux_livraison","Lieux de livraison & Prix minimux");
define("lieux_de_livraison","Lieux de livraison");
define("rechercher_une_ville","Rechercher une ville : Tapez les premi&egrave;res lettres");
define("Chercher","Chercher");
define("resultat_de_recherche","R&eacute;sultats de la recherche ");
define("prix_minimum_pour_ville","Prix minimum pour cette ville* :");
define("euros","&euro;uros");
define("centimes","centimes");
define("Ajouter","Ajouter");
define("ajouter_une_ville","Ajouter une ville ");
define("code_postal","Code Postal");
define("Ville","Ville");
define("prix_mini","Prix&nbsp;mini");
define("choisir_un_prix_mini","Choisir un prix mini pour");
define("toutes","toutes");
define("les_villes","les villes ");
define("Modifier","Modifier");
define("text_lieux","* Le client ne pourra pas passer de commande d'un prix inf&eacute;rieur &agrave; ce vous aurez choisi. Vous pouvez laisser cette case vide pour ne pas mettre de minimum de commande.");
define("t_cherche","cherche");

//horaire.php
define("t_horaires","Horaires livraison");
define("horaires_des_livraisons","Horaires des livraisons");
define("hor_ouverture_habituelle","Horaire d'ouverture habituelle des livraisons [ ");
define("lettre_horaire"," ]");
define("de","de");
define("a","&agrave;");
define("fer_exceptionnelle","Fermetures exceptionnelles de la livraison [ ");
define("fer_exceptionnellet","Fermetures exceptionnelles de la livraison  ");
define("du","du");
define("au","au");

//horaire-normal.php
define("t_horaire_normal","horaire-normal");
define("hor_ouver_habi_liv","Horaire d'ouverture habituelle des livraisons");
define("text_hor_normal","L'heure du d&eacute;but du service doit &ecirc;tre antierieure &agrave; celle de fin.");
define("ajouter_un_service","Ajouter un service :");
define("jour1","lundi");
define("jour2","mardi");
define("jour3","mercredi");
define("jour4","jeudi");
define("jour5","vendredi");
define("jour6","samedi");
define("jour7","dimanche");
define("min_a","min - &agrave;");
define("Retour","Retour");

//Horaire-exception.php
define("Horaire_exception","Horaire exception");
define("fer_exceptionnelle","Fermetures exceptionnelles de la livraison");
define("text_hor_exception","Le d&eacute;but de la fermeture doit &ecirc;tre antierieure &agrave; celle de fin.");
define("Janvier","Janvier");
define("Fevrier","F&eacute;vrier");
define("Mars","Mars");
define("Avril","Avril");
define("Mai","Mai");
define("Juin","Juin");
define("Juillet","Juillet");
define("Aout","Ao&ucirc;t");
define("Septembre","Septembre");
define("Octobre","Octobre");
define("Novembre","Novembre");
define("Decembre","D&eacute;cembre");
define("grand_du","Du");
define("grand_au","Au");

//fidélité.php
define("t_fidelite","Programme de fid&eacute;lit&eacute;");
define("point_fidelite","Points fid&eacute;lit&eacute;");
define("pour_gagner_points","Pour gagner des points fid&eacute;lit&eacute; : ");
define("quand_client_depense","Quand le client d&eacute;pense");
define("euro_il_gagne","&euro;uros, il gagne");
define("points","points.");
define("pour_depenser_points","Pour d&eacute;penser ses points fid&eacute;lit&eacute; :");
define("client_doit_depenser","Le client doit d&eacute;penser");
define("point_pour_avoir_reduction","points pour avoir une r&eacute;duction de");
define("euros","&euro;uros.");
define("client_ne_utiliser","Le client ne peux utiliser qu'un seul bon de r&eacute;duction par commande");
define("client_utiliser","Le client peux utiliser plusieurs bons de r&eacute;duction par commande");
define("text_somme","La somme totale des bons de r&eacute;duction utilis&eacute;s sera toujours au plus ou &eacute;gale au prix minimum de la commande.");
define("desactiver_points","D&eacute;sactiver les points de fid&eacute;lit&eacute;");
define("Valider","Valider");

//adminfamille.php
define("t_Gestion_Familles","Gestion des Familles");
define("listing_familles","Listing des familles");
define("Famille","Famille");
define("Modifier","Modifier");
define("Supprimer","Supprimer");
define("Up","Up");
define("ajou_famille","Ajouter une famille :");
define("nom","Nom :");
define("cacher_famille","Cacher Famille");
define("ajouter_sous_famille","Ajouter une sous famille :");
define("pour_famille","Pour la famille: ");
define("modifier_une","Modifier une");
define("sous","sous");
define("text_famille","famille :");
define("Modifer","Modifier");
define("Annuler","Annuler");

//adminmenu.php
define("t_Gestion_Menus","Gestion des Menus");
define("listing_menus","Listing des menus");
define("voir_la_famille","Voir la famille");
define("ajouter_article","Ajouter un article");
define("ref","Ref.");
define("menu","Menu");
define("sous_famille","Sous Famille");
define("prix","Prix");
define("modif","Modif.");
define("opt","Opt.");
define("suppr","Suppr.");
define("text_produits_suvis_faut","Les produits suvis de cet ic&ocirc;nes n'apparaitront pas sur le site. Il faut leur attribuer une sous-famille. ");
define("champ_obli","*Champ obligatoire");
define("code","Code:");
define("Designation","Designation :");
define("text_prix","Prix :");
define("text_commande","Recommand&eacute; :");
define("recommande","Recommand&eacute;");
define("text_image","Image :");
define("format_fichier","Format du fichier: .jpg .gif .png");
define("voir_image","Voir l'image");
define("supp_image","Supprimer l'image");//si change ici, il faut changer savemenu.php and savecadeau.php
define("Composition","Composition :");
define("Valider_sans_option","Valider sans option");//si change ici, il faut changer savemenu.php and savecadeau.php
define("valider_ajouter_option","Valider et ajouter des options");//si change ici, il faut changer savemenu.php and savecadeau.php

define("max_symbols","max 100 symbols");
define("close_me","Fermer！");
define("more_infos","Compléter plus'infos");
define("catalogue","CATALOGUE");
define("table_ip","Table d'adresse d'ip");
define("m_edit","Modif.");
define("m_del","Suppr.");

//sortmenu.php
define("t_ranger_menus","Ranger des menus");
define("choi_famille","Choisissez la famille:");
define("Suivant","Suivant");

//admincadeau.php
define("t_gestion_cadeaux","Gestion des Cadeaux");
define("listing_cadeaux","Listing des Cadeaux");
define("Cadeau","Cadeau");
define("offert_partir","Offert &agrave; partir de");
define("Modif","Modif.");
define("page","&nbsp;&nbsp;Pages:&nbsp;&nbsp;");
define("text_offert_partir","Offert &agrave; partir de :");
define("text_systa1","Note aux utilisateurs de SYSTA Resto&reg; :");
define("text_systa2","Dans le logiciels, pensez &agrave; ajouter les cadeaux dans la famille Promotion");
define("alert_ch_famille","Choisissez le famille d'abord S.V.P!");
define("alert_rem_code","Rempliissez le code du menu S.V.P!");
define("alert_reserver","Le code `0` est reservé au programme, veuillez en choisir un autre SVP");
define("alert_fdelite","Le code `FIDELITE` est reservé au points de fidélité, veuillez en choisir un autre SVP");
define("alert_remplisser_nom","Rempliissez le nom du menu  S.V.P!");
define("alert_rem_prix","Rempliissez le prix du S.V.P!");
define("alert_valeur_prix","La valeur du prix illegal!");

define("alert_remise","Rempliissez la remise!");

//commandes.php
define("t_voir_com","Voir les commandes");
define("Commandes","Commandes");
define("detail_com","D&eacute;tail de la commande #");
define("com_client","Client :");
define("com_livraison","Livraison :");
define("com_obser","Observations :");
define("com_commande","Commande :");
define("com_designation","Designation");
define("Prix_Unitaire","Prix Unitaire");
define("Qte","Qte");
define("com_montant","Montant");
define("com_total","TOTAL :");
define("commission_ht","COMMISSION HT POUR CETTE COMMANDE :");
define("batiment","Batiment :");
define("interphone"," - Interphone : ");
define("Escalier"," - Escalier : ");
define("Porte"," - Porte  : ");
define("descrip"," - Description : ");
define("com_code","Code : ");
define("com_etage","Etage : ");
define("com_poste","Poste : ");
define("frais_prix","Frais TTC : ");

//bilan.php
define("t_bilan","Bilan des commandes");
define("bilan_semaine","Semaine du ");
define("bilan_au","au");
define("Mois_de","Mois de ");
define("bilan_annee","Ann&eacute;e ");
define("bilan_aujourdui","Aujourd'hui");
define("bi_lun","Lun");
define("bi_mar","Mar");
define("bi_mer","Mer");
define("bi_jeu","Jeu");
define("bi_ven","Ven");
define("bi_sam","Sam");
define("bi_dim","Dim");
define("bilan_cliquer","Cliquez sur un jour pour avoir le d&eacute;tail ");
define("bilan_commission_mois","&nbsp;&nbsp;Commission pour le mois ");
define("bilan_commission_frais","&nbsp;&nbsp;Frais des clients ");

//bilan_imprim.php
define("commission","Commission :");
define("frais_client","Frais de client :");
define("commission_total","Commission total :");

//menu
define("language","LANGAGE:français");
define("m_home","HOME");
define("m_acceuil","ACCUEIL");
define("m_quitter","QUITTER");
define("m_confi","CONFIGURATION");
define("m_lieux","Lieux de livraison & Prix minimux");
define("m_horaire_liv","Horaires livraison");
define("m_pro_fide","Programme de fid&eacute;lit&eacute;");
define("m_design","Design du site");
define("m_famille","LES FAMILLES");
define("m_menus","LES MENUS");
define("m_gestion_menu","Gestion des Menus");
define("m_ranger","Ranger les Menus");
define("m_sugg_menu","Suggestions Menus");
define("m_cadeaux","CADEAUX");
define("m_commandes","COMMANDES");
define("m_tous_com","Voir les commandes");
define("m_les_com","Tous les commandes");
define("m_bilan_com","Bilan des commandes");
define("m_passe","MOT DE PASSE");

define("m_peripherique","Les périphériques_ip");
define("m_tablette_ip","Gestion de tablette_ip");
define("m_printer","Gestion d'imprimante_ip");

define("m_admin_gestion","ADMIN");
define("m_serveur_gestion","Gestion de serveur");

define("m_commande","Gestion des Cmd");
define("m_article_compte","Article du Compte et Cmd");

//alerte.php
define("en_attente_de","En attente de");
define("nouvelle_commande","commande");
define("alerte_nouvelle","nouvelle");
define("alerte_com","commande");
define("alerte_com1","commande");
define("alerte_livrer","&agrave; livrer aujourd'hui");

//modifypassword.php
define("t_modi_password","Modifier mot de passe");
define("modi_mot","Modifier le mot de passe");
define("mot_actuellement","Mot de passe actuel :");
define("modi_nouveau","Mot de passe nouveau :");
define("modi_confir","Confirmation :");
define("Vider","Vider");
define("text_modify1","Remplir votre mot de passe actuel!");
define("text_modify2","Entrer le nouveau mot de passe!");
define("text_modify3","les deux mot de passe pas pareil!!");
define("text_modify4","Vous avez modifié bien. Rempliissez un différent S.V.P!!");
define("mot_de_passe_note", "6-20 caractères avec Lettre et Chiffre ");

define("modif_passe_sys","Modification de mot de passe pour le système de gestion");
define("modif_passe_serve","Modification de mot de passe pour le déverrouillage de tablette");

define("nom_actuellement","Nom du compte ADMIN: ");
define("show_msg","Découvrir du mot de passe");

//savepassword.php
define("s_retour","Retour&nbsp;&nbsp;&nbsp;&nbsp;");
define("s_quitter","&nbsp;&nbsp;&nbsp;&nbsp;Quitter");

//Commentaire.php
define("t_commentaire","Commentaire");
define("c_paroles","Paroles de gourmets...");
define("c_premier_pre","[ Premier ]&nbsp;&nbsp;&nbsp;[ Pr&eacute;c&eacute;dent ]");
define("c_suivant_der","&nbsp;&nbsp;&nbsp;[ Suivant ]&nbsp;&nbsp;&nbsp;[ Derniere ]");
define("c_pages","&nbsp;&nbsp;Pages:&nbsp;&nbsp;");
define("c_cui","Cuisine :");
define("c_accu","/ Accueil :");
define("c_deacute","/ D&eacute;cor :");

//replycommentaire.php
define("reply_comm","Repondre au commentaire");
define("reply_con","Contenu:");
define("reply_vali","Valider");

//promotion.php
define("p_pro","Promotion");

//contact.php
define("contactez_nous","Contactez nous");

//emploi.php
define("info_emploi","Information d'emploi");
define("info_titre","Titre");
define("info_date","Date");
define("info_sup","Suprimer");
define("info_nou_emploi","Nouveau emploi");

//modifypromotion.php
define("pro_sujet","Sujet:");




//newcmd.php 
define("t_nouvelle_com","Nouvelle commande");
define("new_com","Nouvelles commandes");
define("new_retour","Retour");
define("new_detail_de_com","D&eacute;tail de la commande #");
define("new_client","Client :");
define("new_liv","Livraison :");
define("new_obser","Observations :");
define("new_commande","Commande :");
define("new_nou_com","Les Nouvelles Commandes");

//alert
define("alter_sortmenu_su","Supprimer le famille?");
define("alter_adminmenu_su","Supprimer le menu ?");
define("alter_adminmenu_image","Supprimer l'image ?");
define("alter_adminfamille_su","Voulez-vous vraiment supprimer cette famille ?");
define("alter_fidelite_atten",'                                                            ATTENTION !!!\n\nSi vous désactivez les points de fidélité les clients vont perdre tous les points qu\'ils ont accumulé !\nVoulez-vous vraiment désactiver les points de fidélité ?');
define("alter_supp_menu","Supprimer le menu?");
define("alter_supp_horaire","Voulez vous vraiment supprimer cet horaire ?");
define("alter_sup_fam","Supprimer le famille?");
define("alter_rem_fam","Remplissez le nom de famille, S.V.P!");


//adminoptiions.php
define("t_option_gestion","Gestion des options");
define("option_ajouter_op","Ajouter une option");
define("option_nom","Nom de l'option :");
define("option_choix","Ajouter un choix");
define("option_op","Pour l'option");
define("option_element_ajou","Choix de l'&eacute;l&eacute;ment &agrave; ajouter");
define("option_choisi","Choisi : ");
define("option_supp_prix","Suppl&eacute;ment de prix");
define("option_modi","Modifier une option");
define("option_nom_option","Nom de l'option");
define("option_modi_choix","Modifier un choix");
define("op_pour","Options pour : ");
define("op_option","Options");
define("op_modi_op","Modifier");
define("op_supp_su","Supprimer");
define("text_option_alert1","Supprimer cette option et tous les choix associés ?");
define("text_option_alert2","Supprimer ce choix ?");

//choix_element.php
define("t_choix","Choisir un &eacute;lement");
define("choix_ele_ajou","Choissisez un &eacute;lement &agrave; ajouter ");
define("choix_la_famille","Voir la famille");
define("choix_ref","Ref.");
define("choix_menu","Menu");
define("choix_sous_fam","Sous Famille");
define("choix_select","S&eacute;l&eacute;ctionner");

//bottom.php
define("bot_why","Why choose us");
define("bot_Contact","Contact");

define("b_about_us","About us");
define("b_business","E-business");
define("b_service","Services & Products");
define("b_liens","Liens");
define("b_join","Join us");
define("b_Contact","Contact");




//---------------------------------------------------------------------------------
//new for Rervation

//menu
define("r_info_resto","INFO RESTO");
define("r_presentation","Gestion Pr&eacute;sentation");
define("r_distinction","Gestion Distinctions");
define("r_image","Gestion Image");
define("r_info_pra","Gestion Info Pratiques");
define("r_avis","Voir avis des clients");
define("r_gestion_service","Gestion d'information spécialité");
define("r_reservation","Tous les r&eacute;servation");
define("r_voir_reser","Rapport de r&eacute;servation");
define("r_voir_reser_right","Voir les r&eacute;servation");
define("r_horaire","Horaire de R&eacute;servation");
define("r_gestion_reser1","RESERVATION");
define("r_gestion_reser","Gestion r&eacute;servation");
define("r_horaire_temp","HORAIRE");


//presentation.php 
define("r_t_presentation","Gestion Pr&eacute;sentation");
define("r_Presentation","Pr&eacute;sentation");
define("r_modifier","Modifier");
define("r_valider","Valider");
define("r_ecore","Reste:&nbsp;&nbsp;");
define("r_lettres","lettres&nbsp;&nbsp;");

//info_pratiaue.php
define("r_t_info_pra","Gestion Info Pratiques");
define("r_prix","Prix:&nbsp;&nbsp;");
define("r_comment","Comment venir:&nbsp;&nbsp;");
define("r_paiements","Paiement accept&eacute;:&nbsp;&nbsp;");
define("r_service","Services:&nbsp;&nbsp;");
define("r_Groupes","Groupes:&nbsp;&nbsp;");
define("r_infos","Autres Infos:&nbsp;&nbsp;");
define("r_mots","Mots Cl&eacute;:&nbsp;&nbsp;");
define("r_ecore_pra","Reste:&nbsp;&nbsp;");

//adminimages.php
define("r_t_image","Image du restaurant");
define("r_choisi_image","Choisissez l'image:( format en");
define("r_type_image",".gif .jpg .png");
define("r_kuohao",")");
define("r_valider_image","UpLoad");
define("r_delete_image","Delete");

//avis.php
define("r_avis_t","Les avis des clients");
define("r_t_avis","&nbsp;&nbsp;&nbsp;Les avis des clients");
define("r_retrouvez_text","Retrouvez-ici la moyenne des notes qui ont &eacute;t&eacute; attribu&eacute;es par les clients du restaurant");
define("r_Rien_Avis","&nbsp;&nbsp;&nbsp;Rien Avis");
define("r_rien","Rien Avis");
define("r_note_glo","Notes globale");
define("r_accueil_ser","Accueil&nbsp;/&nbsp;Service");
define("r_qualite_met","Qualit&eacute; mets");
define("r_cadre_ambi","Cadre / Ambiance");
define("r_Proprete","Propret&eacute;");
define("r_Recommandation","Recommandation");
define("r_rapport","Rapport qualit&eacute; / prix");

//reser_commandes.php
define("r_reser_comm","R&eacute;servation");
define("r_detail_reser","D&eacute;tail de la r&eacute;servation #");
define("r_reser_time","R&eacute;servation pass&eacute; :");
define("r_arriver_time","Heure d'arriver :");
define("r_personne","Nombres des personnes :");
define("r_num_per","Nombres des personnes");
define("r_ambiance","Ambiance");
define("r_ambiance_t","Ambiance :");
define("r_ordre_valider","Accepter");
define("r_ordre_refuser","Refuser");
define("r_state","&Eacute;tat :");
define("r_states","&Eacute;tat");

//reser_alerte.php
define("nouvelle_reservation","nouvelle r&eacute;servation");
define("nouvelle_reser","r&eacute;servation");
define("alerte_rer","r&eacute;servation");
define("alerte_rer_deja","r&eacute;serv&eacute; aujourd'hui");


//newreser.php
define("r_t_nou_reser","Nouvelle r&eacute;servation");

//voirreservation.php
define("r_date","Date");
define("r_midi","Places r&eacute;serv&eacute; dans midi");
define("r_soir","Places r&eacute;serv&eacute; dans soir");
define("r_res_soir","Reste places soir");
define("r_res_midi","Reste places midi");
define("r_t_voir_reser","Voir R&eacute;servation");
define("r_max_place","Maximum places dans le Resturant :");
define("r_midi_d","Attendre Validation dans le midi");
define("r_soir_d","Attendre Validation dans le soir");

//reser_right.php
define("les_reser_liv_aujourdhui","Les r&eacute;servation r&eacute;serv&eacute; par aujourd'hui");
define("les_reser_liv_demain","Les r&eacute;servation r&eacute;serv&eacute; par demain");
define("les_der_reser_passe","Les dernières r&eacute;servation passées");

//reser_horaire.php
define("r_reser_semaine","Semaine");
define("r_reser_tim","Horaire");
define("r_reser_type","Type");
define("r_reser_modi","Modifier");
define("r_reser_delete","Delete");
define("r_t_horaire","Horaire de R&eacute;servation");
define("r_reser_begintime","Heure");
define("r_format_time","Format");
define("r_reser_desc","Mise en ordre");
define("r_accep_horaire","Acception de horaire de r&eacute;servation&nbsp;&nbsp;&nbsp;&nbsp;");
define("r_ajouter","Ajouter");
define("r_ajouter_new","Ajouter une nouvelle horaire");

//gestion_service.php
define("r_gs_service","Services");
define("r_gs_guide","Guide:&nbsp;&nbsp;");
define("r_gs_group","Groups:&nbsp;&nbsp;");
define("r_gs_originalite","Originalite:&nbsp;&nbsp;");
define("r_gs_mots_cles","Mots Cles:&nbsp;&nbsp;");

//sugg_menu.php
define("add","Ajouter"); 
define("suggestion_menu", "Suggerer");

define("parcourir_menus","Aperçu des menus");

//main_page_modif.php
define("m_page_modif","Gestion page d'accueil");

//ling change for list 13/01/2014
//adminfamille.php
define("famille_list","liste");

//sortemenu
define("choix_menus","Choisir un menu");

//top_left_nav
define("word_welcome","Bienvenue");
define("word_help","Aide");

//ip button
define("submit_ajouter_ip","AjouterIP");
define("submit_modifier_ip","ModidierIP");
define("reset_input","reset_input");


//ip ajouter-modifier-delete
define("ajout_table_ip","ajout_table_ip");
define("adresse_ip","adresse_ip");
define("table_Number","table_Number");
define("modif_table_ip","modif_table_ip");
define("delete_table_ip","delete_table_ip");

/*
define("confirm_ajout_table_ip","confirm_ajout");
define("confirm_modif_table_ip","confirm_modif");
*/

//box_menu
define("oui","OUI");
define("non","NON");
define("tva_alc","tva_alc");

define("menu_midi","Menu de MIDI");
define("menu_normale","Menu normal");

define("remise","Remise");

define("image_menu","Image");
define("text_image_path","Image path");

define("mot_cle","Mot-clé");
define("chercher","Chercher");

define("modifier_horaire","Modifier l'horaire");
define("horaire_midi_ou_soir","Horaire du menu(midi ou soir)");
define("Horaire_actuel","Horaire actuel: ");
define("Horaire_desire","Horaire désiré: ");
define("alert_valeur_horaire","L'horaire ne doit pas être null !!!");

//index.php
define("compte_passe","Votre compte et mot de passe");
define("user_nom","Nom d'administrateur");
define("mot_pass","Mot de passe");
define("Valider","Valider");
define("Annuler","Annuler");

define("remp_nom","Remplissez votre nom d'utilisateur S.V.P!");
define("remp_mot","Remplissez votre mot de passe!");


//adminfamille.php
define("alter_adminfamille_mo","Voulez-vous vraiment modifier cette famille ?");

//ajouter_ip_printer.php
define("ajout_printer_ip","ajout_nouveau_imprimante_ip");
define("nouveau_printer_ip","Nouveau IP d'imprimante");
define("printer_Name","Nom d'imprimante");
define("modif_printer_ip","modif_imprimante_ip");
define("delete_printer_ip","delete_imprimante_ip");
define("num_cmd_imp","num_cmd_imp");

define("alert_printer_name","Rempliissez le nom d'imprimante S.V.P!");
define("alert_adresse_ip","Rempliissez l'IP d'imprimante S.V.P!");
define("alert_num_cmd1","Rempliissez le numéro d'imprimante aux commandes S.V.P!");
define("alert_num_cmd2","Le numéro d'imprimante aux commandes est commencé depuis 1. Rempliissez un autre chiffre S.V.P !");

define("alert_format_printip","Le format d'ip est incorrect. Rempliissez un nouveau S.V.P !");

//sortemenu_2eme.php
define("num_serie","num de série");

//ajouertableip.php modifiertableip.php
define("alert_adresse_padip","Rempliissez l'IP de la distribution S.V.P !");
define("alert_format_padip","Le format d'ip est incorrect. Rempliissez un nouveau S.V.P !");
define("alert_table_number","Rempliissez le numéro de la table S.V.P !");







/************************ recette ********************************/
// LANGUE FRANCAISE

// LANGUE FRANCAISE

define("montant","Montant");
define("datecmd","Date");
define("cash","Cash");
define("cheque","Ch&egrave;que");
define("tresto","Ticket restaurant");
define("cb","Carte bleue");
define("type","Type");
define("details","Details");
define("modifier","Modifier");
define("supprimer","Supprimer");

// Mois
define("JAN","Janvier");
define("FEV","F&eacute;vrier");
define("MAR","Mars");
define("AVR","Avril");
define("MAI","Mai");
define("JUI","Juin");
define("JUY","Juillet");
define("AOU","Ao&ucirc;t");
define("SEP","Septembre");
define("OCT","Octobre");
define("NOV","Novembre");
define("DEC","D&eacute;cembre");

//semaine
define("Lun","Lun");
define("Mar","Mar");
define("Mer","Mer");
define("Jeu","Jeu");
define("Ven","Ven");
define("Sam","Sam");
define("Dim","Dim");

//c_index.php
define("commd","Commandes du");
define("total","TOTAL");
define("ajout_commd","Ajouter une commande");
define("m_today","Aujourd'hui");
define("day_info","Cliquez sur un jour pour avoir le d&eacute;tail");

define("statiq_j","Statistique journalière de");
define("statiq_m","Statistique mensuel de");
define("out_excel","Exporter un EXCEL");

//c_new_cmd.php
define("new_article","Ajouter un nouveau article");
define("new_cmd","Nouvelle commande");
define("button_ajout","Ajouter");
define("selectionner","S&eacute;l&eacute;ctionner");
define("mode_distri","Mode de distribution : ");
define("sur_place","Sur Place");
define("emporter","A emporter");
define("livraison","Livraison");

define("temps_distri","Temps de distribution : ");
define("choix_ajout","Choissisez un &eacute;lement &agrave; ajouter ");

define("votre_choix","Votre choix ");
define("prix_uni","Prix unitaire ");
define("quantite","Quantiti&eacute; ");

//c_details_cmd
define("m_comd","Commande");
define("m_detail","D&eacute;tails");
define("m_ajout","Ajouter un article");
define("m_articl_suprri","L'article a bien &eacute;t&eacute; supprim&eacute;");
define("Code","Code");
define("Nom","Nom");

//c_new_article.php
define("old_cmd","Anciennes commandes");
define("addition","Addition");
define("autre_article","Ajouter un autre article");
define("termi","Terminer la commande");

//c_modif_cmd.php
define("reste","Reste du");
define("modif_commd","Modification de la commande");
define("Terminer","Terminer");
define("Modifier","Modifier");

//c_modif_article.php
define("modif_article","Modification d'un article");

/*********** c_details_cmd  ************************/
define("delete_article", "Supprimer ce article");

?>