<?php
include __DIR__ . '/../extend/EasyWechat/vendor/autoload.php';
use EasyWeChat\OpenPlatform\Server\Guard;
use EasyWeChat\Factory;

$options = [
    'log'=>[
    	'file'=>'wechat.log',
    		'level' => 'debug',
    ],
    'open_platform' => [
        'app_id'   => 'wxa82d282aef3dcffa',
        'secret'   => 'b61138219385c9152e59a513b9f298a7',
        'token'    => 'guanke',
        'aes_key'  => 'KXLT0BdLBTsWx637REQLUFRTOmMqPrastrGqimyMc8n'
        ],
    // ...
    ];

$openPlatform = Factory::openPlatform($options);
$openPlatform['logger']->debug('Easywechat:',['1111']);
$server = $openPlatform->server;

//$server['logger']->debug('Request received:','1111');

// 处理授权成功事件
$server->push(function ($message) {
	$openPlatform['logger']->debug('Easywechat:',['msg'=>'处理授权成功事件']);
}, Guard::EVENT_AUTHORIZED);

// 处理授权更新事件
$server->push(function ($message) {
	$openPlatform['logger']->debug('Easywechat:',['msg'=>'处理授权更新事件']);
}, Guard::EVENT_UPDATE_AUTHORIZED);

// 处理授权取消事件
$server->push(function ($message) {
	$openPlatform['logger']->debug('Easywechat:',['msg'=>'处理授权取消事件']);
}, Guard::EVENT_UNAUTHORIZED);
	$openPlatform['logger']->debug('Easywechat:',['msg'=>'处理其他时间']);
$verify_ticket = $openPlatform['verify_ticket']->getTicket();
$openPlatform['logger']->debug('Easywechat_ticket:',['ticket'=>$verify_ticket]);
return $server->serve();

