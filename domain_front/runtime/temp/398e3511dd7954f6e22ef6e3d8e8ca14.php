<?php /*a:2:{s:86:"G:\workspace\guanke\domain_front\application/guanke/view\mobile\livecourse\detail.html";i:1510812916;s:77:"G:\workspace\guanke\domain_front\application/mobile\view\template\common.html";i:1510808436;}*/ ?>
<!DOCTYPE html>
<html lang="zh-cn">
<head>
<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1">
<meta name="format-detection" content="telephone=no" />
<meta name="apple-mobile-web-app-capable" content="yes" />
<meta charset="utf-8">
<title><?php echo htmlentities($pageTitle); ?></title>
<link rel="stylesheet" href="//cdn.bootcss.com/weui/1.1.1/style/weui.min.css">
<link rel="stylesheet" href="//cdn.bootcss.com/jquery-weui/1.1.1/css/jquery-weui.min.css">
<link rel="stylesheet" href="/lib/components/animate/animate.css?<?php echo time(); ?>" />
<link rel="stylesheet" href="/guanke/css/mobile/theme_default.css?<?php echo time(); ?>" />


</head>

<body ontouchstart>
	<div class="page">
	
<div class="course-hd">
	<div class="course-camera">
		<video id="video" class="video" x5-playsinline="" playsinline="" webkit-playsinline="" src="http://alhlscdn.lechange.cn/LCL/2E02899PAU00618/0/0/20170111130549/dev_20170111130549_5iexhpdk3nkll4bc.m3u8" poster="<?php echo htmlentities($detail['course']['banner']); ?>" controls="controls" width="100%" style=""></video>
	</div>
</div>
<div class="course-hd">
	<div class="weui-tab">
		<div class="weui-navbar">
			<a class="weui-navbar__item weui-bar__item--on" href="#tab1"> 即时问答 </a> 
			<a class="weui-navbar__item" href="#tab2"> 课程介绍 </a>
		</div>
		<div class="weui-tab__bd">
			<div id="tab1" class="weui-tab__bd-item weui-tab__bd-item--active">
				<div class="weui-panel weui-panel_access">
					<div class="weui-panel__bd">
						<a href="javascript:void(0);" class="weui-media-box weui-media-box_appmsg">
							<div class="weui-media-box__hd">
								<img class="weui-media-box__thumb" src="<?php echo htmlentities($detail['teacher']['avatar']); ?>">
							</div>
							<div class="weui-media-box__bd">
								<h4 class="weui-media-box__title">主讲老师：<?php echo htmlentities($detail['teacher']['name']); ?></h4>
								<p class="weui-media-box__desc"><?php echo htmlentities($detail['teacher']['intro']); ?></p>
							</div>
						</a>
					</div>
				</div>
				<div class="ui-empty">
					<div class="ui-empty_icon"></div>
				</div>
				<div class="group-topic" style="display: none">
					<div class="group-topic_avatar">
						<img class="" src="<?php echo htmlentities($topic['member']['avatar']); ?>" />
					</div>
					<div class="group-topic_body">
						<div class="group-topic_header">
							<div class="group-topic_realname"><?php echo htmlentities($topic['member']['nickname']); ?></div>
							<div class="group-topic_manage" data-uid="<?php echo htmlentities($topic['member_id']); ?>" data-id="<?php echo htmlentities($topic['id']); ?>" bindtap="topicActionSheet">•••</div>
						</div>
						<div class="group-topic_content">
							<text selectable="true"><?php echo htmlentities($topic['content']); ?></text>
						</div>
						<div class="group-topic_footer">
							<div class="group-topic_createtime"><?php echo htmlentities($topic['create_time']); ?></div>
							<div class="group-topic_action" data-uid="<?php echo htmlentities($topic['uid']); ?>">
								<div class="group-topic_action_icon" data-id="<?php echo htmlentities($topic['id']); ?>" bindtap='bindTopicAction'>
									<img src="/guanke/images/icons/topicaction.png" />
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- 悬浮发布 -->
				<div class="ui-button-float" id="publishTopic">
					<img src="/guanke/images/icons/pen.png" />
				</div>
			</div>
			<div id="tab2" class="weui-tab__bd-item">
				<div class="weui-panel weui-panel_access">
					<div class="weui-panel__bd">
						<a href="javascript:void(0);" class="weui-media-box weui-media-box_appmsg">
							<div class="weui-media-box__hd">
								<img class="weui-media-box__thumb" src="<?php echo htmlentities($school['logo']); ?>">
							</div>
							<div class="weui-media-box__bd">
								<h4 class="weui-media-box__title"><?php echo htmlentities($detail['course']['name']); ?></h4>
								<p class="weui-media-box__desc"><?php echo htmlentities($detail['course']['intro']); ?></p>
							</div>
						</a>
					</div>
				</div>
				<div>
					<img src="/guanke/images/test2.jpg"> <img src="/guanke/images/test1.jpg">
				</div>
			</div>
		</div>
	</div>

</div>
<div class="weui-footer weui-footer_fixed-bottom">
	<button href="javascript:;" class="weui-btn weui-btn_primary" style="border-radius: 0"><?php echo htmlentities($detail['apply']['name']); ?></button>
</div>

	</page>
	<!-- 公共脚本层 -->
	<script src="//cdn.bootcss.com/jquery/1.11.0/jquery.min.js"></script>
	<script src="//cdn.bootcss.com/jquery-weui/1.1.1/js/jquery-weui.min.js"></script>
	<script src="//cdn.bootcss.com/jquery-weui/1.1.1/js/swiper.min.js"></script>
	<script src="//cdn.bootcss.com/jquery-weui/1.1.1/js/city-picker.min.js"></script>
	<script src="/lib/components/vue/vue.js"></script>
	
<script type="text/javascript">
		var data = {
			a : 1
		};
		var vm = new Vue({
			data : data
		})

		var screenW;
		var flag = false;
		window.document.title = '<?php echo htmlentities($course['name']); ?>';

		total = document.documentElement.clientHeight;
		document.body.style.height = total + "px";
		var video = document.getElementById('video');
		video.oncanplay = function() {
			flag = true;
		}
		var playVideo = setInterval(function() {
			if (flag) {
				clearInterval(playVideo);
			} else {
				video.load();
			}
		}, 20000);

		$(document).on("click", "#publishTopic", function() {
			vm.a++
			$.prompt({
				text : "",
				title : "请输入您的问题",
				onOK : function(text) {
					$.alert("您的问题是:" + text, "提交成功");
				},
				onCancel : function() {
					console.log("取消了");
				},
				input : vm.a
			});
		});
		
        $.noti({
            title: "老师有话说",
            text: "<?php echo htmlentities($detail['apply']['content']); ?>",
            media: "<img src='<?php echo htmlentities($detail['teacher']['avatar']); ?>' />",
            data: {
              message: "点击最下面的按钮才可以哦"
            },
            time: 5000,
            onClick: function(data) {
              $.alert(data.message);
            }
          });
	</script>

</body>
</html>
