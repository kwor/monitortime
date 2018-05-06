<?php
if (!defined('ROOT_PATH'))
	exit('invalid request');
	//include_once ROOT_PATH.'Admin/config/AdminConfig.php';
	//降倍
	//扣退水
	class GetJbAnBi
	{
	
		private $db;
		
		/**
		 *
		 * Enter description here ...
		 * @param int 期數
		 * @param bool where 條件查詢 默認值 查詢非結算的注單
		 * @param $param 單筆執行結算。注單ID值
		 * @param $sum 是否結算
		 */
		function __construct()
		{
			$this->db = new DB();
		}
		
		
		
		/**
		 * 降低赔率
		 * Enter description here ...
		 * $money 是总额
		 * @return Array
		 */
		public function GetJb ($mmoney,$money,$gname)
		{
			$g_jb = $this->db->query("SELECT `g_jb` FROM `g_user` WHERE `g_name` = '{$gname}' ", 1);
			
			//100*（8.7-0.3）=840
			
			$gmoney=$mmoney-($money*$g_jb[0]['g_jb']);
			
			return $gmoney;
			
		}
		
		/**
		 * 降低退水
		 * Enter description here ...
		 * @return Array
		 */
		public function GetBi ($money,$gname)
		{
			
			$g_bi = $this->db->query("SELECT `g_bi` FROM `g_user` WHERE `g_name` = '{$gname}' ", 1);
			$gmoney=$money*(1-$g_bi[0]['g_bi']);
			
			return $gmoney;
			
			
		}
		
		
		
	}