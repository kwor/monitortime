<?php
define('Copyright', 'Lottery');
define('ROOT_PATH', $_SERVER["DOCUMENT_ROOT"].'/');
$_GET[type]($_GET[sid]);
$type = $_GET['type'];
$sid = $_GET['sid'];
$db=new DB();
$result = $db->query("SELECT `g_id`, `g_qishu` FROM `g_history` ORDER BY g_qishu DESC LIMIT 84 ", 1);
$resultcq = $db->query("SELECT `g_id`, `g_qishu` FROM `g_history2` ORDER BY g_qishu DESC LIMIT 120 ", 1);
$resultpk = $db->query("SELECT `g_id`, `g_qishu` FROM `g_history6` ORDER BY g_qishu DESC LIMIT 179 ", 1);
$resultjs = $db->query("SELECT `g_id`, `g_qishu` FROM `g_history7` ORDER BY g_qishu DESC LIMIT 82 ", 1);
$resultkl8 = $db->query("SELECT `g_id`, `g_qishu` FROM `g_history8` ORDER BY g_qishu DESC LIMIT 179 ", 1);
$resultjxssc = $db->query("SELECT `g_id`, `g_qishu` FROM `g_history3` ORDER BY g_qishu DESC LIMIT 120 ", 1);
$resultxjssc = $db->query("SELECT `g_id`, `g_qishu` FROM `g_history10` ORDER BY g_qishu DESC LIMIT 120 ", 1);
$resulttjssc = $db->query("SELECT `g_id`, `g_qishu` FROM `g_history11` ORDER BY g_qishu DESC LIMIT 120 ", 1);
$resultxyft = $db->query("SELECT `g_id`, `g_qishu` FROM `g_history4` ORDER BY g_qishu DESC LIMIT 179 ", 1);
$resultnc = $db->query("SELECT `g_id`, `g_qishu` FROM `g_history9` ORDER BY g_qishu DESC LIMIT 84 ", 1);
$MemberList = $userModel->GetMemberAll();
  
?>