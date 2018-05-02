<?php 



$name = base64_decode($_COOKIE['g_user']);

ResuserMoney($name);


?>

<div data-role="footer" data-position="fixed" data-tap-toggle="false"><h2><span class="zhanghu" id="t_credit">可用額度:<?php echo is_Number(($user[0]['g_money_yes']))?></span><span class="yuer" id="t_amt">今日输赢:<?=is_Number(getWin($user))?></span></h2></div>