<?php /*a:1:{s:78:"G:\workspace\guanke\domain_front\application/manage/view\account\password.html";i:1510414712;}*/ ?>
<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal">
		<span aria-hidden="true">&times;</span><span class="sr-only">关闭</span>
	</button>
	<h4 class="modal-title">修改密码</h4>
</div>
<div class="modal-body">
	<form class="form-inline form-edit border-none" id="formEdit"
		method="post" action="/manage/account/password" autocomplete="off">
		<div class="form-unit-style" data-title="输入项信息">
			<div class="form-group clearfix">
				<div class="label-zoon">登录账号</div>
				<div class="input-zoon">
					<input class="form-control width-main" type="text" name="username"
						value="<?php echo session('manager.username'); ?>" disabled>
				</div>
			</div>
			<div class="form-group clearfix">
				<div class="label-zoon required">旧密码</div>
				<div class="input-zoon">
					<input class="form-control width-main" type="password"
						name="old_pass" placeholder="请输入旧密码">
				</div>
			</div>
			<div class="form-group clearfix">
				<div class="label-zoon required">新密码</div>
				<div class="input-zoon">
					<input class="form-control width-main" type="password"
						name="new_pass" placeholder="请输入新密码">
				</div>
			</div>
			<div class="form-group clearfix">
				<div class="label-zoon required">确认密码</div>
				<div class="input-zoon">
					<input class="form-control width-main" type="password"
						name="confirm_pass" placeholder="请再次输入一次新密码">
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
        $.post("/manage/account/password.html",$("#formEdit").serialize()).success(function(data){
            if(data.code==0){
            	showMsg(data.msg,'error');
                btn.removeClass("disabled");
            }else if(data.code==1){
            	showMsg(data.msg,'success');
            	popModalHide();
            }
        });
        return false;
    })
})
</script>