﻿<?php 
define('Copyright', 'Lottery');
define('ROOT_PATH', $_SERVER["DOCUMENT_ROOT"].'/');
include_once ROOT_PATH.'user/offGamepk.php';
include_once ROOT_PATH.'functioned/cheCookie.php';
if ($user[0]['g_look'] == 2) exit(href('repore.php'));
$ConfigModel = configModel("`g_pk_game_lock`, `g_mix_money`");
if ($ConfigModel['g_pk_game_lock'] !=1)exit(href('right.php'));
$onclick = 'onclick="getResult(this)" href="javascript:void(0)" ';

//获取当前盘口
	$name = base64_decode($_COOKIE['g_user']);
	$db=new DB();
	$sql = "SELECT g_panlu,g_panlus FROM g_user where g_name='$name' LIMIT 1";
	$result = $db->query($sql, 1);

 $pan = explode(',', $result[0]['g_panlus']); 
$_SESSION['gx'] = false;
$_SESSION['gd'] = false;
$_SESSION['pk'] = true;
$_SESSION['cq'] = false;
$_SESSION['sz'] = false;
$_SESSION['kl8'] = false;
$g = $_GET['g'];
$abc = $_GET['abc'];
if($abc==null) {$abc=$result[0]['g_panlu'];
}else{
$sql = "update g_user set g_panlu='$abc' where g_name='$name'";
$result1 = $db->query($sql, 2);
}

markPos("前台-PK下注");

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" oncontextmenu="return false">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="css/sGame.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="./js/sc.js"></script>
<script type="text/javascript" src="/js/jquery.js"></script>
<script type="text/javascript" src="./js/odds_zh_pk.js"></script>
<script type="text/javascript" src="./js/plxz.js"></script>

<link href="/user/artDialog4.1.7/skins/aero.css" rel="stylesheet" type="text/css" /> 
<script type="text/javascript" src="/user/artDialog4.1.7/artDialog.source.js?skin=aero"></script>
<script type="text/javascript" src="/user/artDialog4.1.7/plugins/iframeTools.source.js"></script>


<title></title>
<script type="text/javascript">
var s = window.parent.frames.leftFrame.location.href.split('/');
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
</head>
<body style="margin-left:3px;" onselectstart="return false">
<table class="th" border="0" cellpadding="0" cellspacing="0" style="margin-top:8px;top:10px;">
	<tr>
    	<td width="142" height="28" class="bolds">北京賽車(PK10)　</td>
        <td colspan="2" class="bolds" style="color:red">
                     <td colspan="2" class="bolds" style="color:red"> <div  id="row1" style="position: relative;  FONT-FAMILY: Arial; height: 15px; color: red; font-size: 10pt;">
<span>今天輸贏：</span>&nbsp;</div><div><span id="sy"  class="shuyingjieguo2">0.0</span></div></td>
        <td align="right">&nbsp;</td>
  <td class="bolds" width="102">
        	<span id="number" style="font-size:12px;position:relative; top:1px"></span>期賽果        </td>
        <td width="24" class="No_" id="a"></td>
        <td width="24" class="No_" id="b"></td>
        <td width="24" class="No_" id="c"></td>
        <td width="24" class="No_" id="d"></td>
        <td width="24" class="No_" id="e"></td>
        <td width="24" class="No_" id="f"></td>
        <td width="24" class="No_" id="g"></td>
        <td width="24" class="No_" id="h"></td>
		<td width="24" class="No_" id="j"></td>
        <td width="24" class="No_" id="k"></td>
    </tr>
</table>
<table class="th" border="0" cellpadding="0" cellspacing="0" style="margin-top:0px;">
    <tr>
    	<td height="30" width="90px" ><span id="o" style=" color:#009900; font-weight:bold; font-size:14px;position:relative; top:1px"></span>期</td>
        <td width="160"><span style="color:#0033FF; font-weight:bold" id="tys">冠、亞軍 組合</span></td>
        <td colspan="2"><form id="form1" name="form1" method="post" action="">
          <label><span style="color:#0033FF; font-weight:bold" id="tys">
			<script>
			function changepan(sel){
			window.parent.frames.mainFrame.location.href = "sGame_pk.php?g=<?php echo$g?>&abc="+sel.value;
			}
			
			</script>
           
           </label>
        </form></td>
       <td>距離封盤：<span style="font-size:104%" id="endTime">加載中...</span></td>
        <td colspan="6">距離開獎：<span style="color:red;font-size:104%" id="endTimes">加載中...</span></td>
        <td colspan="2" align="right"><span id="endTimea"></span>秒</td>
    </tr>
</table>
<form id="dp" action="" method="post" target="leftFrame" autocomplete="off">
<input type="hidden" name="actions" value="fn3" />
<input type="hidden" name="gtypes" value="1" />
<input type="hidden" id="mix" value="<?php echo$ConfigModel['g_mix_money']?>" />
<table class="wq saiche" border="0" cellpadding="0" cellspacing="1">
	<tr class="t_list_caption" style="color:#000">
    	<td colspan="12">冠、亞軍和 （冠軍車號＋亞軍車號 ＝ 和）</td>
    </tr>
    <tr class="t_td_text">
    	<td width="57" class="caption_1">3</td>
    	<td class="o" width="45" id="lh1"></td>
    	  <td class="tt" id="t11_h1"></td>
    	<td width="57" class="caption_1">4</td>
    	<td class="o" width="45" id="lh2"></td>
    	 <td class="tt" id="t11_h2"></td>
    	<td width="57" class="caption_1">5</td>
    	<td class="o" width="45" id="lh3"></td>
    	 <td class="tt" id="t11_h3"></td>
    	<td width="57" class="caption_1">6</td>
    	<td class="o" width="45" id="lh4"></td>
    	 <td class="tt" id="t11_h4"></td>
    </tr>
    <tr class="t_td_text">
    	<td width="57" class="caption_1">7</td>
    	<td class="o" width="45" id="lh5"></td>
    	 <td class="tt" id="t11_h5"></td>
    	<td width="57" class="caption_1">8</td>
    	<td class="o" width="45" id="lh6"></td>
    	 <td class="tt" id="t11_h6"></td>
    	<td width="57" class="caption_1">9</td>
    	<td class="o" width="45" id="lh7"></td>
    	 <td class="tt" id="t11_h7"></td>
    	<td width="57" class="caption_1">10</td>
    	<td class="o" width="45" id="lh8"></td>
    	 <td class="tt" id="t11_h8"></td>
    </tr>
	 <tr class="t_td_text">
    	<td width="57" class="caption_1">11</td>
    	<td class="o" width="45" id="lh9"></td>
    	 <td class="tt" id="t11_h9"></td>
    	<td width="57" class="caption_1">12</td>
    	<td class="o" width="45" id="lh10"></td>
    	 <td class="tt" id="t11_h10"></td>
    	<td width="57" class="caption_1">13</td>
    	<td class="o" width="45" id="lh11"></td>
    	 <td class="tt" id="t11_h11"></td>
    	<td width="57" class="caption_1">14</td>
    	<td class="o" width="45" id="lh12"></td>
    	 <td class="tt" id="t11_h12"></td>
    </tr>
	 <tr class="t_td_text">
    	<td width="57" class="caption_1">15</td>
    	<td class="o" width="45" id="lh13"></td>
    	 <td class="tt" id="t11_h13"></td>
    	<td width="57" class="caption_1">16</td>
    	<td class="o" width="45" id="lh14"></td>
    	 <td class="tt" id="t11_h14"></td>
    	<td width="57" class="caption_1">17</td>
    	<td class="o" width="45" id="lh15"></td>
    	 <td class="tt" id="t11_h15"></td>
    	<td width="57" class="caption_1">18</td>
    	<td class="o" width="45" id="lh16"></td>
    	 <td class="tt" id="t11_h16"></td>
    </tr>
	 <tr class="t_td_text">
    	<td width="57" class="caption_1">19</td>
    	<td class="o" width="45" id="lh17"></td>
    	 <td class="tt" id="t11_h17"></td>
    	<td colspan="9" class="caption_1"></td>
   	</tr>
	<tr class="t_td_text">
    	<td width="57" class="caption_1">冠亞大</td>
    	<td class="o" width="45" id="kh1"></td>
    	 <td class="tt" id="t12_h1"></td>
    	<td width="57" class="caption_1">冠亞小</td>
    	<td class="o" width="45" id="kh2"></td>
    	 <td class="tt" id="t12_h2"></td>
    	<td width="57" class="caption_1">冠亞單</td>
    	<td class="o" width="45" id="kh3"></td>
    	 <td class="tt" id="t12_h3"></td>
    	<td width="57" class="caption_1">冠亞雙</td>
    	<td class="o" width="45" id="kh4"></td>
    	 <td class="tt" id="t12_h4"></td>
    </tr>
  </table>
  <table class="wq" border="0" cellpadding="0" cellspacing="1">
	<tr class="t_list_caption"><!-- <a class="nv_a" -->
     	<td class="td_caption_2"><a class="nv" <?php echo $onclick?>>冠、亞軍和</a></td>
        <td><a class="nv" <?php echo $onclick?>>冠、亞軍和 大小</a></td>
        <td><a class="nv" <?php echo $onclick?>>冠、亞軍和 單雙</a></td>
    </tr>
    <tr>
    	<td colspan="4" class="t_td_text" align="center">
        	<table class="hj" border="0" cellpadding="0" cellspacing="1">
            	<tr class="t_td_text" id="z_cl"><td></td></tr>
            </table>
        </td>
    </tr>
</table>
	<table class="wq" border="0" cellpadding="0" cellspacing="1">
	<tr class="t_list_caption" style="color:#000">
    	<td colspan="12">冠军</td>
   	</tr>
    <tr class="t_td_text">
    	<td width="29"  class="No_1"></td>
    	<td class="o" width="45" id="ah1"></td>
    	 <td class="tt" id="t1_h1"></td>
    	<td width="29"  class="No_5"></td>
    	<td class="o" width="45" id="ah5"></td>
    	 <td class="tt" id="t1_h5"></td>
    	<td width="29"  class="No_9"></td>
    	<td class="o" width="45" id="ah9"></td>
    	 <td class="tt" id="t1_h9"></td>
    	<td width="57" class="caption_1">大</td>
    	<td class="o" width="45" id="ah11"></td>
    	 <td class="tt" id="t1_h11"></td>
    </tr>
    <tr class="t_td_text">
    	<td width="29"  class="No_2"></td>
    	<td class="o" width="45" id="ah2"></td>
    	 <td class="tt" id="t1_h2"></td>
    	<td width="29"  class="No_6"></td>
    	<td class="o" width="45" id="ah6"></td>
    	 <td class="tt" id="t1_h6"></td>
    	<td width="29"  class="No_10"></td>
		<td class="o" width="45" id="ah10"></td>
    	 <td class="tt" id="t1_h10"></td>
    	<td width="57" class="caption_1">小</td>
    	<td class="o" width="45" id="ah12"></td>
    	 <td class="tt" id="t1_h12"></td>
    </tr>
    <tr class="t_td_text">
    	<td width="29"  class="No_3"></td>
    	<td class="o" width="45" id="ah3"></td>
    	 <td class="tt" id="t1_h3"></td>
    	<td width="29"  class="No_7"></td>
    	<td class="o" width="45" id="ah7"></td>
    	 <td class="tt" id="t1_h7"></td>
    	<td width="57" class="caption_1">龍</td>
    	<td class="o" width="45" id="ah15"></td>
    	 <td class="tt" id="t1_h15"></td>
    	<td width="57" class="caption_1">單</td>
    	<td class="o" width="45" id="ah13"></td>
    	 <td class="tt" id="t1_h13"></td>
    </tr>
    <tr class="t_td_text">
    	<td width="29"  class="No_4"></td>
    	<td class="o" width="45" id="ah4"></td>
    	 <td class="tt" id="t1_h4"></td>
    	<td width="29"  class="No_8"></td>
    	<td class="o" width="45" id="ah8"></td>
    	 <td class="tt" id="t1_h8"></td>
    	<td width="57" class="caption_1">虎</td>
    	<td class="o" width="45" id="ah16"></td>
    	 <td class="tt" id="t1_h16"></td>
    	<td width="57" class="caption_1">雙</td>
    	<td class="o" width="45" id="ah14"></td>
    	 <td class="tt" id="t1_h14"></td>
    </tr>
    <tr class="t_list_caption" style="color:#000">
    	<td colspan="12">亞軍</td>
   	</tr>
    <tr class="t_td_text">
    	<td width="29"  class="No_1"></td>
    	<td class="o" width="45" id="bh1"></td>
    	 <td class="tt" id="t2_h1"></td>
    	<td width="29"  class="No_5"></td>
    	<td class="o" width="45" id="bh5"></td>
    	 <td class="tt" id="t2_h5"></td>
    	<td width="29"  class="No_9"></td>
    	<td class="o" width="45" id="bh9"></td>
    	 <td class="tt" id="t2_h9"></td>
    	<td width="57" class="caption_1">大</td>
    	<td class="o" width="45" id="bh11"></td>
    	 <td class="tt" id="t2_h11"></td>
    </tr>
    <tr class="t_td_text">
    	<td width="29"  class="No_2"></td>
    	<td class="o" width="45" id="bh2"></td>
    	 <td class="tt" id="t2_h2"></td>
    	<td width="29"  class="No_6"></td>
    	<td class="o" width="45" id="bh6"></td>
    	 <td class="tt" id="t2_h6"></td>
    	<td width="29"  class="No_10"></td>
    	<td class="o" width="45" id="bh10"></td>
    	 <td class="tt" id="t2_h10"></td>
    	<td width="57" class="caption_1">小</td>
    	<td class="o" width="45" id="bh12"></td>
    	 <td class="tt" id="t2_h12"></td>
    </tr>
    <tr class="t_td_text">
    	<td width="29"  class="No_3"></td>
    	<td class="o" width="45" id="bh3"></td>
    	 <td class="tt" id="t2_h3"></td>
    	<td width="29"  class="No_7"></td>
    	<td class="o" width="45" id="bh7"></td>
    	 <td class="tt" id="t2_h7"></td>
    	<td width="57" class="caption_1">龍</td>
    	<td class="o" width="45" id="bh15"></td>
    	 <td class="tt" id="t2_h15"></td>
    	<td width="57" class="caption_1">單</td>
    	<td class="o" width="45" id="bh13"></td>
    	 <td class="tt" id="t2_h13"></td>
    </tr>
    <tr class="t_td_text">
    	<td width="29"  class="No_4"></td>
    	<td class="o" width="45" id="bh4"></td>
    	 <td class="tt" id="t2_h4"></td>
    	<td width="29"  class="No_8"></td>
    	<td class="o" width="45" id="bh8"></td>
    	 <td class="tt" id="t2_h8"></td>
    	<td width="57" class="caption_1">虎</td>
    	<td class="o" width="45" id="bh16"></td>
    	 <td class="tt" id="t2_h16"></td>
    	<td width="57" class="caption_1">雙</td>
    	<td class="o" width="45" id="bh14"></td>
    	 <td class="tt" id="t2_h14"></td>
    </tr>
</table>
<table border="0" width="700" style="margin-top:5px;top:10px;">
	<tr height="30">
    	<td align="center" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	    	<input onclick="Shortcut_SH(false);" id="Shortcut_Switch" name="Shortcut_Switch" value="" type="checkbox"/>
	    	<a class="font_g F_bold" onfocus="this.blur()" title="快捷下註" onclick="Shortcut_SH(true);" href="javascript:void(0)" style="color:#299a26;text-decoration:none; font-weight:bold;">快捷下注</a>
	    	<span id="Shortcut_DIV" class="font_g"></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="button" onclick="Shortcut_hidden();reset();" class="inputs ti" value="重&nbsp;填" />&nbsp;&nbsp;&nbsp;&nbsp;<input onclick = "submitforms()" type="button" id="submits" class="inputs ti" value="下&nbsp;註" /><input type="text" id="submitss"  value="" style="width:0px;height:0px;border:0px;"/></span></td>
	        <td width="0" class="actiionn"></td>
    </tr>
</table>
</form>
<br />

<div id="look"></div>
<?php include_once 'inc/cl_file.php';?>
<?php 
$db = new DB();
$text =$db->query("SELECT g_text,g_cishu FROM g_set_user_news WHERE g_name = '{$user[0]['g_name']}' LIMIT 1", 0);
if ($text){
	alert($text[0][0]);
	$jiacishu=$text[0][1]+1;
	$sql321 = "UPDATE g_set_user_news SET g_cishu = '{$jiacishu}' WHERE g_name = '{$user[0]['g_name']}' LIMIT 1";
	$db->query($sql321, 2);
}
?>
</body>
</html>