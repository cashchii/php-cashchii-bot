<?php
$access_token = 'nCXaaQP4IrDgdM2G/gf1fc6eA1eo1R5VL0MiaZyvjEoqZNevPHUHYOvKXNDNCLz5q1IvBMHPFoCId/k0kjR7Gkql411JhfX7IsLueFb3XlI5dvEshaZYIrpKpmsoxt651wSWjwO5rmTRGW4NC/QSkQdB04t89/1O/w1cDnyilFU=';

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
