<?php
/*  
  Copyright (c) 2010-02 Game
  Game All Rights Reserved. 
  
  Author: Version:1.0
  Date:2011-12-7
*/

$home = $_SERVER["SERVER_NAME"];
$port = $_SERVER["SERVER_PORT"];
global $Home,$sHome,$Port,$sPort;

print_r($Home)."<br/>";

echo $home."<br/>";

exit;

$a = 0;
for ($i=0; $i<count($Home); $i++)
{
    
    
	if ($home == $Home[$i] && $port == $Port[$i])
	{
		//前臺登入點
		$a= 1;
		break;
	}
	else if ($home == $sHome[$i] && $port == $sPort[$i])
	{
		//後臺登陸點
		$a= 3;
		break;
	}
	else if ($home == $dHome[$i] && $port == $dPort[$i])
	{
		//代理登陸點
		$a= 2;
		break;
	}
	else if ($home == $hHome[$i] && $port == $hPort[$i])
	{
		//导航登陸點
		$a= 4;
		break;
	}
	else if ($home == $mHome[$i] && $port == $mPort[$i])
	{
		//手机登陸點
		$a= 5;
		break;
	}
}


if ($a == 0)
	exit('<html>
<head><title>404 Not Found</title></head>
<body bgcolor="white">
<center><h1>404 Not Found</h1></center>
<hr><center>nginx/2.0.1</center>
</body>
</html>');
else 
	return $a;















?>