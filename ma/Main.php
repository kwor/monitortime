<?php 
define('ROOT_PATH', dirname(dirname(__FILE__))."/");
include_once ROOT_PATH.'functioned/global_ma.php';


$db = new DB();
$cid = $_GET['cid'];
$sql="select * from g_rank ";
$result = $db->query($sql, 1);
//print_r($result);

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
</script>
	<div data-role="header" data-position="fixed">
		<a href="#defaultpanel" data-role="botton" data-icon="bars" data-iconpos="notext"></a>
		<h1>代理商一览</h1>
        <a href="Main.php" data-role="botton" data-icon="home" data-iconpos="notext" data-transition="slide"  data-direction="reverse"></a>
		</div> 
    <div data-role="content" class="pm">
    
       <table class="tableBox">
        <tr>
          	<th>账号</td>
			<th>名称</td>
            <th>金额</td>
          
		</tr>
   <?php 
   
   //$result = $userModel->GetUserName_Like($Rank,true);
   foreach ($result as $value)
   {
   ?>
     <tr>
          	<th><a href="Main_2.php?cid=<?=$value["g_uid"]?>"><?=$value["g_name"]?></a></td>
			<th><?=$value["g_f_name"]?></td>
            <th><?=$value["g_money"]?></td>
          
		</tr>
   
   <?php 
   }
   //
   
   ?>
    </table>
  
    </div>

    
  
<? include 'footer.php';?>
<? include 'left.php';?>
</div> 
</body> 
</html> 