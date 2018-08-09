<?php

//创建连接
$fp = fsockopen('localhost', 80, $errno, $errstr, 10);

//判断
if(!$fp) {
    echo $errstr;die;
}

$http = '';

//请求行
$http .= "POST /one-http/server.php HTTP/1.1\r\n";

//请求头
$http .= "Host: localhost\r\n";//主机
$http .= "Connection: close\r\n";//连接方式
$http .= "Cookie: username=admin;uid=200\r\n";//cookie是存储在客户端的标识，服务器可以通过setcookie向客户端浏览器写入cookie，再次访问的时候，可以将这个信息带过去。
$http .= "User-agent: firefox-chrome-safari-ios-android\r\n";//对客户端的标识。比如Android、iOS、火狐、IE……等标识都不一样。
$http .= "Content-type: application/x-www-form-urlencoded\r\n";//ajax,客户端向服务器端发送请求，并且希望服务器通过$_post把参数提取出来。
$http .= "Content-length: 37\r\n\r\n";//请求体中的数量 email=xiaohigh@163.com&username=admin 37个

//请求体
$http .= "email=xiaohigh@163.com&username=admin\r\n";

//发送
fwrite($fp, $http);

$res = '';
//获取结果
while(!feof($fp)) {
    $res .= fgets($fp);
}

echo $res;