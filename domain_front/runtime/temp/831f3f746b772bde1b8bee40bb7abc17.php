<?php /*a:2:{s:80:"G:\workspace\guanke\domain_front\application/guanke/view\manage\course\edit.html";i:1510586622;s:77:"G:\workspace\guanke\domain_front\application/manage\view\template\iframe.html";i:1510315358;}*/ ?>
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
        <h6 class="padding-left page-head-title"><?php echo !empty($detail['id']) ? '编辑' : '新增'; ?>课程
        <span class="fr text-small text-normal padding-top"><b class="text-main"></b></span>
        </h6>
    </div>
 
    <div class="page-content">
	    <form class="form-inline form-edit ajaxForm" id="formEdit" style="margin-top:-1px;" enctype="multipart/form-data" method="post" action="edit" autocomplete="off">
	        <input type="hidden" id="id" name="id" value="<?php echo htmlentities($detail['id']); ?>">
	        <div class="form-unit-style" data-title="课程信息">
	            <h5 class="real-name-head margin-large-top text-main-deep">课程信息<span class="margin-left">创建完课程后才可以进行直播设置</span></h5>
	            <div class="form-group clearfix">
	                <div class="label-zoon required">课程名称</div>
	                <div class="input-zoon">
						<input type="text" class="form-control width-main" id="name" name="name" value="<?php echo htmlentities($detail['name']); ?>" placeholder="">
	                </div>
	            </div>
	            
	            <div class="form-group clearfix">
	                <div class="label-zoon required">课程简介</div>
	                <div class="input-zoon">
	                	<textarea class="form-control width-main" id="intro" name="intro"><?php echo htmlentities($detail['intro']); ?></textarea>
	                </div>
	            </div>
	            
				<div class="form-group clearfix">
	                <div class="label-zoon required">课程类型</div>
	                <div class="input-zoon">
						<select class="form-control width-main" id="type" name="type" data-default="课程类型">
				           	<?php foreach(config('data.course.type') as $key=>$val): ?>
				              	<option value="<?php echo htmlentities($key); ?>" ><?php echo htmlentities($val); ?></option>
				           	<?php endforeach; ?>
						</select>								
	                </div>
	            </div>
	            
	            <div class="form-group clearfix">
	                <div class="label-zoon">课程售价</div>
	                <div class="input-zoon">
						<input type="text" class="form-control width-main" id="totalfee" name="totalfee" value="<?php echo htmlentities($detail['totalfee']); ?>" placeholder="请输入课程售价，不填写则前台不显示">
	                </div>
	            </div>
	            
	            <div class="form-group clearfix">
	                <div class="label-zoon">Banner图片</div>
	                <div class="input-zoon fileupload-container">
	                    <input type="hidden" name="check_banner"   value="<?php echo htmlentities($detail['banner']); ?>" />
	                    <input type="hidden" name="oldcheck_banner" class="oldcheckpic"  value="<?php echo htmlentities($detail['banner']); ?>" />
	                    <img  class="fileupload-show" src="<?php echo !empty($detail['banner']) ? htmlentities($detail['banner']) : '/guanke/images/school_banner1.jpg'; ?>" width="160" height="80" >&nbsp;&nbsp;
	                    <a href="javascript:;" class="file" title="点击选择所要上传的图片"><input type="file" name="file_banner"/>选择上传文件</a>&nbsp;
	                    <a href="javascript:;" class="file fileupload-reset" data-src="<?php echo !empty($detail['banner']) ? htmlentities($detail['banner']) : '/guanke/images/school_banner1.jpg'; ?>" title="还原修改前的图片">撤销修改图片</a> 
	                    <span class="lbl">&nbsp;&nbsp;建议尺寸：640*320</span>
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