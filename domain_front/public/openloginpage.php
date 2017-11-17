<?php
include __DIR__ . '/../extend/EasyWechat/vendor/autoload.php';
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
$verifyTicket = new VerifyTicket($options['open_platform']['app_id']);
$verify_ticket =$verifyTicket->getTicket();
$openPlatform['logger']->debug('Easywechat_ticket:',['ticket'=>$verify_ticket]);

$url = $openPlatform->getPreAuthorizationUrl('http://guanke.qyhzlm.com/openwechat.php');
$openPlatform['logger']->debug('Easywechat:',['openloginpage'=>$url]);

header("Location: $url");
