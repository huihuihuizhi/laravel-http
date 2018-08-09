<?php
//用天气的api做一个实践



	//创建连接
	$fp = fsockopen('apis.baidu.com',80, $errno, $errstr, 10);

	if(!$fp) {
        echo $errstr;die;
    }

	//
	$http = '';

	//请求行
	$http .= "GET /http://op.juhe.cn/onebox/weather/query?cityname=北京 HTTP/1.1\r\n";

	//请求头
	$http .= "Host: apis.baidu.com\r\n";
	$http .= "Connection: close\r\n";
	$http .= "apikey: JH912cc31911e6eda8c6b2f0ce05b4d93e\r\n\r\n";

	//发送
	fwrite($fp, $http);

	//获取结果
	$res = '';

	while(!feof($fp)) {
        $res .= fgets($fp);
    }

	echo $res;


 ?>