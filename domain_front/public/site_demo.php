<?php
namespace think;
define('APP_SITE', 'http://kedemo.qyhzlm.com');
define('APP_UPLOAD_SITE', 'http://keuploaddemo.qyhzlm.com');
define('APP_UPLOAD_PATH', 'd:/www/kedemo/uploads');
require __DIR__ . '/../extend/EasyWechat/vendor/autoload.php';
require __DIR__ . '/../../framework/base.php';
Container::get('app')->run()->send();