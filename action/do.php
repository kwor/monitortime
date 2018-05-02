<?php
define('ROOT_PATH', dirname(dirname(__FILE__))."/");
set_time_limit(0);

include_once ROOT_PATH.'functioned/global.php';
//echo "<meta http-equiv='Refresh' content='10;URL='>"; 
function curl_file_get_contents($durl){
   $ch = curl_init();
   curl_setopt($ch, CURLOPT_URL, $durl);
   curl_setopt($ch, CURLOPT_TIMEOUT, 5);
   curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
   $r = curl_exec($ch);
   curl_close($ch);
   return $r;
}

$ConfigModel = configModel("*");


$db = new DB();

$ntime = date("Hi");
//echo $ntime;

if ( !("0000" < $ntime && $ntime < "0827") )
	$gameList[]	=array("id"=>8,'gameid'=>1,'history'=>'g_history','qs'=>'g_kaipan');//广东快乐十分
if ( !("0215" < $ntime && $ntime < "0940") )
	$gameList[]	=array("id"=>3,'gameid'=>2,'history'=>'g_history2','qs'=>'g_kaipan2');//重庆时时彩
/*if ( !("0610" < $ntime && $ntime < "0859") )
	$gameList[]	=array("id"=>4,'gameid'=>3,'history'=>'g_history3','qs'=>'g_kaipan3');//全天五分彩
if ( !("0215" < $ntime && $ntime < "0940") )
	$gameList[]	=array("id"=>2,'gameid'=>11,'history'=>'g_history11','qs'=>'g_kaipan11');//天津时时彩
if ( !("0215" < $ntime && $ntime < "0940") )
	$gameList[]	=array("id"=>5,'gameid'=>10,'history'=>'g_history10','qs'=>'g_kaipan10');//新疆时时彩	
*/
if ( !("0000" < $ntime && $ntime < "0850") )
	$gameList[]=array("id"=>11,'gameid'=>6,'history'=>'g_history6','qs'=>'g_kaipan6');//北京赛车
if ( !("0000" < $ntime && $ntime < "0827") )	
	$gameList[]=array("id"=>12,'gameid'=>7,'history'=>'g_history7','qs'=>'g_kaipan7');//江苏快三
if ( !("0610" < $ntime && $ntime < "0859") )	
	$gameList[]=array("id"=>15,'gameid'=>8,'history'=>'g_history8','qs'=>'g_kaipan8');//北京快乐8
if ( !("0215" < $ntime && $ntime < "0940") )
	$gameList[]	=array("id"=>10,'gameid'=>9,'history'=>'g_history9','qs'=>'g_kaipan9');//重慶幸運農場
if ( !("0610" < $ntime && $ntime < "0859") )	
	$gameList[]=array("id"=>14,'gameid'=>4,'history'=>'g_history4','qs'=>'g_kaipan4');//幸運飛艇
	
	 
if(count($gameList)==0)
{
$db->query("OPTIMIZE TABLE `g_history`,`g_history2`,`g_history3`,`g_history4`,`g_history6`,`g_history7`,`g_history8`,`g_history9`,`g_kaipan`,`g_kaipan2`,`g_kaipan3`,`g_kaipan4`,
`g_kaipan6`,`g_kaipan7`,`g_kaipan8`,`g_kaipan9`");	
}
			
foreach($gameList as $game)
{
	$game_rs=$db->query("select g_qishu,g_feng_date,g_open_date from ".$game['qs']." where  g_lock=2 order by g_feng_date limit 1",1);
	$NowQs=$game_rs?$game_rs[0]['g_qishu']:'';
	$total_rs=$db->query("select count(g_id) as c from ".$game['history']." where g_date>='".date('Y-m-d',strtotime("-1 day"))."' and g_ball_1 is null",1);
	$noTotal=$total_rs?$total_rs[0]['c']:0;

	
	 
    $url="http://api1.971kai.com:8888/API.ashx?id=".$game['id'];//采集源1
	
    //echo curl_file_get_contents($url);
	$result=json_decode(curl_file_get_contents($url)); //
	$i=0;
	 
	foreach($result as $rs)
	{
		
		$num=explode(",",$rs->Num);
		switch($game['id'])
		{
			case 8:
			 if($ConfigModel['g_gd_op']==1){
				$qs=$rs->periodsTime.sprintf("%02d",$rs->periodsNumber);
				$db->query("update ".$game['history']." set g_ball_1=".intval($num[0]).",g_ball_2=".intval($num[1]).",g_ball_3=".intval($num[2]).",g_ball_4=".intval($num[3]).",g_ball_5=".intval($num[4]).",g_ball_6=".intval($num[5]).",g_ball_7=".intval($num[6]).",g_ball_8=".intval($num[7])." where g_ball_1 is null and g_qishu=".$qs,2);
				}
				break;
			case 10:
			 if($ConfigModel['g_nc_op']==1){
				$qs=$rs->periodsTime.sprintf("%02d",$rs->periodsNumber);
				$db->query("update ".$game['history']." set g_game_id='1',g_ball_1=".intval($num[0]).",g_ball_2=".intval($num[1]).",g_ball_3=".intval($num[2]).",g_ball_4=".intval($num[3]).",g_ball_5=".intval($num[4]).",g_ball_6=".intval($num[5]).",g_ball_7=".intval($num[6]).",g_ball_8=".intval($num[7])." where g_ball_1 is null and g_qishu=".$qs,2);
				}
				break;
			case 3:
			if($ConfigModel['g_cp_op']==1){
				$qs=$rs->periodsTime.sprintf("%03d",$rs->periodsNumber);
				$db->query("update ".$game['history']." set g_ball_1=".intval($num[0]).",g_ball_2=".intval($num[1]).",g_ball_3=".intval($num[2]).",g_ball_4=".intval($num[3]).",g_ball_5=".intval($num[4])." where g_ball_1 is null and g_qishu=".$qs,2);
				}
				break;
			case 2:
			if($ConfigModel['g_tjssc_op']==1){
				$qs=$rs->periodsTime.sprintf("%02d",$rs->periodsNumber);
				$db->query("update ".$game['history']." set g_ball_1=".intval($num[0]).",g_ball_2=".intval($num[1]).",g_ball_3=".intval($num[2]).",g_ball_4=".intval($num[3]).",g_ball_5=".intval($num[4])." where g_ball_1 is null and g_qishu=".$qs,2);
				}
				break;	
			case 5:
			if($ConfigModel['g_xjssc_op']==1){
				$qs=$rs->periodsTime.sprintf("%02d",$rs->periodsNumber);
				$db->query("update ".$game['history']." set g_ball_1=".intval($num[0]).",g_ball_2=".intval($num[1]).",g_ball_3=".intval($num[2]).",g_ball_4=".intval($num[3]).",g_ball_5=".intval($num[4])." where g_ball_1 is null and g_qishu=".$qs,2);
				}
				break;		
			case 4:
			if($ConfigModel['g_jxssc_op']==1){
				$qs=$rs->periodsTime.sprintf("%03d",$rs->periodsNumber);
				$db->query("update ".$game['history']." set g_ball_1=".intval($num[0]).",g_ball_2=".intval($num[1]).",g_ball_3=".intval($num[2]).",g_ball_4=".intval($num[3]).",g_ball_5=".intval($num[4])." where g_ball_1 is null and g_qishu=".$qs,2);
				}
				break;		
			case 11:
			if($ConfigModel['g_pk_op']==1){
				$qs=$rs->periodsNumber;
				$db->query("update ".$game['history']." set g_game_id='6',g_ball_1=".intval($num[0]).",g_ball_2=".intval($num[1]).",g_ball_3=".intval($num[2]).",g_ball_4=".intval($num[3]).",g_ball_5=".intval($num[4]).",g_ball_6=".intval($num[5]).",g_ball_7=".intval($num[6]).",g_ball_8=".intval($num[7]).",g_ball_9=".intval($num[8]).",g_ball_10=".intval($num[9])." where g_ball_1 is null and g_qishu=".$qs,2);
				}
				break;
			case 12:
			if($ConfigModel['g_js_op']==1){
				$qs=date('ymd',strtotime($rs->periodsTime)).sprintf("%03d",$rs->periodsNumber);
				$db->query("update ".$game['history']." set g_game_id='7',g_ball_1=".intval($num[0]).",g_ball_2=".intval($num[1]).",g_ball_3=".intval($num[2])." where g_ball_1 is null and g_qishu=".$qs,2);
				}
				break;
			case 15:
                if($ConfigModel['g_kl8_op']==1){
				$qs=$rs->periodsNumber;
				$db->query("update ".$game['history']." set g_game_id='8',g_ball_1=".intval($num[0]).",g_ball_2=".intval($num[1]).",g_ball_3=".intval($num[2]).",g_ball_4=".intval($num[3]).",g_ball_5=".intval($num[4]).",g_ball_6=".intval($num[5]).",g_ball_7=".intval($num[6]).",g_ball_8=".intval($num[7]).",g_ball_9=".intval($num[8]).",g_ball_10=".intval($num[9]).",g_ball_11=".intval($num[10]).",g_ball_12=".intval($num[11]).",g_ball_13=".intval($num[12]).",g_ball_14=".intval($num[13]).",g_ball_15=".intval($num[14]).",g_ball_16=".intval($num[15]).",g_ball_17=".intval($num[16]).",g_ball_18=".intval($num[17]).",g_ball_19=".intval($num[18]).",g_ball_20=".intval($num[19])." where g_ball_1 is null and g_qishu=".$qs,2);
				}
				break;
			case 14:
			 if($ConfigModel['g_nc_op']==1){
				$qs=$rs->periodsTime.sprintf("%03d",$rs->periodsNumber);
				$db->query("update ".$game['history']." set g_game_id='6',g_ball_1=".intval($num[0]).",g_ball_2=".intval($num[1]).",g_ball_3=".intval($num[2]).",g_ball_4=".intval($num[3]).",g_ball_5=".intval($num[4]).",g_ball_6=".intval($num[5]).",g_ball_7=".intval($num[6]).",g_ball_8=".intval($num[7]).",g_ball_9=".intval($num[8]).",g_ball_10=".intval($num[9])." where g_ball_1 is null and g_qishu=".$qs,2);
				}
				break;
		}
		$i++;
		if($noTotal>200 && $i==200) break;	
	}//*/
	
	switch($game['id'])
	{
		case 8:
			if ($ConfigModel['g_gd_op'] == 1 )
			{
				//還原賠率
				initializeOdds();
				//降賠率
				if ($ConfigModel['g_odds_execution_lock'] == 1 && mb_substr($NowQs, -2) < 84)
				{
					$AutomaticOdds = new AutomaticOdds($ConfigModel['g_up_odds_mix'], $ConfigModel['g_odds_num'], $ConfigModel['g_odds_str']);
					$AutomaticOdds->UpExecution();
				}
			}
			//結算
			inventory_gd ($NowQs, $ConfigModel);
			setjcheck_gd();
			break;	
		case 10:
			if ($ConfigModel['g_nc_op'] == 1 ){
	         //還原賠率
	        initializeOddsnc();
	        //降賠率
	       if ($ConfigModel['g_odds_execution_lock'] == 1 && mb_substr($NowQs, -2) < 97)
	            {
		       $AutomaticOddsnc = new AutomaticOddsnc($ConfigModel['g_up_odds_mix_nc'], $ConfigModel['g_odds_num_nc'], $ConfigModel['g_odds_str_nc']);
		      $AutomaticOddsnc->UpExecution();
	             }
               }
			//結算
			inventory_nc ($NowQs, $ConfigModel);
            setjcheck_nc();
			break;
		case 3:
			if ($ConfigModel['g_cp_op'] == 1 ){
				//還原賠率
				initializeOddscq();
				//降賠率
				if ($ConfigModel['g_odds_execution_lock'] == 1 && mb_substr($NowQs, -2) != 23)
				{
					$AutomaticOddscq = new AutomaticOddscq($ConfigModel['g_up_odds_mix_cq'], $ConfigModel['g_odds_num_cq'], $ConfigModel['g_odds_str_cq']);
					$AutomaticOddscq->UpExecution();
				}
			}
			
			inventory_cq ($NowQs, $ConfigModel);
			setjcheck_cq();
			break;
		case 2:
			if ($ConfigModel['g_tjssc_op'] == 1 ){
				//還原賠率
				initializeOddstjssc();
				//降賠率
				if ($ConfigModel['g_odds_execution_lock'] == 1 && mb_substr($NowQs, -2) != 1)
				{
					$AutomaticOddstjssc = new AutomaticOddstjssc($ConfigModel['g_up_odds_mix_tjssc'], $ConfigModel['g_odds_num_tjssc'], $ConfigModel['g_odds_str_tjssc']);
					$AutomaticOddstjssc->UpExecution();
					
				}
			}
			//initializeOddstjssc();
			inventory_tjssc ($NowQs, $ConfigModel);
			setjcheck_tjssc();
			break;	
		case 5:
			if ($ConfigModel['g_xjssc_op'] == 1 ){
				//還原賠率
				initializeOddsxjssc();
				//降賠率
				if ($ConfigModel['g_odds_execution_lock'] == 1 && mb_substr($NowQs, -2) != 1)
				{
					$AutomaticOddsxjssc = new AutomaticOddsxjssc($ConfigModel['g_up_odds_mix_xjssc'], $ConfigModel['g_odds_num_xjssc'], $ConfigModel['g_odds_str_xjssc']);
					$AutomaticOddsxjssc->UpExecution();
				}
			}
			///initializeOddsxjssc();
			inventory_xjssc ($NowQs, $ConfigModel);
			setjcheck_xjssc();
			break;	
		case 4:
			if ($ConfigModel['g_jxssc_op'] == 1 ){
				///還原賠率
				initializeOddsjxssc();
				//降賠率
				if ($ConfigModel['g_odds_execution_lock'] == 1 && mb_substr($NowQs, -2) != 1)
				{
					$AutomaticOddsjxssc = new AutomaticOddsjxssc($ConfigModel['g_up_odds_mix_jxssc'], $ConfigModel['g_odds_num_jxssc'], $ConfigModel['g_odds_str_jxssc']);
					$AutomaticOddsjxssc->UpExecution();
					//echo 22;
				}
			}
			//initializeOddsjxssc();
			inventory_jxssc ($NowQs, $ConfigModel);
			setjcheck_jxssc();
			break;		
		case 11:
			if ($ConfigModel['g_pk_op'] == 1 ){
				//還原賠率
				initializeOddspk();
				//降賠率
				$lastNum = $NowQs - 311446-179*7-179*8-20;
				if ($ConfigModel['g_odds_execution_lock'] == 1 && $lastNum % 179 != 0)
				{
					$AutomaticOddspk = new AutomaticOddspk($ConfigModel['g_up_odds_mix_pk'], $ConfigModel['g_odds_num_pk'], $ConfigModel['g_odds_str_pk']);
					$AutomaticOddspk->UpExecution();
				}
			}
			//結算
			inventory_pk ($NowQs, $ConfigModel);
			setjcheck_pk();
			break;
		case 14:
		if ($ConfigModel['g_xyft_op'] == 1 ){
	   //還原賠率
	   initializeOddsxyft();
	  //降賠率
	  if ($ConfigModel['g_odds_execution_lock'] == 1 )
	   {
		$AutomaticOddsxyft = new AutomaticOddsxyft($ConfigModel['g_up_odds_mix_xyft'], $ConfigModel['g_odds_num_xyft'], $ConfigModel['g_odds_str_xyft']);
		$AutomaticOddsxyft->UpExecution();
	   }
        }
		// initializeOddsxyft();
         inventory_xyft ($NowQs, $ConfigModel);
         setjcheck_xyft();
			break;
		case 12:
			if ($ConfigModel['g_js_op'] == 1 ){
				//還原賠率
				initializeOddsjs();
			}
			//結算
			inventory_js ($NowQs, $ConfigModel);
			setjcheck_js();
			break;
		case 15:
			if ($ConfigModel['g_kl8_op'] == 1 ){
				//還原賠率
				initializeOddskl8();
			}
			//結算
			inventory_kl8 ($NowQs, $ConfigModel);
			setjcheck_kl8();
			break;
	}

	$flag=true;
	if($game_rs)
	{
		if(date('Y-m-d H:i:s',strtotime($game_rs[0]['g_open_date'])-5)>=date("Y-m-d H:i:s",time()))
			$flag=false;	
	}
	if($flag)
	{
		//清除过期的
		$db->query("insert into ".$game['history']."(g_qishu,g_date,g_game_id) SELECT `g_qishu`,  `g_open_date`,".$game['gameid']." FROM ".$game['qs']." a WHERE g_feng_date<='".date('Y-m-d H:i:s')."' and  not EXISTS(select g_id from ".$game['history']." where g_qishu=a.g_qishu)",2);
		$db->query("DELETE FROM ".$game['qs']." WHERE  g_feng_date<='".date('Y-m-d H:i:s')."'", 2);
		$open_rs=$db->query("select g_id from ".$game['qs']." order by g_feng_date limit 1",1);
		if($open_rs)
			$db->query("update ".$game['qs']." set g_lock=2 where g_id=".$open_rs[0]['g_id'], 2);
		//開獎
		if($NowQs!="")
		{
			$lastNum = mb_substr($NowQs, -2);
			switch($game['id'])
			{
				case 8:
					if ($lastNum == 84)
					{
						$h = intval(date("H"));
						$day = $h >= 22 ? 1 : 0;
						InsertNumber($day, $ConfigModel['g_close_time']);
					}
					break;
				case 10:
					if ($lastNum == 13)
		              {
			          $h = intval(date("H"));
			          $day = $h >= 2 ? 1 : 0;
			          InsertNumber_nc('09:53:00', $day, 10, 14, 110, $ConfigModel['g_close_time']);
		               }
					break;
				case 3:
					if ($lastNum == 23)
					{
					    //RestoreMoney($ConfigModel['g_restore_money_lock']);
						insertNumbers('09:50:00', $ConfigModel['g_insert_number_day'], 10, 24, 143, $ConfigModel['g_close_time']);
					}
					break;
				case 2:
					if ($lastNum == 84)
					{
					    $h = intval(date("H"));
			            $day = $h >= 2 ? 1 : 0;
						InsertNumber_tjssc($day, $ConfigModel['g_close_time']);
					}
					break;	
				case 5:
					if ($lastNum == 96)
					{
					    $h = intval(date("H"));
			            $day = $h >= 2 ? 0 : 0;
						InsertNumber_xjssc($day, $ConfigModel['g_close_time']);
					}
					break;	
				case 4:
				$lastNum4 = mb_substr($NowQs, -3);
					if ($lastNum4 == 288)
					{
					    $h = intval(date("H"));
			            $day = $h >= 23 ? 1 : 0;
						InsertNumber_jxssc($day, $ConfigModel['g_close_time']);
					}
					break;		
				/*case 11:
					$lastNum = $NowQs - 311446-179*7-179*8-20;


					if ($lastNum % 179 == 0)
					{
						$h = intval(date("H"));
						$day = $h == 0 ? 0 : 1;
						InsertNumbers_pk($day, $ConfigModel['g_close_time']);
					}
					break;
					*/
				case 12:
					if ($lastNum == 82)
					{
						insertNumberjs('08:30:00', 2, 10, 1, 82, $ConfigModel['g_close_time']);
					}
					break;
				case 14:
				  $lastNum = mb_substr($NowQs, -3);
				if ($lastNum == 180)
		            {
					//echo 11111111;
		           	InsertNumber_xyft($day, $ConfigModel['g_close_time']);
	                 }
					break;
				case 15:
					   $lastNum = $NowQs - 516875-179*7-179*8-20;
					   if ($lastNum % 179 == 0)
						{
						        $h = intval(date("H"));
						        $day = $h == 0 ? 0 : 1;
		                        InsertNumber_kl8(1, $ConfigModel['g_close_time']);
						}
			
					break;
			}
		}

	}
}


//查询没有载盘的进行载盘-----------------------------------


//广东快乐十分
$pkqishu21=$db->query("select count(*) num from g_kaipan",1);	 
	 if($pkqishu21[0][num]<1)
	    {
		//echo 111111;
	   // RestoreMoney();
		$h = intval(date("H"));
		$day = $h >= 22 ? 1 : 0;
		InsertNumber($day, $ConfigModel['g_close_time']);
	    echo "加載广东快乐十分開獎與封盤時間完毕执行时间：". date('Y-m-d H:i:s')." </br>";
	     }	
//重庆时时彩
$pkqishu22=$db->query("select count(*) num from g_kaipan2",1);	 
	 if($pkqishu22[0][num]<1)
	    {
		 insertNumbers('09:50:00', $ConfigModel['g_insert_number_day'], 10, 24, 143, $ConfigModel['g_close_time']);
		 echo "加載重庆时时彩開獎與封盤時間完毕执行时间：". date('Y-m-d H:i:s')." </br>";
	     }	
		 
		 $pkqishu23=$db->query("select count(*) num from g_kaipan3",1);	 
	 if($pkqishu23[0][num]<1)
	    {
		 //全天五分彩
					    $h = intval(date("H"));
			            $day = $h >= 23 ? 1 : 0;
						InsertNumber_jxssc($day, $ConfigModel['g_close_time']);
					 echo "加載全天五分彩開獎與封盤時間完毕执行时间：". date('Y-m-d H:i:s')." </br>";	
						}
		$pkqishu210=$db->query("select count(*) num from g_kaipan10",1);	 
	 if($pkqishu210[0][num]<1)
	    {
					 //新疆时时彩   
					    $h = intval(date("H"));
			            $day = $h >= 2 ? 0 : 0;
						InsertNumber_xjssc($day, $ConfigModel['g_close_time']);
					  echo "加載新疆时时彩開獎與封盤時間完毕执行时间：". date('Y-m-d H:i:s')." </br>";
				}
				//天津时时彩 
		$pkqishu211=$db->query("select count(*) num from g_kaipan11",1);	 
	 if($pkqishu211[0][num]<1)
	    {
		 $h = intval(date("H"));
			            $day = $h >= 2 ? 0 : 0;
						InsertNumber_tjssc($day, $ConfigModel['g_close_time']);
			 echo "加載天津时时彩開獎與封盤時間完毕执行时间：". date('Y-m-d H:i:s')." </br>";	
		}
		
		//农场
		$pkqishu29=$db->query("select count(*) num from g_kaipan9",1);	 
	 if($pkqishu29[0][num]<1)
	    {
		 $h = intval(date("H"));
		$day = $h >= 2 ? 1 : 0;
		InsertNumber_nc('09:53:00', $day, 10, 14, 110, $ConfigModel['g_close_time']);
		 echo "加載农场開獎與封盤時間完毕执行时间：". date('Y-m-d H:i:s')." </br>";
		 }
//检查北京快乐8期数是否为空 自动加载
	$pkqishu2=$db->query("select count(*) num from g_kaipan8",1);	 
	 if($pkqishu2[0][num]<1)
	    {
	   // RestoreMoney();
		InsertNumber_kl8(0, $ConfigModel['g_close_time']);
	    echo "加載北京快乐8開獎與封盤時間完毕执行时间：". date('Y-m-d H:i:s')." </br>";
	     }	
//检查北京赛车pk10期数是否为空
		 $pkqishu26=$db->query("select count(*) num from g_kaipan6",1);	 
	 if($pkqishu26[0][num]<1)
	    {
		 	$h = intval(date("H"));
						$day = $h < 23 ? 0 : 1;
						InsertNumbers_pk($day, $ConfigModel['g_close_time']);
						}
					 //检查江苏快三期数是否为空
					 $pkqishu27=$db->query("select count(*) num from g_kaipan7",1);	 
	 if($pkqishu27[0][num]<1)
	    {
		$h = intval(date("H"));
						$day = $h > 22 ? 1 : 0;
						insertNumberjs('08:30:00', 1+$day, 10, 1, 82, $ConfigModel['g_close_time']);
					 }
					//检查幸运飞艇期数是否为空
					$pkqishu24=$db->query("select count(*) num from g_kaipan4",1);	 
	 if($pkqishu24[0][num]<1)
	    {
		           	InsertNumber_xyft(0, $ConfigModel['g_close_time']);
}
//-------------------------------------------
isUserSession();

function isUserSession()
{
	global $ConfigModel,$db;
	$minutes = date("Y-m-d H:i:s",strtotime(date("Y-m-d H:i:s"))-($ConfigModel['g_out_time']*60));
	$sql = "UPDATE `g_rank` SET `g_out`=0 WHERE g_count_time < '{$minutes}' AND `g_out`=1";
	$db->query($sql, 2);
	$sql = "UPDATE `g_user` SET `g_out`=0 WHERE g_count_time < '{$minutes}' AND `g_out`=1 ";
	$db->query($sql, 2);
	$sql = "UPDATE `g_relation_user` SET `g_out`=0 WHERE g_count_time < '{$minutes}' AND `g_out`=1 ";
	$db->query($sql, 2);
}


function InsertNumbers_pk ($day=1, $closeTime=2)
{
	global $db;
	$insertDate = date( "Y-m-d ", mktime(0, 0, 0, date('m'), date('d') + $day, date('Y')));
	$date = date( "Ymd", mktime(0, 0, 0, date('m'), date('d') + $day, date('Y')));
	$dateArr = array();
	$baseNumber = 311446-179*14-179*8-20 + (strtotime($insertDate) - strtotime('2012-08-15')) / 86400 * 179;
	$count = -1432+179;

	for ($i=9; $i<=23; $i++)
	{
		for ($n=2; $n<=57; $n+=5)
			{
				if ($i == 9 && $n == 2 )continue;
				$count++;

				$stratDate = $insertDate.$i.':'.$n.':'.'20';
				$a = strtotime($stratDate) - ($closeTime * 60-10); //封盤時間
				$endDate = date('Y-m-d H:i:s', $a);



				$dateArr['Number'][] = $baseNumber + $count;
				$dateArr['stratDate'][] = $stratDate;
				$dateArr['endDate'][] = $endDate;
			}
	}

	$db->query("DELETE FROM `g_kaipan6` WHERE `g_id` > 0 ", 2);
	$sql = "INSERT INTO `g_kaipan6` ( `g_qishu`, `g_feng_date`, `g_open_date`, `g_lock` ) VALUES ";
	for ($i=0; $i<count($dateArr['Number']); $i++)
	{
		$lock = $i == 0 ? 2 : 1;
		$sql .= "( '{$dateArr['Number'][$i]}', '{$dateArr['endDate'][$i]}', '{$dateArr['stratDate'][$i]}', '{$lock}' ),";
	}
	$sql = mb_substr($sql, 0, mb_strlen($sql, 'utf-8')-1);
	$db->query($sql, 2);
}
echo "采集完毕执行时间：". date('Y-m-d H:i:s')." </br>";
//检查广东是否有未结算
function setjcheck_gd()
{
    global $ConfigModel,$db;
	
	$sql = " SELECT distinct(g_qishu) FROM  `g_zhudan`  WHERE `g_type`='廣東快樂十分' and g_win is null ";
    $result = $db->query($sql, 1);
	if ($result)
	{
		for ($i=0; $i<count($result); $i++)
		{
			$NowQsgdId=$result[$i]['g_qishu'];
			$sql1 ="SELECT g_id FROM g_history WHERE g_qishu = '{$NowQsgdId}' AND g_game_id =1 AND g_ball_1 is not null LIMIT 1";
			if ($db->query($sql, 0)){
				inventory_gd ($NowQsgdId, $ConfigModel);
			} 
		}
	}
}
echo "检查广东是否有未结算完毕执行时间：". date('Y-m-d H:i:s')." </br>";
//检查重庆是否有未结算
function setjcheck_cq()
{
    global $ConfigModel,$db;
	$sql = " SELECT distinct(g_qishu) FROM  `g_zhudan`  WHERE  `g_type`='重慶時時彩' and  g_win is null ";
    $result = $db->query($sql, 1);
    if ($result)
	{
		for ($i=0; $i<count($result); $i++)
		{
			$NowQsgdId=$result[$i]['g_qishu'];
			$sql1 ="SELECT g_id FROM g_history2 WHERE g_qishu = '{$NowQsgdId}' AND g_game_id =2 AND g_ball_1 is not null LIMIT 1";
			if ($db->query($sql, 0)){
				inventory_cq ($NowQsgdId, $ConfigModel);
			} 
		}
	}
		
	
}
	echo "检查重庆是否有未结算完毕执行时间：". date('Y-m-d H:i:s')." </br>";
	
//检查天津是否有未结算
function setjcheck_tjssc()
{
    global $ConfigModel,$db;
	$sql = " SELECT distinct(g_qishu) FROM  `g_zhudan`  WHERE  `g_type`='天津时时彩' and  g_win is null ";
    $result = $db->query($sql, 1);
    if ($result)
	{
		for ($i=0; $i<count($result); $i++)
		{
			$NowQsgdId=$result[$i]['g_qishu'];
			$sql1 ="SELECT g_id FROM g_history11 WHERE g_qishu = '{$NowQsgdId}' AND g_game_id =3 AND g_ball_1 is not null LIMIT 1";
			if ($db->query($sql, 0)){
			//echo 1111;
				inventory_tjssc ($NowQsgdId, $ConfigModel);
			} 
		}
	}
		
	
}
	echo "检查天津是否有未结算完毕执行时间：". date('Y-m-d H:i:s')." </br>";	
	
//检查新疆是否有未结算
function setjcheck_xjssc()
{
    global $ConfigModel,$db;
	$sql = " SELECT distinct(g_qishu) FROM  `g_zhudan`  WHERE  `g_type`='新疆时时彩' and  g_win is null ";
    $result = $db->query($sql, 1);
    if ($result)
	{
		for ($i=0; $i<count($result); $i++)
		{
			$NowQsgdId=$result[$i]['g_qishu'];
			$sql1 ="SELECT g_id FROM g_history10 WHERE g_qishu = '{$NowQsgdId}' AND g_game_id =3 AND g_ball_1 is not null LIMIT 1";
			if ($db->query($sql, 0)){
			//echo 1111;
				inventory_xjssc ($NowQsgdId, $ConfigModel);
			} 
		}
	}
		
	
}
	echo "检查新疆是否有未结算完毕执行时间：". date('Y-m-d H:i:s')." </br>";	
	
	
//检查全天五分彩是否有未结算
function setjcheck_jxssc()
{
    global $ConfigModel,$db;
	$sql = " SELECT distinct(g_qishu) FROM  `g_zhudan`  WHERE  `g_type`='全天五分彩' and  g_win is null ";
    $result = $db->query($sql, 1);
    if ($result)
	{
		for ($i=0; $i<count($result); $i++)
		{
			$NowQsgdId=$result[$i]['g_qishu'];
			$sql1 ="SELECT g_id FROM g_history3 WHERE g_qishu = '{$NowQsgdId}' AND g_game_id =3 AND g_ball_1 is not null LIMIT 1";
			if ($db->query($sql, 0)){
			//echo 1111;
				inventory_jxssc ($NowQsgdId, $ConfigModel);
			} 
		}
	}
		
	
}
	echo "检查全天五分彩是否有未结算完毕执行时间：". date('Y-m-d H:i:s')." </br>";		
//检查PK10是否有未结算
function setjcheck_pk()
{
    global $ConfigModel,$db;
	$sql = " SELECT distinct(g_qishu) FROM  `g_zhudan`  WHERE  `g_type`='北京賽車(PK10)' and  g_win is null ";
    $result = $db->query($sql, 1);
         if ($result)
		{
			for ($i=0; $i<count($result); $i++)
			{
				$NowQsgdId=$result[$i]['g_qishu'];
				$sql1 ="SELECT g_id FROM g_history6 WHERE g_qishu = '{$NowQsgdId}' AND g_game_id =6 AND g_ball_1 is not null LIMIT 1";
				if ($db->query($sql, 0)){
				inventory_pk ($NowQsgdId, $ConfigModel);
		} 
			}
		}
		
	
}
echo "检查PK10是否有未结算完毕执行时间：". date('Y-m-d H:i:s')." </br>";
//检查快3是否有未结算
function setjcheck_js()
{
    global $ConfigModel,$db;
	$sql = " SELECT distinct(g_qishu) FROM  `g_zhudan`  WHERE  `g_type`='江苏骰寶(快3)' and  g_win is null ";
    $result = $db->query($sql, 1);
         if ($result)
		{
			for ($i=0; $i<count($result); $i++)
			{
				$NowQsgdId=$result[$i]['g_qishu'];
				$sql1 ="SELECT g_id FROM g_history7 WHERE g_qishu = '{$NowQsgdId}' AND g_game_id =7 AND g_ball_1 is not null LIMIT 1";
				if ($db->query($sql, 0)){
				inventory_js($NowQsgdId);
		} 
			}
		}
		
	
}
echo "检查快3是否有未结算完毕执行时间：". date('Y-m-d H:i:s')." </br>";
//检查快8是否有未结算
function setjcheck_kl8()
{
    global $ConfigModel,$db;
	$sql = " SELECT distinct(g_qishu) FROM  `g_zhudan`  WHERE  `g_type`='快樂8(雙盤)' and  g_win is null ";
    $result = $db->query($sql, 1);
         if ($result)
		{
			for ($i=0; $i<count($result); $i++)
			{
				$NowQsgdId=$result[$i]['g_qishu'];
				$sql1 ="SELECT g_id FROM g_history8 WHERE g_qishu = '{$NowQsgdId}' AND g_game_id =8 AND g_ball_1 is not null LIMIT 1";
				if ($db->query($sql, 0)){
					inventory_kl8($NowQsgdId);
				} 
			}
		}
		
	
}
echo "检查快8是否有未结算完毕执行时间：". date('Y-m-d H:i:s')." </br>";
//检查重慶幸運農場是否有未结算
function setjcheck_nc()
{
    global $ConfigModel,$db;
	
	$sql = " SELECT distinct(g_qishu) FROM  `g_zhudan`  WHERE `g_type`='重慶幸運農場' and g_win is null ";
    $result = $db->query($sql, 1);
	if ($result)
	{
		for ($i=0; $i<count($result); $i++)
		{
			$NowQsgdId=$result[$i]['g_qishu'];
			$sql1 ="SELECT g_id FROM g_history9 WHERE g_qishu = '{$NowQsgdId}' AND g_ball_1 is not null LIMIT 1";
			if ($db->query($sql, 0)){
				inventory_nc ($NowQsgdId, $ConfigModel);
			} 
		}
	}
}
echo "检查重慶幸運農場是否有未结算完毕执行时间：". date('Y-m-d H:i:s')." </br>";
//检查幸運飛艇是否有未结算
function setjcheck_xyft()
{
    global $ConfigModel,$db;
	$sql = " SELECT distinct(g_qishu) FROM  `g_zhudan`  WHERE  `g_type`='幸運飛艇' and  g_win is null ";
    $result = $db->query($sql, 1);
         if ($result)
		{
			for ($i=0; $i<count($result); $i++)
			{
				$NowQsgdId=$result[$i]['g_qishu'];
				$sql1 ="SELECT g_id FROM g_history4 WHERE g_qishu = '{$NowQsgdId}' AND g_ball_1 is not null LIMIT 1";
				if ($db->query($sql, 0)){
				inventory_xyft ($NowQsgdId, $ConfigModel);
		} 
			}
		}
}
echo "检查幸運飛艇是否有未结算完毕执行时间：". date('Y-m-d H:i:s')." </br>";
function inventory_gd ($number, $ConfigModel)
{
	if ($ConfigModel['g_automatic_money_lock'] == 1)
	{
		
		$Amount = new SumAmount($number);
		$Amount->ResultAmount();
	}
}


function inventory_cq ($number, $ConfigModel)
{
	if ($ConfigModel['g_automatic_money_lock'] == 1)
	{
		
		$Amount = new SumAmountcq($number);
		$Amount->ResultAmount();
	}
	
	//if (mb_substr($number, -2) == 23)
	//{
		//金額還原
		//RestoreMoney($ConfigModel['g_restore_money_lock']);
		
	//}
}
function inventory_tjssc ($number, $ConfigModel)
{
	if ($ConfigModel['g_automatic_money_lock'] == 1)
	{
		
		$Amount = new SumAmounttjssc($number);
		$Amount->ResultAmount();
	}
	
	//if (mb_substr($number, -2) == 23)
	//{
		//金額還原
		//RestoreMoney($ConfigModel['g_restore_money_lock']);
		
	//}
}
function inventory_xjssc ($number, $ConfigModel)
{
	if ($ConfigModel['g_automatic_money_lock'] == 1)
	{
		
		$Amount = new SumAmountxjssc($number);
		$Amount->ResultAmount();
	}
	
	//if (mb_substr($number, -2) == 23)
	//{
		//金額還原
		//RestoreMoney($ConfigModel['g_restore_money_lock']);
		
	//}
}

function inventory_jxssc ($number, $ConfigModel)
{
	if ($ConfigModel['g_automatic_money_lock'] == 1)
	{
		
		$Amount = new SumAmountjxssc($number);
		$Amount->ResultAmount();
	}
	
	//if (mb_substr($number, -2) == 23)
	//{
		//金額還原
		//RestoreMoney($ConfigModel['g_restore_money_lock']);
		
	//}
}
function inventory_pk ($number, $ConfigModel)
{
	if ($ConfigModel['g_automatic_money_lock'] == 1)
	{
		
		$Amount = new SumAmountpk($number);
		$Amount->ResultAmount();
	}
}


function inventory_js ($number, $ConfigModel)
{
global $ConfigModel;
	if ($ConfigModel['g_automatic_money_lock'] == 1)
	{
	
	$Amount = new SumAmountjs($number);
	$Amount->ResultAmount();
}
}


function inventory_kl8 ($number, $ConfigModel)
{
global $ConfigModel;
	if ($ConfigModel['g_automatic_money_lock'] == 1)
	{
	$Amount = new SumAmountkl8($number);
	$Amount->ResultAmount();
}
}

function inventory_nc ($number, $ConfigModel)
{
	if ($ConfigModel['g_automatic_money_lock'] == 1)
	{
		//結算
		$Amount = new SumAmountnc($number);
		$Amount->ResultAmount();
	}
}

function inventory_xyft ($number, $ConfigModel)
{
	if ($ConfigModel['g_automatic_money_lock'] == 1)
	{
		//結算
		$Amount = new SumAmountxyft($number);
		$Amount->ResultAmount();
	}
	if (mb_substr($number, -3) == 180)
	{
		//金額還原
		RestoreMoney($ConfigModel['g_restore_money_lock']);
		echo "金額還原完成！";
	}
}


if (("06:30:00" < date("H:i:s")) && (date("H:i:s") < "07:00:00")) {
		RestoreMoney($ConfigModel['g_restore_money_lock']);
	}

echo "采集完成！";
?>