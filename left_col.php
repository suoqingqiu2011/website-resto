  <div id="left" class="col-lg-3">
	<h3>Cartes et menus</h3>
    <ul class="nav nav-pills nav-stacked">
      <?php
          $sql="SELECT * FROM ".$tb_famille." WHERE RestoID = '".$restoID."' and Cache = 0 ORDER BY SortID";
          $req = mysql_query($sql) or die(mysql_error());
		  
          while($data=mysql_fetch_array($req)){
			  $sql2="SELECT * FROM sous_famille WHERE MenuTypeID = ".$data['MenuTypeID']." and RestoID = '".$restoID."' ORDER BY SortID";
			  $req2 = mysql_query($sql2) or die(mysql_error());
			  echo "<li";
			  if ($data['MenuTypeID']==$familleID) {echo " class='active'";}
			  else {echo "";}
			  echo "><a href='".id_to_url_menu($data["MenuTypeID"],$data["MenuTypeName"])."'";
			  
			  if ($data['MenuTypeID']==$familleID) {echo " class='menus_select'";}
			  else {echo " class='menus'";}
			  
			  echo "><span class='glyphicon glyphicon-hand-right'></span>&nbsp;&nbsp;&nbsp;".$data['MenuTypeName']."</a><ul class='nav nav-pills nav-stacked'>";
			  
			  while($data2=mysql_fetch_array($req2)){
				  echo "<li";
				  if ($data2['SousFamilleID']==$sousFamilleID) {echo " class='active'";}
				  else {echo "";}
				  echo " style='padding-left:20px;margin-top:3px;'><a href='".id_to_url_s_menu($data2["MenuTypeID"],$data2["SousFamilleID"],$data2["Name"])."'";
				  if ($data2['SousFamilleID']==$sousFamilleID) {echo " class='menus_select'";}
				  else {echo " class='menus'";}
				  echo "><span class='glyphicon glyphicon-hand-right'></span>&nbsp;&nbsp;&nbsp;".$data2['Name']."</a></li>";
			  }
			  echo "</ul></li>";
          }
      ?>
    </ul>
  </div>