<?php
$access_token = 'QJlmvUZqiGRzyEodNUTX4phz+BLyLkwVx6J+tNpnjnXufRcxhDT+p03OY+LKastoWVv6f9wtfpctAXTyuaiLq664E8krqAsxLi5WHuwyzXhEeCPHW1AC7TdmI2VWC0goO4voV+f/NppRMvo8is0HNgdB04t89/1O/w1cDnyilFU=';

$url = 'https://api.line.me/v1/oauth/verify';

$headers = array('Authorization: Bearer ' . $access_token);

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
$result = curl_exec($ch);
curl_close($ch);

echo $result;

?>