
<!--
<script language="javascript">
	var checkValue=$("#Prix").val();
	if(checkValue==0){
		alert("test ook");
	else{
		alert("test kkkk");			
	}		
	</script>

<label><? print text_prix; ?></label>     				 
									  <div ng-app="" >
										<form>
										  <label><input name="choix_imprimnt" type="radio" ng-model="myVar" value="dogs"/>OUI</label>
										  <label><input name="choix_imprimnt" type="radio" ng-model="myVar" value="tuts"/>NON</label>
										</form>
	
										<div ng-switch="myVar">
										  <div ng-switch-when="dogs">
											 <div ng-show="myVar">
												 <input name="Prix" type="text" class="field input2" id="Prix">
												 <span class="STYLE9">*</span>
												 <br />
												 <p>								
													<label> <input name="printer1" type="checkbox" id="printer1" value="1" checked="checked"  disabled="disabled">  <? print imprimant1; ?>  
													</label>
													<label> <input name="printer2" type="checkbox" id="printer2" value="1">  <? print imprimant2; ?>  </label>
													<label> <input name="printer3" type="checkbox" id="printer3" value="1">  <? print imprimant3; ?>  </label>
													<label> <input name="printer4" type="checkbox" id="printer4" value="1">  <? print imprimant4; ?>  </label>
										         </p>
											 </div>
										  </div>
										  <div ng-switch-when="tuts">
											  <div ng-show="myVar">
												 <input name="Prix" type="text" class="field input2" id="Prix" value="0" disabled="disabled">
												 <br />
												 <p>										    
													<label> <input name="printer2" type="checkbox" id="printer2" value="1">  <? print imprimant2; ?>  </label>
													<label> <input name="printer3" type="checkbox" id="printer3" value="1">  <? print imprimant3; ?>  </label>
													<label> <input name="printer4" type="checkbox" id="printer4" value="1">  <? print imprimant4; ?>  </label>
											     </p>
											  </div>
										  </div>
										   <div ng-switch-default><br/></div>
										</div>
									</div> 
									
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<script src="https://cdn.bootcss.com/angular.js/1.4.6/angular.min.js"></script>
</head>
<div ng-app="">
我喜欢的网站
<select ng-model="myVar">
  <label><option value="runoob">www.runoob.com</label>
  <label><option value="google">www.google.com</label>
  <label><option value="taobao">www.taobao.com</label>
</select>


<div ng-switch="myVar">
  <div ng-switch-when="runoob">
     <h1>菜鸟教程</h1>
     <p>欢迎访问菜鸟教程</p>
  </div>
  <div ng-switch-when="google">
     <h1>Google</h1>
     <p>欢迎访问Google</p>
  </div>
  <div ng-switch-when="taobao">
     <h1>淘宝</h1>
     <p>欢迎访问淘宝</p>
  </div>
  <div ng-switch-default>
     <h1>切换</h1>
     <p>选择不同选项显示对应的值。</p>
  </div>
</div>


<p> ng-switch 指令根据当前的值显示或隐藏对应部分。</p>

</div>
</html>


<a href="test.php?b=<?php echo urlencode('中文参数值');?>">测试</a>
<?php echo $b;?>


<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<script src="https://cdn.bootcss.com/angular.js/1.4.6/angular.min.js"></script>
</head>
<body>
<center align="center "style="width:1000px; height:500px;">
<iframe width="100%" height="100%" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="http://maps.google.com.tw/maps?f=q&hl=zh-TW&geocode=&q=48.800581, 2.120304(我的家)&z=16&output=embed&t=">
</iframe>

</center>
</body>
</html>
<script type="text/javascript">
function aCheck1(){
document.getElementById("span1").style.display="block";
document.getElementById("span2").style.display="none";
}
function bCheck2(){ 
document.getElementById("span1").style.display="none";  
document.getElementById("span2").style.display="block";
}
</script>
 
<!--
<input type="radio" name="RadioGroup1" value="ok1" id="ok1"  onclick="aCheck1()" /> A
<input type="radio" name="RadioGroup1" value="ok2" id="ok2" onclick="bCheck2()" /> B

<span id="span1" style="display:none">我是A</span>
<span id="span2" style="display:none">我是B</span>


<div align="left" valign="top" style="float:left;  width:30%;">
								  <label><? print text_prix; ?></label>     				 
									  <div  >
										<form>
										  <label><input name="choix_imprimnt" type="radio" ng-model="myVar" value="dogs" onclick="aCheck1()"/><? echo oui; ?></label>
										  <label><input name="choix_imprimnt" type="radio" ng-model="myVar" value="tuts" onclick="bCheck2()"/><? echo non; ?></label>
										  
										</form>
										
										
											 <div id="span1" style="display:none">
												 <span class="STYLE9" style="float:left; margin-right:3px;">*</span>
												 <input name="Prix" type="text" class="field input2" id="Prix" value="<?=htmlspecialchars($row2[MenuPrixPlace]);?>">
												 
												 <br/>
												 <p>								
													<label> <input name="printer1" type="checkbox" id="printer1" value="1" checked="checked"  onclick="return false;" />  <? print imprimant1; ?>   </label>
													<label> <input name="printer2" type="checkbox" id="printer2" value="1" <? if($row2[Printer2]==1) echo "checked";?>/>  <? print imprimant2; ?>   </label>
													<label> <input name="printer3" type="checkbox" id="printer3" value="1" <? if($row2[Printer3]==1) echo "checked";?>/>  <? print imprimant3; ?>   </label>
													<label> <input name="printer4" type="checkbox" id="printer4" value="1" <? if($row2[Printer4]==1) echo "checked";?>/>  <? print imprimant4; ?>   </label>
										         </p>
											 </div>
										  
										 
											  <div id="span2" style="display:none">
												 <input name="Prix" type="text" class="field input2" id="Prix" value="0" disabled="disabled">
												 <br />
												 <p>										    
													<label> <input name="printer2" type="checkbox" id="printer2" value="1" <? if($row2[Printer2]==1) echo "checked";?>/>  <? print imprimant2; ?>    </label> 
													<label> <input name="printer3" type="checkbox" id="printer3" value="1" <? if($row2[Printer3]==1) echo "checked";?>/>  <? print imprimant3; ?>  </label>
													<label> <input name="printer4" type="checkbox" id="printer4" value="1" <? if($row2[Printer4]==1) echo "checked";?>/>  <? print imprimant4; ?>   </label>
											     </p>
											  </div>
										  
										  
										</div>
									
							</div>	
							
							
<body onload="LoadPage()">
    <form name="Test">
      <input type="checkbox" name="CB1" checked="checked;" onclick="StartTime()">
    </form>
</body>

<script>
	var asdf = false;
      function StartTime(){
        if(asdf)clearTimeout(asdf)
        asdf = setTimeout("RefreshPage()",5000);
      }
      function RefreshPage(){
		clearTimeout(asdf)
        if(document.Test.CB1.checked)
          document.location.href= "timerRefresh.htm?Checked"
      }
      function LoadPage(){
        var findCheck = document.location.href.split("?Chec");
        if(findCheck.length == 2){
          document.Test.CB1.checked=true;
          StartTime()
        }
      }
</script>

<? $sqlstr="select * from printerip where RestoID='$RestoID' ORDER BY SortID";
$resultstr=mysql_query($sqlstr);
$affstr=mysql_fetch_assoc($query);

$rols=explode(',',$row2[Printer2]);

?>			
<label> <input name="rol[]" type="checkbox" id="rol_0" class="printer_oui" value="1" <? if(in_array(1,$rols)) echo "checked"; ?>/>  <? print imprimant1; ?> </label>

<form action ="test.php" method="post">
<ul>
  <li><input type ="checkbox" name ="category[]" value ="php">php教程</li>
  <li><input type ="checkbox" name ="category[]"  value ="java">java教程</li>
  <li><input type ="checkbox" name ="category[]" value ="mysql">mysql教程</li>
  <li><input type ="checkbox" name ="category[]" value ="html">html教程</li>
</ul>
<input type ="submit">
</form>

<?php
/*$checkbox_select=$_POST["category"];
for($i=0;$i<count($checkbox_select);$i++)
{
echo "选项".$checkbox_select[$i]."被选中<br />";
}*/
?>-->

<?php 
	
	include_once("../include/config.php");
	include_once("../include/config_perso.php");
	
if(!isset($_POST['action'])) //如果没提交表单显示以下
 {?>
<form action="test.php" method="POST">
<input type="checkbox" value="1" name="printer1">printer1 <br/>
<input type="checkbox" value="1" name="printer2">printer2 <br/>
<input type="checkbox" value="1" name="printer3">printer3 <br/>
<input type="checkbox" value="1" name="printer4">printer4 <br/>
<input type="submit" name="action" value="提交">
</form>
<?php
 }else{
		$query = "select `name` from printerip";
		$result = mysql_query($query);
		$row+=mysql_num_rows($result);
		$data = array();
		
		$i=0;
		while ($rows= mysql_fetch_array($result))
		{
		$data[$i] = $rows['name'];
		echo $data[$i++];
		}
		$taille=$i--;
		echo $taille;
		
	  $arr=array("printer1","printer2","printer3","printer4");
		 for($i=0; $i<4; $i++){
			 $sqlstr="Select * from printerip Where `name`='$arr[$i]'";
			 mysql_query($sqlstr) OR die (mysql_error());
			 if($_POST[$arr[$i]]==1){
				 $sqlstr="update printerip set `checkstatus`=1 where `name`='$arr[$i]'";
				 //echo $arr[$i]."choisi <br/>";
			 }else{
				 $sqlstr="update printerip set `checkstatus`=0 where `name`='$arr[$i]'";
				//echo $arr[$i]."non_choisi <br/>";
			 }
			 mysql_query($sqlstr) or die(mysql_error());
		 }
	 /* if($_POST['list1']==9){ 
			echo "list1选择"; 
	  }else{ 
			echo "list1未选择";
	  }
	  
	  if($_POST['list2']==9){ 
			echo "list2选择"; 
	  }else{ 
			echo "list2未选择";
	  }
	  if($_POST['list3']==9){ 
			echo "list3选择"; 
	  }else{ 
			echo "list3未选择";
	  }*/

     }?>