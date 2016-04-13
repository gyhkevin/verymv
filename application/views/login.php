<!DOCTYPE html>
<html>
<head lang="en">
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="format-detection" content="telephone=no">
<meta name="renderer" content="webkit">
<meta http-equiv="Cache-Control" content="no-siteapp" />
<link rel="alternate icon" type="image/png" href="<?=base_url("{$theme_path}assets/i/favicon.png");?>">
<link rel="stylesheet" href="<?=base_url("{$theme_path}assets/css/amazeui.min.css");?>"/>
<script type="text/javascript" src="<?=base_url("{$theme_path}assets/js/jquery.min.js");?>"></script>
<title>Login Page | Amaze UI Example</title>
<style>
  .header {
    text-align: center;
  }
  .header h1 {
    font-size: 200%;
    color: #333;
    margin-top: 30px;
  }
  .header p {
    font-size: 14px;
  }
</style>
  
</head>
<body>

<div class="header">
  <div class="am-g">
    <h1>Web ide</h1>
    <p>Integrated Development Environment<br/>代码编辑，代码生成，界面设计，调试，编译</p>
  </div>
  <hr />
</div>
<div class="am-g">
  <div class="am-u-lg-6 am-u-md-8 am-u-sm-centered">
    <h3>登录</h3>
    <form id="login" method="post" class="am-form">
      <label for="email">用户名:</label>
      <input type="text" name="user_name" id="user_name" value="">
      <br>
      <label for="password">密码:</label>
      <input type="password" name="password" id="password" value="">
      <br>
      <label for="remember-me">
        <input id="remember-me" type="checkbox">
        记住密码
      </label>
      <br />
      <div class="am-cf">
        <input type="submit" name="" value="登 录" class="am-btn am-btn-primary am-btn-sm am-fl">
        <input type="submit" name="" value="忘记密码 ^_^? " class="am-btn am-btn-default am-btn-sm am-fr">
      </div>
    </form>
    <hr>
    <p>© 2014 AllMobilize, Inc. Licensed under MIT license.</p>
  </div>
</div>
</body>
<script type="text/javascript">
$(function() {
    $('#login').submit(function() {
        var url = "<?=site_url("{$page_path}/auth");?>";
        $.ajax({
            type: 'POST',
            url: url,
            data: $('#login').serialize(),
            success: function(json) {
                json = eval('(' + json + ')');
                if (json.state == 1) {
                    alert(json.info);
                    window.location.reload();
                } else if (json.state == 2) {
                    alert(json.info);
                } else {
                    alert(json.info);
                }
            }
        });
        return false;
    });
});
</script>
</html>
