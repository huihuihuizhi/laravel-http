<?php
//client.php 模拟客户端

/*
 http请求主要有两种：
 GET——GET就是通过地址栏点击的方式访问服务器，
 POST通过提交表单的方式，发动POST请求给服务器
*/

/*操作步骤：
一、创建连接
        $fp = fsockopen('localhost', 80, $errno, $errstr, 10);
            fsockonopen()是打开sockon连接，也就是创建连接。用socket模拟http协议发送
            1、主机地址：localhost或者127.0.0.1
            2、端口号：80
            3、$errno:获取错误编号。创建连接时若发生错误，会将信息传到$errno这个变量中。这是一个引用类型值，使用的方式和正则相同。
            4、$errstr:错误信息。若请求出了问题，会将错误传到$errstr中
            5、超时时间，单位秒
二、测试
            if(!$fp) {
            echo $errstr;die;}
            若创建连接失败，则输出错误消息，并且结束操作
三、请求报文
          请求报文包括三部分：请求行、请求头 请求体
          1、$http .= "GET /one-http/server.php HTTP/1.1\r\n";
             $http .= "GET /one-http/server.php HTTP/1.1\r\n "; 错误，\n后面不能有空格
             请求行又包括三部分：请求方式、请求的脚本在服务器的绝对路径（从www的目录下开始截取，并将\ 改成 /）、协议的版本,结束时一定要加上\r\n,否则发送失败。
          2、请求头
             $http .= "Host: localhost\r\n";//主机名
             $http .= "Connection: close\r\n\r\n";
             请求头完毕后，在请求头最后加两个\r\n
             当创建连接完成之后，服务器返回结果，返回结果后立刻断开连接。
             也可以是keep-alive，创建连接完成之后，不断开，为了以后的请求可以使用这个通道，提高请求速率。
          3、GET方式中无请求体
四、发送请求
           fwrite($fp,$http);
           fwrite();写内容，平时是向文件中写内容，但是这里是往连接流中写内容
五、获取结果
            $res = '';
            while(!feof($fp)){
                $res .= fgets($fp);
            }
           feof();检测文件是否到结尾
           fgets();分段读取$fp 中的内容(每次读取1K的内容)，每次读取之后都存到$res 中
六、输出内容
          echo $res;
*/


//模拟GET 请求方式
//一、创建连接
$fp = fsockopen('localhost', 80, $errno, $errstr, 10);
//二、检测
if(!$fp) {
    echo $errstr;die;
}
//三、请求报文
  //请求行
$http = "";
$http .= "GET /one-http/server.php?uid=100&name=zhangsan HTTP/1.1\r\n";

  //请求头
$http .= "Host: localhost\r\n";//主机名
$http .= "Connection: close\r\n\r\n";
  //请求体  无

//四、发送请求
fwrite($fp,$http);
//五、获取结果

$res = '';
while(!feof($fp)){
    $res .= fgets($fp);
}
//六、输出内容
echo $res;