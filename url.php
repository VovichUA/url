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
    } elseif ($protocol == 'https') {
        $replaceTo = 'http';
    } else {
        $invalidUls[] =  $url;
        continue;
    }

    $modifiedUrl = str_replace($protocol, $replaceTo, $url);

    $urlsForCurl[] = $modifiedUrl;
}

foreach ($urlsForCurl as $urlForRequest) {
        $parsedParams = parse_url($urlForRequest);

        $curlResource = curl_init($urlForRequest);
        curl_setopt($curlResource, CURLOPT_RETURNTRANSFER, true);

        curl_exec($curlResource);

            if (!curl_errno($curlResource)) {
                if (!isset($parsedParams['path'])) {
                    $httpCode = curl_getinfo($curlResource, CURLINFO_HTTP_CODE);
                    echo $urlForRequest.'/index.php: Код ответа: '.$httpCode;
                    if ($httpCode == 301 || $httpCode == 302) {
                        $urlChange = str_replace($parsedParams['scheme'], 'https', $urlForRequest);
                        echo "<br>".'Редирект: '.$urlChange.'/index.php'."<hr>";
                    } else {
                        echo "<hr>";
                    }

                } else {
                    $httpCode = curl_getinfo($curlResource, CURLINFO_HTTP_CODE);
                    echo $urlForRequest.': Код ответа: '.$httpCode;
                    if ($httpCode == 301 || $httpCode == 302) {
                        $urlChange = str_replace($parsedParams['scheme'], 'https    ', $urlForRequest);
                        echo "<br>".'Редирект: '.$urlChange."<hr>";
                    } else {
                        echo "<hr>";
                    }
                }
            }

    curl_close($curlResource);

}

