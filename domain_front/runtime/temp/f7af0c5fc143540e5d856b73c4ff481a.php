<?php /*a:1:{s:87:"G:\workspace\guanke\domain_front\application/guanke/view\manage\livecourse\preview.html";i:1510593835;}*/ ?>
<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal">
		<span aria-hidden="true">&times;</span><span class="sr-only">关闭</span>
	</button>
	<h4 class="modal-title">直播预览</h4>
</div>
<div class="modal-body">
	<div id="player" style="width: 560px; height: 280px; "></div>
</div>
<script type="text/javascript" src="/guanke/js/sewise.player.min.js"></script>  <!--引入js文件-->
<script type="text/javascript">
			SewisePlayer.setup({
				server: "vod",  //服务器给播放器提供的数据请求接口方法   
				type: "m3u8",     //支持视频格式为m3u8
				autostart: "true",   //是否自动播放（true为自动播放，false为不自动播放，默认为true）
				poster: "http://jackzhang1204.github.io/materials/poster.png",  //视频停止时，播放器上面显示的背景图片(若没有设置图片或者图片路径不对，则显示黑色背景)
				videourl: "<?php echo htmlentities($camera['url']); ?>",   //您的视频源的地址（目前是乐橙示例播放地址）
		        skin: "vodOrange",  //播放器主题风格（样式）
		        title: "<?php echo htmlentities($camera['name']); ?>",     //视频标题，位于视频的左上角（可以进行修改操作）
		        claritybutton: "disable", //清晰度按钮的显示（默认为显示，disable为不显示，enable为显示）
		        lang: "zh_CN"   //视频播放器下面的一系列操作元素的提示信息的语言格式（zh_cN为中文）
			}, "player");
		</script>