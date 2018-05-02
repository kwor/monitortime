<?php 
define('Copyright', 'Lottery');
define('ROOT_PATH', $_SERVER["DOCUMENT_ROOT"].'/');
//include_once ROOT_PATH.'functioned/globalge.php';
include_once ROOT_PATH.'Admin/ExistUser.php';
global $Users;
$db=new DB();
//if ($Users[0]['g_login_id'] != 89) exit;
$gmname=$_SESSION['sName'];
 
	
	$id=$_POST['zid'];
	$type=$_POST['type'];
	$db=new DB();
	//zerc20120802
	//echo $type;
	//exit;
	$gwin=$type=='yes'? 1:0; 
	 //查询出注单进行判断
	$total = $db->query("SELECT g_jiner,g_win,g_nid FROM `g_zhudan` WHERE g_id='$id' ", 1);//查注单
	$user222=$total[0]['g_nid'];
	$total2 = $db->query("SELECT * FROM `g_user` WHERE g_name='$user222' ", 1);//查会员的钱
	 
	 //判断是隐藏还是显示
	 if($gwin==1)
	 {//说名是 隐藏
	 //判断是否已经结算
	 if($total[0]['g_win'] != null)
	 { //已经结算
	 //把输或赢的钱还给会员
	 $zhuanqian=$total[0]['g_win']*-1;
	//
	$qian=$total2[0]['g_money_yes']+$zhuanqian;
	$sql = "update g_user set g_money_yes=$qian where g_name='$user222'"; //更新会员的钱
	$db->query($sql, 2);
	 }else
	 { //未结算
	 //把钱还给会员
	 $qian=$total2[0]['g_money_yes']+$total[0]['g_jiner'];
	$sql = "update g_user set g_money_yes=$qian where g_name='$user222'"; //更新会员的钱
	$db->query($sql, 2);
	 }
	 } else
	 {//把隐藏的单显示出来
	 //判断会员的钱是否大于下注的钱
	 
	 if($total[0]['g_jiner'] < $total2[0]['g_money_yes'])
	 {
	
	 if($total[0]['g_win'] != null)
	 { //已经结算
	 //把输的钱扣掉会员
	$qian=$total2[0]['g_money_yes']+$total[0]['g_win'];
	/*echo $qian.'-111111';
	exit;*/
	$sql = "update g_user set g_money_yes=$qian where g_name='$user222'"; //更新会员的钱
	$db->query($sql, 2);
	
	 }else
	 { //未结算
	 //把钱扣掉会员
	  $qian=$total2[0]['g_money_yes']-$total[0]['g_jiner'];
	$sql = "update g_user set g_money_yes=$qian where g_name='$user222'"; //更新会员的钱
	$db->query($sql, 2);
	 }
	 }else
	 {
	  $type='no';
	 }
	 }
	$gwin=$type=='yes'? 1:0; 
	$sql = "update g_zhudan set yincang=$gwin where g_id='$id'";
	$db->query($sql, 2);
	
	 
	echo $gwin+"";
?>
