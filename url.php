<?php
/**
 * Created by PhpStorm.
 * User: vovichua
 * Date: 16.11.18
 * Time: 16:15
 */

$urls = explode(PHP_EOL, $_POST['this']);

$invalidUrls = [];
foreach ($urls as $url) {
    $url = trim($url);
    $url = rtrim($url, '/');
    $parsedParams = parse_url($url);

    $protocol = $parsedParams['scheme'];
    if ($protocol == 'http') {
        $replaceTo = 'https';
        if (!isset($parsedParams['path'])) {
            $modifiedUrl .= '/index.php';
        }
    } elseif ($protocol == 'https') {
        $replaceTo = 'http';
    } else {
        $invalidUls[] =  $url;
        continue;
    }



    $modifiedUrl = str_replace($protocol, $replaceTo, $url);

    $newUrl[] = $modifiedUrl;
}
//echo "<pre>";
//var_dump($newUrl);

foreach ($newUrl as $new) {

    $ch = curl_init($new);

    curl_exec($ch);
    if (!curl_errno($ch)) {
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        echo 'Код ответа: '.$httpCode."<br><br>";

    }
    curl_close($ch);
}
