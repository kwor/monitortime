<?php
/* 
  Copyright (c) 2010-02 Game
  Game All Rights Reserved. 
  
  Author: Version:1.0
  Date:2011-12-07 09:28:32
*/
if (!defined('ROOT_PATH'))
exit('invalid request');
include_once ROOT_PATH.'config/Oddes.php';
include_once ROOT_PATH.'functioned/peizhi.php';

class AutomaticOddsnc 
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
	
	/**
	 * 執行降賠率
	 * @param unknown_type $Continuous
	 * @param unknown_type $NumValue
	 * @param unknown_type $StrValue
	 */
	public function UpExecution()
	{
	$qiu=0;
		$result = $this->SearchNumber($this->Continuous, $this->NumValue, $this->StrValue);
		if ($result['Num'] )
		{
			foreach ($result['Num'] as $key=>$value)
			{
				//$sql = "UPDATE g_odds9 SET `{$key}`={$key}-{$value} WHERE g_type <> 'Ball_9' AND g_type <> 'Ball_10'";
				///$this->db->query($sql, 2);
			}
		}
		if ($result['Str'] )
		{
			for ($i=0; $i<count($result['Str']); $i++)
			{
			if($result['Str'][$i][1]!="")
		   { 
				$sql = "UPDATE g_odds9 SET `{$result['Str'][$i][1]}` = {$result['Str'][$i][1]}-{$result['Str'][$i][2]} WHERE g_type ='{$result['Str'][$i][0]}' LIMIT 1 ";
				$this->db->query($sql, 2);
			}	
				//增加双面降水
				 global $shuangjiangpv;
				 $qiu=$result['Str'][$i][4];
				 $qiu6=$qiu/2;
				if($shuangjiangpv=="1"){
				if($result['Str'][$i][1]=="h22")
				{
				
				$zz="h21";
				$sql = "UPDATE g_odds9 SET `{$zz}` = {$zz}-{$result['Str'][$i][2]} WHERE g_type ='{$result['Str'][$i][0]}' LIMIT 1 ";
				$this->db->query($sql, 2);
				
				//如果是大则降1-10 11-20将一半
				 
				$sql6 = "UPDATE g_odds9 SET `h1`=h1-{$qiu6},`h2`=h2-{$qiu6},`h3`=h3-{$qiu6},`h4`=h4-{$qiu6},`h5`=h5-{$qiu6},`h6`=h6-{$qiu6},`h7`=h7-{$qiu6},`h8`=h8-{$qiu6},`h9`=h9-{$qiu6},`h10`=h10-{$qiu6} WHERE g_type = 'Ball_{$result['Str'][$i][3]}'";
				//echo $sql;
				$this->db->query($sql6, 2);
				$sql = "UPDATE g_odds9 SET `h11`=h11-{$qiu},`h12`=h12-{$qiu},`h13`=h13-{$qiu},`h14`=h14-{$qiu},`h15`=h15-{$qiu},`h16`=h16-{$qiu},`h17`=h17-{$qiu},`h18`=h18-{$qiu},`h19`=h19-{$qiu},`h20`=h20-{$qiu} WHERE g_type = 'Ball_{$result['Str'][$i][3]}'";
				//echo $sql;
				$this->db->query($sql, 2);
				}
				if($result['Str'][$i][1]=="h21")
				{
				$zz="h22";
				$sql = "UPDATE g_odds9 SET `{$zz}` = {$zz}-{$result['Str'][$i][2]} WHERE g_type ='{$result['Str'][$i][0]}' LIMIT 1 ";
				$this->db->query($sql, 2);
				//如果是小则降 11-20
				$sql6 = "UPDATE g_odds9 SET `h11`=h11-{$qiu6},`h12`=h12-{$qiu6},`h13`=h13-{$qiu6},`h14`=h14-{$qiu6},`h15`=h15-{$qiu6},`h16`=h16-{$qiu6},`h17`=h17-{$qiu6},`h18`=h18-{$qiu6},`h19`=h19-{$qiu6},`h20`=h20-{$qiu6} WHERE g_type = 'Ball_{$result['Str'][$i][3]}'";
				//echo $sql;
				$this->db->query($sql6, 2);
				$sql = "UPDATE g_odds9 SET `h1`=h1-{$qiu},`h2`=h2-{$qiu},`h3`=h3-{$qiu},`h4`=h4-{$qiu},`h5`=h5-{$qiu},`h6`=h6-{$qiu},`h7`=h7-{$qiu},`h8`=h8-{$qiu},`h9`=h9-{$qiu},`h10`=h10-{$qiu} WHERE g_type = 'Ball_{$result['Str'][$i][3]}'";
				//echo $sql;
				$this->db->query($sql, 2);
				}
				if($result['Str'][$i][1]=="h23")
				{
				$zz="h24";
				$sql = "UPDATE g_odds9 SET `{$zz}` = {$zz}-{$result['Str'][$i][2]} WHERE g_type ='{$result['Str'][$i][0]}' LIMIT 1 ";
				$this->db->query($sql, 2);
				//如果是双则降 1 3 5 7 9 11 13 15 17 19
				$sql6 = "UPDATE g_odds9 SET `h1`=h1-{$qiu6},`h3`=h3-{$qiu6},`h5`=h5-{$qiu6},`h7`=h7-{$qiu6},`h9`=h9-{$qiu6},`h11`=h11-{$qiu6},`h13`=h13-{$qiu6},`h15`=h15-{$qiu6},`h17`=h17-{$qiu6},`h19`=h19-{$qiu6} WHERE g_type = 'Ball_{$result['Str'][$i][3]}'";
				//echo $sql;
				$this->db->query($sql6, 2);
				
				$sql = "UPDATE g_odds9 SET `h2`=h2-{$qiu},`h4`=h4-{$qiu},`h6`=h6-{$qiu},`h8`=h8-{$qiu},`h10`=h10-{$qiu},`h12`=h12-{$qiu},`h14`=h14-{$qiu},`h16`=h16-{$qiu},`h18`=h18-{$qiu},`h20`=h20-{$qiu} WHERE g_type = 'Ball_{$result['Str'][$i][3]}'";
				//echo $sql;
				$this->db->query($sql, 2);
				}
				if($result['Str'][$i][1]=="h24")
				{
				$zz="h23";
				$sql = "UPDATE g_odds9 SET `{$zz}` = {$zz}-{$result['Str'][$i][2]} WHERE g_type ='{$result['Str'][$i][0]}' LIMIT 1 ";
				$this->db->query($sql, 2);
				//如果是单则降 2 4 6 8 10 12 14 16 18 20
				$sql6 = "UPDATE g_odds9 SET `h2`=h2-{$qiu6},`h4`=h4-{$qiu6},`h6`=h6-{$qiu6},`h8`=h8-{$qiu6},`h10`=h10-{$qiu6},`h12`=h12-{$qiu6},`h14`=h14-{$qiu6},`h16`=h16-{$qiu6},`h18`=h18-{$qiu6},`h20`=h20-{$qiu6} WHERE g_type = 'Ball_{$result['Str'][$i][3]}'";
				//echo $sql;
				$this->db->query($sql6, 2);
				
				$sql = "UPDATE g_odds9 SET `h1`=h1-{$qiu},`h3`=h3-{$qiu},`h5`=h5-{$qiu},`h7`=h7-{$qiu},`h9`=h9-{$qiu},`h11`=h11-{$qiu},`h13`=h13-{$qiu},`h15`=h15-{$qiu},`h17`=h17-{$qiu},`h19`=h19-{$qiu} WHERE g_type = 'Ball_{$result['Str'][$i][3]}'";
				//echo $sql;
				$this->db->query($sql, 2);
				//echo $sql;
				}
				if($result['Str'][$i][1]=="h25")
				{
				$zz="h26";
				$sql = "UPDATE g_odds9 SET `{$zz}` = {$zz}-{$result['Str'][$i][2]} WHERE g_type ='{$result['Str'][$i][0]}' LIMIT 1 ";
				$this->db->query($sql, 2);
				}
				if($result['Str'][$i][1]=="h26")
				{
				$zz="h25";
				$sql = "UPDATE g_odds9 SET `{$zz}` = {$zz}-{$result['Str'][$i][2]} WHERE g_type ='{$result['Str'][$i][0]}' LIMIT 1 ";
				$this->db->query($sql, 2);
				}
				if($result['Str'][$i][1]=="h27")
				{
				$zz="h28";
				$sql = "UPDATE g_odds9 SET `{$zz}` = {$zz}-{$result['Str'][$i][2]} WHERE g_type ='{$result['Str'][$i][0]}' LIMIT 1 ";
				$this->db->query($sql, 2);
				}
				if($result['Str'][$i][1]=="h28")
				{
				$zz="h27";
				$sql = "UPDATE g_odds9 SET `{$zz}` = {$zz}-{$result['Str'][$i][2]} WHERE g_type ='{$result['Str'][$i][0]}' LIMIT 1 ";
				$this->db->query($sql, 2);
				}
				if($result['Str'][$i][1]=="h1")
				{
				$zz="h3";
				$sql = "UPDATE g_odds9 SET `{$zz}` = {$zz}-{$result['Str'][$i][2]} WHERE g_type ='{$result['Str'][$i][0]}' LIMIT 1 ";
				$this->db->query($sql, 2);
				}
				if($result['Str'][$i][1]=="h3")
				{
				$zz="h1";
				$sql = "UPDATE g_odds9 SET `{$zz}` = {$zz}-{$result['Str'][$i][2]} WHERE g_type ='{$result['Str'][$i][0]}' LIMIT 1 ";
				$this->db->query($sql, 2);
				}
				if($result['Str'][$i][1]=="h2")
				{
				$zz="h4";
				$sql = "UPDATE g_odds9 SET `{$zz}` = {$zz}-{$result['Str'][$i][2]} WHERE g_type ='{$result['Str'][$i][0]}' LIMIT 1 ";
				$this->db->query($sql, 2);
				}
				if($result['Str'][$i][1]=="h4")
				{
				$zz="h2";
				$sql = "UPDATE g_odds9 SET `{$zz}` = {$zz}-{$result['Str'][$i][2]} WHERE g_type ='{$result['Str'][$i][0]}' LIMIT 1 ";
				$this->db->query($sql, 2);
				}
				if($result['Str'][$i][1]=="h5")
				{
				$zz="h7";
				$sql = "UPDATE g_odds9 SET `{$zz}` = {$zz}-{$result['Str'][$i][2]} WHERE g_type ='{$result['Str'][$i][0]}' LIMIT 1 ";
				$this->db->query($sql, 2);
				}
				if($result['Str'][$i][1]=="h7")
				{
				$zz="h5";
				$sql = "UPDATE g_odds9 SET `{$zz}` = {$zz}-{$result['Str'][$i][2]} WHERE g_type ='{$result['Str'][$i][0]}' LIMIT 1 ";
				$this->db->query($sql, 2);
				}
				if($result['Str'][$i][1]=="h6")
				{
				$zz="h8";
				$sql = "UPDATE g_odds9 SET `{$zz}` = {$zz}-{$result['Str'][$i][2]} WHERE g_type ='{$result['Str'][$i][0]}' LIMIT 1 ";
				$this->db->query($sql, 2);
				}
				if($result['Str'][$i][1]=="h8")
				{
				$zz="h6";
				$sql = "UPDATE g_odds9 SET `{$zz}` = {$zz}-{$result['Str'][$i][2]} WHERE g_type ='{$result['Str'][$i][0]}' LIMIT 1 ";
				$this->db->query($sql, 2);
				}
				//echo $result['Str'][$i][1].$result['Str'][$i][2];
				}
			}
		}
	}
	
	/**
	 * 查詢連續N期不出的號碼
	 */
	private function SearchNumber($Continuous, $NumValue, $StrValue)
	{
		$ResultNumber = history_resultnc(0);
		
		//得到雙面無出期數
		global $BallString, $BallString_a;
		$NumberStrArr = sum_ball_count_1_nc ($BallString, $BallString_a, $ResultNumber, 1);
		
		//取出大於$Continuous連續出期數的雙面
		$NumberStrArr = $this->ResultStrValue($NumberStrArr, $Continuous);

		//雙面轉換
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
		
		//得到1-20無出期數
		$NumberArr = sum_ball_count ($ResultNumber, 1);
		$NumberArr = $NumberArr['row_2'];
		
		//取出大於$Continuous連續不出期數的1-20號碼
		$NumberArr = $this->ResultStrValue($NumberArr, $Continuous);
		
		//計算需要降多少次賠率
		$UpOddsArr = array();
		foreach ($NumberArr as $key=>$value)
		{
			$UpOddsArr['h'.$key] = $NumValue;
			if ($value > $Continuous ){
				$n = $value - $Continuous;
				$count = 0;
				for ($i=0; $i<$n; $i++)
					$count += $NumValue;
				$UpOddsArr['h'.$key] += $count;
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
			case "第{$p}球-大":  $str[0] = "Ball_{$p}"; $str[1] = 'h22'; break;
			case "第{$p}球-小" : $str[0] = "Ball_{$p}"; $str[1] = 'h21'; break;
			case "第{$p}球-單" : $str[0] = "Ball_{$p}"; $str[1] = 'h24'; break;
			case "第{$p}球-雙" : $str[0] = "Ball_{$p}"; $str[1] = 'h23'; break;
			case "第{$p}球-尾大" : $str[0] = "Ball_{$p}"; $str[1] = 'h26'; break;
			case "第{$p}球-尾小" : $str[0] = "Ball_{$p}"; $str[1] = 'h25'; break;
			case "第{$p}球-合數單" : $str[0] = "Ball_{$p}"; $str[1] = 'h28'; break;
			case "第{$p}球-合數雙" : $str[0] = "Ball_{$p}"; $str[1] = 'h27'; break;
			case "第{$p}球-東" : $str[0] = "Ball_{$p}"; $str[1] = 'h30'; break;
			case "第{$p}球-南" : $str[0] = "Ball_{$p}"; $str[1] = 'h29'; break;
			case "第{$p}球-西" :$str[0] = "Ball_{$p}"; $str[1] = 'h31'; break;
			case "第{$p}球-北" :$str[0] = "Ball_{$p}"; $str[1] = 'h32'; break;
			case "第{$p}球-中" :$str[0] = "Ball_{$p}"; $str[1] = 'h33'; break;
			case "第{$p}球-發" :$str[0] = "Ball_{$p}"; $str[1] = 'h34'; break;
			case "第{$p}球-白" :$str[0] = "Ball_{$p}"; $str[1] = 'h35'; break;
			case "總和大" :$str[0] = "Ball_9"; $str[1] = 'h3'; break;
			case "總和小" :$str[0] = "Ball_9"; $str[1] = 'h1'; break;
			case "總和單" :$str[0] = "Ball_9"; $str[1] = 'h4'; break;
			case "總和雙" :$str[0] = "Ball_9"; $str[1] = 'h2'; break;
			case "總和尾大" :$str[0] = "Ball_9"; $str[1] = 'h7'; break;
			case "總和尾小" :$str[0] = "Ball_9"; $str[1] = 'h5'; break;
			case "龍" :$str[0] = "Ball_9"; $str[1] = 'h8'; break;
			case "虎" :$str[0] = "Ball_9"; $str[1] = 'h6'; break;
		}
		$str[2]=$param;
		$str[3]=$p;
		$str[4]=$NumValue;
		return $str;
	}
}
?>