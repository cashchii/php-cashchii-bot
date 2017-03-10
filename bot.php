<?php 
require_once __DIR__ . "/vendor/autoload.php";
$httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient('nCXaaQP4IrDgdM2G/gf1fc6eA1eo1R5VL0MiaZyvjEoqZNevPHUHYOvKXNDNCLz5q1IvBMHPFoCId/k0kjR7Gkql411JhfX7IsLueFb3XlI5dvEshaZYIrpKpmsoxt651wSWjwO5rmTRGW4NC/QSkQdB04t89/1O/w1cDnyilFU=');
$bot = new \LINE\LINEBot($httpClient, ['channelSecret' => 'f9be14bacc7ac4f857ca6c3fb0f543ef']);
$event = new LINE\LINEBot\Event('user');
$textMessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder('hello');
$response = $bot->replyMessage($event->getReplyToken(), $textMessageBuilder);
if ($response->isSucceeded()) {
	echo 'Succeeded!';
	return;
}

// Failed
echo $response->getHTTPStatus . ' ' . $response->getRawBody();


?>