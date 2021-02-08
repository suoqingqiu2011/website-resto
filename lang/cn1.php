<?
// NOTE : Pour ajouter une langue, ajouter un fichier tel que celui-ci avec les traductions et rajouter le nom de la langue dans liste.php
// ***************** ATTENTION ********************
// Certains textes, specialements les textes sur les boutons ne doivent pas être trop longs pour ne pas dépasser et ruiner la mise en page
//Les fichiers de langues doivent ABSOLUMENT être sauvegardés au format UTF-8 sans BOM
// **************************************************

//  CN - Chinois


//right.php
define("voir_tous_commandes","查看订单");
define("Bienvenue","欢迎");
define("les_com_liv_aujourdhui","今日订单");
define("les_com_liv_demain","明日订单");
define("les_der_com_passe","近期订单");
define("com_passe_le","下单时间 :");
define("com_a_liv_ajou_a","今日送单时间 :");
define("client","顾客");
define("montant","金额");
define("detail","详细");
define("com_a_liv_demain","明日送单时间 :");
define("com_a_liv_le","送单时间 :");

//Lieux de livraison
define("t_lieux_livraison","送餐地区及最低价格");
define("lieux_de_livraison","送餐地点");
define("rechercher_une_ville","查找一个地区 : 模糊查找");
define("Chercher","查询");
define("resultat_de_recherche","查询结果 ");
define("prix_minimum_pour_ville","此地区的最低送餐价格* :");
define("euros","&euro;uros");
define("centimes","centimes");
define("Ajouter","增加");
define("ajouter_une_ville","增加一个地区 ");
define("code_postal","区号");
define("Ville","地区");
define("prix_mini","最低价格");
define("choisir_un_prix_mini","对");
define("toutes","所有");
define("les_villes","地区选择一个最低价格 ");
define("Modifier","修改");
define("text_lieux","* 顾客不能完成一个低于此最低送餐价格的订单。您可以不设置此选项，则表示没有最低送餐价格限制。");
define("t_cherche","cherche");

//horaire.php
define("t_horaires","营业时间管理");
define("horaires_des_livraisons","营业时间管理");
define("hor_ouverture_habituelle","营业时间 [ ");
define("lettre_horaire"," ]");
define("de","从");
define("a","到");
define("fer_exceptionnelle","歇业时间 [ ");
define("fer_exceptionnellet","歇业时间 ");
define("du","从");
define("au","到");

//horaire-normal.php
define("t_horaire_normal","增加送餐时间");
define("hor_ouver_habi_liv","送餐时间");
define("text_hor_normal","开始时间必须早于结束时间.");
define("ajouter_un_service","增加一个服务时间 :");
define("jour1","周一");
define("jour2","周二");
define("jour3","周三");
define("jour4","周四");
define("jour5","周五");
define("jour6","周六");
define("jour7","周日");
define("min_a","min - 到");
define("Retour","返回");

//Horaire-exception.php
define("Horaire_exception","例外时间");
define("fer_exceptionnelle","例外歇业时间");
define("text_hor_exception","开始时间必须早于结束时间.");
define("Janvier","一月");
define("Fevrier","二月");
define("Mars","三月");
define("Avril","四月");
define("Mai","五月");
define("Juin","六月");
define("Juillet","七月");
define("Aout","八月");
define("Septembre","九月");
define("Octobre","十月");
define("Novembre","十一月");
define("Decembre","十二月");
define("grand_du","从");
define("grand_au","到");

//fidélité.php
define("t_fidelite","积分管理");
define("point_fidelite","积分管理");
define("pour_gagner_points","获得积分 : ");
define("quand_client_depense","当顾客消费");
define("euro_il_gagne","&euro;uros, 他将获得");
define("points","积分.");
define("pour_depenser_points","消费积分 :");
define("client_doit_depenser","顾客可使用");
define("point_pour_avoir_reduction","积分折抵");
define("euros","&euro;uros.");
define("client_ne_utiliser","每个订单顾客只能使用一张优惠卷");
define("client_utiliser","每个订单顾客可以使用多张优惠卷");
define("text_somme","La somme totale des bons de r&eacute;duction utilis&eacute;s sera toujours au plus ou &eacute;gale au prix minimum de la commande.");
define("desactiver_points","取消积分设置");
define("Valider","确定");

//adminfamille.php
define("t_Gestion_Familles","菜单类别管理");
define("listing_familles","类别列表");
define("Famille","类别");
define("Modifier","修改");
define("Supprimer","删除");
define("Up","Up");
define("ajou_famille","增加一个类别:");
define("nom","名称:");
define("cacher_famille","隐藏类别");
define("ajouter_sous_famille","增加子类别 :");
define("pour_famille","类别 : ");
define("modifier_une","修改一个");
define("sous","子");
define("text_famille","类别 :");
define("Modifer","修改");
define("Annuler","取消");

//adminmenu.php
define("t_Gestion_Menus","菜单管理");
define("listing_menus","菜单列表");
define("voir_la_famille","查看类别");
define("ajouter_article","增加一个菜单");
define("ref","号");
define("menu","菜单");
define("sous_famille","子类别");
define("prix","价格");
define("modif","修改"); 
define("opt","选项");
define("suppr","删除");
define("text_produits_suvis_faut","图标上的产品没有出现在网站上. 必须给它们配置一个附属类别.");
define("champ_obli","*必填项");
define("code","代码:");
define("Designation","名称 :");
define("text_prix","价格 :");
define("text_commande","推荐菜 :");
define("recommande","推荐");
define("text_image","图片 :");
define("format_fichier","图片格式: .jpg .gif .png");
define("voir_image","查看图片");
define("supp_image","删除图片");//si change ici, il faut changer savemenu.php and savecadeau.php
define("Composition","材料成份 :");
define("Valider_sans_option","确定并不添加选项");//si change ici, il faut changer savemenu.php and savecadeau.php
define("valider_ajouter_option","确定并添加选项");//si change ici, il faut changer savemenu.php and savecadeau.php

define("max_symbols","最多100个字");
define("close_me","关闭！");
define("more_infos","补充更多信息");
define("catalogue","目录");
define("table_ip","IP地址");
define("m_edit","修改");
define("m_del","删除");


//sortmenu.php
define("t_ranger_menus","菜单排序");
define("choi_famille","选择类别:");
define("Suivant","下一步");

//admincadeau.php
define("t_gestion_cadeaux","礼品管理");
define("listing_cadeaux","礼品列表");
define("Cadeau","礼品");
define("offert_partir","最低赠送价格");
define("Modif","修改");
define("page","&nbsp;&nbsp;页:&nbsp;&nbsp;");
define("text_offert_partir","最低赠送价格 :");
define("text_systa1","Note aux utilisateurs de SYSTA Resto&reg; :");
define("text_systa2","Dans le logiciels, pensez &agrave; ajouter les cadeaux dans la famille Promotion");
define("alert_ch_famille","请先选择一个类别!");
define("alert_rem_code","请输入代码!");
define("alert_reserver","代码 `0` 被程序占用, 请选择其他的代码");
define("alert_fdelite","代码 `FIDELITE` 被程序占用, 请选择其他的代码");
define("alert_remplisser_nom","请输入菜单名称!");
define("alert_rem_prix","请输入价格!");
define("alert_valeur_prix","非法价格!");

define("alert_remise","请输入折扣");


//commandes.php
define("t_voir_com","查看订单");
define("Commandes","订单");
define("detail_com","订单详情 #");
define("com_client","顾客 :");
define("com_livraison","送餐 :");
define("com_obser","备注 :");
define("com_commande","订单 :");
define("com_designation","名称");
define("Prix_Unitaire","单价");
define("Qte","数量");
define("com_montant","金额");
define("com_total","总额 :");
define("commission_ht","订单手续费 HT :");
define("commission","订单手续费 :");
define("batiment","楼 :");
define("interphone"," - 内线电话 : ");
define("Escalier"," - 楼梯 : ");
define("Porte"," - ；门牌  : ");
define("descrip"," - 描述 : ");
define("com_code","密码 : ");
define("com_etage","楼层 : ");
define("com_poste","区号 : ");
define("frais_prix","服务费 TTC : ");

//bilan.php
define("t_bilan","订单汇总分析");
define("bilan_semaine","周 从 ");
define("bilan_au","到");
define("Mois_de","月 从 ");
define("bilan_annee","年 ");
define("bilan_aujourdui","今日");
define("bi_lun","一");
define("bi_mar","二");
define("bi_mer","三");
define("bi_jeu","四");
define("bi_ven","五");
define("bi_sam","六");
define("bi_dim","七");
define("bilan_cliquer","点击某天查看详情 ");
define("bilan_commission_mois","&nbsp;&nbsp;此月手续费 ");
define("bilan_commission_frais","&nbsp;&nbsp;顾客手续费 ");

//bilan_imprim.php
define("commission","手续费 :");
define("frais_client","顾客手续费 :");
define("commission_total","手续费总额 :");

//menu
define("language","当前语言: 中文");
define("m_home","主页");
define("m_acceuil","主界面");
define("m_quitter","退出");
define("m_confi","页面配置管理");
define("m_lieux","送餐地区 & 最低价格");
define("m_horaire_liv","送餐时间");
define("m_pro_fide","积分管理");
define("m_design","网站设计");
define("m_famille","类别管理");
define("m_menus","菜单管理");
define("m_gestion_menu","制定菜单");
define("m_ranger","菜单排序");
define("m_sugg_menu","推荐菜单");
define("m_cadeaux","礼品管理");
define("m_commandes","订单管理");
define("m_tous_com","查看订单");
define("m_les_com","查看所有订单");
define("m_bilan_com","订单汇总");
define("m_passe","密码管理");

define("m_peripherique","外部设备IP地址");
define("m_tablette_ip","平板IP地址管理");
define("m_printer","打印机IP地址管理");

define("m_admin_gestion","登陆密码管理");
define("m_serveur_gestion","服务员解锁管理");

define("m_commande","订餐管理");
define("m_article_compte","账目和订单");

//alerte.php
define("en_attente_de","等待");
define("nouvelle_commande","新订单");
define("alerte_nouvelle","个");
define("alerte_com","个订单");
define("alerte_com1","订单");
define("alerte_livrer","要在今天送达");

//modifypassword.php
define("t_modi_password","修改密码");
define("modi_mot","修改密码");
define("mot_actuellement","当前密码 :");
define("modi_nouveau","新密码 :");
define("modi_confir","确认新密码 :");
define("Vider","清空");
define("text_modify1","请输入当前密码!");
define("text_modify2","请输入新密码!");
define("text_modify3","两次输入不相同，请重新输入!!");
define("text_modify4","您没有进行任何修改.请输入一个不同的!!");
define("mot_de_passe_note", "密码必须为6-20位的字符串,包含字母和数字");

define("msg_modify","密码修改成功!");//question

define("modif_passe_sys","后台管理密码修改");
define("modif_passe_serve","平板桌面解锁密码修改");

define("nom_actuellement","管理者登录名称 : ");
define("show_msg","显示密码");

//savepassword.php
define("s_retour","返回&nbsp;&nbsp;&nbsp;&nbsp;");
define("s_quitter","&nbsp;&nbsp;&nbsp;&nbsp;登出");

//Commentaire.php
define("t_commentaire","评论");
define("c_paroles","品尝者的评论...");
define("c_premier_pre","[ 第一页 ]&nbsp;&nbsp;&nbsp;[ 前页 ]");
define("c_suivant_der","&nbsp;&nbsp;&nbsp;[ 后页 ]&nbsp;&nbsp;&nbsp;[ 最后一页 ]");
define("c_pages","&nbsp;&nbsp;页:&nbsp;&nbsp;");
define("c_cui","厨房 :");
define("c_accu","/ 接待中心 :");
define("c_deacute","/ 环境 :");

//replycommentaire.php
define("reply_comm","回复评论");
define("reply_con","内容:");
define("reply_vali","确定");

//promotion.php
define("p_pro","优惠");

//contact.php
define("contactez_nous","联系我们");

//emploi.php
define("info_emploi","职位信息");
define("info_titre","名称");
define("info_date","时间");
define("info_sup","删除");
define("info_nou_emploi","新职位");

//modifypromotion.php
define("pro_sujet","主题:");

//newcmd.php 
define("t_nouvelle_com","新订单");
define("new_com","新订单");
define("new_retour","返回");
define("new_detail_de_com","订单详情 #");
define("new_client","顾客 :");
define("new_liv","送餐 :");
define("new_obser","备注 :");
define("new_commande","订单 :");
define("new_nou_com","新订单");

//alert
define("alter_sortmenu_su","确定删除类别?");
define("alter_adminmenu_su","确定删除菜单 ?");
define("alter_adminmenu_image","确定删除菜单 ?");
define("alter_adminfamille_su","确定删除类别 ?");
define("alter_fidelite_atten",'                                             注意 !!!\n\n如果您取消了积分设置，顾客将可以使用他积累的所有积分 !\n您确定要取消此积分设置吗 ?');
define("alter_supp_menu","确定删除此列?");
define("alter_supp_horaire","您确定要删除此时间吗 ?");
define("alter_sup_fam","确定删除此类别吗?");
define("alter_rem_fam","请输入类别的名字!");

//adminoptiions.php
define("t_option_gestion","选项管理");
define("option_ajouter_op","增加一个选项");
define("option_nom","选项名称 :");
define("option_choix","增加一个选择");
define("option_op","选项");
define("option_element_ajou","选择一项添加");
define("option_choisi","选择 : ");
define("option_supp_prix","额外价格 :");
define("option_modi","修改选项");
define("option_nom_option","选项名称");
define("option_modi_choix","修改一个选择");
define("op_pour","选项 : ");
define("op_option","选项");
define("op_modi_op","修改");
define("op_supp_su","删除");
define("text_option_alert1","确定删除与此相关联的所有选项吗 ?");
define("text_option_alert2","删除此选择 ?");

//choix_element.php
define("t_choix","选择一项");
define("choix_ele_ajou","选择一项并添加 ");
define("choix_la_famille","查看类别");
define("choix_ref","Ref.");
define("choix_menu","菜单");
define("choix_sous_fam","子类别");
define("choix_select","选择");

//bottom.php
define("bot_why","为什么选择我们");
define("bot_Contact","联系我们");

define("b_about_us","关于我们");
define("b_business","电子商务");
define("b_service","产品及服务");
define("b_liens","友情链接");
define("b_join","加入我们");
define("b_Contact","联系我们");


//---------------------------------------------------------------------------------
//new for Rervation

//menu
define("r_info_resto","信息管理");
define("r_presentation","餐馆介绍管理");
define("r_distinction","Admin Distinctions");
define("r_image","餐馆图片管理");
define("r_info_pra","基本信息管理");
define("r_avis","查看顾客评价");
define("r_gestion_service","特殊属性管理");
define("r_reservation","查看所有订位");
define("r_voir_reser","订位汇总");
define("r_voir_reser_right","查看订位");
define("r_horaire","订位时间管理");
define("r_gestion_reser1","订位管理");
define("r_gestion_reser","订位管理");
define("r_horaire_temp","时间管理");

//presentation.php 
define("r_t_presentation","餐馆介绍管理");
define("r_Presentation","修改餐馆介绍");
define("r_modifier","修改");
define("r_valider","确定");
define("r_ecore","剩余:&nbsp;&nbsp;");
define("r_lettres","字符&nbsp;&nbsp;");

//info_pratiaue.php
define("r_t_info_pra","基本信息管理");
define("r_prix","价格:&nbsp;&nbsp;");
define("r_comment","如何到达:&nbsp;&nbsp;");
define("r_paiements","接受付款方式:&nbsp;&nbsp;");
define("r_service","服务内容:&nbsp;&nbsp;");
define("r_Groupes","组:&nbsp;&nbsp;");
define("r_infos","其他信息:&nbsp;&nbsp;");
define("r_mots","关键字:&nbsp;&nbsp;");
define("r_ecore_pra","剩余字符:&nbsp;&nbsp;");

//gestion_service.php
define("r_gs_service","服务参数管理");
define("r_gs_guide","向导服务参数:&nbsp;&nbsp;");
define("r_gs_group","组类参数管理:&nbsp;&nbsp;");
define("r_gs_originalite","另类服务参数:&nbsp;&nbsp;");
define("r_gs_mots_cles","关键字管理:&nbsp;&nbsp;");


//adminimages.php
define("r_t_image","餐馆图片管理");
define("r_choisi_image","选择一张图片:( 格式");
define("r_type_image",".gif .jpg .png");
define("r_kuohao",")");
define("r_valider_image","上传");
define("r_delete_image","删除");

//avis.php
define("r_avis_t","顾客评价");
define("r_t_avis","&nbsp;&nbsp;&nbsp;顾客评价");
define("r_retrouvez_text","以下是顾客对餐馆的评价");
define("r_Rien_Avis","&nbsp;&nbsp;&nbsp;没有评价");
define("r_rien","没有评价");
define("r_note_glo","总体评分");
define("r_accueil_ser","接待&nbsp;/&nbsp;服务");
define("r_qualite_met","菜肴质量");
define("r_cadre_ambi","环境 / 气氛");
define("r_Proprete","整洁度");
define("r_Recommandation","推荐");
define("r_rapport","性价比");

//reser_commandes.php
define("r_reser_comm","订位管理");
define("r_detail_reser","订位详情 #");
define("r_reser_time","订位时间 :");
define("r_arriver_time","到达时间 :");
define("r_personne","订位数 :");
define("r_num_per","订位数");
define("r_ambiance","餐馆氛围");
define("r_ambiance_t","餐馆氛围 :");
define("r_ordre_valider","接受订位");
define("r_ordre_refuser","拒绝订位");
define("r_state","状态 :");
define("r_states","状态");

//reser_alerte.php
define("nouvelle_reservation","新订位");
define("nouvelle_reser","订位");
define("alerte_rer","订位");
define("alerte_rer_deja","在今天被预订");

//newreser.php
define("r_t_nou_reser","新订位");

//voirreservation.php
define("r_date","日期");
define("r_midi","中午订位数");
define("r_soir","晚上订位数");
define("r_res_soir","晚上剩余位置");
define("r_res_midi","中午剩余位置");
define("r_t_voir_reser","查看订位");
define("r_max_place","最大容纳就餐人数 :");
define("r_midi_d","中午待确定位数");
define("r_soir_d","晚上待确定位数");

//reser_right.php
define("les_reser_liv_aujourdhui","今日到达");
define("les_reser_liv_demain","明日到达");
define("les_der_reser_passe","近期订位");

//reser_horaire.php
define("r_reser_semaine","星期");
define("r_reser_tim","时间");
define("r_reser_type","类型");
define("r_reser_modi","修改");
define("r_reser_delete","删除");
define("r_t_horaire","接受订位时间");
define("r_reser_begintime","时间");
define("r_format_time","格式");
define("r_reser_desc","排序");
define("r_accep_horaire","接受订位时间&nbsp;&nbsp;&nbsp;&nbsp;");
define("r_ajouter","增加");
define("r_ajouter_new","增加一条新的时间");

//sugg_menu.php
define("add","添加");
define("suggestion_menu", "推荐");

define("parcourir_menus","菜单预览");

//main_page_modif.php
define("m_page_modif","主界面管理");

//ling change for list 13/01/2014
//adminfamille.php
define("famille_list","列表形式");

//sortemenu
define("choix_menus","选择一个菜单");

//top_left_nav
define("word_welcome","欢迎");
define("word_help","帮助");

//ip button
define("submit_ajouter_ip","确定添加IP");
define("submit_modifier_ip","确定修改IP");
define("reset_input","重新输入");

//ip ajouter-modifier-delete
define("ajout_table_ip","增加ip地址");
define("adresse_ip","ip地址");
define("table_Number","桌号");
define("modif_table_ip","修改ip地址");
define("delete_table_ip","删除ip地址");
/*
define("confirm_ajout_table_ip","确认增加ip地址");
define("confirm_modif_table_ip","确认修改ip地址");
*/

//box_menu
define("oui","有");
define("non","没有");
define("tva_alc","酒水");

define("menu_midi","中午套餐");
define("menu_normale","普通套餐");

define("remise","折扣");

define("image_menu","图片");
define("text_image_path","图片路径");

define("mot_cle","关键字");
define("chercher","搜索");


//index.php
define("compte_passe","您的账号和密码");
define("user_nom","管理者用户名");
define("mot_pass","密码");
define("Valider","确认");
define("Annuler","取消");

define("remp_nom","请填写您的用户名!");
define("remp_mot","请填写您的密码!");



//adminfamille.php
define("alter_adminfamille_mo","您确定要修改这个类别吗?");

//ajouter_ip_printer.php
define("ajout_printer_ip","添加新的打印机IP");
define("nouveau_printer_ip","新的打印机IP");
define("printer_Name","打印机名称");
define("modif_printer_ip","修改打印机IP");
define("delete_printer_ip","删除打印机IP");
define("num_cmd_imp","预控制打印机编号");

define("alert_printer_name","请填写打印机名称!");
define("alert_adresse_ip","请填写打印机ip地址!");
define("alert_num_cmd1","请填写预控制打印机编号!");
define("alert_num_cmd2","预控制打印机编号设置从1开始。请填写其他数字!");

define("alert_format_printip","您所填写的ip地址格式有误。请重新填写!");

//sortemenu_2eme.php
define("num_serie","序列号码");

//ajouertableip.php modifiertableip.php
define("alert_adresse_padip","请填写分配的ip地址!");
define("alert_format_padip","您所填写的ip地址格式有误。请重新填写!");
define("alert_table_number","请填写桌号!");




/************************ recette ******************************/
// LANGUE FRANCAISE

define("montant","统计");
define("datecmd","日期");
define("cash","现金");
define("cheque","支票");
define("tresto","饭票");
define("cb","银行卡");
define("type","类别");
define("details","详情");
define("modifier","修改");
define("supprimer","删除");

// Mois
define("JAN","一月");
define("FEV","二月");
define("MAR","三月");
define("AVR","四月");
define("MAI","五月");
define("JUI","六月");
define("JUY","七月");
define("AOU","八月");
define("SEP","九月");
define("OCT","十月");
define("NOV","十一月");
define("DEC","十二月");

//semaine
define("Lun","周一");
define("Mar","周二");
define("Mer","周三");
define("Jeu","周四");
define("Ven","周五");
define("Sam","周六");
define("Dim","周日");

//c_index.php
define("commd","订餐日期");
define("total","总计");
define("ajout_commd","添加订单");
define("m_today","今天");
define("day_info","点击日历上的日期查看详情");

define("statiq_j","日统计");
define("statiq_m","月统计");

define("out_excel","导出EXCEL文件");

//c_new_cmd.php
define("new_article","添加新的菜品账单");
define("new_cmd","新的订单");
define("button_ajout","添加");
define("selectionner","选择");
define("mode_distri","发餐方式 : ");
define("sur_place","本店就餐");
define("emporter","打包带走");
define("livraison","外卖送货");

define("temps_distri","出菜时间 : ");
define("choix_ajout","请选择一项添加");

define("votre_choix","您的选择 ");
define("prix_uni","单价 ");
define("quantite","数量 ");

//c_details_cmd
define("m_comd","订餐单");
define("m_detail","详情表");
define("m_ajout","返回增添一项");
define("m_articl_suprri","您选择的这项已删除");

define("Code","菜品编号");
define("Nom","菜名");

//c_new_article.php
define("old_cmd","已添加餐单");
define("addition","目前账单");
define("autre_article","添加另一菜品账单");
define("termi","结束订单");

//c_modif_cmd.php
define("reste","余额");
define("modif_commd","订单修改");
define("Terminer","结束");
define("Modifier","修改");

//c_modif_article.php
define("modif_article","菜单选项修改");

/*********** c_details_cmd  ************************/
define("delete_article", "删除此菜品");

?>