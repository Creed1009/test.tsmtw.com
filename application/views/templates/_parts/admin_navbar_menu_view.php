<?php defined('BASEPATH') OR exit('No direct script access allowed');?>

<!-- BEGIN Navbar -->
<div id="navbar" class="navbar navbar-fixed">
  <button type="button" class="navbar-toggle navbar-btn collapsed" data-toggle="collapse" data-target="#sidebar">
    <span class="fa fa-bars"></span>
  </button>
  <a class="navbar-brand" href="<?php echo base_url(); ?>">
    <img src="/assets/uploads/no-image.jpg" class="img-fluid" style="height: 40px;">
    <!-- <img src="/assets/uploads/<?php echo get_setting_general('logo'); ?>" class="img-fluid" style="height: 40px;"> -->
  </a>
  <!-- BEGIN Navbar Buttons -->
  <ul class="nav flaty-nav pull-right">
      <!-- BEGIN Button User -->
    <li class="hidden-sm-down">
      <a href="#">
        <span id="NowTime" style="color: white;"></span>
      </a>
    </li>
    <li class="user-profile">
      <a data-toggle="dropdown" href="#" class="user-menu dropdown-toggle">
        <i class="fa fa-user"></i>
        <span id="user_info">
          <?php echo $this->ion_auth->user()->row()->username; ?>
        </span>
        <i class="fa fa-caret-down"></i>
      </a>
      <!-- BEGIN User Dropdown -->
      <ul class="dropdown-menu dropdown-navbar" id="user_menu">
        <!-- <li class="divider"></li> -->
        <!-- <li>
          <a href="/auth/edit_user/<?php echo $this->ion_auth->user()->row()->id; ?>">
            <i class="fa fa-edit"></i> 修改密碼
          </a>
        </li> -->
        <!-- <li class="divider"></li> -->
        <?php //echo $admin_user_menu; ?>
        <li>
          <a href="/logout">
            <i class="fa fa-power-off"></i> 登出
          </a>
        </li>
      </ul>
        <!-- BEGIN User Dropdown -->
    </li>
    <!-- END Button User -->
  </ul>
  <!-- END Navbar Buttons -->
</div>
<!-- END Navbar -->