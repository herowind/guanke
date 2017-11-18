<?php
include __DIR__ . '/../extend/EasyWechat/vendor/autoload.php';
use EasyWeChat\OpenPlatform\Server\Guard;
use EasyWeChat\Factory;
use EasyWeChat\OpenPlatform\Auth\VerifyTicket;
use function Symfony\Component\Debug\header;

$options = [
    'log'=>[
    	'file'=>'wechat.log',
    		'level' => 'debug',
    ],
        'app_id'   => 'wxa82d282aef3dcffa',
        'secret'   => 'b61138219385c9152e59a513b9f298a7',
        'token'    => 'guanke',
        'aes_key'  => 'KXLT0BdLBTsWx637REQLUFRTOmMqPrastrGqimyMc8n'

    ];

$openPlatform = Factory::openPlatform($options);
$server = $openPlatform->server;

// 处理授权成功事件
$server->push(function ($message) use ($openPlatform){
	$openPlatform['logger']->debug('Easywechat:',['msg'=>$message]);
}, Guard::EVENT_AUTHORIZED);

// 处理授权更新事件
$server->push(function ($message) use ($openPlatform){
   $openPlatform['logger']->debug('Easywechat:',['msg'=>$message]);
}, Guard::EVENT_UPDATE_AUTHORIZED);
 
// 处理授权取消事件
$server->push(function ($message) use ($openPlatform){
   $ch = curl_init(); 
   curl_setopt($ch, CURLOPT_URL, "http://guanke.qyhzlm.com/wechat/manage.openplatform/remove.html?appid=".$message['AuthorizerAppid']); 
   $output = curl_exec($ch); 
   curl_close($ch); 
}, Guard::EVENT_UNAUTHORIZED);

$verifyTicket = new VerifyTicket($options['app_id']);
$verify_ticket =$verifyTicket->getTicket();
$openPlatform['logger']->debug('旧的ticket:',['ticket'=>$verify_ticket]);

return $server->serve();


