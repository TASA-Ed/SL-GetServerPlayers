<?php
function getWeb_page($url): bool|string
{
    $options = array(
        CURLOPT_RETURNTRANSFER => true,     // Return to the page
        CURLOPT_HEADER => false,    // Does not return headers
        CURLOPT_FOLLOWLOCATION => true,     // Tracking Redirection
        CURLOPT_ENCODING => "",       // Processing Compression
        CURLOPT_USERAGENT => "Mozilla/5.0 (Server.Spider ; +https://api.tasaed.top)", // UA
        CURLOPT_AUTOREFERER => true,     // Setting referrer on redirection
        CURLOPT_CONNECTTIMEOUT => 120,      // Connection timeout
        CURLOPT_TIMEOUT => 120,      // Response timeout
        CURLOPT_MAXREDIRS => 10,       // Stop after 10 redirects
    );

    $ch = curl_init($url);
    curl_setopt_array($ch, $options);
    $content = curl_exec($ch);

    // Check for errors
    if (curl_errno($ch)) {
        echo 'Connection error: ' . curl_error($ch);
        return false;
    }

    curl_close($ch);

    return $content;
}