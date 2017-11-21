<?php

header("Content-type: text/html; charset=utf-8");


function http_post_json($url, $jsonStr)
{
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonStr);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json; charset=utf-8',
            'Content-Length: ' . strlen($jsonStr)
        )
    );
    $response = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    return array($httpCode, $response);
}


$url = "http://epapi.moji.com/moji-epa/json/epa/cityStationList";
$jsonStr = '{"common":{"device":"iPhone7,1","app_version":"45010200","platform":"iPhone","identifier":"28DDB2D3-1B68-4080-A7F5-1B7D84D86B64","language":"CN"},"params":{"cityId":"321200"}}';
$list = http_post_json($url, $jsonStr);

var_dump($list);





?>