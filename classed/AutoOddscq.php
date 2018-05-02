<?php
/* 
  Copyright (c) 2010-02 Game
  Game All Rights Reserved. 
  
  Author: Version:1.0
  Date:2012-2-24 09:28:32
*/
if (!defined('ROOT_PATH'))
exit('invalid request');

include_once ROOT_PATH.'config/Oddes.php';
include_once ROOT_PATH.'functioned/peizhi.php';

  
class AutomaticOddscq
{
	private $db;
	private $Continuous;
	private $NumValue;
	private $StrValue;

	/**
	 *@param $Continuous 連續出次數
	 *@param $NumValue 號碼總降值
	 *@param $StrValue 雙面總降值
	 */
	public function __construct($Continuous, $NumValue, $StrValue)
	{
		$this->db = new DB();
		$this->Continuous = $Continuous;
		$this->NumValue = $NumValue;
		$this->StrValue = $StrValue;
	}
	
	  
				 
	public function UpExecution()
	{
	$qiu=0;
		$result = $this->SearchNumber($this->Continuous, $this->NumValue, $this->StrValue);
		if ($result['Num'] )
		{
			foreach ($result['Num'] as $key=>$value)
			{
			 
				//$sql = "UPDATE g_odds2 SET `{$key}`={$key}-{$value} WHERE g_type <> 'Ball_6' AND g_type <> 'Ball_7' AND g_type <> 'Ball_8' AND g_type <> 'Ball_9'";
				//$this->db->query($sql, 2);
			// $qiu=$value;
			}
		}
		if ($result['Str'] )
		{
			for ($i=0; $i<count($result['Str']); $i++)
			{
		 if($result['Str'][$i][1]!="")
		 { 
		 //echo print_r($result['Num']);
		// echo $qiu;
				$sql = "UPDATE g_odds2 SET `{$result['Str'][$i][1]}` = {$result['Str'][$i][1]}-{$result['Str'][$i][2]} WHERE g_type ='{$result['Str'][$i][0]}' LIMIT 1 ";
				$this->db->query($sql, 2);
		}
		  
				//增加双面降水
				 global $shuangjiangpv;
				$qiu=$result['Str'][$i][4];
				$qiu6=$qiu/2;
				if($shuangjiangpv=="1"){
				if($result['Str'][$i][1]=="h12")
				{
				$zz="h11";
				$sql = "UPDATE g_odds2 SET `{$zz}` = {$zz}-{$result['Str'][$i][2]} WHERE g_type ='{$result['Str'][$i][0]}' LIMIT 1 ";
				$this->db->query($sql, 2);
				//如果是大则降01234  小降一半  大降全部
				 
				$sql6 = "UPDATE g_odds2 SET `h1`=h1-{$qiu6},`h2`=h2-{$qiu6},`h3`=h3-{$qiu6},`h4`=h4-{$qiu6},`h5`=h5-{$qiu6} WHERE g_type = 'Ball_{$result['Str'][$i][3]}'";
				//echo $sql;
				$this->db->query($sql6, 2);
				
				$sql = "UPDATE g_odds2 SET `h6`=h6-{$qiu},`h7`=h7-{$qiu},`h8`=h8-{$qiu},`h9`=h9-{$qiu},`h10`=h10-{$qiu} WHERE g_type = 'Ball_{$result['Str'][$i][3]}'";
				//echo $sql;
				$this->db->query($sql, 2);
				}
				if($result['Str'][$i][1]=="h11")
				{
				$zz="h12";
				$sql = "UPDATE g_odds2 SET `{$zz}` = {$zz}-{$result['Str'][$i][2]} WHERE g_type ='{$result['Str'][$i][0]}' LIMIT 1 ";
				$this->db->query($sql, 2);
				//如果是小则降 56789
				$sql6 = "UPDATE g_odds2 SET `h6`=h6-{$qiu6},`h7`=h7-{$qiu6},`h8`=h8-{$qiu6},`h9`=h9-{$qiu6},`h10`=h10-{$qiu6} WHERE g_type = 'Ball_{$result['Str'][$i][3]}'";
				//echo $sql;
				$this->db->query($sql6, 2);
				
				$sql = "UPDATE g_odds2 SET `h1`=h1-{$qiu},`h2`=h2-{$qiu},`h3`=h3-{$qiu},`h4`=h4-{$qiu},`h5`=h5-{$qiu} WHERE g_type = 'Ball_{$result['Str'][$i][3]}'";
				//echo $sql;
				$this->db->query($sql, 2);
				}
				 
				if($result['Str'][$i][1]=="h14")
				{
				$zz="h13";
				$sql = "UPDATE g_odds2 SET `{$zz}` = {$zz}-{$result['Str'][$i][2]} WHERE g_type ='{$result['Str'][$i][0]}' LIMIT 1 ";
				$this->db->query($sql, 2);
				//如果是单则降 13579
				$sql = "UPDATE g_odds2 SET `h1`=h1-{$qiu},`h3`=h3-{$qiu},`h5`=h5-{$qiu},`h7`=h7-{$qiu},`h9`=h9-{$qiu} WHERE g_type = 'Ball_{$result['Str'][$i][3]}'";
				//echo $sql;
				$this->db->query($sql, 2);
				
				$sql6 = "UPDATE g_odds2 SET `h2`=h2-{$qiu6},`h4`=h4-{$qiu6},`h6`=h6-{$qiu6},`h8`=h8-{$qiu6},`h10`=h10-{$qiu6} WHERE g_type = 'Ball_{$result['Str'][$i][3]}'";
				//echo $sql;
				$this->db->query($sql6, 2);
				}
				 
				if($result['Str'][$i][1]=="h13")
				{
				$zz="h14";
				$sql = "UPDATE g_odds2 SET `{$zz}` = {$zz}-{$result['Str'][$i][2]} WHERE g_type ='{$result['Str'][$i][0]}' LIMIT 1 ";
				$this->db->query($sql, 2);
				//如果是双则降 246810
				$sql = "UPDATE g_odds2 SET `h2`=h2-{$qiu},`h4`=h4-{$qiu},`h6`=h6-{$qiu},`h8`=h8-{$qiu},`h10`=h10-{$qiu} WHERE g_type = 'Ball_{$result['Str'][$i][3]}'";
				//echo $sql;
				$this->db->query($sql, 2);
				
				$sql6 = "UPDATE g_odds2 SET `h1`=h1-{$qiu6},`h3`=h3-{$qiu6},`h5`=h5-{$qiu6},`h7`=h7-{$qiu6},`h9`=h9-{$qiu6} WHERE g_type = 'Ball_{$result['Str'][$i][3]}'";
				//echo $sql;
				$this->db->query($sql6, 2);
				}
				 
				if($result['Str'][$i][1]=="h1")
				{
				$zz="h2";
				$sql = "UPDATE g_odds2 SET `{$zz}` = {$zz}-{$result['Str'][$i][2]} WHERE g_type ='{$result['Str'][$i][0]}' LIMIT 1 ";
				$this->db->query($sql, 2);
				}
				if($result['Str'][$i][1]=="h2")
				{
				$zz="h1";
				$sql = "UPDATE g_odds2 SET `{$zz}` = {$zz}-{$result['Str'][$i][2]} WHERE g_type ='{$result['Str'][$i][0]}' LIMIT 1 ";
				$this->db->query($sql, 2);
				}
				if($result['Str'][$i][1]=="h3")
				{
				$zz="h4";
				$sql = "UPDATE g_odds2 SET `{$zz}` = {$zz}-{$result['Str'][$i][2]} WHERE g_type ='{$result['Str'][$i][0]}' LIMIT 1 ";
				$this->db->query($sql, 2);
				}
				if($result['Str'][$i][1]=="h4")
				{
				$zz="h3";
				$sql = "UPDATE g_odds2 SET `{$zz}` = {$zz}-{$result['Str'][$i][2]} WHERE g_type ='{$result['Str'][$i][0]}' LIMIT 1 ";
				$this->db->query($sql, 2);
				}
				if($result['Str'][$i][1]=="h5")
				{
				$zz="h6";
				$sql = "UPDATE g_odds2 SET `{$zz}` = {$zz}-{$result['Str'][$i][2]} WHERE g_type ='{$result['Str'][$i][0]}' LIMIT 1 ";
				$this->db->query($sql, 2);
				}
				if($result['Str'][$i][1]=="h6")
				{
				$zz="h5";
				$sql = "UPDATE g_odds2 SET `{$zz}` = {$zz}-{$result['Str'][$i][2]} WHERE g_type ='{$result['Str'][$i][0]}' LIMIT 1 ";
				$this->db->query($sql, 2);
				}
				 	
				}
			}
		}
	}
	
	/**
	 * 查詢連續N期不出的號碼
	 */
	private function SearchNumber($Continuous, $NumValue, $StrValue)
	{
	//echo $NumValue;
		$gameInfo = new GameInfo();
		//得到雙面無出期數
		$NumberStrArr = $gameInfo->OpenNumberCountb ($Continuous);
		//echo print_r($NumberStrArr);
		foreach ($NumberStrArr as $key=>$value)
		{
		$qiu=$NumValue;
			$values = $StrValue;
			if ($value > $Continuous ){
				$n = $value - $Continuous;
				$count = 0;
				$qiu1=0;
				for ($i=0; $i<$n; $i++)
				{
				$count += $StrValue;
				$values += $count;
				$qiu1+=$NumValue;
				$qiu += $qiu1;
				//echo $qiu."-";
				}
				//$qiu1+=$NumValue;
				//$qiu+=$qiu1;
				//echo $i;
			}
			 $numArr[] = $this->NumberFormat($key, $values,$qiu);
			 $values = $count= 0;
		}
		
		 
		
		$NumberArr = $gameInfo->OpenNumberCount (1, true);
		$NumberArr = $this->ResultStrValue($NumberArr, $Continuous);
		//echo print_r($Continuous);
		//計算需要降多少次賠率
		$UpOddsArr = array();
		foreach ($NumberArr as $key=>$value)
		{
			$a = $key == 0 ? 1 : $key;
			$UpOddsArr['h'.$a] = $NumValue;
			if ($value > $Continuous ){
				$n = $value - $Continuous;
				$count = 0;
				for ($i=0; $i<$n; $i++)
					$count += $NumValue;
				//$UpOddsArr['h'.$a] += $count;  //关闭球号降赔
			}
		}
		$result = array('Num'=>$UpOddsArr, 'Str'=>$numArr);
		return $result;
	}
	
	private function ResultStrValue($NumberArr, $Continuous)
	{
		$NumberArrs =array();
		foreach ($NumberArr as $key=>$value)
		{
			if ($value >= $Continuous )
				$NumberArrs[$key] = $value;
		}
		return $NumberArrs;
	}
	
	private function NumberFormat($num, $param,$NumValue)
	{
		$str=array();
		$p = mb_substr($num, 3,1);
		switch ($num)
		{
			case "第{$p}球-大":  $str[0] = "Ball_{$p}"; $str[1] = 'h12'; break;
			case "第{$p}球-小" : $str[0] = "Ball_{$p}"; $str[1] = 'h11'; break;
			case "第{$p}球-單" : $str[0] = "Ball_{$p}"; $str[1] = 'h14'; break;
			case "第{$p}球-雙" : $str[0] = "Ball_{$p}"; $str[1] = 'h13'; break;
			case "總和大" :$str[0] = "Ball_6"; $str[1] = 'h2'; break;
			case "總和小" :$str[0] = "Ball_6"; $str[1] = 'h1'; break;
			case "總和單" :$str[0] = "Ball_6"; $str[1] = 'h4'; break;
			case "總和雙" :$str[0] = "Ball_6"; $str[1] = 'h3'; break;
			case "龍" :$str[0] = "Ball_6"; $str[1] = 'h6'; break;
			case "虎" :$str[0] = "Ball_6"; $str[1] = 'h5'; break;
		}
		$str[2]=$param;
		$str[3]=$p;
		$str[4]=$NumValue;
		return $str;
	}
}
?>