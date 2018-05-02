<?php
if (!defined('ROOT_PATH'))
exit('invalid request');
$db=new DB();
$ConfigModel = $db->query("SELECT  * FROM `g_config` LIMIT 1", 1);
$ConfigModel = $ConfigModel[0];

?>