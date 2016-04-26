<!DOCTYPE html>
<html>
<head lang="en">
<?php require_once('pages/public.php');?>
<title>登录--人力资源管理系统</title>
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
    <h1>欢迎来到人力资源管理系统</h1>
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
        var url = "<?=site_url($admin_path);?>/auth";
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
