<?php
/* 
  Copyright (c) 2010-02 Game
  Game All Rights Reserved. 
  
  Author: Version:1.0
  Date:2011-12-07 09:28:32
*/


if (!defined('ROOT_PATH'))
exit('invalid request');
include_once ROOT_PATH.'functioned/peizhi.php';

class AutomaticOddspk 
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
	 $qiu2=0;
		$result = $this->SearchNumber($this->Continuous, $this->NumValue, $this->StrValue);
		if ($result['Num'] )
		{
			foreach ($result['Num'] as $key=>$value)
			{
				if($key!="")
				{
					//$sql = "UPDATE g_odds6 SET `{$key}`={$key}-{$value} WHERE g_type <> 'Ball_11' AND g_type <> 'Ball_12'";
					//$this->db->query($sql, 2);
				}
			}
		}
		if ($result['Str'] )
		{
			for ($i=0; $i<count($result['Str']); $i++)
			{
				if($result['Str'][$i][1]!="")
				{
					$sql = "UPDATE g_odds6 SET `{$result['Str'][$i][1]}` = {$result['Str'][$i][1]}-{$result['Str'][$i][2]} WHERE g_type ='{$result['Str'][$i][0]}' LIMIT 1 ";
					$this->db->query($sql, 2);
				}
					
					//增加双面降水
				 global $shuangjiangpv;
				 $qiu=$result['Str'][$i][3];
				 $qiu2=$result['Str'][$i][4];
				 $qiu6=$qiu2/2;
				 $tmp=preg_match("/第(\d+)名/iU",$qiu,$res);
		         if(!empty($res))
				 {
			     $qiu=$res[1];
				 }else
				 {
				  $qiu=$result['Str'][$i][3];
				 }
				 //echo $qiu;
				if($shuangjiangpv=="1"){
				if($result['Str'][$i][1]=="h12")
				{
				$zz="h11";
				$sql = "UPDATE g_odds6 SET `{$zz}` = {$zz}-{$result['Str'][$i][2]} WHERE g_type ='{$result['Str'][$i][0]}' LIMIT 1 ";
				$this->db->query($sql, 2);
				//如果是大则降01234 
				if(!empty($res))
				 {
				$sql6 = "UPDATE g_odds6 SET `h1`=h1-{$qiu6},`h2`=h2-{$qiu6},`h3`=h3-{$qiu6},`h4`=h4-{$qiu6},`h5`=h5-{$qiu6} WHERE g_type = 'Ball_{$qiu}'";
				//echo $sql;
				$this->db->query($sql6, 2);
				
				$sql = "UPDATE g_odds6 SET  `h6`=h6-{$qiu2},`h7`=h7-{$qiu2},`h8`=h8-{$qiu2},`h9`=h9-{$qiu2},`h10`=h10-{$qiu2} WHERE g_type = 'Ball_{$qiu}'";
				//echo $sql;
				$this->db->query($sql, 2);
				}else
				 {
				 if($qiu=="冠军-大")
				 {
				 $sql6 = "UPDATE g_odds6 SET `h1`=h1-{$qiu6},`h2`=h2-{$qiu6},`h3`=h3-{$qiu6},`h4`=h4-{$qiu6},`h5`=h5-{$qiu6} WHERE g_type = 'Ball_1'";
				//echo $sql;
				$this->db->query($sql6, 2);
				$sql = "UPDATE g_odds6 SET  `h6`=h6-{$qiu2},`h7`=h7-{$qiu2},`h8`=h8-{$qiu2},`h9`=h9-{$qiu2},`h10`=h10-{$qiu2} WHERE g_type = 'Ball_1'";
				//echo $sql;
				$this->db->query($sql, 2);
				 }else{
				  $sql6 = "UPDATE g_odds6 SET `h1`=h1-{$qiu6},`h2`=h2-{$qiu6},`h3`=h3-{$qiu6},`h4`=h4-{$qiu6},`h5`=h5-{$qiu6} WHERE g_type = 'Ball_2'";
				//echo $sql;
				$this->db->query($sql6, 2);
				$sql = "UPDATE g_odds6 SET  `h6`=h6-{$qiu2},`h7`=h7-{$qiu2},`h8`=h8-{$qiu2},`h9`=h9-{$qiu2},`h10`=h10-{$qiu2} WHERE g_type = 'Ball_2'";
				//echo $sql;
				$this->db->query($sql, 2);
				 }
				 }
				}
				if($result['Str'][$i][1]=="h11")
				{
				$zz="h12";
				$sql = "UPDATE g_odds6 SET `{$zz}` = {$zz}-{$result['Str'][$i][2]} WHERE g_type ='{$result['Str'][$i][0]}' LIMIT 1 ";
				$this->db->query($sql, 2);
				
				//如果是小则降 6 7 8 9 10 
				if(!empty($res))
				{
				$sql6 = "UPDATE g_odds6 SET  `h6`=h6-{$qiu6},`h7`=h7-{$qiu6},`h8`=h8-{$qiu6},`h9`=h9-{$qiu6},`h10`=h10-{$qiu6} WHERE g_type = 'Ball_{$qiu}'";
				//echo $sql;
				$this->db->query($sql6, 2);
				
				$sql = "UPDATE g_odds6 SET `h1`=h1-{$qiu2},`h2`=h2-{$qiu2},`h3`=h3-{$qiu2},`h4`=h4-{$qiu2},`h5`=h5-{$qiu2} WHERE g_type = 'Ball_{$qiu}'";
				//echo $sql;
				$this->db->query($sql, 2);
				}else
				 {
				 if($qiu=="冠军-大")
				 {
				 $sql6 = "UPDATE g_odds6 SET `h6`=h6-{$qiu6},`h7`=h7-{$qiu6},`h8`=h8-{$qiu6},`h9`=h9-{$qiu6},`h10`=h10-{$qiu6} WHERE g_type = 'Ball_1'";
				//echo $sql;
				$this->db->query($sql6, 2);
				
				$sql = "UPDATE g_odds6 SET `h1`=h1-{$qiu2},`h2`=h2-{$qiu2},`h3`=h3-{$qiu2},`h4`=h4-{$qiu2},`h5`=h5-{$qiu2} WHERE g_type = 'Ball_1'";
				//echo $sql;
				$this->db->query($sql, 2);
				 }else{
				  $sql6 = "UPDATE g_odds6 SET `h6`=h6-{$qiu6},`h7`=h7-{$qiu6},`h8`=h8-{$qiu6},`h9`=h9-{$qiu6},`h10`=h10-{$qiu6} WHERE g_type = 'Ball_2'";
				//echo $sql;
				$this->db->query($sql6, 2);
				
				$sql = "UPDATE g_odds6 SET `h1`=h1-{$qiu2},`h2`=h2-{$qiu2},`h3`=h3-{$qiu2},`h4`=h4-{$qiu2},`h5`=h5-{$qiu2} WHERE g_type = 'Ball_2'";
				//echo $sql;
				$this->db->query($sql, 2);
				 }
				 }
				}
				if($result['Str'][$i][1]=="h13")
				{
				$zz="h14";
				$sql = "UPDATE g_odds6 SET `{$zz}` = {$zz}-{$result['Str'][$i][2]} WHERE g_type ='{$result['Str'][$i][0]}' LIMIT 1 ";
				$this->db->query($sql, 2);
				//如果是双则降 1 3 5 7 9
				if(!empty($res))
				 {
				$sql6 = "UPDATE g_odds6 SET `h1`=h1-{$qiu6},`h3`=h3-{$qiu6},`h5`=h5-{$qiu6},`h7`=h7-{$qiu6},`h9`=h9-{$qiu6} WHERE g_type = 'Ball_{$qiu}'";
				//echo $sql;
				$this->db->query($sql6, 2);
				
				$sql = "UPDATE g_odds6 SET  `h2`=h2-{$qiu2},`h4`=h4-{$qiu2},`h6`=h6-{$qiu2},`h8`=h8-{$qiu2},`h10`=h10-{$qiu2} WHERE g_type = 'Ball_{$qiu}'";
				//echo $sql;
				$this->db->query($sql, 2);
				}else
				 {
				 if($qiu=="冠军-雙")
				 {
				 $sql6 = "UPDATE g_odds6 SET `h1`=h1-{$qiu6},`h3`=h3-{$qiu6},`h5`=h5-{$qiu6},`h7`=h7-{$qiu6},`h9`=h9-{$qiu6} WHERE g_type = 'Ball_1'";
				//echo $sql;
				$this->db->query($sql6, 2);
				
				$sql = "UPDATE g_odds6 SET  `h2`=h2-{$qiu2},`h4`=h4-{$qiu2},`h6`=h6-{$qiu2},`h8`=h8-{$qiu2},`h10`=h10-{$qiu2} WHERE g_type = 'Ball_1'";
				//echo $sql;
				$this->db->query($sql, 2);
				 }else{
				  $sql6 = "UPDATE g_odds6 SET `h1`=h1-{$qiu6},`h3`=h3-{$qiu6},`h5`=h5-{$qiu6},`h7`=h7-{$qiu6},`h9`=h9-{$qiu6} WHERE g_type = 'Ball_2'";
				//echo $sql;
				$this->db->query($sql6, 2);
				
				$sql = "UPDATE g_odds6 SET  `h2`=h2-{$qiu2},`h4`=h4-{$qiu2},`h6`=h6-{$qiu2},`h8`=h8-{$qiu2},`h10`=h10-{$qiu2} WHERE g_type = 'Ball_2'";
				//echo $sql;
				$this->db->query($sql, 2);
				 }
				 }
				}
				if($result['Str'][$i][1]=="h14")
				{
				$zz="h13";
				$sql = "UPDATE g_odds6 SET `{$zz}` = {$zz}-{$result['Str'][$i][2]} WHERE g_type ='{$result['Str'][$i][0]}' LIMIT 1 ";
				$this->db->query($sql, 2);
				
				//如果是单则降 2 4 6 8 10
				if(!empty($res))
				 {
				$sql6 = "UPDATE g_odds6 SET `h2`=h2-{$qiu6},`h4`=h4-{$qiu6},`h6`=h6-{$qiu6},`h8`=h8-{$qiu6},`h10`=h10-{$qiu6} WHERE g_type = 'Ball_{$qiu}'";
				//echo $sql;
				$this->db->query($sql6, 2);
				
				$sql = "UPDATE g_odds6 SET `h1`=h1-{$qiu2},`h3`=h3-{$qiu2},`h5`=h5-{$qiu2},`h7`=h7-{$qiu2},`h9`=h9-{$qiu2} WHERE g_type = 'Ball_{$qiu}'";
				//echo $sql;
				$this->db->query($sql, 2);
				}else
				 {
				 if($qiu=="冠军-雙")
				 {
				 $sql6 = "UPDATE g_odds6 SET `h2`=h2-{$qiu6},`h4`=h4-{$qiu6},`h6`=h6-{$qiu6},`h8`=h8-{$qiu6},`h10`=h10-{$qiu6} WHERE g_type = 'Ball_1'";
				//echo $sql;
				$this->db->query($sql6, 2);
				
				$sql = "UPDATE g_odds6 SET `h1`=h1-{$qiu2},`h3`=h3-{$qiu2},`h5`=h5-{$qiu2},`h7`=h7-{$qiu2},`h9`=h9-{$qiu2} WHERE g_type = 'Ball_1'";
				//echo $sql;
				$this->db->query($sql, 2);
				 }else{
				  $sql = "UPDATE g_odds6 SET `h2`=h2-{$qiu2},`h4`=h4-{$qiu2},`h6`=h6-{$qiu2},`h8`=h8-{$qiu2},`h10`=h10-{$qiu2} WHERE g_type = 'Ball_2'";
				//echo $sql;
				$this->db->query($sql, 2);
				
				$sql = "UPDATE g_odds6 SET `h1`=h1-{$qiu2},`h3`=h3-{$qiu2},`h5`=h5-{$qiu2},`h7`=h7-{$qiu2},`h9`=h9-{$qiu2} WHERE g_type = 'Ball_2'";
				//echo $sql;
				$this->db->query($sql, 2);
				 }
				 }
				}
				if($result['Str'][$i][1]=="h15")
				{
				$zz="h16";
				$sql = "UPDATE g_odds6 SET `{$zz}` = {$zz}-{$result['Str'][$i][2]} WHERE g_type ='{$result['Str'][$i][0]}' LIMIT 1 ";
				$this->db->query($sql, 2);
				}
				if($result['Str'][$i][1]=="h16")
				{
				$zz="h15";
				$sql = "UPDATE g_odds6 SET `{$zz}` = {$zz}-{$result['Str'][$i][2]} WHERE g_type ='{$result['Str'][$i][0]}' LIMIT 1 ";
				$this->db->query($sql, 2);
				}
				if($result['Str'][$i][1]=="h1")
				{
				$zz="h2";
				$sql = "UPDATE g_odds6 SET `{$zz}` = {$zz}-{$result['Str'][$i][2]} WHERE g_type ='{$result['Str'][$i][0]}' LIMIT 1 ";
				$this->db->query($sql, 2);
				}
				if($result['Str'][$i][1]=="h2")
				{
				$zz="h1";
				$sql = "UPDATE g_odds6 SET `{$zz}` = {$zz}-{$result['Str'][$i][2]} WHERE g_type ='{$result['Str'][$i][0]}' LIMIT 1 ";
				$this->db->query($sql, 2);
				}
				if($result['Str'][$i][1]=="h3")
				{
				$zz="h4";
				$sql = "UPDATE g_odds6 SET `{$zz}` = {$zz}-{$result['Str'][$i][2]} WHERE g_type ='{$result['Str'][$i][0]}' LIMIT 1 ";
				$this->db->query($sql, 2);
				}
				if($result['Str'][$i][1]=="h4")
				{
				$zz="h3";
				$sql = "UPDATE g_odds6 SET `{$zz}` = {$zz}-{$result['Str'][$i][2]} WHERE g_type ='{$result['Str'][$i][0]}' LIMIT 1 ";
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
		$ResultNumber = history_resultpk(0);
		
		//得到雙面無出期數
		global $BallStringpk,$BallString_apk;
		$NumberStrArr = sum_ball_count_1_pk ($BallStringpk, $BallString_apk, $ResultNumber, 1);
		
		//取出大於$Continuous連續出期數的雙面
		$NumberStrArr = $this->ResultStrValue($NumberStrArr, $Continuous);
		//echo print_r($NumberStrArr);
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
		$NumberArr = sum_ball_count_pk ($ResultNumber, 1);
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
				//$UpOddsArr['h'.$key] += $count;
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
		$tmp=preg_match("/第(\d+)名/iU",$num,$res);
		if(!empty($res))
			$p=$res[1];
		switch ($num)
		{
			case "冠军-大":  $str[0] = "Ball_1"; $str[1] = 'h12'; break;
			case "冠军-小" : $str[0] = "Ball_1"; $str[1] = 'h11'; break;
			case "冠军-單" : $str[0] = "Ball_1"; $str[1] = 'h14'; break;
			case "冠军-雙" : $str[0] = "Ball_1"; $str[1] = 'h13'; break;
			case "冠军-龍" : $str[0] = "Ball_1"; $str[1] = 'h16'; break;
			case "冠军-虎" : $str[0] = "Ball_1"; $str[1] = 'h15'; break;
			
			case "亚军-大":  $str[0] = "Ball_2"; $str[1] = 'h12'; break;
			case "亚军-小" : $str[0] = "Ball_2"; $str[1] = 'h11'; break;
			case "亚军-單" : $str[0] = "Ball_2"; $str[1] = 'h14'; break;
			case "亚军-雙" : $str[0] = "Ball_2"; $str[1] = 'h13'; break;
			case "亚军-龍" : $str[0] = "Ball_2"; $str[1] = 'h16'; break;
			case "亚军-虎" : $str[0] = "Ball_2"; $str[1] = 'h15'; break;
			
			case "第{$p}名-大":  $str[0] = "Ball_{$p}"; $str[1] = 'h12'; break;
			case "第{$p}名-小" : $str[0] = "Ball_{$p}"; $str[1] = 'h11'; break;
			case "第{$p}名-單" : $str[0] = "Ball_{$p}"; $str[1] = 'h14'; break;
			case "第{$p}名-雙" : $str[0] = "Ball_{$p}"; $str[1] = 'h13'; break;
			case "第{$p}名-龍" : $str[0] = "Ball_{$p}"; $str[1] = 'h16'; break;
			case "第{$p}名-虎" : $str[0] = "Ball_{$p}"; $str[1] = 'h15'; break;
			
			case "冠亞和大" :$str[0] = "Ball_12"; $str[1] = 'h2'; break;
			case "冠亞和小" :$str[0] = "Ball_12"; $str[1] = 'h1'; break;
			case "冠亞和單" :$str[0] = "Ball_12"; $str[1] = 'h4'; break;
			case "冠亞和雙" :$str[0] = "Ball_12"; $str[1] = 'h3'; break;
			
		}
		$str[2]=$param;
		$str[3]=$num;
		$str[4]=$NumValue;
		return $str;
	}
}
?>