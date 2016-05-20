<!doctype html>
<html class="no-js">
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
	<title>人力资源管理系统</title>
	<link rel="stylesheet" href="<?=$theme_path;?>assets/css/admin.css"/>
	<style>
	/*-- pandora_body --*/
	.pandora_body {position:absolute; top:50px; bottom:0px; left:260px; right:0px;}
	.pandora_body iframe {width:100%; height:100%; *position:absolute; *top:0px; *bottom:0px;}
	</style>
</head>
<body>
<!--[if lte IE 9]>
<p class="browsehappy">你正在使用<strong>过时</strong>的浏览器，Amaze UI 暂不支持。 请 <a href="http://browsehappy.com/" target="_blank">升级浏览器</a>
  以获得更好的体验！</p>
<![endif]-->

<header class="am-topbar admin-header">
	<div class="am-topbar-brand">
	<strong>人力资源管理系统</strong> <small>后台管理</small>
	</div>

	<button class="am-topbar-btn am-topbar-toggle am-btn am-btn-sm am-btn-success am-show-sm-only" data-am-collapse="{target: '#topbar-collapse'}">
	<span class="am-sr-only">导航切换</span> <span class="am-icon-bars"></span></button>

	<div class="am-collapse am-topbar-collapse" id="topbar-collapse">
	<ul class="am-nav am-nav-pills am-topbar-nav am-topbar-right admin-header-list">
		<!-- <li><a href="javascript:;"><span class="am-icon-envelope-o"></span> 收件箱 
		<span class="am-badge am-badge-warning">5</span></a></li> -->
		<li class="am-dropdown" data-am-dropdown>
		<a class="am-dropdown-toggle" data-am-dropdown-toggle href="javascript:;">
			<span class="am-icon-users"></span> 管理员 <span class="am-icon-caret-down"></span>
		</a>
		<ul class="am-dropdown-content">
			<li><a href="#"><span class="am-icon-user"></span> 资料</a></li>
			<li><a href="#"><span class="am-icon-cog"></span> 设置</a></li>
			<li><a href="<?=site_url($_SESSION['sidebar']['admin_path']).'/logout';?>"><span class="am-icon-power-off"></span> 退出</a></li>
		</ul>
		</li>
		<li class="am-hide-sm-only"><a href="javascript:;" id="admin-fullscreen">
		<span class="am-icon-arrows-alt"></span> <span class="admin-fullText">开启全屏</span></a></li>
	</ul>
	</div>
</header>

<div class="am-cf admin-main" style="height:1000px;">
	<!-- sidebar start -->
	<div class="admin-sidebar am-offcanvas" id="admin-offcanvas">
		<div class="am-offcanvas-bar admin-offcanvas-bar">
			<ul class="am-list admin-sidebar-list">
			<li><a href="<?=site_url($_SESSION['sidebar']['admin_path']);?>"><span class="am-icon-home"></span> 后台首页</a></li>
			<li class="admin-parent">
				<a class="am-cf" data-am-collapse="{target: '#collapse-nav'}"><span class="am-icon-file"></span> 员工管理 <span class="am-icon-angle-right am-fr am-margin-right"></span></a>
				<ul class="am-list am-collapse admin-sidebar-sub am-in" id="collapse-nav">
					<!-- <li><a href="<?=site_url($_SESSION['sidebar']['recruit_path']);?>" class="am-cf"><span class="am-icon-check"></span> 招聘管理<span class="am-icon-star am-fr am-margin-right admin-icon-yellow"></span></a></li> -->
					<li><a href="<?=site_url($_SESSION['sidebar']['employee_path']);?>" target='pandora_body'><span class="am-icon-puzzle-piece"></span> 员工信息</a></li>
					<li><a href='<?=site_url($_SESSION['sidebar']['department_path']);?>' target='pandora_body'><span class="am-icon-table"></span> 部门分组</a></li>
				</ul>
			</li>
			<li>
				<a class="am-cf am-collapsed" data-am-collapse="{target: '#collapse-next'}">
					<span class="am-icon-file"></span> 招聘相关<span class="am-icon-angle-right am-fr am-margin-right"></span>
				</a>
				<ul class="am-list am-collapse admin-sidebar-sub" id="collapse-next">
					<!-- <li><a href="<?=site_url($_SESSION['sidebar']['recruit_path']);?>" class="am-cf"><span class="am-icon-check"></span> 招聘管理<span class="am-icon-star am-fr am-margin-right admin-icon-yellow"></span></a></li> -->
					<li><a href="<?=site_url($_SESSION['sidebar']['recruit_path']);?>" target='pandora_body'><span class="am-icon-puzzle-piece"></span> 招聘信息</a></li>
					<li><a href='<?=site_url($_SESSION['sidebar']['attendance_path']);?>' target='pandora_body'><span class="am-icon-table"></span> 工资信息</a></li>
					<li><a href='<?=site_url($_SESSION['sidebar']['training_path']);?>' target='pandora_body'><span class="am-icon-table"></span> 培训管理</a></li>
				</ul>
			</li>
			<!-- <li><a href="<?=site_url($_SESSION['sidebar']['training_path']);?>"><span class="am-icon-pencil-square-o"></span> 培训管理</a></li> -->
			<li><a href="<?=site_url($_SESSION['sidebar']['admin_path']).'/logout';?>"><span class="am-icon-sign-out"></span> 注销</a></li>
			</ul>
			<div class="am-panel am-panel-default admin-sidebar-panel">
			<div class="am-panel-bd">
			  <p><span class="am-icon-bookmark"></span> 公告</p>
			  <p>时光静好，与君语；细水流年，与君同。—— Amaze UI</p>
			</div>
			</div>
		</div>
	</div>
	<!-- sidebar end -->

	<!-- pandora_body -->
	<div class="pandora_body"><iframe name='pandora_body' allowtransparency="true" frameborder="0" scrolling="no" src="<?=site_url('Index/view'); ?>"></iframe></div>

</div>

<!-- <a href="#" class="am-show-sm-only admin-menu" data-am-offcanvas="{target: '#admin-offcanvas'}">
  <span class="am-icon-btn am-icon-th-list"></span>
</a>

<footer>
	<hr>
	<p class="am-padding-left">© 2014 AllMobilize, Inc. Licensed under MIT license.</p>
</footer> -->

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
</html>
