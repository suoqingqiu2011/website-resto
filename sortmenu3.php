<?
session_start();
include_once("../include/config.php");
include_once("session.php");

$RestoID = $_COOKIE["systa_restoid"];


$sql_str="select `MenuID`, `SortID` from $tb_menu where `RestoID`='$RestoID' and `MenuTypeID`='$FamilleID' order by `SortID`";	
$result_str=mysql_query($sql_str);
$i = 0;
$flag = 0;
while($row=mysql_fetch_array($result_str))
{
		if($row[MenuID] == $MenuID)
		{
			if($i > 0)
			{
				$tempID = $arMenuID[$i-1];
				$arMenuID[$i-1] = $MenuID;
				$arMenuID[$i] = $tempID;
				$i++;
				continue;
				
				echo  $tempID;
				echo $arMenuID[$i-1];
				echo $arMenuID[$i];
			}	
		}	
		
		$arMenuID[$i] = $row[MenuID];
	
	$i++;
}

for($i=0; $i<count($arMenuID); $i++)
{
	$sql_str1 = "update $tb_menu set `SortID`='$i'+1 where `MenuID`='$arMenuID[$i]'";	
	mysql_query($sql_str1);
}

 header("Location:sortemenu_2eme.php?FamilleID=$FamilleID#t_titre");
?>