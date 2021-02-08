<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="stylesheet" type="text/css" href="../css1/style1.css">

<?  
  session_start();
  include('../../lang/'.$_SESSION['lang'].'.php');
?>
  
<script language="javascript">
	function mouseover(obj){
		obj.style.color='#B2C931';
		obj.style.textDecoration='underline';					
	}					
	function mouseout(obj){
		obj.style.color='#E0981B';
		obj.style.textDecoration='none';
	}
		function mouseover_b(obj){
		obj.style.fontWeight='bold';
		obj.style.color='#E0981B';					
	}				
	function mouseout_b(obj){
		obj.style.fontWeight='normal';
		obj.style.color='#fff';
	}
</script>
 
<? 
$sql = "select * from gg_systa where `classid`=3 && `Activer`=1 order by `ordre`";
$req = mysql_query($sql) or die(mysql_error());
$rownum=mysql_num_rows($req);
if ($rownum!=0)	{
?>
  
<table align="center" >
<td valign="middle">
		<div id="demo">
		 <div id="indemo">
		  <div id="demo1">
			<?  $sql = "select * from gg_systa where `classid`=3 && `Activer`=1 order by `ordre`";
				$req = mysql_query($sql) or die(mysql_error());
					while($row=mysql_fetch_array($req)){
					  echo "<a href='http://".$row[picurl]."'><img src=\"../../resto/$row[image]\" title=\"$row[title]\" alt=\"$row[title]\" width=\"208\" height=\"148\" border=\"0\"></a>";
					}
			?>
			<!--<a href="#"><img src="pub/crm.jpg" width="208" height="148" border="0" /></a>
			<a href="#"><img src="pub/GCOM.jpg" width="208" height="148" border="0" /></a>	
			<a href="#"><img src="pub/MAG.jpg" width="208" height="148" border="0" /></a>
			<a href="#"><img src="pub/PRESSING.jpg" width="208" height="148" border="0" /></a>					
			<a href="#"><img src="pub/RESTO TACTIL.jpg" width="208" height="148" border="0" /></a>					
			<a href="#"><img src="pub/RESTO.jpg" width="208" height="148" border="0" /></a>				
			<a href="#"><img src="pub/systaresto_image.jpg" width="208" height="148" border="0" /></a>
			<a href="#"><img src="pub/Ticket.jpg" width="208" height="148" border="0" /></a>-->				
			</div>
		  <div id="demo2"></div>
		 </div>
		</div>			
 </td>
</table>
<? } ?>
<script>
	<!--
	var speed=10;
	var tab=document.getElementById("demo");
	var tab1=document.getElementById("demo1");
	var tab2=document.getElementById("demo2");
	tab2.innerHTML=tab1.innerHTML;
	function Marquee(){
		if(tab2.offsetWidth-tab.scrollLeft<=0)
		tab.scrollLeft-=tab1.offsetWidth
		else{
			tab.scrollLeft++;
		}
	}
	var MyMar=setInterval(Marquee,speed);
	tab.onmouseover=function() { clearInterval(MyMar) };
	tab.onmouseout=function() { MyMar=setInterval(Marquee,speed) };
	-->
</script>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr>
	<td height="0" bgcolor="#3498D3"></td>
	</tr>
</table>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr>
	<td bgcolor="#f4f4f4"> </td>
	</tr>
</table>
	
<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr>
	   <td bgcolor="#f4f4f4"><div align="center" style="background:#f4f4f4 url(../css1/images/image_foot.png) no-repeat; background-size:100% 100%; padding-top:30px;">
	   <p style="font-size:8px">&nbsp; </p>
	<p><a href="http://www.systa.fr/presentation.html" target="_blank" onMouseOver="mouseover(this)" onMouseOut="mouseout(this)" style="color:#E0981B;"><? print b_about_us; ?></a>&nbsp;&nbsp;|&nbsp;&nbsp;
	<a href="http://www.systa.fr/business.html" target="_blank" onMouseOver="mouseover(this)" onMouseOut="mouseout(this)" style="color:#E0981B;"><? print b_business; ?></a>&nbsp;&nbsp;|&nbsp;&nbsp;
	<a href="http://www.systa.fr/logiciel.html" target="_blank" onMouseOver="mouseover(this)" onMouseOut="mouseout(this)" style="color:#E0981B;"><? print b_service; ?></a>&nbsp;&nbsp;|&nbsp;&nbsp;
	<a href="http://www.bmst.net/cn/about.htm" target="_blank" onMouseOver="mouseover(this)" onMouseOut="mouseout(this)" style="color:#E0981B;"><? print b_liens; ?></a>&nbsp;&nbsp;|&nbsp;&nbsp;
	<a href="http://www.systa.fr" target="_blank" onMouseOver="mouseover(this)" onMouseOut="mouseout(this)" style="color:#E0981B;"><? print b_join; ?></a>&nbsp;&nbsp;|&nbsp;&nbsp;
	<a href="http://www.systa.fr/contact.html" target="_blank" onMouseOver="mouseover(this)" onMouseOut="mouseout(this)" style="color:#E0981B;"><? print b_Contact; ?></a></p>
	<p style="margin-top: 10px;"> Copyright &copy; <a href="http://www.systa.fr" target="_blank" style="color:#fff; font-weight:bold">SYSTA</a>&nbsp;&nbsp;All Rights Reserved.</p>
	<p onMouseOver="mouseover_b(this)" onMouseOut="mouseout_b(this)" style="color:#fff;">92, rue Balard - 75015 Paris</p>
	<p onMouseOver="mouseover_b(this)" onMouseOut="mouseout_b(this)" style="color:#fff;">Tél&nbsp;/&nbsp;Fax: 01 45 54 33 68</p>
	<p style="font-size:8px">&nbsp; </p>
</table>
	
<!--footer start // anther sytle footer-->
<!--<div id="footerMain" align="center">
  <div  align="center" id="footer"> 
	<p class="design1">92, rue Balard - 75015 Paris</p>
	<p class="design2">Tél/Fax: 01 45 54 33 68</p>
	<p class="design3">info@systa.fr</p>
	<p class="design4">http://www.systa.fr</p>
    <p class="copyright">Copyright  Indent 2010. All Rights Reserved.</p>
    <p class="design">Designed by : <a href="http://www.systa.fr" target="_blank" class="link">SYSTA</a></p>
    <a href="http://www.systa.fr/presentation.html" target="_blank" class="xhtml"><? print bot_why; ?></a> 
    <a href="http://www.systa.fr/contact.html" target="_blank" class="css"><? print bot_Contact; ?></a>	</div>
</div>
footer end -->

