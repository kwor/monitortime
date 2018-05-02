<?php
/* 
  Copyright (c) 2010-02 Game
  Game All Rights Reserved. 
  
  Author: Version:1.0
  Date:2011-12-07 09:28:32
*/
include_once ROOT_PATH.'classed/DeBe.php';

//前臺域名
$Home[0] = '103.40.194.3';//采集地址
$Home[1] = '103.40.194.3';//会员域名
$Home[2] = '';
$Home[3] = '';
$Home[4] = '';
$Home[5] = '';
$Home[6] = '';
$Home[7] = '';
$Home[8] = '';
$Home[9] = '';

//前臺端口
$Port[0] = '80';//采集端口
$Port[1] = '80';//会员端口
$Port[2] = '';
$Port[3] = '';
$Port[4] = '';
$Port[5] = '';
$Port[6] = '';
$Port[7] = '';
$Port[8] = '';
$Port[9] = '';

//後臺域名
$sHome[0] = '103.40.194.3';
$sHome[1] = '103.40.194.3';//代理域名
$sHome[2] = '';
$sHome[3] = '';
$sHome[4] = '';
$sHome[5] = '';
$sHome[6] = '';
$sHome[7] = '';
$sHome[8] = '';
$sHome[9] = '';

//後臺端口
$sPort[0] = '80';
$sPort[1] = '80';//代理端口
$sPort[2] = '';
$sPort[3] = '';
$sPort[4] = '';
$sPort[5] = '';
$sPort[6] = '';
$sPort[7] = '';
$sPort[8] = '';
$sPort[9] = '';

//导航域名
$hHome[0] = '';
$hHome[1] = '';
$hHome[2] = '';
$hHome[3] = '';
$hHome[4] = '';
$hHome[5] = '';
$hHome[6] = '';
$hHome[7] = '';
$hHome[8] = '';
$hHome[9] = '';

//导航端口
$hPort[0] = '';
$hPort[1] = '';
$hPort[2] = '';
$hPort[3] = '';
$hPort[4] = '';
$hPort[5] = '';
$hPort[6] = '';
$hPort[7] = '';
$hPort[8] = '';
$hPort[9] = '';


//手机域名
$mHome[0] = '103.40.194.3';//采集地址
$mHome[1] = '103.40.194.3';//会员域名
$mHome[2] = '';
$mHome[3] = '';
$mHome[4] = '';
$mHome[5] = '';
$mHome[6] = '';
$mHome[7] = '';
$mHome[8] = '';
$mHome[9] = '';

//前臺端口
$mPort[0] = '80';//采集端口
$mPort[1] = '80';//会员端口
$mPort[2] = '';
$mPort[3] = '';
$mPort[4] = '';
$mPort[5] = '';
$mPort[6] = '';
$mPort[7] = '';
$mPort[8] = '';
$mPort[9] = '';


$db=new DB();
$resultTime = $db->query('select * from g_config limit 1',1);


//每天盤口開啟時間
$stratGame = date('Y-m-d').' '.$resultTime[0]['g_open_time_gd'];

//每天盤口關閉時間
$endGame = date('Y-m-d').' 23:00:00';
//$endGame = date('Y-m-d').' 23:59:00';
//每天盤口開啟時間
$stratGamecq = date('Y-m-d').' '.$resultTime[0]['g_open_time_cq'];

//每天盤口關閉時間
$endGamecq = date( "Y-m-d ", mktime(0, 0, 0, date('m'), date('d')+1, date('Y'))).' 01:54';

//每天盤口開啟時間
$stratGamejxssc = date('Y-m-d').' '.'00:00:02';

//每天盤口關閉時間
$endGamejxssc = date( "Y-m-d ", mktime(0, 0, 0, date('m'), date('d')+1, date('Y'))).'00:00:01';

//每天盤口開啟時間
$stratGamexjssc = date('Y-m-d').' '.$resultTime[0]['g_open_time_xjssc'];

//每天盤口關閉時間
$endGamexjssc = date( "Y-m-d ", mktime(0, 0, 0, date('m'), date('d')+1, date('Y'))).' 01:59:00';

//每天盤口開啟時間
$stratGametjssc = date('Y-m-d').' '.$resultTime[0]['g_open_time_tjssc'];

//每天盤口關閉時間
$endGametjssc = date( "Y-m-d ", mktime(0, 0, 0, date('m'), date('d'), date('Y'))).' 23:20:00';

//每天盤口開啟時間
$stratGamexyft = date('Y-m-d').' '.$resultTime[0]['g_open_time_xyft'];

//每天盤口關閉時間
$endGamexyft = date( "Y-m-d ", mktime(0, 0, 0, date('m'), date('d')+1, date('Y'))).' 04:20:00';

//每天盤口開啟時間
$stratGamenc = date('Y-m-d').' '.$resultTime[0]['g_open_time_nc'];

//每天盤口關閉時間
$endGamenc = date( "Y-m-d ", mktime(0, 0, 0, date('m'), date('d')+1, date('Y'))).' 01:54';



//每天盤口開啟時間
$stratGamepk = date('Y-m-d').' '.$resultTime[0]['g_open_time_pk'];

//每天盤口關閉時間
$endGamepk = date('Y-m-d').' 23:59:59';

//每天盤口開啟時間
$stratGamesz = date('Y-m-d').' '.$resultTime[0]['g_open_time_sz'];

//每天盤口關閉時間
$endGamesz = date('Y-m-d').' 22:08:00';
//$endGamesz =  date( "Y-m-d ", mktime(0, 0, 0, date('m'), date('d')+1, date('Y'))).' 05:54';
//每天盤口開啟時間
$stratGamekl8 = date('Y-m-d').' '.$resultTime[0]['g_open_time_kl8'];

//每天盤口關閉時間
$endGamekl8 = date('Y-m-d').' 23:55:00';

$oncontextmenu = ''; //oncontextmenu="return false"


?>