<?php
include __DIR__ . '/../extend/EasyWechat/vendor/autoload.php';
use EasyWeChat\OpenPlatform\Server\Guard;
use EasyWeChat\Factory;
use EasyWeChat\OpenPlatform\Auth\VerifyTicket;

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
$openPlatform['logger']->debug('Easywechat:',['开始接受']);
return $server->serve();
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
	$verifyTicket = new VerifyTicket($options['open_platform']['app_id']);
$verify_ticket =$verifyTicket->getTicket();
$openPlatform['logger']->debug('Easywechat_ticket:',['ticket'=>$verify_ticket]);


