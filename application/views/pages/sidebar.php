<div class="admin-sidebar am-offcanvas" id="admin-offcanvas">
    <div class="am-offcanvas-bar admin-offcanvas-bar">
      <ul class="am-list admin-sidebar-list">
        <li><a href="<?=site_url($_SESSION['sidebar']['admin_path']);?>"><span class="am-icon-home">
        </span> 后台首页</a></li>
        <li class="admin-parent">
          <a class="am-cf" data-am-collapse="{target: '#collapse-nav'}"><span class="am-icon-file"></span>
          	 员工管理 <span class="am-icon-angle-right am-fr am-margin-right"></span></a>
          <ul class="am-list am-collapse admin-sidebar-sub am-in" id="collapse-nav">
            <li><a href="<?=site_url($_SESSION['sidebar']['recruit_path']);?>" class="am-cf">
            <span class="am-icon-check"></span> 招聘管理
            <span class="am-icon-star am-fr am-margin-right admin-icon-yellow"></span></a></li>
            <li><a href="<?=site_url($_SESSION['sidebar']['employee_path']);?>">
            <span class="am-icon-puzzle-piece"></span> 员工信息</a></li>
            <li><a href="<?=site_url($_SESSION['sidebar']['attendance_path']);?>">
            <span class="am-icon-calendar"></span> 考勤管理
            <span class="am-badge am-badge-secondary am-margin-right am-fr">24</span></a></li>
          </ul>
        </li>
        <li><a href='<?=site_url($_SESSION['sidebar']['department_path']);?>'><span class="am-icon-table"></span>
        	 部门分组</a></li>
        <li><a href="admin-form.html"><span class="am-icon-pencil-square-o"></span> 表单</a></li>
        <li><a href="#"><span class="am-icon-sign-out"></span> 注销</a></li>
      </ul>
  </div>
</div>