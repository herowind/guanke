<?php /*a:2:{s:80:"G:\workspace\guanke\domain_front\application/zhibo/view\manage\camera\index.html";i:1510595942;s:77:"G:\workspace\guanke\domain_front\application/manage\view\template\iframe.html";i:1510315358;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<!-- Apple devices fullscreen -->
<meta name="apple-mobile-web-app-capable" content="yes">
<!-- Apple devices fullscreen -->
<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
<link href="//cdn.bootcss.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="__LIB__/components/bootswitch/css/bootstrap-switch.min.css" />
<link rel="stylesheet" type="text/css" href="__LIB__/components/datetimepicker/css/jquery.datetimepicker.css" />
<link rel="stylesheet" type="text/css" href="__LIB__/font/font-awesome/css/font-awesome.min.css" />
<link rel="stylesheet" type="text/css" href="__CSS__/layout.css" />
<link rel="stylesheet" type="text/css" href="__CSS__/main.css" />
<style type="text/css">html, body { overflow: visible;}</style>
<script type="text/javascript" src="__LIB__/utils/jquery.min-2.2.1.js"></script>

</head>
<body  style="background-color: rgb(255, 255, 255); overflow: auto; cursor: default; -moz-user-select: inherit;">
<div id="append_parent"></div>
<div id="ajaxwaitid"></div>

<div class="view-page">
    <!-- 页面标题 -->
    <div class="page-head">
        <h6 class="padding-left page-head-title">摄像头查询
        <span class="fr text-small text-normal padding-top"><b class="text-main">如有疑问或购买摄像头，电话0411-88889999</b></span>
        </h6>
    </div>
        
    <div class="page-content">
		<form name="formSearch" class="form-search form-inline" method="get" action="index">
		    <input type="text" name="keywords" id="keywords" class="form-control input-sm" value="<?php echo (htmlentities(app('request')->get('keywords'))) ? htmlentities(app('request')->get('keywords')) : ''; ?>" placeholder="名称或设备号" />
		    <button type="submit" class="btn btn-sm  btn-purple ">搜索</button>
		    <button type="button" class="btn btn-sm  btn-purple linkto-btn" data-url="index">清空条件</button>
		    <button type="button" class="btn btn-sm  btn-success linkto-btn pull-right" data-url="edit"><i class="fa fa-plus"></i> 新增摄像头</button>
		</form>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th class=" w5 text-center"><input type="checkbox" /></th>
                    <th class=" w5 ">序号</th>
                    <th class=" w30 ">摄像头名称</th>
                    <th class=" w20 ">设备号</th>
                    <th class=" w10 ">状态</th>
                    <th class=" w10 ">排序</th>
                    <th class=" w20 text-center">操作</th>                 
                </tr>
            </thead>
            <tbody>
                <?php if(is_array($pageData) || $pageData instanceof \think\Collection || $pageData instanceof \think\Paginator): $i = 0; $__LIST__ = $pageData;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?>
                <tr >
                    <td class="text-center"><input class="margin-top-20" type="checkbox" /></td>
                    <td><?php echo htmlentities($i); ?></tds>
                    <td><?php echo htmlentities($item['name']); ?></td>
                    <td><?php echo htmlentities($item['code']); ?></td>
                    <td><span class="<?php echo $item['isuse']==1 ? 'text-green' : ''; ?>"><?php echo htmlentities($item['isusetext']); ?></span></td>
                    <td>	                    
                    	<input id="sort<?php echo htmlentities($item['id']); ?>" value="<?php echo htmlentities($item['sort']); ?>" class="list_order form-control input-xs" data-id="<?php echo htmlentities($item['id']); ?>" data-old="<?php echo htmlentities($item['sort']); ?>" data-url="sortChange.html"/>
					</td>
                    <td class="text-center">
                        <a class="text-mix confirm-rst-url-btn btn btn-xs btn-default" href="remove.html?id=<?php echo htmlentities($item['id']); ?>" data-info="你确定要删除吗？" title="删除"><i class="fa fa-trash"></i> 删除</a>&nbsp;
                        <a class="text-main btn btn-xs btn-default" href="###"  data-toggle="modal" onclick="popModal('/zhibo/manage.camera/name.html?id=<?php echo htmlentities($item['id']); ?>')"><i class="fa fa-pencil"></i> 修改名称</a>
                    	<a class="text-main btn btn-xs btn-default" href="edit?id=<?php echo htmlentities($item['id']); ?>"   title="编辑"><i class="fa fa-pencil"></i> 临时编辑</a>
                    </td>
                </tr>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </tbody>
        </table>
        <?php if(empty($pageData) || (($pageData instanceof \think\Collection || $pageData instanceof \think\Paginator ) && $pageData->isEmpty())): ?>
        <div class="non-info show">
            <span>没查询到符合条件的记录</span>
        </div>
        <?php endif; ?>
        <div class="show-page padding-big-right">
	        <div class="page"><?php echo $pageData->render(); ?></div>
	    </div>
    </div>


</div>

<script src="//cdn.bootcss.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src="//cdn.bootcss.com/underscore.js/1.6.0/underscore-min.js"></script>
<script src="__LIB__/components/bootswitch/js/bootstrap-switch.min.js"></script>
<script src="__LIB__/components/datetimepicker/js/jquery.datetimepicker.full.min.js"></script>
<script src="__LIB__/components/layer/layer.js"></script>
<script src="__LIB__/utils/jquery.form.js"></script>
<script src="__LIB__/utils/maxlength.js"></script>
<script src="__JS__/main.js"></script>
<script src="__JS__/select.js"></script>
<script>
function popModal(path){
	parent.popModal(path);
}
</script>

<script>
var $page = {};

$(function(){
	$(".status-btn").each(function(){
        loadStatusBtn($(this));
    })
})

</script>

</body>
</html>