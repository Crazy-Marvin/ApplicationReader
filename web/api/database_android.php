<?php
/* Database config */

$db_host		= 'dbhost';
$db_user		= 'dbuser';
$db_pass		= 'dbpass';
$db_database	= 'dbdatabase';

/* End config */

$link = mysql_connect($db_host,$db_user,$db_pass) or die('Unable to establish a DB connection');

mysql_select_db($db_database,$link);

?>