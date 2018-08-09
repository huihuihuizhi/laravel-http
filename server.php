<?php
//模拟服务器端

/*对客户端的请求做出响应，返回内容。
   返回内容不用return，而是用echo、print_r、print等，但是绝对不能用return
*/
//一、用echo直接返回内容
//echo 'hello world';
//二、可以是HTML代码
/*
     <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="utf-8">
        <title></title>
    </head>
    <body>ni hao</body>
    </html>
*/



	//打印$_POST检测参数有没有过来
	//var_dump($_POST);

	//打印cookie内容
	// var_dump($_COOKIE);

	//打印server的内容
	//var_dump($_SERVER);

	//打印$_GET
	// var_dump($_GET);

	//打印$GLOBALS
	var_dump($GLOBALS);




 ?>
