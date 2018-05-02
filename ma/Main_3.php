<!DOCTYPE html>  
<html>  
<head>  
<title>列表</title>  
<link rel="stylesheet" href="../m/css/jquery.mobile-1.4.3.css">
<link rel="stylesheet" href="../m/css/style.css">
<script src="../m/js/jquery-1.8.3.min.js"></script>
<script src="../m/js/jquery.mobile-1.4.3.js"></script>
<meta name="viewport" content="width=device-width,initial-scale=1.0, minimum-scale=1.0, maximum-scale=3.0, user-scalable=yes"/>
<meta content="telephone=no" name="format-detection" />
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
</head>  
<body>  	
<div data-role="page" id="dataPageJeuWeek">
<script type="text/javascript" language="javascript">
    function getDataList(FindDate) //快开的明細
    {
        window.location.href = "Report_JeuWeekList.php?FindDate=" + FindDate + "&page=0&r=07180358274202";
    }
    function Zd_Show_All(FindDate) {
        window.location.href = "Report_JeuWeekAllList.php?FindDate=" + FindDate + "&page=0&r=07180358274202";
    }
</script>
	<div data-role="header" data-position="fixed">
		<a href="#defaultpanel" data-role="botton" data-icon="bars" data-iconpos="notext"></a>
		<h1>結算報表</h1>
        <a href="Main.php" data-role="botton" data-icon="home" data-iconpos="notext" data-transition="slide"  data-direction="reverse"></a>
		</div> 
    <div data-role="content" class="pm">
    
       <table class="tableBox">
        <tr>
          	<th>登陆名</td>
			<th>名称</td>
            <th>利润</td>
            <th>笔</td>
            <th>笔数</td>
            <th>金额</td>
            <th>输赢</td>
            <th>降倍</td>
            <th>笔</td>
		</tr>
    
    </table>
  
    </div>
<? include 'footer.php';?>
<? include 'left.php';?>
</div> 
</body> 
</html> 