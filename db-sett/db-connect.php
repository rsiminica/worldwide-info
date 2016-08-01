<?php
$path='http://bluelogic.ro/mywebsite/';
// Suprimă toate raportările erorilor
//error_reporting(0);
$server="localhost";
$userdb="romasig";
$passdb="roasg2x";

ini_set ('magic_quotes_gpc', 'off');
set_magic_quotes_runtime(0);

$base=@mysql_select_db($db);
$link=@mysql_connect($server, $userdb, $passdb);




if (!$link) {
    die('Could not connect: ' . mysql_error());
}
// make foo the current db
$db_selected = mysql_select_db('mywebsite', $link);
//echo 'Connected successfully';
//mysql_close($link);
?>