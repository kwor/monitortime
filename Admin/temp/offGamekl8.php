<?php
define('Copyright', 'Lottery');
if(!defined("ROOT_PATH"))
define('ROOT_PATH', $_SERVER["DOCUMENT_ROOT"].'/');
include_once ROOT_PATH.'Admin/ExistUser.php';
$dateTime = date('Y-m-d H:i:s');
$a = date('Y-m-d ').'09:00:00';
global $stratGamekl8, $endGamekl8;
if ( !(date("Hi")>="0000" && date('Hi')<="0610") && (($dateTime < $stratGamekl8) || ($dateTime > $endGamekl8)))
{
	header("Location: ./right.php"); exit;
}
?>