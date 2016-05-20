<!doctype html>
<html class="no-js">
<head>
	<head lang="en">
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="format-detection" content="telephone=no">
	<meta name="renderer" content="webkit">
	<meta http-equiv="Cache-Control" content="no-siteapp" />
	<?php $theme_path=base_url($this->config->item ( 'theme_path' )).'/';?>
	<link rel="alternate icon" type="image/png" href="<?=$theme_path;?>assets/i/favicon.png">
	<link rel="stylesheet" href="<?=$theme_path;?>assets/css/amazeui.min.css"/>
	<script type="text/javascript" src="<?=$theme_path;?>assets/js/jquery.min.js"></script>
	<title>人力资源管理系统后台管理</title>
	<link rel="stylesheet" href="<?=$theme_path;?>assets/css/admin.css"/>
</head>
<body>
<!--[if lte IE 9]>
<p class="browsehappy">你正在使用<strong>过时</strong>的浏览器，Amaze UI 暂不支持。 请 <a href="http://browsehappy.com/" target="_blank">升级浏览器</a>
  以获得更好的体验！</p>
<![endif]-->

	<!-- content start -->
	<div class="admin-content">
	<div class="am-cf am-padding">
		<div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">添加部门</strong> / <small>add department</small></div>
	</div>
	<hr/>
	<div class="am-g">
		<div class="am-u-sm-12 am-u-md-4 am-u-md-push-8">
		<!-- <div class="am-panel am-panel-default"> -->
			<!-- <div class="am-panel-bd"> -->
			<!-- <div class="am-g"> -->
				<div class="am-u-md-4">
					<!-- <img class="am-img-circle am-img-thumbnail" src="http://s.amazeui.org/media/i/demos/bw-2014-06-19.jpg?imageView/1/w/200/h/200/q/80" alt=""/> -->
				</div>
				<div class="am-u-md-8">
				<!-- <p>你可以使用<a href="#">gravatar.com</a>提供的头像或者使用本地上传头像。 </p> -->
				<form class="am-form">
					<div class="am-form-group">
					<!-- <input type="file" id="user-pic">
					<p class="am-form-help">请选择要上传的文件...</p>
					<button type="button" class="am-btn am-btn-primary am-btn-xs">保存</button> -->
					</div>
				</form>
				<!-- </div> -->
			</div>
			<!-- </div> -->
		<!-- </div> -->

		<!-- <div class="am-panel am-panel-default"> -->
			<!-- <div class="am-panel-bd"> -->
			<div class="user-info">
				<!-- <p>等级信息</p> -->
				<!-- <div class="am-progress am-progress-sm"> -->
					<!-- <div class="am-progress-bar" style="width: 60%"></div> -->
				<!-- </div> -->
				<!-- <p class="user-info-order">当前等级：<strong>LV8</strong> 活跃天数：<strong>587</strong> 距离下一级别：<strong>160</strong></p> -->
			</div>
			<div class="user-info">
				<!-- <p>信用信息</p> -->
				<!-- <div class="am-progress am-progress-sm"> -->
					<!-- <div class="am-progress-bar am-progress-bar-success" style="width: 80%"></div> -->
				<!-- </div> -->
				<!-- <p class="user-info-order">信用等级：正常当前 信用积分：<strong>80</strong></p> -->
			</div>
			<!-- </div> -->
		<!-- </div> -->

		</div>

		<div class="am-u-sm-12 am-u-md-8 am-u-md-pull-4">
			<form class="am-form am-form-horizontal" action='<?=site_url("{$page_path}/add_reco"); ?>' method='post'>
				<div class="am-form-group">
					<label for="user-name" class="am-u-sm-3 am-form-label">部门名称 / Name</label>
					<div class="am-u-sm-9">
						<input type="text" id="dept-name" name='department_name' placeholder="部门名称 / Name">
						<small>输入设置部门的名称。</small>
					</div>
				</div>

				<div class="am-form-group">
					<label for="user-email" class="am-u-sm-3 am-form-label">部门路径 / Path</label>
					<div class="am-u-sm-9">
						<select name="department_path" id="department_path">
							<option value="0">顶级目录</option>
							<?php  foreach ($options as $row) { ?>
    							<option value="<?php echo $row['id'] ?>"><?php echo str_pad("",$row['deep']*3, "-",STR_PAD_RIGHT); ?><?php echo $row['name']; ?></option>
							<?php } ?>
						</select>
						<!-- <input type="email" id="user-email" placeholder="输入你的电子邮件 / Email"> -->
						<small>选择你要添加部门的层级...</small>
					</div>
				</div>

				<div class="am-form-group">
				<div class="am-u-sm-9 am-u-sm-push-3">
					<button type="submit" class="am-btn am-btn-primary">保存修改</button>
				</div>
				</div>
			</form>
		</div>
	</div>
	</div>
	<!-- content end -->

<!--[if lt IE 9]>
<script src="http://libs.baidu.com/jquery/1.11.1/jquery.min.js"></script>
<script src="http://cdn.staticfile.org/modernizr/2.8.3/modernizr.js"></script>
<script src="assets/js/amazeui.ie8polyfill.min.js"></script>
<![endif]-->

<!--[if (gte IE 9)|!(IE)]><!-->
<script src="<?=$theme_path;?>assets/js/jquery.min.js"></script>
<!--<![endif]-->
<script src="<?=$theme_path;?>assets/js/amazeui.min.js"></script>
<script src="<?=$theme_path;?>assets/js/app.js"></script>
</body>
<script type="text/javascript">
	// jQuery(window).ready(function () {
	// 	console.log(1111);
	// 	generateTree('<?=$gotdata; ?>');
	// 	console.log(2222);
	// 	function getTreeData(tree) {
	// 		foreach(tree as t) {
	// 			$('#department_path').append("<option value=" + t['id'] + ">" + t['name'] + '</option>');
	// 			if(isset(t['son'])){
	// 				getTreeData(t['son']);
	// 			}
	// 		}
	// 	}
	// });
</script>
</html>
