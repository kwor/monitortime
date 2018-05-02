<?php
/*  
  Copyright (c) 2010-02 Game
  Game All Rights Reserved. 
  
  Author: Version:1.0
  Date:2011-12-18
*/
//define('Copyright', 'Lottery');
//define('ROOT_PATH', $_SERVER["DOCUMENT_ROOT"].'/');
include_once ROOT_PATH.'Admin/ExistUser.php';
$dateTime = date('Y-m-d H:i:s');
global $stratGamepk, $endGamepk;
$_SESSION['cpopen'] = 6;
if ( $dateTime < $stratGamepk || $dateTime > $endGamepk)
{
	href('right.php'); exit;
}
?>