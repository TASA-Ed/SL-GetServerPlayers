<?php

// 获取URL
@$id = $_GET['id'];
@$key = $_GET['key'];
if ($id=='' || $key==''){
    exit("ID或Key不能为空");
}
$url = "https://api.scpslgame.com/serverinfo.php?id=$id&key=$key&players=true";

// 获取 URL 内容的函数
require 'getWeb.php';

// 从 URL 获取 HTML 内容
$html_content = getWeb_page($url);

// 检查 $html_content 是否为空
if (!$html_content) {
    exit(" 从 URL 提取内容失败");
}

$obj = json_decode($html_content,true);
$sus = $obj['Success'];

if (!$sus){
    $err = $obj['Error'];
    if ($err=='Access denied'){
        exit("服务器不存在");
    }
    elseif ($err=='Rate limit exceeded'){
        exit("请求次数过多，请稍候再试");
    }
    else{
        exit("未知错误");
    }
}
$players = $obj['Servers'][0]['Players'];

echo $players;