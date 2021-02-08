<?
include_once("../include/config.php");
include_once("session.php");
$restoID = $_COOKIE["systa_restoid"];

$sql="select `SousFamilleID`, `SortID` from sous_famille where `RestoID`='$restoID' order by `SortID`";	
$result=mysql_query($sql);
$i = 0;
$flag = 0;
while($row=mysql_fetch_array($result))
{
	if($action == "UP")
	{
		if($row[SousFamilleID] == $SousFamilleID)
		{
			if($i > 0)
			{
				$tempID = $arFamilleID[$i-1];
				$arFamilleID[$i-1] = $SousFamilleID;
				$arFamilleID[$i] = $tempID;
				$i++;
				continue;
			}	
		}	
		
		$arFamilleID[$i] = $row[SousFamilleID];
	}
	
	$i++;
}

for($i=0; $i<count($arFamilleID); $i++)
{
	$sql = "update sous_famille set `SortID`='$i'+1 where `SousFamilleID`='$arFamilleID[$i]'";	
	mysql_query($sql);
}

header("Location:adminfamille.php");
?>