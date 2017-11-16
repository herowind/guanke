<?php /*a:2:{s:84:"G:\workspace\guanke\domain_front\application/guanke/view\manage\liveschool\edit.html";i:1510505465;s:77:"G:\workspace\guanke\domain_front\application/manage\view\template\iframe.html";i:1510315358;}*/ ?>
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
        <h6 class="padding-left page-head-title"><?php echo !empty($detail['id']) ? '编辑' : '新增'; ?>监控
        <span class="fr text-small text-normal padding-top"><b class="text-main"></b></span>
        </h6>
    </div>
 
    <div class="page-content">
	    <form class="form-inline form-edit ajaxForm" id="formEdit" style="margin-top:-1px;" enctype="multipart/form-data" method="post" action="edit" autocomplete="off">
	        <input type="hidden" id="id" name="id" value="<?php echo htmlentities($detail['id']); ?>">
	        <div class="form-unit-style" data-title="学校信息">
	            <h5 class="real-name-head margin-large-top text-main-deep">监控信息<span class="margin-left">监控指定学校的房间</span></h5>
	            <div class="form-group clearfix">
	                <div class="label-zoon required">房间名称</div>
	                <div class="input-zoon">
						<input type="text" class="form-control width-main" id="name" name="name" value="<?php echo htmlentities($detail['name']); ?>" placeholder="">
	                </div>
	            </div>
	            
	            <div class="form-group clearfix">
	                <div class="label-zoon required">监控备注</div>
	                <div class="input-zoon">
	                	<textarea class="form-control width-main" id="intro" name="intro"><?php echo htmlentities($detail['intro']); ?></textarea>
	                </div>
	            </div>
	            
				<div class="form-group clearfix">
	                <div class="label-zoon required">选择学校</div>
	                <div class="input-zoon">
						<select class="form-control width-main" id="school_id" name="school_id" data-default="选择学校">
				           	<?php echo widget('ManageWidget/schoolOptions', ['selected' => $detail['school_id']]); ?>
						</select>								
	                </div>
	            </div>
	            
	            <div class="form-group clearfix">
	                <div class="label-zoon required">选择摄像头</div>
	                <div class="input-zoon">
						<select class="form-control width-main" id="camera_id" name="camera_id" data-default="选择摄像头">
				           	<?php echo widget('zhibo/ManageWidget/cameraOptions', ['selected' => $detail['camera_id']]); ?>
						</select>								
	                </div>
	            </div>

	        </div>
	        
	        <div id="zhibo" class="form-unit-style" data-title="权限设置">
	            <h5 class="real-name-head margin-large-top text-main-deep">权限设置<span class="margin-left">申请授权可见：用户前台需要提交查看申请，管理后台需审核通过</span></h5>
	            <div class="form-group clearfix">
	                <div class="label-zoon required">可视群体</div>
	                <div class="input-zoon">
						<select class="form-control width-main" id="membervisibility" name="membervisibility" data-default="可视群体">
				           	<?php foreach(config('data.camera.membervisibility') as $key=>$val): ?>
				              	<option value="<?php echo htmlentities($key); ?>" ><?php echo htmlentities($val); ?></option>
				           	<?php endforeach; ?>
						</select>								
	                </div>
	            </div>
	            
	            <div class="form-group clearfix">
	                <div class="label-zoon">前台显示</div>
	                <div class="input-zoon">
	                    <input type="hidden" name="isdisplay" value="<?php echo htmlentities($detail['isdisplay']); ?>">
	                    <input class="form-control" name="isdisplay_check" id="isdisplay_check" data-on-color="success" data-on-text="显示" data-off-color="danger" data-off-text="隐藏" data-size="small" value="1" <?php echo $detail['isdisplay']==1 ? 'checked' : ''; ?> type="checkbox" />
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
	//课程类型初始化
	$("#type").val("<?php echo htmlentities((isset($detail['type']) && ($detail['type'] !== '')?$detail['type']:'1')); ?>");
	if($("#type").val()==2){
		$("#zhibo").removeClass('hidden');
	}
	$("#type").on("change",function(){
		if($("#type").val() == 2){
			$("#zhibo").removeClass('hidden');
		}else{
			$("#zhibo").addClass('hidden');
		}
		
	})
	//费用类型初始化
	$("#feetype").val("<?php echo htmlentities((isset($detail['feetype']) && ($detail['feetype'] !== '')?$detail['feetype']:'1')); ?>");
	if($("#feetype").val()==2){
		$("#inputfee").removeClass('hidden');
	}
	$("#feetype").on("change",function(){
		if($("#feetype").val() == 2){
			$("#inputfee").removeClass('hidden');
		}else{
			$("#inputfee").addClass('hidden');
		}
		
	})
	
	//开始时间初始化
    $('.datetimepicker').datetimepicker({
        format: 'Y-m-d H:i',
        timepicker:true,
        step:30,
        lang:"ch"
    });
    $("#icon_starttime").on("click",function(){
        $('#starttime').datetimepicker('show');
    })	

    //是否显示初始化
    $("input[name='isdisplay_check']").bootstrapSwitch();
    $('input[name="isdisplay_check"]').on('switchChange.bootstrapSwitch', function(event, state) {
        if(state){
            $("input[name='isdisplay']").val(1);
        }else{
            $("input[name='isdisplay']").val(0);
        }
    }) 
    
    //是否开启初始化
    $("input[name='isopen_check']").bootstrapSwitch();
    $('input[name="isopen_check"]').on('switchChange.bootstrapSwitch', function(event, state) {
        if(state){
            $("input[name='isopen']").val(1);
        }else{
            $("input[name='isopen']").val(0);
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