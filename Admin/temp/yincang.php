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
	 //��ѯ��ע�������ж�
	$total = $db->query("SELECT g_jiner,g_win,g_nid FROM `g_zhudan` WHERE g_id='$id' ", 1);//��ע��
	$user222=$total[0]['g_nid'];
	$total2 = $db->query("SELECT * FROM `g_user` WHERE g_name='$user222' ", 1);//���Ա��Ǯ
	 
	 //�ж������ػ�����ʾ
	 if($gwin==1)
	 {//˵���� ����
	 //�ж��Ƿ��Ѿ�����
	 if($total[0]['g_win'] != null)
	 { //�Ѿ�����
	 //�����Ӯ��Ǯ������Ա
	 $zhuanqian=$total[0]['g_win']*-1;
	//
	$qian=$total2[0]['g_money_yes']+$zhuanqian;
	$sql = "update g_user set g_money_yes=$qian where g_name='$user222'"; //���»�Ա��Ǯ
	$db->query($sql, 2);
	 }else
	 { //δ����
	 //��Ǯ������Ա
	 $qian=$total2[0]['g_money_yes']+$total[0]['g_jiner'];
	$sql = "update g_user set g_money_yes=$qian where g_name='$user222'"; //���»�Ա��Ǯ
	$db->query($sql, 2);
	 }
	 } else
	 {//�����صĵ���ʾ����
	 //�жϻ�Ա��Ǯ�Ƿ������ע��Ǯ
	 
	 if($total[0]['g_jiner'] < $total2[0]['g_money_yes'])
	 {
	
	 if($total[0]['g_win'] != null)
	 { //�Ѿ�����
	 //�����Ǯ�۵���Ա
	$qian=$total2[0]['g_money_yes']+$total[0]['g_win'];
	/*echo $qian.'-111111';
	exit;*/
	$sql = "update g_user set g_money_yes=$qian where g_name='$user222'"; //���»�Ա��Ǯ
	$db->query($sql, 2);
	
	 }else
	 { //δ����
	 //��Ǯ�۵���Ա
	  $qian=$total2[0]['g_money_yes']-$total[0]['g_jiner'];
	$sql = "update g_user set g_money_yes=$qian where g_name='$user222'"; //���»�Ա��Ǯ
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
