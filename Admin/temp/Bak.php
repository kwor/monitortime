<?php
define('Copyright', 'Lottery');
define('ROOT_PATH', $_SERVER["DOCUMENT_ROOT"].'/');
include_once ROOT_PATH.'Admin/ExistUser.php';

$filename=$_POST['GD'].".xls";//�ȶ���һ��excel�ļ�
dump($filename);
$jibie="����˾";
$db=new DB();

header("Content-Type: application/vnd.ms-execl"); 
header("Content-Type: application/vnd.ms-excel; charset=utf-8");
header("Content-Disposition: attachment; filename=$filename"); 
header("Pragma: no-cache"); 
header("Expires: 0");

//��������excel�����ͷ����Ȼ�ⲻ�Ǳ����
echo iconv("utf-8", "gb2312", "���e")."\t";
echo iconv("utf-8", "gb2312", "���]��̖")."\t";
echo iconv("utf-8", "gb2312", "�r�g")."\t";
echo iconv("utf-8", "gb2312", "�ڔ�")."\t";
echo iconv("utf-8", "gb2312", "�ʷN")."\t";
echo iconv("utf-8", "gb2312", "��̖")."\t";
echo iconv("utf-8", "gb2312", "���")."\t";
echo iconv("utf-8", "gb2312", "����")."\t";
echo iconv("utf-8", "gb2312", "�r��")."\t";
echo iconv("utf-8", "gb2312", "���~")."\t";
echo iconv("utf-8", "gb2312", "����")."\t";
echo iconv("utf-8", "gb2312", "������")."\t";
echo iconv("utf-8", "gb2312", "�ɖ|")."\t";
echo iconv("utf-8", "gb2312", "�ֹ�˾")."\t";
echo iconv("utf-8", "gb2312", "����˾")."\n";

$result = $db->query("SELECT `g_id`,`g_date`,`g_qishu`,`g_type`,`g_nid`,`g_mingxi_1`,`g_mingxi_2`,`g_odds`,`g_jiner`,`g_distribution`,`g_distribution_1`,`g_distribution_2`,`g_distribution_3`,`g_distribution_4` FROM `g_zhudan` ORDER BY g_id DESC  ", 1);
for ($i=0; $i<count($result); $i++){

echo iconv("GBK", "gb2312", $jibie)."\t";
echo iconv("GBK", "gb2312", $result[$i]['g_id'])."\t";
echo iconv("GBK", "gb2312", $result[$i]['g_date'])."\t";
echo iconv("GBK", "gb2312", $result[$i]['g_qishu'])."\t";
echo iconv("GBK", "gb2312", $result[$i]['g_type'])."\t";
echo iconv("GBK", "gb2312", $result[$i]['g_nid'])."\t";
echo iconv("GBK", "gb2312", $result[$i]['g_mingxi_1'])."\t";
echo iconv("GBK", "gb2312", $result[$i]['g_mingxi_2'])."\t";
echo iconv("GBK", "gb2312", $result[$i]['g_odds'])."\t";
echo iconv("GBK", "gb2312", $result[$i]['g_jiner'])."\t";
echo iconv("GBK", "gb2312", $result[$i]['g_distribution'])."\t";
echo iconv("GBK", "gb2312", $result[$i]['g_distribution_1'])."\t";
echo iconv("GBK", "gb2312", $result[$i]['g_distribution_2'])."\t";
echo iconv("GBK", "gb2312", $result[$i]['g_distribution_3'])."\t";
echo iconv("GBK", "gb2312", $result[$i]['g_distribution_4'])."\n";

           }

?>