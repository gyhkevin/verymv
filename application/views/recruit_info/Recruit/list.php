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

<div class="am-cf admin-main">
	<!-- content start -->
	<div class="admin-content">

	<div class="am-cf am-padding">
		<div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">招聘信息</strong></div>
	</div>

	<div class="am-g">
		<div class="am-u-sm-12 am-u-md-6">
		<div class="am-btn-toolbar">
			<div class="am-btn-group am-btn-group-xs">
			<a class="am-btn am-btn-primary am-btn-sm" href='<?=site_url("{$page_path}/add"); ?>'><i class="am-icon-plus"></i> 新增</a>
			<!-- <button type="button" class="am-btn am-btn-default"><span class="am-icon-save"></span> 保存</button>
			<button type="button" class="am-btn am-btn-default"><span class="am-icon-archive"></span> 审核</button> -->
			<!-- <button type="button" class="am-btn am-btn-default"><span class="am-icon-trash-o"></span> 删除</button> -->
			</div>
		</div>
		</div>
	</div>

	<div class="am-g">
		<div class="am-u-sm-12">
		<table class="am-table am-table-bd am-table-striped admin-content-table">
			<thead>
			<tr>
			<th>ID</th><th>用户名</th><th>最后成交任务</th><th>成交订单</th><th>管理</th>
			</tr>
			</thead>
			<tbody>
			<?php foreach ($gotdata as $key => $val): ?>
				<tr><td><?=$val->id; ?></td><td><?=$val->title; ?></td><td><a href="#">Business management</a></td> <td><span class="am-badge am-badge-success">+20</span></td>
				<td>
					<div class="am-dropdown" data-am-dropdown>
					<button class="am-btn am-btn-default am-btn-xs am-dropdown-toggle" data-am-dropdown-toggle><span class="am-icon-cog"></span> <span class="am-icon-caret-down"></span></button>
					<ul class="am-dropdown-content">
						<li><a href='<?=site_url("{$page_path}/edit/{$val->id}"); ?>' target='pandora_body'>编辑</a></li>
						<li><a href="#">删除</a></li>
					</ul>
					</div>
				</td>
				</tr>
			<?php endforeach; ?>
			</tbody>
		</table>
		</div>
	</div>

	</div>
	</div>
	<!-- content end -->
</div>

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
