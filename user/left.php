<?php 
define('Copyright', 'Lottery');
define('ROOT_PATH', $_SERVER["DOCUMENT_ROOT"].'/');
include_once ROOT_PATH.'functioned/cheCookie.php';
include_once ROOT_PATH.'functioned/peizhi.php';


$name = base64_decode($_COOKIE['g_user']);

ResuserMoney($name);
$db=new DB();
$sql = "SELECT * FROM g_zhudan where g_nid='$name' ORDER BY g_id DESC LIMIT 10";
$result1 = $db->query($sql, 1);

?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="text/javascript" src="/js/jquery.js"></script>
<SCRIPT type="text/javascript">
    if (top.location == self.location) top.location.href = "../"; 
</script>
    <link href="css/left.css" rel="stylesheet" type="text/css">
    <script src="js/Forbid.js" type="text/javascript"></script>
	<meta http-equiv="Refresh" content="30"> 
</head>
<body oncopy="return false" oncut="return false" onselectstart="return false">

<table border='0' cellpadding='0' cellspacing='1' class='t_list' width='231'>
<tr><td class='t_td_caption_1' width='66'>會員帳戶</td><td class='t_td_text' width='165'><?php echo $user[0]['g_name']?>  <?php if($shuaxin="1"){echo " <input type=\"button\"  style=\"float:right;margin-right:10px;\" value=\"刷新\" name=\"refresh\" onclick=\"window.location.reload()\"> ";}	?></td></tr>


<tr>
  <td class='t_td_caption_1'>盤　　口</td>
  <td class='t_td_text'><?php echo strtoupper($user[0]['g_panlu'])?>盤</td>
</tr>
<tr style="text-align:right"><td class='t_td_caption_1'>信用額度</td><td align="left" class="t_td_text"><?php echo number_format($user[0]['g_money'])?></td></tr>
<tr><td class='t_td_caption_1'>可用金額</td><td id="currentCredits" class='t_td_text'><?php echo number_format(is_Number($user[0]['g_money_yes']))?></td></tr>

<!--<?php if($cz=="1"){
echo "
<tr>
	<td colspan=\"5\" class=\"t_td_text\" >
	<table border=\"0\" cellpadding=\"0\" cellspacing=\"1\" width=\"100%\">
                    <tr>
                        <td class=\"JZRCB\"><a href=\"chongzhi.php\" target=\"mainFrame\" style=\"color:#FFFFFF;\">在线充值</a></td>
                   
                        <td class=\"JZRCB\"><a href=\"qukuan.php\" target=\"mainFrame\"  style=\"color:#FFFFFF;\">在线取款</a></td>
                    </tr>
	</table>
	</td>
	</tr>";
	}?>-->
	
	
	<!--投註成功-->
<tr><td class="t_list_caption" colspan="2"><a href="javascript:void(0);" onclick="window.open('http://www.gdfc.org.cn/play_list_game_9.html','廣東快樂十分','width=687,height=464,directories=no,status=no,scrollbars=yes,resizable=yes,menubar=no,toolbar=no,location=no');"> “廣東快樂十分”開獎网</a>&nbsp;</td></tr>

<tr><td class="t_list_caption" colspan="2"><a href="javascript:void(0);" onclick="window.open('http://www.cqcp.net/','重慶時時彩','width=488,height=183,directories=no,status=no,scrollbars=yes,resizable=yes,menubar=no,toolbar=no,location=no');"> “重慶時時彩”開獎网</a>&nbsp;&nbsp;</td></tr>


<tr><td class="t_list_caption" colspan="2"><a href="javascript:void(0);" onclick="window.open('http://www.bwlc.net/','北京賽車','width=687,height=464,directories=no,status=no,scrollbars=yes,resizable=yes,menubar=no,toolbar=no,location=no');"> “北京賽車(PK10)”官方網站</a>&nbsp;&nbsp;</td></tr>

<tr><td class="t_list_caption" colspan="2"><a href="javascript:void(0);" onclick="window.open('http://buy.cqcp.net/gamedraw/lucky/open.shtml','重慶幸運農場','width=687,height=464,directories=no,status=no,scrollbars=yes,resizable=yes,menubar=no,toolbar=no,location=no');"> “重慶幸運農場”官方網站</a>&nbsp;&nbsp;</td></tr>

<tr><td class="t_list_caption" colspan="2"><a href="javascript:void(0);" onclick="window.open('http://www.js.com/','江苏骰寶(快3)','width=687,height=464,directories=no,status=no,scrollbars=yes,resizable=yes,menubar=no,toolbar=no,location=no');"> “江苏骰寶(快3)”官方網站</a>&nbsp;&nbsp;</td></tr>

<tr><td class="t_list_caption" colspan="2"><a href="javascript:void(0);" onclick="window.open('http://www.bwlc.net/bulletin/keno.html','北京快樂8)','width=687,height=464,directories=no,status=no,scrollbars=yes,resizable=yes,menubar=no,toolbar=no,location=no');"> “北京快樂8”官方網站</a>&nbsp;&nbsp;</td></tr>

<tr><td class="t_list_caption" colspan="2"><a href="javascript:void(0);" onclick="window.open('https://www.playnow.com//keno/?WT.ac=global-navigation|keno','加拿大午夜盤官方網站)','width=687,height=464,directories=no,status=no,scrollbars=yes,resizable=yes,menubar=no,toolbar=no,location=no');"> 加拿大午夜盤官方網站</a>&nbsp;&nbsp;</td></tr>


</tbody></table>
</body>

</html>
