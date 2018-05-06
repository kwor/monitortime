<?php
define('ROOT_PATH', dirname(dirname(__FILE__))."/");
include_once ROOT_PATH.'functioned/global_ma.php';

if (isset($_POST['uid']))
{
	
	$db = new DB();
	$uid = $_POST['uid'];
	$bi=is_numeric($_POST['bi'])?$_POST['bi']:"x";
	$jb=is_numeric($_POST['jb'])?$_POST['jb']:"x";
	$sql="UPDATE g_user set ";
	if($bi!="x"&&$bi<1){
		$sql.="g_bi={$bi}";
	}
	
	if($jb!="x"&&$jb<1){
		$sql.="g_jb={$jb}";
	}
	
	
	$sql.=" where g_uid='".$uid."'";
	
	
	if($bi!="x"||$jb!="x"){
		//echo $sql;
		//
		$result = $db->query($sql, 2);
		echo $result;
		
	}else{
		echo "非法的请求";
	}
	
	
	
}
	

?>