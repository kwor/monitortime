<?php 
define('ROOT_PATH', dirname(dirname(__FILE__))."/");
include_once ROOT_PATH.'functioned/global_ma.php';

if (isset($_GET['cid']))
{
$db = new DB();
$cid = $_GET['cid'];
$sql="select * from g_rank where g_uid='".$cid."'";
$result = $db->query($sql, 1);

$nid=$result[0]["g_nid"];
$sql2="select * from g_user where g_nid like '%{$nid}%'";
$result2 = $db->query($sql2, 1);

//print_r($result2);
//exit;

?><!DOCTYPE html>  
<html>  
<head>  
<title>列表</title>  
<link rel="stylesheet" href="../m/css/jquery.mobile-1.4.3.css">
<link rel="stylesheet" href="../m/css/style.css">
<script src="../m/js/jquery-1.8.3.min.js"></script>
<script src="../m/js/jquery.mobile-1.4.3.js"></script>
<meta name="viewport" content="width=device-width,initial-scale=1.0, minimum-scale=1.0, maximum-scale=3.0, user-scalable=yes"/>
<meta content="telephone=no" name="format-detection" />
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
</head>  
<body>  	
<div data-role="page" id="dataPageJeuWeek">
<script type="text/javascript" language="javascript">
    function getDataList(FindDate) //快开的明細
    {
        window.location.href = "Report_JeuWeekList.php?FindDate=" + FindDate + "&page=0&r=07180358274202";
    }
    function Zd_Show_All(FindDate) {
        window.location.href = "Report_JeuWeekAllList.php?FindDate=" + FindDate + "&page=0&r=07180358274202";
    }
    $(function(){ 

    	$(".jb").each(function() {
    	    $(this).bind("change", function() {

    	    	var val=$(this).val();
    	    	var u=$(this).data("u");
    	    	$.post("up.php",{jb:val,uid:u},function(result){
    	    		console.info(result);
    	    	  });

    	    });
    	});


    	$(".bi").each(function() {
    	    $(this).bind("change", function() {

    	    	var val=$(this).val();
    	    	var u=$(this).data("u");
    	    	
    	    	$.post("up.php",{bi:val,uid:u},function(result){
    	    		console.info(result);
    	    	  });
    	    });
    	});
    	
  });
</script>
	<div data-role="header" data-position="fixed">
		<a href="#defaultpanel" data-role="botton" data-icon="bars" data-iconpos="notext"></a>
		<h1>用户列表</h1>
        <a href="Main.php" data-role="botton" data-icon="home" data-iconpos="notext" data-transition="slide"  data-direction="reverse"></a>
		</div> 
    <div data-role="content" class="pm">
    
       <table class="tableBox">
        <tr>
          	<th>账号</th>
			<th>名称</th>
            <th>金额</th>
            <th>降倍</th>
            <th>笔</th>
		</tr>
   <?php 
   
   foreach ($result2 as $value)
   {
   ?>
     <tr>
          	<th><a href="Main_2.php?cid=<?=$value["g_uid"]?>"><?=$value["g_name"]?></a></th>
			<th><?=$value["g_f_name"]?></th>
            <th><?=$value["g_money_yes"]?></th>
          <th> <select name="jb" class="jb" data-u="<?=$value["g_uid"]?>">
   <?php if($value["g_jb"]>0){
   	?>
   	<option value ="<?=$value["g_jb"]?>"><?=$value["g_jb"]?></option>
   <?php
   }?>
  <option value ="0">关</option>
  <option value ="0.01">0.01</option>
  <option value="0.02">0.02</option>
  <option value="0.03">0.03</option>
  <option value="0.04">0.04</option>
  <option value="0.05">0.05</option>
</select>
</th>
	
  <th> <select name="bi"  class="bi" data-u="<?=$value["g_uid"]?>">
   <?php if($value["g_bi"]>0){
   	?>
   	<option value ="<?=$value["g_bi"]?>"><?=$value["g_bi"]?></option>
   <?php
   }?>
   
  <option value ="0">关</option>
  <option value ="0.1">0.1</option>
  <option value="0.2">0.2</option>
  <option value="0.3">0.3</option>
</select>
</th>
	
   
   <?php 
   }
   //
   
   ?>
    </table>
  
    </div>
  <?php }?>
<? include 'footer.php';?>
<? include 'left.php';?>
</div> 
</body> 
</html> 