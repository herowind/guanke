<?php
namespace think;
define('APP_SITE', 'http://ke.qyhzlm.com');
define('APP_UPLOAD_SITE', 'http://keupload.qyhzlm.com');
define('APP_UPLOAD_PATH', 'd:/www/guanke/uploads');
require __DIR__ . '/../extend/EasyWechat/vendor/autoload.php';
require __DIR__ . '/../../framework/base.php';
Container::get('app')->run()->send();