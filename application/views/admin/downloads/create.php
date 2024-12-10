<div class="row">
<?php $attributes = array('class' => 'download', 'id' => 'download'); ?>
<?php echo form_open('admin/downloads/insert' , $attributes); ?>
  <div class="col-md-12">
    <div class="form-group">
      <button type="submit" class="btn btn-primary">建立</button>
      <a href="<?php echo base_url().'admin/'.$this->uri->segment(2) ?>" class="btn btn-info hidden-print"><i class="fa fa-mail-reply"></i> 返回上一頁</a>
    </div>
  </div>
  <div class="col-md-12">
    <div class="content-box-large">

      <div class="row">
        <div class="col-md-3">
          <div class="form-group">
            <?php if(!empty($category)): ?>
            <label for="download_category">分類</label>
            <?php $att = 'id="download_category" class="form-control chosen" data-rule-required="true"';
            $data = array();
            foreach ($category as $c)
            {
            $data[$c['download_category_id']] = $c['download_category_name'];
            }
            echo form_dropdown('download_category', $data, '0', $att);
            else: echo '<label>沒有分類</label><input type="text" class="form-control" id="download_category" name="download_category" value="0" readonly>';
            endif; ?>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-3">
          <div class="form-group">
            <label for="download_name">名稱 *</label>
            <input type="text" class="form-control" id="download_name" name="download_name" required>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-3">
          <div class="form-group">
            <label>檔案</label><br>
            <img src="" id="download_link_preview" class="img-responsive hide" style="width: 100px;">
            <input type="text"  class="form-control" id="download_link" name="download_link" readonly="">
            <a href="/assets/admin/filemanager/dialog.php?field_id=download_link&relative_url=1&akey=NshstuPrivateKey" class="btn btn-primary fancybox" type="button" style="margin-top:5px;">選擇檔案</a>
          </div>
        </div>
      </div>

    </div>
  </div>
<?php echo form_close() ?>
</div>

<script src="/node_modules/jquery-validation/dist/jquery.validate.min.js"></script>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.min.js"></script> -->
<script src="/node_modules/jquery-validation/dist/localization/messages_zh_TW.js"></script>
<script>
$.validator.setDefaults({
    submitHandler: function() {
        document.getElementById("download").submit();
        //alert("submitted!");
    }
});
</script>