ใหม่! แป้นพิมพ์ลัด … ระบบได้อัปเดตแป้นพิมพ์ลัดของไดรฟ์เพื่อให้คุณไปยังส่วนต่างๆ ด้วยตัวอักษรตัวแรกได้
<?php
require __DIR__ . '/vendor/autoload.php';

use LINE\LINEBot;
use LINE\LINEBot\HTTPClient\CurlHTTPClient;
use LINE\LINEBot\Event\MessageEvent\TextMessage;

$channelAccessToken = 'n1yb1HXyR8HdAmvZtfiCZlSWHxr4S8wsgkkf0O5L7sa1Pgde0uc7fQbyKtunhgyBn+hDEYH0sIVkW99iG9mxKi1Xt2DhkR5JVQia9YWYEaS7EUMCT78QTcVgt3ArkgCTjbiWFpkCYZDVCLC/w6cfJQdB04t89/1O/w1cDnyilFU=';
$channelSecret = '5351c9179f4b9f28f99286dc6d422873';

$httpClient = new CurlHTTPClient($channelAccessToken);
$bot = new LINEBot($httpClient, ['channelSecret' => $channelSecret]);

$signature = $_SERVER['HTTP_' . LINEBot\Constant\HTTPHeader::LINE_SIGNATURE];
$events = $bot->parseEventRequest(file_get_contents('php://input'), $signature);

foreach ($events as $event) {
    if ($event instanceof TextMessage) {
        $messageText = $event->getText();
        
        if ($messageText == 'สวัสดี') {
            $replyText = 'ว่าไงชาวโลก';
        } else {
            $replyText = 'ขอโทษครับ ฉันไม่เข้าใจคำถาม';
        }
        
        $bot->replyText($event->getReplyToken(), $replyText);
    }
}
