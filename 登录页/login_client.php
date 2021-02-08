<html>
<head> 
<meta http-equiv="Content-Type" content="text/html; charset=gb2312"> 
<meta name="GENERATOR" content="Microsoft FrontPage 4.0"> 
<meta name="ProgId" content="FrontPage.Editor.Document"> 
<title>New Page 2</title> 
</head>
<style>
body{
	width:1000px;
	height:600px;
	margin-left:150px;
	margin-top:100px;
}

</style>

<script> 
window.onload = function(){ 
 var iBase = { 
  Id: function(name){ 
   return document.getElementById(name); 
  }, 
  
  SetOpacity: function(ev, v){ 
   ev.filters ? ev.style.filter = 'alpha(opacity=' + v + ')' : ev.style.opacity = v / 100; 
  } 
 } 

 function fadeIn(elem, speed, opacity){ 
 
  speedspeed = speed || 20; 
  opacityopacity = opacity || 100; 
  
  elem.style.display = 'block'; 
  iBase.SetOpacity(elem, 0); 
  
  var val = 0; 
  
  (function(){ 
   iBase.SetOpacity(elem, val); 
   val += 5; 
   if (val <= opacity) { 
    setTimeout(arguments.callee, speed) 
   } 
  })(); 
 }  
   
 var btns = iBase.Id('box_client').getElementsByTagName('TABLE'); 
   
 btns[0].onclick = function(){ 
  fadeIn(iBase.Id('fadeIn')); 
 } 
  
} 
</script>
<body>

<P align=center>
<TABLE id="tab_enter" style="background:url(images/flowers.png) no-repeat top center; " cellPadding=0 border=0>
<TBODY>
<TR><TD>
<div class="box_clients" id="box_client" style="margin-left:100px; margin-top:50px; z-index:100; ">
	<div class="box_infos" id="box_info" style="margin-left:200px; ">
		<div class="box_infos1" style="position:relative;">
		<img src="images/num_table.png" style="height:30px; width:150px;"/ >
		<img src="images/dialog_box.png" style="height:25px; width:60px; position:absolute; margin-left:7px;"/>
		<div class="#" style="text-align:center; position:absolute;  background:none; height:18px; width:55px; border: none; margin-bottom:2px"><span><strong></strong></span></div>
		</div>
		<div class="box_infos2" style="position:relative; margin-top:10px;">
		<img src="images/nb_client.png" style="height:30px; width:150px;"/>
		<img src="images/dialog_box.png" style="height:25px; width:60px; position:absolute; margin-left:7px; "/>
		<input type="text" class="#" style="text-align:center; position:absolute; margin-left:7px; margin-top:5px; background:none; height:18px; width:55px; border: none; margin-bottom:2px" />
		</div>
		<div style="margin-top:20px; height:90px; width:90px; position:absolute;">
		<input type="image" src="images/enter.png" style=" height:80px; width:80px;" onClick="document.forms(0).sbmit();return false;" > 
		</div>
	</div>
	<div style="margin-top:-125px;">
	<EMBED align="right" src="fla/30.swf" style="z-index:2; overflow:hidden; margin-top:50px;" width="950px" height="480px" type="application/x-shockwave-flash" wmode="transparent" quality="high">
	</div>
</div>

</TD></TR>

</TBODY>
</TABLE>
</P>

</body>
</html>

