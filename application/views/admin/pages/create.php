<div class="row">
<?php $attributes = array('class' => 'page', 'id' => 'page');?>
<?php echo form_open('admin/pages/insert', $attributes); ?>
  <div class="col-md-12">
    <div class="form-group">
      <button type="submit" class="btn btn-primary">新增</button>
      <a href="<?php echo base_url().'admin/'.$this->uri->segment(2); ?>" class="btn btn-info hidden-print"><i class="fa fa-mail-reply"></i> 返回上一頁</a>
    </div>
  </div>
  <div class="col-md-12">
    <div class="content-box-large">
      <div class="row">
        <div class="col-md-3">
          <div class="form-group">
            <label>頁面名稱</label>
            <input type="text" class="form-control" name="page_name" id="page_name">
          </div>
        </div>
        <div class="col-md-3">
          <div class="form-group">
            <label>頁面英文名稱</label>
            <input type="text" class="form-control" name="page_name_en" id="page_name_en">
          </div>
        </div>
        <div class="col-md-3">
          <div class="form-group">
            <label>頁面URL</label>
            <input type="text" class="form-control" name="page_url" id="page_url">
          </div>
        </div>
        <div class="col-md-3">
          <div class="form-group">
            <label>頁面Banner</label>
            <div class="form-group">
                <img src="" id="page_banner_preview" class="img-responsive" style="">
            </div>
            <input type="hidden" id="page_banner" name="page_banner" value=""/>
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
              <option value="1">是</option>
              <option value="0" selected="">否</option>
            </select>
          </div>
        </div>
        <div class="col-md-3">
          <div class="form-group">
            <label>選單順序</label>
            <input type="number" class="form-control" name="page_menu_sort" id="page_menu_sort">
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="form-group">
            <label for="page_content">頁面內容 *</label>
            <textarea class="form-control tinymce" name="page_content" id="page_content" cols="50" rows="30"></textarea>
          </div>
        </div>
      </div>
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