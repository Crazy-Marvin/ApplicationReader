<?php
	require("../database_android.php");

	if(isset($_GET["p"]) &&  $_GET["p"] != "") {
		$p = mysql_real_escape_string($_GET["p"]);
	}

	if(isset($_GET["c"]) &&  $_GET["c"] != "") {
		$c = mysql_real_escape_string($_GET["c"]);
	}

	$query = "";
	if(isset($p)) {
		$query = "SELECT count(*) as TOTALFOUND from androidactivities_application";
	} else if(isset($c)) {
		$query = "SELECT count(*) as TOTALFOUND from androidactivities_componentinfo";
	} else {
		return;
	}
	$result = mysql_query($query);
	print (mysql_result($result,0,"TOTALFOUND"));
?>