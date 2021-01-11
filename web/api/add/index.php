<?php
	require("../database_android.php");

	$minVersion = (int) 20;

	if(isset($_POST["applicationreader_version"]) &&  $_POST["applicationreader_version"] != "") {
		$applicationreader_version = mysql_real_escape_string($_POST["applicationreader_version"]);
	} else {
		echo "applicationreader_version missing";
		return;
	}

	if($applicationreader_version < $minVersion) {
		echo "ApplicationReader outdated";
		return;
	}

	if(isset($_POST["package_name"]) &&  $_POST["package_name"] != "") {
		$package_name = mysql_real_escape_string($_POST["package_name"]);
	} else {
		echo "package_name missing";
		return;
	}

	if(isset($_POST["app_name"]) &&  $_POST["app_name"] != "") {
		$app_name = mysql_real_escape_string($_POST["app_name"]);
	} else {
		echo "app_name missing";
		return;
	}

	if(isset($_POST["activity"]) &&  $_POST["activity"] != "") {
		$activity = mysql_real_escape_string($_POST["activity"]);
	} else {
		echo "activity missing";
		return;
	}

	if(isset($_POST["activity_name"]) &&  $_POST["activity_name"] != "") {
		$activity_name = mysql_real_escape_string($_POST["activity_name"]);
	} else {
		echo "activity_name missing";
		return;
	}

	if(isset($_POST["component_info"]) &&  $_POST["component_info"] != "") {
		$component_info = mysql_real_escape_string($_POST["component_info"]);
	} else {
		echo "component_info missing";
		return;
	}



	$application_id = already_exists_application($package_name);
	if($application_id < 0) {
		mysql_query("INSERT INTO androidactivities_application (package_name, app_name) VALUES ('". $package_name ."', '". $app_name ."')");
		$application_id = already_exists_application($package_name);
	}

	$componentinfo_id = already_exists_componentinfo($application_id, $component_info);
	if($componentinfo_id < 0 && $application_id > 0) {
		mysql_query("INSERT INTO androidactivities_componentinfo (application_id, activity, activity_name, component_info) VALUES ('". $application_id ."', '". $activity ."', '". $activity_name ."', '". $component_info ."')");

		echo "successful";
	} else {
		echo "exists";
	}
?>

<?php
	function already_exists_application($package_name) {
		$result = mysql_query("SELECT * from androidactivities_application WHERE package_name = '".$package_name."'");

		if($row = mysql_fetch_object($result)) {
     			return $row -> application_id;
   		}
		else {
  			return -1;
		}
	}

	function already_exists_componentinfo($application_id, $component_info) {
		$result = mysql_query("SELECT * from androidactivities_componentinfo WHERE application_id = '".$application_id."' AND component_info = '".$component_info."'");

		if($row = mysql_fetch_object($result)) {
     			return $row -> componeninfo_id;
   		}
		else {
  			return -1;
		}
	}
?>