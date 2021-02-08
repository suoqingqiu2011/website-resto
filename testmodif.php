
<head>
<title><? print t_Gestion_Menus; ?></title>
	<link rel="stylesheet" href="css1/style.css" type="text/css" media="all" />
	<link rel="stylesheet" type="text/css" href="css1/component.css" />
	<link rel="stylesheet" type="text/css" href="css1/zzsc.css" />
	<link rel="stylesheet" type="text/css" href="css1/style1.css" />
	
<script src="js1/classie.js"></script>
<script src="js1/modalEffects.js"></script>
<script src="js1/jquery.min.js"></script>

</head>

<body>
 <div>
 <a class="add-button" data-modal="modal-1" onclick="window.location.href='adminmenu.php?MenuID=<?php print($myrow[MenuID]);?>&MenuTypeID=<? echo $FamilleID;?>&SousFamilleID=<? echo $myrow[SousFamilleID]; ?>';" href="javascript:void(0);" ><img src="css1/images/edit.gif" width="16" height="16" border="0"/>modif</a></div>
<div class="md-overlay"></div>
<!--<button class="add-button" data-modal="modal-1" onclick="pupopen()" style="margin: 5px;height: 30px; width: 180px;">button</button>-->

<div class="md-modal md-effect-1" id="modal-1" style="height:530px; overflow:auto;">
		<div class="md-content">
			<?php include ("form_info.php"); ?>			
		</div>
</div> 
</body>
