<?
include_once("../include/config.php");
include_once("session.php");
$restoID = $_COOKIE["systa_restoid"];

$sql_m="select `MenuTypeID`, `SortID` from $tb_famille where `RestoID`='$restoID' order by `SortID`";	
$result_m=mysql_query($sql_m);
$i = 0;
$flag = 0;

while($row=mysql_fetch_array($result_m))
{	
	if($action == "UP")
	{ 
		if($row[MenuTypeID] == $MenuTypeID)
		{   echo "here";
			echo $MenuTypeID;
			
			if($i > 0)
			{   
				$tempID = $arFamilleID[$i-1];
				$arFamilleID[$i-1] = $MenuTypeID;
				$arFamilleID[$i] = $tempID;
				$i++;
				continue;
			}	
			//echo $MenuTypeID;
		}	
		
		$arFamilleID[$i] = $row[MenuTypeID];
	}
	
	$i++;
}

for($i=0; $i<count($arFamilleID); $i++)
{
	$sql_m1 = "update $tb_famille set `SortID`='$i'+1 where `MenuTypeID`='$arFamilleID[$i]'";	
	mysql_query($sql_m1);
}

header("Location:adminfamille.php#tt_list");
?>