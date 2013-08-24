<?php

define('HOST', 'localhost');
define('USER', 'root');
define('PASSWORD', '0881');
define('DATABASE', 'humannehomes');

$link = mysqli_connect(HOST, USER, PASSWORD) or die('Cannot Connect to Database!');
$db = mysqli_select_db($link, DATABASE);

?>
