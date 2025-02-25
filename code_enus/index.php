<?php

// Get URL
@$id = $_GET['id'];
@$key = $_GET['key'];
@$serverid = $_GET['serverid'];
if ($id=='' || $key==''){
    exit("ID or Key cannot be empty");
}
$url = "https://api.scpslgame.com/serverinfo.php?id=$id&key=$key&players=true";

// Functions to get the contents of a URL
require 'getWeb.php';

// Getting HTML content from a URL
$html_content = getWeb_page($url);

// Check if $html_content is empty
if (!$html_content) {
    exit(" Failed to extract content from URL");
}

$obj = json_decode($html_content,true);
$sus = $obj['Success'];

if (!$sus){
    $err = $obj['Error'];
    if ($err=='Access denied'){
        exit("The server does not exist");
    }
    elseif ($err=='Rate limit exceeded'){
        exit("Too many requests. Please try again later.");
    }
    else{
        exit("Unknown error");
    }
}

$serversCount = count($obj['Servers']);

if (is_numeric($serverid) && $serverid >= 0 && $serverid < $serversCount){
    $players = $obj['Servers'][$serverid]['Players'];
    echo $players;
}
else{
    foreach ($obj['Servers'] as $server) {
        echo $server['Players'] . "\n";
    }
}