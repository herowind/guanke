<?php /*a:1:{s:74:"G:\workspace\guanke\domain_front\application/manage/view\account\edit.html";i:1510415639;}*/ ?>
<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal">
		<span aria-hidden="true">&times;</span><span class="sr-only">关闭</span>
	</button>
	<h4 class="modal-title">账号信息</h4>
</div>

<div class="modal-body">
<form class="form-inline form-edit border-none" id="formEdit"
		method="post" action="/manage/account/edit" autocomplete="off">
		<div class="form-unit-style" data-title="输入项信息">
			<div class="form-group clearfix">
				<div class="label-zoon">登录账号</div>
				<div class="input-zoon">
					<input class="form-control width-main" type="text" name="username"
						value="<?php echo session('manager.username'); ?>" disabled>
				</div>
			</div>
			<div class="form-group clearfix">
				<div class="label-zoon required">用户姓名</div>
				<div class="input-zoon">
					<input class="form-control width-main" type="text"
						name="realname" value="<?php echo htmlentities($detail['realname']); ?>" placeholder="请输入姓名，用于安全验证">
				</div>
			</div>
			<div class="form-group clearfix">
				<div class="label-zoon required">手机号</div>
				<div class="input-zoon">
					<input class="form-control width-main" type="text"
						name="mobile" value="<?php echo htmlentities($detail['mobile']); ?>" placeholder="请输入手机号，用于安全验证">
				</div>
			</div>
			
			<div class="form-group clearfix">
                <div class="label-zoon">头像</div>
                <div class="input-zoon fileupload-container">
                    <input type="hidden" name="check_avatar"   value="<?php echo htmlentities($detail['avatar']); ?>" />
                    <input type="hidden" name="oldcheck_avatar" class="oldcheckpic"  value="<?php echo htmlentities($detail['avatar']); ?>" />
                    <img  class="fileupload-show" src="<?php echo !empty($detail['avatar']) ? htmlentities($detail['avatar']) : '/app/images/no_img.jpg'; ?>" width="60" height="60" >&nbsp;&nbsp;
                    <a href="javascript:;" class="file" title="点击选择所要上传的图片"><input type="file" name="file_avatar"/>选择上传文件</a>&nbsp;
                    <a href="javascript:;" class="file fileupload-reset" data-src="<?php echo !empty($detail['avatar']) ? htmlentities($detail['avatar']) : '/app/images/no_img.jpg'; ?>" title="还原修改前的图片">撤销修改图片</a> 
                    <span class="lbl">&nbsp;&nbsp;建议尺寸：200*200</span>
                </div>
            </div>
		</div>
	</form>
</div>
<div class="modal-footer">
	<span id="resultInfo" class="text-success pull-left"></span>
	<button type="button" class="btn btn-primary" id="saveBtn">保存</button>
	<button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
</div>
<script type="text/javascript">
$(function(){
	$("#saveBtn").on("click",function(){
		var btn = $(this);
        btn.addClass("disabled");
		$("#formEdit").submit();
		btn.removeClass("disabled");
		return false;
    })  
    
    /* 单图上传 */
    $(".fileupload-container input[type='file']").on("change",function(){
    	var objParent = $(this).parents(".fileupload-container");
    	var objUrl = getObjectURL(this.files[0],objParent) ;
    	console.log("objUrl = "+objUrl) ;
    	if (objUrl) {
    		$(objParent).find(".fileupload-show").attr("src",objUrl);
    	}
    })

    $(".fileupload-container .fileupload-reset").on("click",function(){
    	var objParent = $(this).parents(".fileupload-container");
    	$(objParent).find(".fileupload-show").attr("src",$(this).data("src"));
    	$(objParent).find("input[type='file']").val("");//清空文本框的值
    	$(objParent).find(".oldcheckpic").val($(this).data("src"));//清空文本框的值
    })      
});
$('#formEdit').ajaxForm({
    success: complete, // 这是提交后的方法
    dataType: 'json'
});

//表单检查
function complete(data){
	if(data.code==0){
    	showMsg(data.msg,'error');
    }else if(data.code==1){
    	showMsg(data.msg,'success');
    	popModalHide();
    }
}

function getObjectURL(file,objParent) {
	var url = null ;
	console.log("before old = "+$(objParent).find(".oldcheckpic").val()) ;
	if (window.createObjectURL!=undefined) { // basic
		$(objParent).find(".oldcheckpic").val("nopic");
		url = window.createObjectURL(file) ;
	} else if (window.URL!=undefined) { // mozilla(firefox)
		$(objParent).find(".oldcheckpic").val("nopic");
		url = window.URL.createObjectURL(file) ;
	} else if (window.webkitURL!=undefined) { // webkit or chrome
		$(objParent).find(".oldcheckpic").val("nopic");
		url = window.webkitURL.createObjectURL(file) ;
	}
	console.log("after old = "+$(objParent).find(".oldcheckpic").val());
	return url ;
}
</script>