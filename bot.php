<?php

require_once __DIR__ . "/vendor/autoload.php";
use LINE\LINEBot;
use LINE\LINEBot\HTTPClient;


$access_token = 'nCXaaQP4IrDgdM2G/gf1fc6eA1eo1R5VL0MiaZyvjEoqZNevPHUHYOvKXNDNCLz5q1IvBMHPFoCId/k0kjR7Gkql411JhfX7IsLueFb3XlI5dvEshaZYIrpKpmsoxt651wSWjwO5rmTRGW4NC/QSkQdB04t89/1O/w1cDnyilFU=';
$channelSecret = 'f9be14bacc7ac4f857ca6c3fb0f543ef';
// Get POST body content
$content = file_get_contents('php://input');
// Parse JSON
$events = json_decode($content, true);
// Validate parsed JSON data
if (!is_null($events['events'])) {
	// Loop through each event
	foreach ($events['events'] as $event) {
		// Reply only when message sent is in 'text' format
		if ($event['type'] == 'message' && $event['message']['type'] == 'text') {
			// Get text sent
			$text = $event['message']['text'];
			// Get replyToken
			$replyToken = $event['replyToken'];
			
			$httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient($access_token);
			$bot = new \LINE\LINEBot($httpClient, ['channelSecret' => $channelSecret]);
				

			// Build message to reply back
				
				
			if ($text == 'Carousel'){
				$actionBuilder = new \LINE\LINEBot\TemplateActionBuilder\UriTemplateActionBuilder('Label','http://www.google.co.th');
				$column[] = new \LINE\LINEBot\MessageBuilder\TemplateBuilder\CarouselColumnTemplateBuilder(
						'test', 'Carousel','https://goo.gl/yvjjUI',$actionBuilder);
				$carousel = new \LINE\LINEBot\MessageBuilder\TemplateBuilder\CarouselTemplateBuilder($column[0]);
				$messages = [
						'type' => 'template',
						'altText' => 'This is test template',
						'template' => $carousel
				];
			} else {
				$textMessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder('click');
				$response = $bot->replyMessage($replyToken, $textMessageBuilder);
			}

			// Make a POST Request to Messaging API to reply to sender
			$url = 'https://api.line.me/v2/bot/message/reply';
			$data = [
					'replyToken' => $replyToken,
					'messages' => [$messages],
			];
			$post = json_encode($data);
			$headers = array('Content-Type: application/json', 'Authorization: Bearer ' . $access_token);

			$ch = curl_init($url);
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
			curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
			$result = curl_exec($ch);
			curl_close($ch);

			echo $result . "\r\n";
		}
	}
}
echo "OK";
?>
