<?php 
define('Copyright', 'Lottery');
define('ROOT_PATH', $_SERVER["DOCUMENT_ROOT"].'/');
include_once ROOT_PATH.'functioned/globalge.php';

global $Users, $LoginId;

if ($Users[0]['g_login_id'] != 89) if ($Users[0]['g_lock'] == 2)  
	exit; //帳號已被凍結
	
//子帳號
if (isset($Users[0]['g_lock_2'])){
	if ( $Users[0]['g_s_lock'] == 2 || $Users[0]['g_lock_2'] != 1)
		exit; //帳號已被凍結
}

	$uid=$_POST['uid'];
	$type=$_POST['type'];
	$utype=$_POST['utype'];
	$gusernid=getgnid($uid);
	$db=new DB();
	if($utype=='1'){
	$utname='g_rank';
	$uziduan='g_lock';
	$g_name='g_name';
	}
	else if($utype=='2'){
	$utname='g_user';
	$uziduan='g_look';
	$g_name='g_name';
	}
	else{
	$utname='g_relation_user';
	$uziduan='g_lock';
	$g_name='g_s_name';
	}
	//判断上级是否停用 $uid 上级如果是冻结 下级则不允许修改
	//echo strlen($gusernid);
	 $length = strlen($gusernid);
	// echo $length;
	 //查询上级分工司
	 $zhi=0;
	 if($length>32*2) //股东查分工司
	 {
	$ggnid=substr($gusernid,0,32*2);
	$result21 = $db->query("select g_lock from g_rank  where g_lock=2  and g_nid =  '{$ggnid}'", 1);
	if($result21[0]['g_lock']>0)
	{
	$zhi=$result21[0]['g_lock'];
	}
	}
	  if($length>32*3) //总代理查股东
	 {
	 $ggnid=substr($gusernid,0,32*3);
	$result21 = $db->query("select g_lock from g_rank  where g_lock=2  and g_nid =  '{$ggnid}'", 1);
	if($result21[0]['g_lock']>0)
	{
	$zhi=$result21[0]['g_lock'];
	}
	 }
	  if($length>32*4) //代理查总代理
	 {
	 $ggnid=substr($gusernid,0,32*4);
	$result21 = $db->query("select g_lock from g_rank  where g_lock=2  and g_nid =  '{$ggnid}'", 1);
	if($result21[0]['g_lock']>0)
	{
	$zhi=$result21[0]['g_lock'];
	}
	//echo "select g_lock from g_rank  where g_lock=2  and g_nid =  '{$ggnid}'";
	 }
	 if($utype=='1'){ //代理查询
	 if($length>=32*5)//代表是会员 查代理
	 {
	 $ggnid=substr($gusernid,0,32*4);
	$result21 = $db->query("select g_lock from g_rank  where g_lock=2  and g_nid =  '{$ggnid}'", 1);
	if($result21[0]['g_lock']>0)
	{
	$zhi=$result21[0]['g_lock'];
	}
	//echo 222;
	 }
	 }else{//会员查询
	  if($length>=32*5)//代表是会员 查代理
	 {
	 $ggnid=substr($gusernid,0,32*5);
	$result21 = $db->query("select g_lock from g_rank  where g_lock=2  and g_nid =  '{$ggnid}'", 1);
	if($result21[0]['g_lock']>0)
	{
	$zhi=$result21[0]['g_lock'];
	}
	//echo 222;
	 }
	 }
	// echo $zhi;
	 // echo $gusernid;
   if($zhi>0 && strlen($gusernid)!=64){
	echo '禁止';
	}else{
	if($utype=='1'){
	 
	$sql = "update {$utname} set {$uziduan}={$type} where g_nid LIKE '{$gusernid}%' ";
	$db->query($sql, 2);
	$sql = "update g_user  set g_look={$type} where g_nid LIKE '{$gusernid}%' ";
	$db->query($sql, 2);
	
	}else{
	$sql = "update {$utname} set {$uziduan}={$type} where {$g_name}='{$uid}'";
	$db->query($sql, 2);
	}
	if($type==1) 
	echo '啟用';
	if($type==2)
	
	echo '凍結';
	if($type==3)
	echo '停用';
	
	}
?>