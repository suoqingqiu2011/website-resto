<?php

/**************************** FONCTIONS POUR L'URL REWRITTING **************************************/
function id_to_url_info (){
	$suffixe = '.html';							
	$caracteres = 50;
	$car_speciaux = array( 'À','Á','Â','Ã','Ä','Å','Æ','à','á','â','ã','ä','å','æ','È','É','Ê','Ë','è','é','ê','ë','Ì','Í','Î','Ï','ì','í','î','ï','Ò','Ó','Ô','Õ','Ö','Ø','ò','ó','ô','õ','ö','ø','Ù','Ú','Û','Ü','ù','ú','û','ü','ß','Ç','ç','Ð','ð','Ñ','ñ','Þ','þ','Ý' );
	$car_normaux  = array( 'A','A','A','A','A','A','A','a','a','a','a','a','a','a','E','E','E','E','e','e','e','e','I','I','I','I','i','i','i','i','O','O','O','O','O','O','o','o','o','o','o','o','U','U','U','U','u','u','u','u','B','C','c','D','d','N','n','P','p','Y' );
	return array( $suffixe, $caracteres, $car_speciaux, $car_normaux );
};

function id_to_url ($id,$cat,$nme,$type=''){
	global $T_infos, $PMA_infos,$rueresto_infos;
	$rueresto_infos = "rueresto";
	//if ( $PMA_infos['url_rewritting'] ){
	list( $suffixe, $caracteres, $car_speciaux, $car_normaux ) = id_to_url_info();
	$url = substr( eregi_replace( "\-$", '', eregi_replace( "\-+", '-', strtolower( eregi_replace( "[^A-Za-z0-9]", '-', str_replace($car_speciaux, $car_normaux, $nme) ) ) ) ), 0, $caracteres );
	$url = "$rueresto_infos-$url-livraison-a-domicile-$id-$cat$suffixe";
	return $url;
	//}else{
	//return $page==1 ? "menu.php?familleID=$id" : "menu.php?familleID=$id&page=$page";
	//return $page==1 ? "menu.php?familleID=$id&page=$page" : "menu.php?familleID=$id&page=$page";
	//};
}

function id_to_url_menu ($id,$nme){
	$rueresto_infos = "rueresto";
	list( $suffixe, $caracteres, $car_speciaux, $car_normaux ) = id_to_url_info();
	$url = substr( eregi_replace( "\-$", '', eregi_replace( "\-+", '-', strtolower( eregi_replace( "[^A-Za-z0-9]", '-', str_replace($car_speciaux, $car_normaux, $nme) ) ) ) ), 0, $caracteres );
	$url = "$rueresto_infos-$url-livraison-a-domicile-$id$suffixe";
	return $url;
}

function id_to_url_s_menu ($id,$id_s,$nme){
	$rueresto_infos = "rueresto";
	list( $suffixe, $caracteres, $car_speciaux, $car_normaux ) = id_to_url_info();
	$url = substr( eregi_replace( "\-$", '', eregi_replace( "\-+", '-', strtolower( eregi_replace( "[^A-Za-z0-9]", '-', str_replace($car_speciaux, $car_normaux, $nme) ) ) ) ), 0, $caracteres );
	$url = "$rueresto_infos-$url-livraison-a-domicile-$id-$id_s$suffixe";
	return $url;
}

?>