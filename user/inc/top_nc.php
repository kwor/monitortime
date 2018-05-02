<?php
/*  
  Copyright (c) 2010-02 Game
  Game All Rights Reserved. 
  
  Author: Version:1.0
  Date:2011-12-9
*/
define('Copyright', 'Lottery');
define('ROOT_PATH', $_SERVER["DOCUMENT_ROOT"].'/');
include_once ROOT_PATH.'functioned/cheCookie.php';
include_once ROOT_PATH.'user/offGamenc.php';
global $user;
$_SESSION['cq'] = false;
echo '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" oncontextmenu="return false">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="css/sGame.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="./js/sc.js"></script>
<script type="text/javascript" src="/js/jquery.js"></script>
<script type="text/javascript" src="./js/funcions_nc.js"></script>
<script type="text/javascript" src="./js/sGame_nc.js"></script>

<link href="/user/artDialog4.1.7/skins/aero.css" rel="stylesheet" type="text/css" /> 
<script type="text/javascript" src="/user/artDialog4.1.7/artDialog.source.js?skin=aero"></script>
<script type="text/javascript" src="/user/artDialog4.1.7/plugins/iframeTools.source.js"></script>

<title></title>
<script type="text/javascript">
	var s = window.parent.frames.leftFrame.location.href.split("/");
		s = s[s.length-1];
		if (s !== "left.php")
			window.parent.frames.leftFrame.location.href = "/user/left.php";
			
						
function soundset(sod){
if(sod.value=="on"){
sod.src="images/soundoff.png";
sod.value="off";
}
else{
sod.src="images/soundon.png";
sod.value="on";
}
SetCookie("soundbut",sod.value);
}
</script>
<style type="text/css">
div#row1 { float: left;  }
div#row2 { }
</style>
</head><body>';

?>