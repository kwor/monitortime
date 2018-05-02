<?php
define('Copyright', 'Lottery');
if(!defined("ROOT_PATH"))
define('ROOT_PATH', $_SERVER["DOCUMENT_ROOT"].'/');
include_once ROOT_PATH.'functioned/cheCookie.php';
$dateTime = date('Y-m-d H:i:s');
$a = date('Y-m-d ').'08:30:01';
$b = date('Y-m-d ').'22:10:01';
global $stratGamesz, $endGamesz;
$_SESSION['cpopen'] = 7;
if ( $dateTime < $a || $dateTime > $b)
{
 
markPos("前台-江苏封盘页");
	header("Location: ./right.php"); exit;
}
?>