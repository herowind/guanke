<?php /*a:2:{s:73:"G:\workspace\guanke\domain_front\application/manage/view\index\index.html";i:1510549309;s:75:"G:\workspace\guanke\domain_front\application/manage\view\template\left.html";i:1510547686;}*/ ?>
<!doctype html>
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport"
	content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<!-- Apple devices fullscreen -->
<meta name="apple-mobile-web-app-capable" content="yes">
<!-- Apple devices fullscreen -->
<meta name="apple-mobile-web-app-status-bar-style"
	content="black-translucent">
<link rel="shortcut icon" type="image/x-icon"
	href="__PUBLIC__/images/favicon.ico" media="screen" />
<title>管理后台</title>
<script type="text/javascript">
	var SITEURL = window.location.host + '/index.php/manage';
</script>
<link rel="stylesheet" type="text/css"
	href="__LIB__/font/font-awesome/css/font-awesome.min.css" />
<link href="//cdn.bootcss.com/bootstrap/3.3.6/css/bootstrap.min.css"
	rel="stylesheet">
<link rel="stylesheet" type="text/css" href="__CSS__/layout.css">
<link rel="stylesheet" type="text/css" href="__CSS__/main.css" />
<link rel="stylesheet" type="text/css" href="__CSS__/manage.css?1">

<script type="text/javascript" src="__LIB__/utils/jquery.min-2.2.1.js"></script>
<script type="text/javascript" src="__LIB__/utils/jquery.form.js"></script>
<script type="text/javascript" src="__LIB__/utils/jquery.cookie.js"></script>
<script type="text/javascript"
	src="__LIB__/utils/jquery.validation.min.js"></script>
<script type="text/javascript" src="__LIB__/components/dialog/dialog.js"
	id="dialog_js"></script>
<script type="text/javascript" src="__LIB__/components/layer/layer.js"></script>
<script type="text/javascript" src="__JS__/admin.js"></script>
</head>
<body>
	<div class="view-topbar">
		<div class="topbar-console">
			<div class="nc-module-menu tobar-head fl" style="width: 100%">
				<a href="#" class="topbar-logo fl" onClick="javascript:openItem('welcome|Index');"> <span><img src="__IMG__/namelogo.png" /></span></a> 
				<a href="javascript:void(0);" data-param="guanke" class="topbar-home-link topbar-btn text-center fl"><span>观课</span></a>
				<a href="javascript:void(0);" data-param="wechat" class="topbar-home-link topbar-btn text-center fl"><span>微信</span></a>
			</div>
		</div>
		<div class="topbar-info">
			<ul class="fr">
				<li class="fl dropdown topbar-notice topbar-btn"><a href="#"
					class="dropdown-toggle"> <span class="icon-notice"></span> <span
						class="topbar-num have">0</span> <!--have表示有消息，没有消息去掉have-->
				</a></li>
				<li class="fl topbar-info-item">
					<div class="dropdown">
						<a href="#" class="dropdown-toggle topbar-btn"> <span
							class="fl text-normal"><i class="fa fa-file-text-o"></i>
								工单服务</span> <span class="icon-arrow-down"></span>
						</a>
						<ul class="dropdown-menu">
							<li><a href="#">我的工单</a></li>
							<li><a href="#">提交工单</a></li>
						</ul>
					</div>
				</li>
				<li class="fl topbar-info-item">
					<div class="dropdown">
						<a href="#" class="topbar-btn"> <span class="fl text-normal"><i
								class="fa fa-wrench"></i> 帮助中心</span> <span class="icon-arrow-down"></span>
						</a>
						<ul class="dropdown-menu">
							<li><a href="#">平台帮助文档</a></li>
							<li><a href="#">运营资料下载</a></li>
						</ul>
					</div>
				</li>
				<li class="fl topbar-info-item">
					<div class="dropdown">
						<a href="#" class="topbar-btn"> <span class="fl text-normal">
								<i class="fa fa-user"></i> <?php echo session('manager.username'); ?>
						</span> <span class="icon-arrow-down"></span>
						</a>
						<ul class="dropdown-menu">
							<li><a href="#" data-toggle="modal"
								onclick="popModal('/manage/account/edit.html')"><i
									class="fa fa-pencil text-primary"></i> 账号信息</a></li>
							<li><a href="#" data-toggle="modal"
								onclick="popModal('/manage/account/password.html')"><i
									class="fa fa-lock text-primary"></i> 修改密码</a></li>
							<li><a href="/manage/passport/logout.html"><i
									class="fa fa-power-off text-primary"></i> 退出</a></li>
						</ul>
					</div>
				</li>
			</ul>
		</div>
	</div>
	<div class="view-container">
		<!-- 左侧菜单  -->
		<div class="view-container-left">
    <div class="top-border"><span class="nav-side"></span><span class="sub-side"></span></div>
    <div id="adminNavTabs_index" class="nav-tabs">
    	<dl>
		    <dt><a href="javascript:void(0);"><span class="ico-microshop-1"></span><h3>概览</h3></a></dt>
		    <dd class="sub-menu">
			    <ul>
				    <li><a href="javascript:void(0);" data-param="welcome|Index">系统后台</a></li>
			    </ul>
		    </dd>
	    </dl>
    </div>
    <?php if(is_array($menu) || $menu instanceof \think\Collection || $menu instanceof \think\Paginator): if( count($menu)==0 ) : echo "" ;else: foreach($menu as $mk=>$vo): ?>
    <div id="adminNavTabs_<?php echo htmlentities($mk); ?>" class="nav-tabs">
    	<?php if(is_array($vo['child']) || $vo['child'] instanceof \think\Collection || $vo['child'] instanceof \think\Paginator): if( count($vo['child'])==0 ) : echo "" ;else: foreach($vo['child'] as $key=>$v2): ?>
	    <dl>
		    <dt><a href="javascript:void(0);"><img src="<?php echo htmlentities($v2['icon']); ?>"><?php echo htmlentities($v2['name']); ?></a></dt>
		    <dd class="sub-menu">
			    <ul>
			    	<?php if(is_array($v2['child']) || $v2['child'] instanceof \think\Collection || $v2['child'] instanceof \think\Paginator): if( count($v2['child'])==0 ) : echo "" ;else: foreach($v2['child'] as $key=>$v3): ?>
				    	<li><a href="javascript:void(0);" data-param="<?php echo htmlentities($v3['a']); ?>|<?php echo htmlentities($v3['c']); ?>|<?php echo htmlentities($v3['m']); ?>"><?php echo htmlentities($v3['name']); ?></a></li>
				    <?php endforeach; endif; else: echo "" ;endif; ?>
			    </ul>
		    </dd>
	    </dl>
    	<?php endforeach; endif; else: echo "" ;endif; ?>
    </div>
    <?php endforeach; endif; else: echo "" ;endif; ?>
    <div class="about" title="关于系统" onclick="ajax_form('about', '', 'http://www.guanke.net', 640);"><i class="fa fa-copyright"></i><span>互助联盟</span></div>
</div>
		<!-- 右侧内容  -->
		<div class="view-container-right">
			<div class="top-border"></div>
			<iframe src="" id="workspace" name="workspace"
				style="overflow: visible;" frameborder="0" width="100%" height="94%"
				scrolling="yes" onload="window.parent"></iframe>
		</div>
	</div>

	<!-- 公共弹出框  -->
	<div class="modal fade" id="popModal" tabindex="-1" role="dialog"
		aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="text-center alert alert-success">
					<img src="__IMG__/ajaxLoader.gif">
				</div>
			</div>
		</div>
	</div>

</body>
<script src="//cdn.bootcss.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script>
	function popModal(path) {
		$("#popModal").modal();
		$("#popModal .modal-content").load(path);
	}

	function popModalHide() {
		$('#popModal').modal('hide');
	}

	$('#popModal')
			.on(
					'hidden.bs.modal',
					function(e) {
						$("#popModal .modal-content")
								.html(
										'<div class="text-center alert alert-success"><img src="__IMG__/ajaxLoader.gif"></div>');
					})
</script>
</html>