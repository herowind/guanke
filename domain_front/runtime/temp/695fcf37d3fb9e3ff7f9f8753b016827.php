<?php /*a:1:{s:76:"G:\workspace\guanke\domain_front\application/manage/view\passport\login.html";i:1510404366;}*/ ?>
<!doctype html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1">
    <title>企业互助联盟管理平台</title>
    <meta name="keywords" content="企业互助联盟管理平台" />
    <meta name="description" content="企业互助联盟管理平台" />
    <link href="/site/css/layout.css" rel="stylesheet" type="text/css">
    <link href="/site/css/login.css" rel="stylesheet" type="text/css">
</head>
<body class="login-bg">
    <div class="main ">
        <!--登录-->
        <div class="login-dom login-max">
            <div class="logo text-center">
                <a href="#"><img src="__IMG__/logo.png" width="180px" height="180px"></a>
            </div>
            <div class="login container " id="login">
                <p class="text-big text-center logo-color">同一个账号，连接一切</p>
                <p class=" text-center margin-small-top logo-color text-small">控制台 | 云平台 | 论坛 | 云市场</p>
                <form class="login-form" id="login-form" action="/manage/passport/dologin.html" method="post" autocomplete="off">
                    <div class="login-box border text-small" id="box">
                        <div class="name border-bottom">
                            <input type="text" id="username" name="username" nullmsg="请填写帐号信息" placeholder="账号" >
                        </div>
                        <div class="pwd">
                            <input type="password" id="password" name="password" nullmsg="请填写帐号密码" placeholder="密码" >
                        </div>
                    </div>
                    <input type="hidden" name="formhash" value="5abb5d21"/>
                    <input type="submit" class="btn text-center login-btn" value="立即登录">
                </form>
                <div class="forget">
                    <a href="repassword.html" class="forget-pwd text-small fl">忘记登录密码？</a><a href="register.html" class="forget-new text-small fr" id="forget-new">创建一个新账号</a>
                </div>
            </div>
        </div>
        <div class="popupDom">
            <div class="popup text-default"></div>
        </div>
    </div>
</body>
<script src="/lib/utils/jquery.min-2.2.1.js"></script>
<script src="/lib/utils/jquery.form.js"></script>
<script src="/lib/utils/maxlength.js"></script>
<script src="/lib/components/layer/layer.js"></script>
<script src="/site/js/main.js"></script>
<script type="text/javascript">
//登入
$(function(){
    $('#login-form').ajaxForm({
        beforeSubmit: logcheckForm,
        success: logcomplete,
        dataType: 'json'
    });
    function logcheckForm(){
        if( '' == $.trim($('#username').val())){
            layer.alert('登录用户名不能为空', {icon: 5}, function(index){
                layer.close(index);
                $('#username').focus();
            });
            return false;
        }

        if( '' == $.trim($('#password').val())){
            layer.alert('登录密码不能为空', {icon: 5}, function(index){
                layer.close(index);
                $('#password').focus();
            });
            return false;
        }

    }
    function logcomplete(data){
        if(data.code==1){
            window.location.href='/manage/index/index';
        }else{
            layer.alert(data.msg, {icon: 5});
        }
    }
    return false;
});
</script>
</html>