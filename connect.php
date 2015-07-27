<?php

/* Database config */

$db_host		= 'localhost';
$db_user		= 'root';
$db_pass		= '159357';
$db_database		= 'blog_andrea';

/* End config */


$link = @mysql_connect($db_host,$db_user,$db_pass) or die('Unable to establish a DB connection');

mysql_query("SET NAMES 'utf8'");
mysql_query("SET CHARACTER SET utf8");
mysql_select_db($db_database,$link);

?>