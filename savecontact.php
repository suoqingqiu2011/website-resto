<?
	include_once("../include/config.php");
	include_once("session.php");
	
	$RestoID = $_COOKIE["systa_restoid"];
	if ( isset( $_POST ) )
			   $postArray = &$_POST ;
			else
			   $postArray = &$HTTP_POST_VARS ;
			   
	$postedValue =  $postArray['FCKeditor1'];
			
	$res = mysql_query("select `RestoID` from $tb_contact where `RestoID`='$RestoID'") or die(mysql_error());
	$row=mysql_num_rows($res);
	$PostDate = date("Y-m-d");
  if($row==0)
  {
  		mysql_query("insert into $tb_contact(`RestoID`, `Content`, `PostDate`) values('$RestoID', '$postedValue', '$PostDate')") or die(mysql_error());
  }
  else
  {
  		mysql_query("update $tb_contact set `Content`='$postedValue', `PostDate`='$PostDate' where `RestoID`='$RestoID'") or die(mysql_error());
  }
?>
<html>
<head>
<title></title>
<meta http-equiv="refresh" content="0; url=contact.php">
</head>
<body>
</body>
</html>