<?php
$access_token = 'QJlmvUZqiGRzyEodNUTX4phz+BLyLkwVx6J+tNpnjnXufRcxhDT+p03OY+LKastoWVv6f9wtfpctAXTyuaiLq664E8krqAsxLi5WHuwyzXhEeCPHW1AC7TdmI2VWC0goO4voV+f/NppRMvo8is0HNgdB04t89/1O/w1cDnyilFU=';

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

			
			if($text == "EMS123456")
			{
				$messages = [
					'type' => 'text',
					'text' => "สินค้าของท่านได้ถึง กทม วันที่ 29/9/2560 กรุณาติดต่อ Call Center 02-002154"
				];
			}
			else
			{
				// Build message to reply back
				$messages = [
					'type' => 'text',
					'text' => $text
				];
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