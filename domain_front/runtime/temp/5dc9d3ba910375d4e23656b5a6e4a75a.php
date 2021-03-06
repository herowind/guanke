<?php /*a:1:{s:79:"G:\workspace\guanke\domain_front\application/zhibo/view\manage\camera\name.html";i:1510596057;}*/ ?>
<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal">
		<span aria-hidden="true">&times;</span><span class="sr-only">关闭</span>
	</button>
	<h4 class="modal-title">修改名称</h4>
</div>
<div class="modal-body">
	<form class="form-inline form-edit border-none" id="formEdit"
		method="post" action="/zhibo/manage.camera/name.html" autocomplete="off">
		<input class="form-control width-main" type="hidden" name="id"
						value="<?php echo htmlentities($detail['id']); ?>" >
		<div class="form-unit-style" data-title="输入项信息">
			<div class="form-group clearfix">
				<div class="label-zoon">摄像头名称</div>
				<div class="input-zoon">
					<input class="form-control width-main" type="text" name="name"
						value="<?php echo htmlentities($detail['name']); ?>" >
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
        $.post("/zhibo/manage.camera/name.html",$("#formEdit").serialize()).success(function(data){
            if(data.code==0){
            	showMsg(data.msg,'error');
                btn.removeClass("disabled");
            }else if(data.code==1){
            	showMsg(data.msg,'success');
            	popModalHide();
            	refreshFrame();
            }
        });
        return false;
    })
})
</script>