<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<?php $current = $this->uri->segment(2);?>
<!-- BEGIN Sidebar -->
<div id="sidebar" class="navbar-collapse collapse sidebar-fixed">
  <!-- BEGIN Navlist -->
  <ul class="nav nav-list hidden-print">
    <?php if($this->ion_auth->in_group('admin') || $this->ion_auth->in_group('president')){ ?>
    <li <?php if ($current == "auth" || $current == "users") {echo "class='active'";}?>>
      <a href="#" class="dropdown-toggle">
        <i class="fa fa-user"></i>
        <span>帳號管理</span>
        <b class="arrow fa fa-angle-right"></b>
      </a>
      <ul class="submenu">
        <li <?php if ($current == "users") {echo 'class="active"';}?>>
          <a href="/admin/users">會員管理</a>
        </li>
        <?php if($this->ion_auth->in_group('admin')){ ?>
        <li <?php if ($current == "auth") {echo 'class="active"';}?>>
          <a href="/admin/auth">系統管理員</a>
        </li>
        <?php } ?>
      </ul>
    </li>
    <?php } ?>
    <?php if($this->ion_auth->in_group('admin')){ ?>
    <li <?php if ($current == "pages" || $current == "banner" || $current == "links") {echo "class='active'";}?>>
      <a href="#" class="dropdown-toggle">
        <i class="fa fa-file"></i>
        <span>頁面管理</span>
        <b class="arrow fa fa-angle-right"></b>
      </a>
      <ul class="submenu">
        <li <?php if ($current == "pages") {echo 'class="active"';}?>>
          <a href="/admin/pages">頁面管理</a>
        </li>
        <li <?php if ($current == "banner") {echo 'class="active"';}?>>
          <a href="/admin/banner">首頁輪播圖管理</a>
        </li>
        <li <?php if ($current == "links") {echo 'class="active"';}?>>
          <a href="/admin/links">相關連結管理</a>
        </li>
      </ul>
    </li>
    <?php } ?>
    <?php if($this->ion_auth->in_group('admin')){ ?>
    <li class="<?php if (($current == "activitys")) {echo "active";}?>">
      <a href="/admin/activitys">
        <i class="fa fa-file-image-o"></i>
        <span>活動照片管理</span>
      </a>
    </li>
    <?php } ?>
    <?php if($this->ion_auth->in_group('admin') || $this->ion_auth->in_group('post_manager')){ ?>
    <li class="<?php if (($current == "posts")) {echo "active";}?>">
      <a href="/admin/posts">
        <i class="fa fa-clipboard"></i>
        <span>公告欄管理</span>
      </a>
    </li>
    <?php } ?>
    <?php if($this->ion_auth->in_group('admin') || $this->ion_auth->in_group('product_manager')){ ?>
    <li <?php if ($current == "manufacturers" || $current == "products" || $current == "shop_banner" || $current == "shop_ad") {echo "class='active'";}?>>
      <a href="#" class="dropdown-toggle">
        <i class="fa fa-shopping-cart"></i>
        <span>電子商務</span>
        <b class="arrow fa fa-angle-right"></b>
      </a>
      <ul class="submenu">
        <li <?php if ($current == "manufacturers") {echo 'class="active"';}?>>
          <a href="/admin/manufacturers">廠商管理</a>
        </li>
        <li <?php if ($current == "products" && $this->uri->segment(3)=='category') {echo 'class="active"';}?>>
          <a href="/admin/products/category">商品分類管理</a>
        </li>
        <li <?php if ($current == "products" && $this->uri->segment(3)=='') {echo 'class="active"';}?>>
          <a href="/admin/products">商品清單管理</a>
        </li>
        <li <?php if ($current == "shop_banner") {echo 'class="active"';}?>>
          <a href="/admin/shop_banner">商品輪播圖管理</a>
        </li>
        <li <?php if ($current == "shop_ad") {echo 'class="active"';}?>>
          <a href="/admin/shop_ad">商品廣告管理</a>
        </li>
      </ul>
    </li>
    <?php } ?>
    <?php if($this->ion_auth->in_group('admin')){ ?>
    <li class="<?php if (($current == "downloads")) {echo "active";}?>">
      <a href="/admin/downloads">
        <i class="fa fa-cloud-download"></i>
        <span>檔案下載管理</span>
      </a>
    </li>
    <?php } ?>
    <?php if($this->ion_auth->in_group('admin')){ ?>
    <li class="<?php if (($current == "schools")) {echo "active";}?>">
      <a href="/admin/schools">
        <i class="fa fa-fort-awesome"></i>
        <span>學校管理</span>
      </a>
    </li>
    <?php } ?>
    <?php if($this->ion_auth->in_group('admin') || $this->ion_auth->in_group('president')){ ?>
    <li class="<?php if (($current == "messages")) {echo "active";}?>">
      <a href="/admin/messages">
        <i class="fa fa-commenting"></i>
        <span>訊息管理</span>
      </a>
    </li>
    <?php } ?>
    <?php if($this->ion_auth->in_group('admin')){ ?>
    <li class="<?php if (($current == "subscription")) {echo "active";}?>">
      <a href="/admin/subscription">
        <i class="fa fa-user"></i>
        <span>電子報訂閱者</span>
      </a>
    </li>
    <?php } ?>
    <?php if($this->ion_auth->in_group('admin')){ ?>
    <li class="<?php if (($current == "email")) {echo "active";}?>">
      <a href="/admin/email">
        <i class="fa fa-envelope"></i>
        <span>電子報</span>
      </a>
    </li>
    <?php } ?>
    <?php if($this->ion_auth->in_group('admin')){ ?>
    <li class="<?php if (($current == "contact")) {echo "active";}?>">
      <a href="/admin/contact" style="position: relative;">
        <i class="fa fa-commenting"></i>
        <span>會員回饋管理</span>
      </a>
      <span id="contact_count" style="position: absolute;top: 5px;right: 10px;background: #f00;color: white;border-radius: 25px;width: 20px;height: 20px;text-align: center;"></span>
    </li>
    <?php } ?>
    <?php if($this->ion_auth->in_group('admin')){ ?>
    <li>
      <a href="/assets/admin/filemanager/dialog.php?akey=NshstuPrivateKey" data-fancybox data-type="iframe">
        <i class="fa fa-folder"></i>
        <span>檔案管理</span>
      </a>
    </li>
    <?php } ?>
    <?php if($this->ion_auth->in_group('admin')){ ?>
    <li class="<?php if (($current == "change_log")) {echo "active";}?>">
      <a href="/admin/change_log">
        <i class="fa fa-cog"></i>
        <span>修改密碼紀錄</span>
      </a>
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