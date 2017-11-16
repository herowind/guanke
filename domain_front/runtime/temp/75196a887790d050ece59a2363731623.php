<?php /*a:2:{s:79:"G:\workspace\guanke\domain_front\application/zhibo/view\manage\camera\edit.html";i:1510595058;s:77:"G:\workspace\guanke\domain_front\application/manage\view\template\iframe.html";i:1510315358;}*/ ?>
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
        <h6 class="padding-left page-head-title"><?php echo !empty($detail['id']) ? '编辑' : '新增'; ?>摄像头
        <span class="fr text-small text-normal padding-top"><b class="text-main"></b></span>
        </h6>
    </div>
 
    <div class="page-content">
	    <form class="form-inline form-edit ajaxForm" id="formEdit" style="margin-top:-1px;" enctype="multipart/form-data" method="post" action="edit" autocomplete="off">
	        <input type="hidden" id="id" name="id" value="<?php echo htmlentities($detail['id']); ?>">
	        <div class="form-unit-style" data-title="学校信息">
	            <h5 class="real-name-head margin-large-top text-main-deep">摄像头信息<span class="margin-left">后期开放新增和修改</span></h5>
	            <div class="form-group clearfix">
	                <div class="label-zoon required">名称</div>
	                <div class="input-zoon">
						<input type="text" class="form-control width-main" id="name" name="name" value="<?php echo htmlentities($detail['name']); ?>" placeholder="例如：二楼跆拳道教室摄像头">
	                </div>
	            </div>
	            
	            <div class="form-group clearfix">
	                <div class="label-zoon required">编号</div>
	                <div class="input-zoon">
						<input type="text" class="form-control width-main" id="code" name="code" value="<?php echo htmlentities($detail['code']); ?>" placeholder="在购买的摄像头里面查看">
	                </div>
	            </div>
	            
	            <div class="form-group clearfix">
	                <div class="label-zoon required">链接</div>
	                <div class="input-zoon">
						<input type="text" class="form-control width-main" id="url" name="url" value="<?php echo htmlentities($detail['url']); ?>" placeholder="出厂时我们会协助帮您设置">
	                </div>
	            </div>
	            
				<div class="form-group clearfix">
	                <div class="label-zoon">状态</div>
	                <div class="input-zoon">
	                    <input type="hidden" name="isuse" value="<?php echo htmlentities($detail['isuse']); ?>">
	                    <input class="form-control" name="isuse_check" id="isuse_check" data-on-color="success" data-on-text="显示" data-off-color="danger" data-off-text="隐藏" data-size="small" value="1" <?php echo $detail['isuse']==1 ? 'checked' : ''; ?> type="checkbox" />
	                </div>
	            </div>

	        </div>

	        <div class="form-unit-style margin-large-top" data-title="提交">
	            <div class="form-group clearfix">
	                <div class="label-zoon"></div>
	                <div class="input-zoon">
	                    <button type="button" class="btn btn-info" id="saveBtn">立即保存</button>
	                    <button type="button" class="btn btn-default margin-left-15 linkto-btn" data-url="index.html">返回上页</button>
	                </div>
	            </div>
	        </div>
	    </form>
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



    //是否显示初始化
    $("input[name='isuse_check']").bootstrapSwitch();
    $('input[name="isuse_check"]').on('switchChange.bootstrapSwitch', function(event, state) {
        if(state){
            $("input[name='isuse']").val(1);
        }else{
            $("input[name='isuse']").val(0);
        }
    })    
    
    //提交表单
	$("#saveBtn").on("click",function(){
		$('.ajaxForm').submit();
        return false;
    })
})
</script>

</body>
</html>