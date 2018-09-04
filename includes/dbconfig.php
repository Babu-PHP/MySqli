<?php
$hostname	= 'localhost';
$dbname		='angularjs';
$dbuser		= "root";//"retail_dev";
$dbpass		= "root";//"retail@dev";

$db = new mysqli($hostname, $dbuser, $dbpass, $dbname);

if($db->connect_errno > 0){
    die('Unable to connect to database [' . $db->connect_error . ']');
}

$db->set_charset('utf8');

?>
