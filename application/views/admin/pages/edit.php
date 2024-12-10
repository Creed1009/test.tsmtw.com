<div class="row">
<?php $attributes = array('class' => 'page', 'id' => 'page');?>
<?php echo form_open('admin/pages/update/' . $page['page_id'], $attributes); ?>
  <div class="col-md-12">
    <div class="form-group">
      <button type="submit" class="btn btn-primary">修改</button>
      <a href="<?php echo base_url().'admin/'.$this->uri->segment(2); ?>" class="btn btn-info hidden-print"><i class="fa fa-mail-reply"></i> 返回上一頁</a>
    </div>
  </div>
  <div class="col-md-12">
    <div class="content-box-large">
      <div class="row">
        <div class="col-md-3">
          <div class="form-group">
            <label>頁面名稱</label>
            <input type="text" class="form-control" name="page_name" id="page_name" value="<?php echo $page['page_name'] ?>" readonly>
          </div>
        </div>
        <div class="col-md-3">
          <div class="form-group">
            <label>頁面英文名稱</label>
            <input type="text" class="form-control" name="page_name_en" id="page_name_en" value="<?php echo $page['page_name_en'] ?>" readonly>
          </div>
        </div>
        <div class="col-md-3">
          <div class="form-group">
            <label>頁面URL</label>
            <input type="text" class="form-control" name="page_url" id="page_url" value="<?php echo $page['page_url'] ?>" readonly>
          </div>
        </div>
        <div class="col-md-3">
          <div class="form-group">
            <label>頁面Banner</label>
            <div class="form-group">
              <?php if(!empty($page['page_banner'])) { ?>
              <img src="/assets/uploads/<?php echo $page['page_banner']; ?>" id="page_banner_preview" class="img-responsive" style="<?php if (empty($page['page_banner'])) {echo 'display: none';}?>">
              <?php } else { ?>
                <img src="" id="page_banner_preview" class="img-responsive" style="">
              <?php } ?>
            </div>
            <input type="hidden" id="page_banner" name="page_banner" value="<?php echo $page['page_banner']; ?>"/>
            <div class="form-inline">
              <a href="/assets/admin/filemanager/dialog.php?type=1&field_id=page_banner&relative_url=1&akey=NshstuPrivateKey" class="btn btn-primary fancybox" type="button">選擇Banner圖片</a>
              <span class="btn btn-danger" onclick="cancel_banner_image()">取消Banner圖片</span>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-3">
          <div class="form-group">
            <label>加到主選單</label>
            <select class="form-control" name="page_to_menu" id="page_to_menu">
              <option value="1" <?php echo ($page['page_to_menu']==1)?('selected'):('') ?>>是</option>
              <option value="0" <?php echo ($page['page_to_menu']!=1)?('selected'):('') ?>>否</option>
            </select>
          </div>
        </div>
        <div class="col-md-3">
          <div class="form-group">
            <label>選單順序</label>
            <input type="number" class="form-control" name="page_menu_sort" id="page_menu_sort" value="<?php echo $page['page_menu_sort'] ?>">
          </div>
        </div>
      </div>
      <?php if($page['page_url']=='billboard' || $page['page_url']=='commodity' || $page['page_url']=='activity' || $page['page_url']=='download') { ?>
        <input type="hidden" name="page_content" id="page_content" value="">
      <?php } else { ?>
        <div class="row">
          <div class="col-md-12">
            <div class="form-group">
              <label for="page_content">頁面內容 *</label>
              <textarea class="form-control tinymce" name="page_content" id="page_content" cols="50" rows="30"><?php echo $page['page_content'] ?></textarea>
            </div>
          </div>
        </div>
      <?php } ?>
    </div>
  </div>
  <?php echo form_close(); ?>
</div>

<script src="/node_modules/jquery-validation/dist/jquery.validate.min.js"></script>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.min.js"></script> -->
<script src="/node_modules/jquery-validation/dist/localization/messages_zh_TW.js"></script>
<script>
$.validator.setDefaults({
    submitHandler: function() {
        document.getElementById("page").submit();
        //alert("submitted!");
    }
});
</script>

<script>
  function cancel_banner_image(){
    $('#page_banner_preview').attr('src','');
    $('#page_banner').val('');
  }
</script>