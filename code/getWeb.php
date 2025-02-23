<?php
function getWeb_page($url): bool|string
{
    $options = array(
        CURLOPT_RETURNTRANSFER => true,     // 返回网页
        CURLOPT_HEADER => false,    // 不返回报头
        CURLOPT_FOLLOWLOCATION => true,     // 跟踪重定向
        CURLOPT_ENCODING => "",       // 处理压缩
        CURLOPT_USERAGENT => "Mozilla/5.0 (Server.Spider ; +https://api.tasaed.top)", // UA
        CURLOPT_AUTOREFERER => true,     // 在重定向时设置推荐人
        CURLOPT_CONNECTTIMEOUT => 120,      // 连接超时
        CURLOPT_TIMEOUT => 120,      // 响应超时
        CURLOPT_MAXREDIRS => 10,       // 10 次重定向后停止
    );

    $ch = curl_init($url);
    curl_setopt_array($ch, $options);
    $content = curl_exec($ch);

    // 检查错误
    if (curl_errno($ch)) {
        echo '连接错误: ' . curl_error($ch);
        return false;
    }

    curl_close($ch);

    return $content;
}