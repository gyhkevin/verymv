<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Verymv</title>
</head>
<body>
	<header>
		<ul>
			<?php foreach($menu as $key => $val):?>
			<li><a href='<?=site_url("{$page_path}/{$val[0]}")?>'><?=$val[1]?></a></li>
			<?php endforeach;?>
		</ul>
	</header>
	<form method="post" action='<?=site_url("{$page_path}/add")?>'>
		<input type="text" name="option_name" >option_name
		<input type="text" name="option_value" >option_value
		<input type="submit" value="submit">
	</form>
</body>
</html>