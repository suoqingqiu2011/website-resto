<?
	include_once("../include/config.php");
	include_once("session.php");
	
	$RestoID = $_COOKIE["systa_restoid"];
	if ( isset( $_POST ) )
			   $postArray = &$_POST ;
			else
			   $postArray = &$HTTP_POST_VARS ;
			   
	$postedValue =  $postArray['FCKeditor1'];
			
	$res = mysql_query("select `RestoID` from $tb_promotion where `RestoID`='$RestoID'") or die(mysql_error());
	$row=mysql_num_rows($res);
	$PostDate = date("Y-m-d");
  if($row==0)
  {
  		mysql_query("insert into $tb_promotion(`RestoID`, `Title`, `Content`, `PostDate`) values('$RestoID', '$Title', '$postedValue', '$PostDate')") or die(mysql_error());
  }
  else
  {
  		mysql_query("update $tb_promotion set `Title`='$Title', `Content`='$postedValue', `PostDate`='$PostDate' where `RestoID`='$RestoID'") or die(mysql_error());
  }
?>
<html>
<head>
<title></title>
<meta http-equiv="refresh" content="0; url=promotion.php">
</head>
<body>
</body>
</html>