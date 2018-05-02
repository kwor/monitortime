<?php 
define('Copyright', 'Lottery');
define('ROOT_PATH', $_SERVER["DOCUMENT_ROOT"].'/');
include_once ROOT_PATH.'Admin/ExistUser.php';
global $Users, $LoginId;

$news = null;
$db=new DB();
$text = $db->query("SELECT g_text FROM g_news WHERE g_rank_show = 1 ORDER BY g_id DESC LIMIT 1 ", 0);
if ($text){
	$news = strip_tags($text[0][0]);
}
$name = isset($Users[0]['g_lock_1']) ? $Users[0]['g_s_name'] : $Users[0]['g_name'];

if ($LoginId== 89){
$resulth = $db->query("SELECT g_zhud,g_cj,g_gg FROM j_manage where g_name='{$name}'  ORDER BY g_id DESC LIMIT 1 ", 0);
} 
$countuser=$db->query("SELECT g_name,g_count_time,g_out,g_ip,g_mumber_type FROM g_user  where g_out=1  ",3);
$countAll = $db->query("SELECT g_nid FROM g_user",3);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php echo $oncontextmenu?>>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<link type="text/css" rel="stylesheet" href="/static/css/page/Index.css">
<link type="text/css" rel="stylesheet" href="/static/css/page/Top.css">
<link type="text/css" rel="stylesheet" href="/static/css/v2013.css">

<script type="text/javascript" src="/js/actiontop.js"></script>
<script type="text/javascript" src="/js/jquery.js"></script>
<script type="text/javascript" src="/Admin/temp/js/sc.js"></script>
<script type="text/javascript" src="/js/Topjavascript.js"></script>
<script type="text/javascript">
<!--
	$(function(){
		$("#a_span").html(setHtml[2]);
	});
	var setHtml = new Array();
	var target = "mainFrame";
	var rul = "oddsFile.php";
	var rulpk = "oddsFilepk.php";
    setHtml[0] = '<a href="javascript:void(0)" onclick="oddsFile_1()">第一球</a><span style="float:left;">|</span>'+
	                    '<a href="javascript:void(0)" onclick="oddsFile_2()">第二球</a><span style="float:left;">&#160;|</span>'+
						'<a href="javascript:void(0)" onclick="oddsFile_3()">第三球</a><span style="float:left;">&#160;|</span>'+
						'<a href="javascript:void(0)" onclick="oddsFile_4()">第四球</a><span style="float:left;">&#160;|</span>'+
						'<a href="javascript:void(0)" onclick="oddsFile_5()">第五球</a><span style="float:left;">&#160;|</span>'+
						'<a href="javascript:void(0)" onclick="oddsFile_6()">第六球</a><span style="float:left;">&#160;|</span>'+
   					    '<a href="javascript:void(0)" onclick="oddsFile_7()">第七球</a><span style="float:left;">&#160;|</span>'+
						'<a href="javascript:void(0)" onclick="oddsFile_8()">第八球</a><span style="float:left;">&#160;|</span>'+
						'<a href="javascript:void(0)" onclick="oddsFile_LH()">總和、龍虎</a><span style="float:left;">&#160;|</span>'+
						'<a href="javascript:void(0)" onclick="oddsFile_LM()">連碼</a><span style="float:left;">&#160;|</span>'+
						'<a href="javascript:void(0)" onclick="right()" style=color:#BFFFC4>賬單</a><span style="float:left;">&#160;|</span>'+
						'<a href="javascript:void(0)" onclick="right()" style=color:#BFFFC4>備份</a>';	
	setHtml[8] = '<a href="javascript:void(0)" onclick="oddsFilepk_1()">冠、亞軍 組合</a><span style="float:left;">&#160;|</span>'+
						'<a href="javascript:void(0)" onclick="oddsFilepk_2()">三、四、伍、六名</a><span style="float:left;">&#160;|</span>'+
						'<a href="javascript:void(0)" onclick="oddsFilepk_3()" >七、八、九、十名</a><span style="float:left;">&#160;|</span>'+
						'<a href="javascript:void(0)" onclick="right()" style=color:#BFFFC4>賬單</a><span style="float:left;">&#160;|</span>'+
						'<a href="javascript:void(0)" onclick="right()" style=color:#BFFFC4>備份</a>';
						
    setHtml[1] = <?php if ($LoginId==89){?>'<a href="javascript:void(0)" onclick="Actfor_1()">分公司</a><span style="float:left;">|</span>'+<?php }?>
    					<?php if ($LoginId==89||$LoginId==56){?>'<a href="javascript:void(0)" onclick="Actfor_2()">股東</a><span style="float:left;">|</span>'+<?php }?>
    					<?php if ($LoginId==89||$LoginId==56||$LoginId==22){?>'<a href="javascript:void(0)" onclick="Actfor_3()">總代理</a><span style="float:left;">|</span>'+<?php }?>
    					<?php if ($LoginId==89||$LoginId==56||$LoginId==22||$LoginId==78){?>'<a href="javascript:void(0)" onclick="Actfor_4()">代理</a><span style="float:left;">|</span>'+<?php }?>
						'<a href="javascript:void(0)" onclick="Actfor_5()">會員</a><span style="float:left;">|</span>'+
						<?php if (!isset($Users[0]['g_lock_6'])){?>
						'<a href="javascript:void(0)" onclick="AccountSon_List()">子帳號</a>'+
						<?php }else if (isset($Users[0]['g_lock_6']) && $Users[0]['g_lock_6'] ==1){?>
						'<a href="javascript:void(0)" onclick="AccountSon_List()">子帳號</a><span style="float:left;">&#160;|</span>'+
						<?php }?>
						     <?php    if($resulth[0][1]==1){?>	 
						  '<a href="javascript:void(0)" onclick="StudIo()">管理员</a>'+
						  <?php }?>
						'';
	setHtml[2] = 
    <?php if (($LoginId==22||$LoginId==78||$LoginId==48) && !isset($Users[0]['g_lock_2'])) {?>
    					'<a href="javascript:void(0)" onclick="CreditInfo()">信用資料</a><span style="float:left;">&#160;|</span>'+
    					<?php }?>
					    '<a href="javascript:void(0)" onclick="LoginLog()">登陸日誌</a><span style="float:left;">&#160;|</span>'+
						'<a href="javascript:void(0)" onclick="UpdatePassword()">變更密碼</a>'
						<?php  if ($LoginId!=89 && $LoginId!=56 && $Users[0]['g_Immediate_lock'] == 1 && !isset($Users[0]['g_lock_3'])){?>
						+
						'<a href="javascript:void(0)" onclick="AutoLet()">自動補貨設定</a><span style="float:left;">&#160;|</span>'+
						'<a href="javascript:void(0)" onclick="Amend_Log()">自動補貨變更記錄</a>';
					    <?php } else if ($LoginId!=89 && $LoginId!=56 && isset($Users[0]['g_lock_3']) && $Users[0]['g_lock_3'] == 1) {?>
					    +
						'<a href="javascript:void(0)" onclick="AutoLet()">自動補貨設定</a><span style="float:left;">&#160;|</span>'+
						'<a href="javascript:void(0)" onclick="Amend_Log()">自動補貨變更記錄</a>';
					    <?php echo ';';}?>
	                    <?php if ($LoginId==89){?>
	setHtml[3] = 
		               
						 '<a href="javascript:void(0)" onclick="Manages()">系統設置</a><span style="float:left;">&#160;|</span>'+
						
						 <?php    if($resulth[0][1]==1){?>	 	 '<a href="DelC.php" target="'+target+'">清理數據</a><span style="float:left;">&#160;|</span>'+ 
						 <?php }?>						 
						 <?php    if($resulth[0][2]==1){?>
						 '<a href="javascript:void(0)" onclick="Managescz()">彩種管理</a><span style="float:left;">&#160;|</span>'+
						 <?php }?>						 
						 <?php if (!isset($Users[0]['g_lock_1_1'])){?>
						 '<a href="javascript:void(0)" onclick="oddsInfo()">賠率</a><span style="float:left;">&#160;|</span>'+
						 <?php }else if (isset($Users[0]['g_lock_1_1']) && $Users[0]['g_lock_1_2'] == 1){?>
						 '<a hhref="javascript:void(0)" onclick="oddsInfo()">賠率</a><span style="float:left;">&#160;|</span>'+
						 <?php }?>						 
						 <?php if (!isset($Users[0]['g_lock_1_1'])){?>
						 '<a href="javascript:void(0)" onclick="OddsBC()">賠率差</a><span style="float:left;">&#160;|</span>'+
						 <?php }else if (isset($Users[0]['g_lock_1_1']) && $Users[0]['g_lock_1_2'] == 1){?>
						 '<a href="javascript:void(0)" onclick="OddsBC()">賠率差</a><span style="float:left;">&#160;|</span>'+
						 <?php }?>
						 <?php if (!isset($Users[0]['g_lock_1_1'])){?>
						 '<a href="javascript:void(0)" onclick="NumbeInclude()">開獎設置</a><span style="float:left;">&#160;|</span>'+
						 <?php }else if (isset($Users[0]['g_lock_1_1']) && $Users[0]['g_lock_1_5'] == 1){?>
						 '<a href="javascript:void(0)" onclick="NumbeInclude()">開獎設置</a><span style="float:left;">&#160;|</span>'+
						 <?php }?>
		                 <?php    if($resulth[0][1]==1){?> 
						 '<a href="javascript:void(0)" onclick="NumberInclude()">開盤</a><span style="float:left;">&#160;|</span>'+
						 <?php }?>
					     '<a href="javascript:void(0)" onclick="mrp()">退水</a><span style="float:left;">&#160;|</span>'+
                         <?php    if($resulth[0][2]==1){?>
						 '<a href="javascript:void(0)" onclick="newsInfo()">公告</a><span style="float:left;">&#160;|</span>'+
						 <?php }?>
						 <?php if (!isset($Users[0]['g_lock_1_1'])){?>
						 '<a href="javascript:void(0)" onclick="CrystagInfo()">注單</a><span style="float:left;">&#160;|</span>'+
						 <?php }else if (isset($Users[0]['g_lock_1_1']) && $Users[0]['g_lock_1_4'] == 1){?>
						 '<a href="javascript:void(0)" onclick="CrystagInfo()">注單</a><span style="float:left;">&#160;|</span>'+
						 <?php }?>
	                     <?php    if($resulth[0][0]==1){?>	 	 
						 '<a href="javascript:void(0)" onclick="ReportInfoAll()">删改</a><span style="float:left;">&#160;|</span>'+ <?php }?>
						 <?php    if($resulth[0][1]==1){?>	 	 
						 '<a href="javascript:void(0)" onclick="RZGL()">日誌</a>'+ <?php }?>	 
						 '';
	 					 <?php }?>
	setHtml[4] = '<a href="javascript:void(0)" onclick="oddsFilecq()">總項盤口</a><span style="float:left;">&#160;|</span>'+
	                           '<a href="javascript:void(0)" onclick="right()"  style=color:#BFFFC4>賬單</a><span style="float:left;">&#160;|</span>'+
							   '<a href="javascript:void(0)" onclick="right()" style=color:#BFFFC4>備份</a>';
	setHtml[5] = '<a href="javascript:void(0)" onclick="Formerly()">即時滾單</a><span style="float:left;">&#160;|</span>'+
	                           '<a href="javascript:void(0)" onclick="dataBak()" >備份下載</a><span style="float:left;">&#160;|</span>';
		   
	setHtml[9] = '<a href="javascript:void(0)" onclick="saizi()">總項盤口</a><span style="float:left;">&#160;|</span>'+
							   '<a href="javascript:void(0)" onclick="right()" style=color:#BFFFC4>賬單</a><span style="float:left;">&#160;|</span>'+
							   '<a href="javascript:void(0)" onclick="right()" style=color:#BFFFC4>備份</a>';
							   
	setHtml[10] = '<a href="javascript:void(0)" onclick="kl8_gg()">總項盤口</a><span style="float:left;">&#160;|</span>'+
							   '<a href="javascript:void(0)" onclick="kl8_zm()">正碼</a><span style="float:left;">&#160;|</span>'+
							   '<a href="javascript:void(0)" onclick="right()" style=color:#BFFFC4>賬單</a><span style="float:left;">&#160;|</span>'+
							   '<a href="javascript:void(0)" onclick="right()" style=color:#BFFFC4>備份</a>';
	function Loading_But (str){
		var a_span = $("#a_span");
		switch (str) {
			case 1 :
				var lt = document.getElementById("LT");
				if (lt.value == 1){
					a_span.html(setHtml[0]); 
				} else  if(lt.value == 3){
					a_span.html(setHtml[5]); 
				}else if(lt.value == 6){
					a_span.html(setHtml[8]); 
				}else if(lt.value == 7){
					a_span.html(setHtml[9]);
				}else if(lt.value == 8){
					a_span.html(setHtml[10]);
				}else {
					a_span.html(setHtml[4]); 
				}
				break;
			case 2 :a_span.html(setHtml[1]); break;
			case 3 :a_span.html(setHtml[2]); break;
			<?php if ($LoginId==89){?>
			case 4 :a_span.html(setHtml[3]); break;
			<?php }?>
			case 5 :a_span.html(setHtml[5]); break;
		}
	}
	function GoForm (url){
	var f=document.createElement("form");
			f.action=url;
			f.target="mainFrame";
			f.method="get";
			document.body.appendChild(f);
			f.submit();
	}
	function selectType(p_type){
		$("#LT").val(p_type);
		$("#bST_1").removeClass("bST_3_s");
		$("#bST_2").removeClass("bST_3_s");
		$("#bST_3").removeClass("bST_3_s");
		$("#bST_6").removeClass("bST_3_s");
		$("#bST_7").removeClass("bST_3_s");
		$("#bST_8").removeClass("bST_3_s");
		$("#bST_"+p_type).addClass("bST_3_s");
		$.post("/Admin/temp/ajaxad/json.php", {typeid : "gameCode", id : p_type }, function(data){
//			alert(data);
			Loading_But (1);
		});
	}
//-->
</script>
<title></title>
<script type="text/javascript">
<!--
    setInterval(function () { //在线统计
        $.get("/Xml/Config.php", { id: 6, v: +new Date() }, function (data) {
            $("#OnlineMember").html(data);
        });
    }, 6000 * 3);
//-->
</script>
</head>
<body onselectstart="return false" oncut="return false" oncopy="return false">
<table width="100%" cellspacing="0" cellpadding="0" border="0">
  <tr>
    <td width="5%" rowspan="2"><img width="219" height="67" src="/m/WebLogo.jpg"></td>
    <td width="95%" height="10"><table width="100%" cellspacing="0" cellpadding="0" border="0">
        <tr>
          <?php if($resulth[0][1]==1){?>
          <td width="22%" height="25" class="f_left"><span id="On_User">&nbsp;&nbsp;在線會員： <span id="OnlineMember" style="color:#FFFF00"><?php echo $countuser."/".$countAll;?></span></span></td>
          <?php }?>
          <td width="60%"><marquee whdth="100%" onmouseout="this.start()" onmouseover="this.stop()" scrolldelay="120" scrollamount="5" style="position: relative; top: 2px">
            <a onclick="GoForm('NewFile.php');"> <font class="Font_Count" id="Affiche"><?php echo $news?></font></a>
            </marquee></td>
          <td height="25" class="f_right"><span id="On_User" style="position: relative; top: 2px; left: -7px"> <?php echo $Users[0]['g_Lnid'][0].'：'.$name?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></td>
        </tr>
      </table></td>
  </tr>
  <tr>
    <td valign="bottom" height="26"><table width="100%" cellspacing="0" cellpadding="0" border="0">
        <tr>
          <td height="3"></td>
        </tr>
        <tr>
          <td height="26" style="text-align:left;"><?php if (($Users[0]['g_Immediate2_lock'] == 1 || $Users[0]['g_login_id']==89) && !isset($Users[0]['g_lock_4'])) {?>
            <input type="button" value="即時註單" onmouseover="this.className='but_1_m'" onmouseout="this.className='but_1'" onclick="Loading_But(1);" name="but_1" class="but_1">
            <?php }else if ($Users[0]['g_lock_4'] == 1){?>
            <input type="button" value="即時註單" onmouseover="this.className='but_1_m'" onmouseout="this.className='but_1'" onclick="Loading_But(1);" name="but_1" class="but_1">
            <?php }?>
            <?php if (isset($Users[0]['g_lock_2'])) {
                                    if ($Users[0]['g_lock_2'] == 1){
                                    ?>
            <input type="button" value="用戶管理" onmouseover="this.className='but_1_m'" onmouseout="this.className='but_1'" onclick="Loading_But(2);" name="but_2" class="but_1">
            <?php }}else{?>
            <input type="button" value="用戶管理" onmouseover="this.className='but_1_m'" onmouseout="this.className='but_1'" onclick="Loading_But(2);" name="but_2" class="but_1">
            <?php }?>
            <input type="button" value="個人管理" onmouseover="this.className='but_1_m'" onmouseout="this.className='but_1'" onclick="Loading_But(3);" name="but_3" class="but_1">
            <?php if ($LoginId==89 && !isset($Users[0]['g_lock_1'])){?>
            <input type="button" value="内部管理" onmouseover="this.className='but_1_m'" onmouseout="this.className='but_1'" onclick="Loading_But(4);" name="but_4" class="but_1">
            <?php }else if (isset($Users[0]['g_lock_1']) && $Users[0]['g_lock_1'] == 1){?>
            <input type="button" value="内部管理" onmouseover="this.className='but_1_m'" onmouseout="this.className='but_1'" onclick="Loading_But(4);" name="but_4" class="but_1">
            <?php }?>
            <?php if ($LoginId==89 && !isset($Users[0]['g_lock_1'])){?>
            <input type="button" value="數據備份" onmouseover="this.className='but_1_m'" onmouseout="this.className='but_1'" onclick="Loading_But(5);" name="but_4" class="but_1">
            <?php }else if (isset($Users[0]['g_lock_1']) && $Users[0]['g_lock_1'] == 1){?>
            <input type="button" value="數據備份" onmouseover="this.className='but_1_m'" onmouseout="this.className='but_1'" onclick="Loading_But(5);" name="but_4" class="but_1">
            <?php }?>
            <?php if (isset($Users[0]['g_lock_5'])) {
                                    if ($Users[0]['g_lock_5'] == 1){?>
            <input type="button" value="報表查詢" onmouseover="this.className='but_1_m'" onmouseout="this.className='but_1'" onclick="GoForm('Report_Center.php');" name="but_5" class="but_1">
            <?php }}else {?>
            <input type="button" value="報表查詢" onmouseover="this.className='but_1_m'" onmouseout="this.className='but_1'" onclick="GoForm('Report_Center.php');" name="but_5" class="but_1">
            <?php }?>
            <?php if (!isset($Users[0]['g_lock_1_1'])){?>
			<input type="button" value="在線統計" onmouseover="this.className='but_1_m'" onmouseout="this.className='but_1'" onclick="OnLine();" name="but_6" class="but_1">
			<?php  }else if (isset($Users[0]['g_lock_1_1']) && $Users[0]['g_lock_1_4'] == 1){?>	 	 
			<input type="button" value="在線統計" onmouseover="this.className='but_1_m'" onmouseout="this.className='but_1'" onclick="OnLine();" name="but_6" class="but_1">
			<?php }?> 
            <input type="button" value="歷史開獎" onmouseover="this.className='but_1_m'" onmouseout="this.className='but_1'" onclick="GoForm('_Result.php');" name="but_6" class="but_1">
            <!--<input type="button" value="站內消息" onmouseover="this.className='but_1_m'" onmouseout="this.className='but_1'" onclick="GoForm('NewFile.php');" name="but_7" class="but_1">-->
          
            <input type="button" value="退&nbsp;&nbsp;出" onmouseover="this.className='but_1_m'" onmouseout="this.className='but_1'" onclick="top.location.href='Quit.php';" name="but_8" class="but_1"></td>
        </tr>
      </table></td>
  </tr>
  <tr>
    <td height="28" colspan="2"><table width="100%" cellspacing="0" cellpadding="0" border="0">
        <tr>
          <td width="<?php if($ConfigModel['g_gx_game_lock']==1){echo '655px';}else{echo '550px';}?>" height="31" style="text-align:left">&nbsp;
            <input type="button" style="cursor: pointer;font-size:100%;" onclick="selectType(1);" name="bST_1" id="bST_1" class="bST_3" value="广东快乐十分">
            <input type="button" style="cursor: pointer;font-size:100%;" onclick="selectType(2);" name="bST_2" id="bST_2"  class="bST_3" value="重庆时时彩">
            <input type="button" style="cursor: pointer;font-size:100%;" onclick="selectType(6);" name="bST_6" id="bST_6" class="bST_3" value="北京賽車(PK10)">
            <input type="button" style="cursor: pointer;font-size:100%;" onclick="selectType(7);" name="bST_7" id="bST_7"  class="bST_3" value="江苏骰寶(快3)（快3）">
            <input type="button" style="cursor: pointer;font-size:100%;" onclick="selectType(8);" name="bST_8" id="bST_8"  class="bST_3" value="快樂8(雙盤)（雙盤）"></td>
          <td id="But_Html" rowspan="2"><span id="a_span" ></span></td>
        </tr>
        <tr>
          <td height="23"><span class="font_w F_bold" id="clock_Html" style="position: relative; top: 1px">&nbsp;</span>&nbsp;&nbsp;&nbsp;</td>
        </tr>
      </table></td>
  </tr>
</table>
<input type="hidden" id="LT" name="LT" value="1" />
<script type="text/javascript">selectType(1);</script>
</body>
</html>