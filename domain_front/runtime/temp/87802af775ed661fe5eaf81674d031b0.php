<?php /*a:2:{s:79:"G:\workspace\guanke\domain_front\application/guanke/view\mobile\home\index.html";i:1510801291;s:77:"G:\workspace\guanke\domain_front\application/mobile\view\template\common.html";i:1510744925;}*/ ?>
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
	
<!--div class="school-hd">
	<div class="school-background">
		<img src="/guanke/images/school_banner3.jpg"/>
	</div>
	<div class="school-panel">
		<div class="school-panel-hd">
			<div class="school-logo">
				<img src="<?php echo htmlentities($school['logo']); ?>"/>
			</div>
			<div class="school-title">
				<div class="school-name"><?php echo htmlentities($school['name']); ?></div>
				<div class="school-fullname"> <?php echo htmlentities($school['phone']); ?></div>
			</div>
			<div class="school-share">
			</div>
		</div>
		<div class="school-panel-bd"><?php echo htmlentities($school['intro']); ?></div>
	</div>
</div>
  -->

<div class="swiper-container">
  <!-- Additional required wrapper -->
  <div class="swiper-wrapper">
    <!-- Slides -->
    <div class="swiper-slide"><img src="<?php echo htmlentities($school['banner']); ?>" /></div>
  </div>
</div>
<div class="school-bd">
	<!-- 菜单 -->
	<div class="school-tabs">
		<div class="school-tab active" ontap="tabChange">
			<image src="/guanke/images/icons/menu_course.png" />
			<div>精彩课程</div>
		</div>
		<div class="school-tab" ontap="tabChange">
			<image src="/guanke/images/icons/menu_camera.png" />
			<div>视频监控</div>
		</div>
		<div class="school-tab" ontap="tabChange">
			<image src="/guanke/images/icons/menu_teacher.png" />
			<div>教师团队</div>
		</div>
		<div class="school-tab" ontap="tabChange">
			<image src="/guanke/images/icons/menu_school.png" />
			<div>学校简介</div>
		</div>
	</div>
	<div class="ui-line"></div>

	<!-- 商友圈 -->
	<div class="school-tab-content" id="content_course">
	<?php if(is_array($courseList) || $courseList instanceof \think\Collection || $courseList instanceof \think\Paginator): $i = 0; $__LIST__ = $courseList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?>
      <a class="ui-item" href="/guanke/mobile.livecourse/detail.html?id=<?php echo htmlentities($item['id']); ?>&school_id=<?php echo htmlentities($school['id']); ?>" style="border-bottom:1px solid #efefef">
        <div class="ui-item-box">
          <div class="item-sec1">
            <img src="<?php echo htmlentities($item['course']['banner']); ?>" />
            <span class="live">直播课程</span>
          </div>
          <div class="item-sec2">
            <div class="sec2-hd">
              <?php echo htmlentities($item['name']); ?>
            </div>
            <div class="sec2-bd">
            	<div class="sec2-bd__tags"><?php echo htmlentities($item['course']['name']); ?></div>
              	<div class="sec2-bd__btn <?php echo htmlentities($item['process']['status']); ?>"><?php echo htmlentities($item['process']['button']); ?></div>
            </div>
            <div class="sec2-ft">
              <img class="sec2-ft__icon swing animated infinite " src="/guanke/images/icons/time_alert.png" />
              <label><?php echo htmlentities($item['process']['time']); ?></label>
            </div>
          </div>
        </div>
        
      </a>
      <?php endforeach; endif; else: echo "" ;endif; ?>		
	</div>
</div>

	</page>
	<!-- 公共脚本层 -->
	<script src="//cdn.bootcss.com/jquery/1.11.0/jquery.min.js"></script>
	<script src="//cdn.bootcss.com/jquery-weui/1.1.1/js/jquery-weui.min.js"></script>
	<script src="//cdn.bootcss.com/jquery-weui/1.1.1/js/swiper.min.js"></script>
	<script src="//cdn.bootcss.com/jquery-weui/1.1.1/js/city-picker.min.js"></script>
	
<script>
$(function(){
	$(".ui-item").on('click',function(){
		document.location.href = '/guanke/mobile.livecourse/detail.html?course_token='+$(this).data('token');
	})
	
    $(".swiper-container").swiper({
        autoplay: 3000
      });	
})


</script>

</body>
</html>
