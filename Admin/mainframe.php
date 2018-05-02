<?php
if (!defined('ROOT_PATH'))
exit('invalid request');
include_once ROOT_PATH.'functioned/peizhi.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Welcome</title>
<link href="Styles/public.css" rel="stylesheet" type="text/css" />		 
<link href="Styles/m.old.css" rel="stylesheet" type="text/css" />


<script language="javascript" type="text/javascript">
    var _tem = ["<div class=\"clearfix\" id=\"bankLi-down\" style=\"display: none;\">",
						"<ul>",
						<?php  if($peizhigdklsf=="1"){
						echo "\"<li><a id=\\\"a1\\\"  uri=\\\"1\\\" target=\\\"mainFrame\\\" onclick=\\\"onCK(1)\\\">廣東快樂十分</a></li>\"".",";
					     }
					 if($peizhicqssc=="1"){
			            echo "\"<li><a id=\\\"a2\\\"  uri=\\\"2\\\" target=\\\"mainFrame\\\" onclick=\\\"onCK(2)\\\">重慶時時彩</a></li>\"".",";
						}
						 if($peizhijxssc=="1"){
						echo "\"<li><a id=\\\"a3\\\"  uri=\\\"3\\\" target=\\\"mainFrame\\\" onclick=\\\"onCK(3)\\\">全天五分彩</a></li>\"".",";
						}
						 if($peizhixjssc=="1"){
						echo "\"<li><a id=\\\"a10\\\"  uri=\\\"10\\\" target=\\\"mainFrame\\\" onclick=\\\"onCK(10)\\\">新疆時時彩</a></li>\"".",";
						}
						 if($peizhitjssc=="1"){
						echo "\"<li><a id=\\\"a11\\\"  uri=\\\"11\\\" target=\\\"mainFrame\\\" onclick=\\\"onCK(11)\\\">天津時時彩</a></li>\"".",";
						}
						 if($peizhipk10=="1"){
			           echo "\"<li><a id=\\\"a6\\\"  uri=\\\"6\\\" target=\\\"mainFrame\\\" onclick=\\\"onCK(6)\\\">北京賽車(PK10)</a></li>\"".",";
					   }
					    if($peizhijsyxx=="1"){
                       echo "\"<li><a id=\\\"a72\\\"  uri=\\\"72\\\" target=\\\"mainFrame\\\" onclick=\\\"onCK(72)\\\">江苏鱼虾蟹</a></li>\"".",";
					   }
					    if($peizhijssz=="1"){
                       echo "\"<li><a id=\\\"a7\\\"  uri=\\\"7\\\" target=\\\"mainFrame\\\" onclick=\\\"onCK(7)\\\">江苏骰寶(快3)</a></li>\"".",";
					   }
					    if($peizhikl8=="1"){
                       echo "\"<li><a id=\\\"a8\\\"  uri=\\\"8\\\" target=\\\"mainFrame\\\" onclick=\\\"onCK(8)\\\">快樂8(雙盤)</a></li>\"".",";
					   }
					      if($peizhixyft=="1"){
						
						echo "\"<li><a id=\\\"a4\\\"  uri=\\\"4\\\" target=\\\"mainFrame\\\" onclick=\\\"onCK(4)\\\">幸運飛艇</a></li>\"".",";
						}
						 if($peizhinc=="1"){
						echo "\"<li><a id=\\\"a9\\\"  uri=\\\"9\\\" target=\\\"mainFrame\\\" onclick=\\\"onCK(9)\\\">重慶幸運農場</a></li>\"".",";
						}?>
						
						"</ul>",
					"</div>"];
function onCK(v){

	$("#bankLi-down").hide();
	window.frames['header'].SubonCK(v);
	if(window.frames['mainFrame']){
	window.frames['mainFrame'].onSelect(v); //开奖历史选择
	}
	$("#bankLi-down").hide();



};



             
</script>



<link href="Admin/css/aero.css" rel="stylesheet" type="text/css" />
<link href="Admin/css/showLoading.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/jquery.showLoading.min.js"></script>

<script src="js/jquery-1.11.0.min.js" type="text/javascript"></script>
<script src="js/m.old-index.js" type="text/javascript"></script>

<script type="text/javascript" src="js/jquery.artDialog.js"></script>
<script type="text/javascript" src="js/iframeTools.js"></script>



<script type="text/javascript">if ( top.location != self.location ) top.location=self.location;</script>
</head>
<?php

$name=$loginName;
$sql = "SELECT * FROM `g_rank` WHERE `g_name` = '{$name}' AND `g_pwd` = 1 LIMIT 1 ";
		$result = $db->query($sql, 1);
		if ($result)
		{
			//判斷帳號是否需要重新设置密码
			alert('抱歉！您的帳戶為初次登陸 或 密碼由後台重新設定，為安全起見請設定‘新密碼’。');
			?>
			
<body>

<iframe src="/Admin/temp/UpdatePwd_first.php" name="mainFrame" scrolling="no" noresize="noresize" id="mainFrame" width="100%" height="300px" frameborder="no" border="0" framespacing="0"/>
</body>
			<?php
			//include_once ROOT_PATH.'Admin/temp/UpdatePwd_first.php';
		}else{
		    
?>

<frameset id="logOutForms" rows="91,*" cols="," border="0" frameborder="no" framespacing="0">
<frame name="header" id="header" src="/Admin/temp/topMenu.php" frameborder="0" noresize="noresize" scrolling="no" />


<frame name="mainFrame"  target="content" id="content" src="/Admin/temp/NewFile.php" frameborder="0" />


<noframes>
<body>框架不支持</body>
</noframes>
</frameset>
<?php } ?>
</html>
