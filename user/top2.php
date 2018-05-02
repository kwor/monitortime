<?php 
define('Copyright', 'Lottery');
define('ROOT_PATH', $_SERVER["DOCUMENT_ROOT"].'/');
include_once ROOT_PATH.'functioned/cheCookie.php';
$news = null;
$db=new DB();
$text = $db->query("SELECT `g_text` FROM `g_news` WHERE `g_number_show` = 1 ORDER BY g_id DESC LIMIT 1 ", 0);
if ($text){
	$news = strip_tags($text[0][0]);
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" oncontextmenu="return true">
<head>
<link type="text/css" rel="stylesheet" href="css/TopMenu.css">
<script type="text/javascript" src="js/TopMenu.js"></script>
<script type="text/javascript" src="/js/Topjavascript.js"></script>
</head>
<body onselectstart="return false" oncut="return false" oncopy="return false" id="body_backdrop">
<table width="100%" height="108" cellspacing="0" cellpadding="0" border="0">
  <tr>
    <td width="10%" valign="top"><table width="100%" border="0">
        <tr>
          <td background="/m/TopLogo_132.jpg" width="231" height="79" ><object width="231" height="79" id="top_c" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=8,0,22,0" classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000">
              <param value="transparent" name="wmode">
              <param value="images/lx.swf" name="movie">
              <param value="pageID=0" name="FlashVars">
              <param value="high" name="quality">
              <param value="false" name="menu">
              <embed width="231" height="79" pluginspage="http://www.macromedia.com/shockwave/download/index.cgi?p1_prod_version=shockwaveflash" type="application/x-shockwave-flash" wmode="transparent" quality="high" name="top_c" src="images/lx.swf">
            </object></td>
        </tr>
        <tr>
          <td><img width="231" height="29" src="/images/TopMenu_Top2.jpg"></td>
        </tr>
      </table></td>
    <td width="90%" background="/images/TopMenu_Top.jpg"><table width="100%" height="108" cellspacing="0" cellpadding="0" border="0">
        <tr>
          <td height="43"><table width="716" cellspacing="0" cellpadding="0" border="0">
              <tr>
                <td align="right">
                <a class="T_a" href="javascript:void(0)" onclick="topMenu()" title="信用資料">信用資料</a> | 
                <a class="T_a" href="javascript:void(0)" onclick="upPwd()" title="修改密碼">修改密碼</a> | 
                <a class="T_a" href="javascript:void(0)" onclick="report()" title="未結明細">未結明細</a> | 
                <a class="T_a" href="javascript:void(0)" onclick="resut()" title="今天已結">今天已結</a> | 
                <a class="T_a" href="javascript:void(0)" onclick="repore()" title="兩周報表">兩周報表</a> | 
                <a class="T_a" href="javascript:void(0)" onclick="result()" title="歷史開獎">歷史開獎</a> | 
                <a class="T_a g" href="javascript:void(0)" onclick="rule()" title="規則說明">規則</a> | 
                <a style="color:#baff00" href="javascript:void(0)" onclick="quit()" class="g" title="安全退出" target="_top">退出</a></td>
              </tr>
            </table></td>
        </tr>
        <tr>
          <td height="36"><table width="916" cellspacing="0" cellpadding="0" border="0">
              <tr>
                <td width="1%" height="36"><img width="19" height="36" src="/images/TopMenu_2Left.jpg"></td>
                <td width="99%"><input type="button" value="廣東快樂十分" style="cursor: hand;" onclick="SelectType(1);" name="bST_1" class="bST_1" id="bST_1">
                  <input type="button" value="重慶時時彩" style="cursor: hand;" onclick="SelectType(2);" name="bST_2" class="bST_1" id="bST_2">
                  <input type="button" value="北京賽車(PK10)" style="cursor: hand;" onclick="SelectType(6);" name="bST_6" class="bST_1" id="bST_6">
                  <input type="button" value="江苏骰寶(快3)" style="cursor: hand;" onclick="SelectType(7);" name="bST_7" class="bST_1" id="bST_7">
                  <input type="button" value="快樂8(雙盤)" style="cursor: hand;" onclick="SelectType(8);" name="bST_8" class="bST_1" id="bST_8">
                  <input type="button" value="&nbsp;" style="cursor: hand;" onclick="SelectType(72);" name="bST_7_2" class="bSB_1" id="bST_7_2"></td>
              </tr>
            </table></td>
        </tr>
        <tr>
          <td height="29"><span style="position: relative; top: 0px; left: 0px;" id="Type_List"></span></td>
        </tr>
      </table></td>
  </tr>
</table>
<script type="text/javascript">
//SelectType(1);
<?php
$dateTime = date('Y-m-d H:i:s');
$datejs=date('Y-m-d')." 08:30:00";
$datebj=date('Y-m-d')." 09:03:00";
$datebjx=date('Y-m-d')." 23:57:00";
if($dateTime>$datejs && $dateTime<$datebj ){
echo "SelectType(7);";
}else{
if($dateTime>$datebj && $dateTime < $datebjx ){
echo "SelectType(6);";
}else{
echo "SelectType(2);";
}

}
?>
</script>
</body>
</html>