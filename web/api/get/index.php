<?php
	require("../database_android.php");

	if(isset($_GET["q"]) &&  $_GET["q"] != "") {
		$q = mysql_real_escape_string($_GET["q"]);
	}

	if(isset($_GET["e"]) &&  $_GET["e"] != "") {
		$e = mysql_real_escape_string($_GET["e"]);
	}

	if(isset($_GET["l"]) &&  $_GET["l"] != "") {
		$l = mysql_real_escape_string($_GET["l"]);
	}

	if(isset($_GET["i"]) &&  $_GET["i"] != "") {
		$i = mysql_real_escape_string($_GET["i"]);
	}

	if(isset($_GET["o"]) &&  $_GET["o"] != "") {
		$o = mysql_real_escape_string($_GET["o"]);
	}

	if(!isset($q) && !isset($e)) {
		echo "please provide a searchquery or an exact match search";
		return;
	}

	//TODO ADD A LIMIT CLAUSE

	$query = "";
	if(isset($q)) {
		$query = "SELECT * from androidactivities_application WHERE app_name LIKE '%".$q."%' OR package_name LIKE '%".$q."%'";
	} else {
		$query = "SELECT * from androidactivities_application WHERE package_name LIKE '".$e."'";
	}

	if(isset($o)) {
		if($o == "new") {
			$query = $query . " ORDER BY application_id desc ";
		}
	}

	if(isset($l)) {
		$query = $query . " LIMIT " . $l;
	}

	$resultArray = array();
	$result = mysql_query($query);

      	while($row = mysql_fetch_object($result)) {
      		$appArray = array();

      		$appArray['app_name'] = $row->app_name;
      		$appArray['package_name'] = $row->package_name;

      		$resultComponentInfoArray = array();
      		$resultComponentInfoArrayCount = (int)0;
      		$resultComponentInfo = mysql_query("SELECT * from androidactivities_componentinfo WHERE application_id = ".$row->application_id."");
      		while($componentInfoRow = mysql_fetch_object($resultComponentInfo)) {
      			$componentInfoArray = array();
      			$componentInfoArray['activity'] = $componentInfoRow->activity;
      			$componentInfoArray['component_info'] = $componentInfoRow->component_info;

      			$resultComponentInfoArray[$resultComponentInfoArrayCount] = $componentInfoArray;
      			$resultComponentInfoArrayCount++;
      		}

      		$appArray['component_infos'] = $resultComponentInfoArray;

      		if(isset($i)) {
			$returned_content = get_data('https://play.google.com/store/apps/details?id=' . $row->package_name);
			if(isset($returned_content) && $returned_content != "") {
				$coverUrl = get_cover_url($returned_content);
				if(isset($coverUrl) && $coverUrl != "") {
					$appArray['url'] = $coverUrl . "430";
				}
			}
      		}

      		$resultArray[$row->package_name] = $appArray;
      	}

		header('Content-Type: application/json');
      	echo json_encode($resultArray);


      	/* gets the data from a URL */
	function get_data($url) {
		$ch = curl_init();
		$timeout = 5;
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
		$data = curl_exec($ch);
		curl_close($ch);
		return $data;
	}

	function get_cover_url($url, $removeWidth = true) {
		preg_match('/(src=")(.+?)(=s180)/', $url, $result);

		if (strlen($result[2]) == 0) {
			return "";
		}

		if ($removeWidth) {
			return $result[2] . "=s";
		} else {
			return $result[2] . $result[3];
		}
	}
?>