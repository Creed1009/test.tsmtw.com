<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<?php $current = $this->uri->segment(2);?>
<!-- BEGIN Sidebar -->
<div id="sidebar" class="navbar-collapse collapse sidebar-fixed">
  <!-- BEGIN Navlist -->
  <ul class="nav nav-list hidden-print">
    <?php if($this->ion_auth->in_group('admin') || $this->ion_auth->in_group('post_manager')){ ?>
    <li class="<?php if (($current == "posts")) {echo "active";}?>">
      <a href="/admin/posts">
        <i class="fa fa-clipboard"></i>
        <span>公告欄管理</span>
      </a>
    </li>
    <?php } ?>

    <?php if($this->ion_auth->in_group('admin') || $this->ion_auth->in_group('president')){ ?>
    <li <?php if ($current == "auth" || $current == "users") {echo "class='active'";}?>>
      <a href="#" class="dropdown-toggle">
        <i class="fa fa-user"></i>
        <span>帳號管理</span>
        <b class="arrow fa fa-angle-right"></b>
      </a>
      <ul class="submenu">
        <?php if($this->ion_auth->in_group('admin')){ ?>
        <li <?php if ($current == "auth") {echo 'class="active"';}?>>
          <a href="/admin/auth">系統管理員</a>
        </li>
        <?php } ?>
      </ul>
    </li>
    <?php } ?>
    
    <?php if($this->ion_auth->in_group('admin') || $this->ion_auth->in_group('president')){ ?>
    <li <?php if ($current == "auth" || $current == "users") {echo "class='active'";}?>>
      <a href="#" class="dropdown-toggle">
        <i class="fa fa-user"></i>
        <span>商品管理</span>
        <b class="arrow fa fa-angle-right"></b>
      </a>
      <ul class="submenu">
        <?php if($this->ion_auth->in_group('admin')){ ?>
        <li <?php if ($current == "auth") {echo 'class="active"';}?>>
          <a href="/admin/auth">商品列表</a>
        </li>
        <?php } ?>
      </ul>
    </li>
    <?php } ?>

    <?php if($this->ion_auth->in_group('admin')){ ?>
    <li class="<?php if (($current == "setting")) {echo "active";}?>">
      <a href="/admin/setting/general">
        <i class="fa fa-cog"></i>
        <span>全站設定</span>
      </a>
    </li>
    <?php } ?>
  </ul>
  <!-- END Navlist -->
  <!-- BEGIN Sidebar Collapse Button -->
  <div id="sidebar-collapse" class="hidden-print">
    <i class="fa fa-angle-double-left"></i>
  </div>
  <!-- END Sidebar Collapse Button -->
</div>
<!-- END Sidebar -->