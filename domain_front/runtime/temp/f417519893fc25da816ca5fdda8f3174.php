<?php /*a:2:{s:85:"G:\workspace\guanke\domain_front\application/guanke/view\manage\livecourse\index.html";i:1510594548;s:77:"G:\workspace\guanke\domain_front\application/manage\view\template\iframe.html";i:1510315358;}*/ ?>
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
        <h6 class="padding-left page-head-title">直播课程查询
        <span class="fr text-small text-normal padding-top"><b class="text-main"></b></span>
        </h6>
    </div>
        
    <div class="page-content">
		<form name="formSearch" class="form-search form-inline" method="get" action="index">
	       	<select name="feetype" id="feetype" class="form-control input-sm" data-default="请选择收费类型">
	           	<option value="">收费类型</option>
	           	<?php foreach(config('data.course.feetype') as $key=>$val): ?>
	              	<option value="<?php echo htmlentities($key); ?>" ><?php echo htmlentities($val); ?></option>
	           	<?php endforeach; ?>
	       	</select>
	       	<select name="course_id" id="course_id" class="form-control input-sm" data-default="请选择课程">
	           	<option value="">请选择课程</option>
	           	<?php echo widget('ManageWidget/courseOptions', ['selected' => $_GET['course_id']]); ?>
	       	</select>
	       	<select name="teacher_id" id="teacher_id" class="form-control input-sm" data-default="请选择教师">
	           	<option value="">请选择老师</option>
	           	<?php echo widget('ManageWidget/teacherOptions', ['selected' => $_GET['teacher_id']]); ?>
	       	</select>
	       	<select name="camera_id" id="camera_id" class="form-control input-sm" data-default="请选择摄像头">
	           	<option value="">请选择摄像头</option>
	           	<?php echo widget('zhibo/ManageWidget/cameraOptions', ['selected' => $_GET['camera_id']]); ?>
	       	</select>
		    <input type="text" name="keywords" id="keywords" class="form-control input-sm" value="<?php echo (htmlentities(app('request')->get('keywords'))) ? htmlentities(app('request')->get('keywords')) : ''; ?>" placeholder="关键词：直播名称" />
		    <button type="submit" class="btn btn-sm  btn-purple ">搜索</button>
		    <button type="button" class="btn btn-sm  btn-purple linkto-btn" data-url="index">清空条件</button>
		    <button type="button" class="btn btn-sm  btn-success linkto-btn pull-right" data-url="edit"><i class="fa fa-plus"></i> 新增课程</button>
		</form>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th class=" w5 text-center"><input type="checkbox" /></th>
                    <th class=" w5 ">序号</th>
                    <th class=" w15 ">直播名称</th>
                    <th class=" w10 ">课程名称</th>
                    <th class=" w10 ">摄像头</th>
                    <th class=" w10 ">观看权限</th>
                    <th class=" w10">价格</th>
                    <th class=" w10">开始时间</th>
                    <th class=" w5 ">排序</th>
                    <th class=" w5 ">显示</th>
                    <th class=" w15 text-center">操作</th>                 
                </tr>
            </thead>
            <tbody>
                <?php if(is_array($pageData) || $pageData instanceof \think\Collection || $pageData instanceof \think\Paginator): $i = 0; $__LIST__ = $pageData;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?>
                <tr >
                    <td class="text-center"><input class="margin-top-20" type="checkbox" /></td>
                    <td><?php echo htmlentities($i); ?></td>
                    <td><?php echo htmlentities($item['name']); ?></td>
                    <td><?php echo htmlentities($item['course']['name']); ?></td>
                    <td><?php echo htmlentities($item['camera']['name']); ?></td>
                    <td><?php echo htmlentities($item['membervisibilitytext']); ?></td>
                    <td><?php echo htmlentities($item['memberfee']); ?>元</td>
                    <td><?php echo htmlentities($item['starttime']); ?></td>
                    <td>	                    
                    	<input id="sort<?php echo htmlentities($item['id']); ?>" value="<?php echo htmlentities($item['sort']); ?>" class="list_order form-control input-xs" data-id="<?php echo htmlentities($item['id']); ?>" data-old="<?php echo htmlentities($item['sort']); ?>" data-url="sortChange.html"/>
					</td>
					<td>
						<button type="button" class="btn btn-xs status-btn" data-init-val="<?php echo htmlentities($item['isdisplay']); ?>" data-url="statusChange.html" data-id="<?php echo htmlentities($item['id']); ?>" data-field="isdisplay"  data-status0="隐藏" data-status0-css="btn-none" data-status1="显示" data-status1-css="btn-success"  title="点击是否显示"></button>
					</td>
                    <td class="text-center">
                        <a class="text-mix confirm-rst-url-btn btn btn-xs btn-default" href="remove.html?id=<?php echo htmlentities($item['id']); ?>" data-info="你确定要删除吗？" title="删除"><i class="fa fa-trash"></i> 删除</a>&nbsp;
                        <a class="text-main btn btn-xs btn-default" href="edit?id=<?php echo htmlentities($item['id']); ?>"   title="编辑"><i class="fa fa-pencil"></i> 编辑</a>
						<a class="text-green btn btn-xs btn-default" href="###" data-toggle="modal" onclick="popModal('/zhibo/manage.camera/preview.html?id=<?php echo htmlentities($item['camera_id']); ?>&title=<?php echo htmlentities($item['name']); ?>')" title="预览"><i class="fa fa-video-camera"></i> 预览</a>
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

<div class="modal fade" id="liveModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">直播预览</h4>
            </div>
            <div class="modal-body">
            	<div id="player" style="width: 560px; height: 280px; ">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal -->
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

<script type="text/javascript" src="/guanke/js/sewise.player.min.js"></script>  <!--引入js文件-->
<script type="text/javascript">
			SewisePlayer.setup({
				server: "vod",  //服务器给播放器提供的数据请求接口方法   
				type: "m3u8",     //支持视频格式为m3u8
				autostart: "true",   //是否自动播放（true为自动播放，false为不自动播放，默认为true）
				poster: "http://jackzhang1204.github.io/materials/poster.png",  //视频停止时，播放器上面显示的背景图片(若没有设置图片或者图片路径不对，则显示黑色背景)
				videourl: "http://alhlscdn.lechange.cn/LCL/2C02432PAW01541/0/0/20160922123329/dev_20160922123329_at9mpdnsahtm3csp.m3u8",   //您的视频源的地址（目前是乐橙示例播放地址）
		        skin: "vodOrange",  //播放器主题风格（样式）
		        title: "demo示例",     //视频标题，位于视频的左上角（可以进行修改操作）
		        claritybutton: "disable", //清晰度按钮的显示（默认为显示，disable为不显示，enable为显示）
		        lang: "zh_CN"   //视频播放器下面的一系列操作元素的提示信息的语言格式（zh_cN为中文）
			}, "player");
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