<div class="row">
<?php $attributes = array('class' => 'contact', 'id' => 'contact');?>
<?php echo form_open('admin/contact/update/' . $contact['contact_id'], $attributes); ?>
  <div class="col-md-12">
    <div class="form-group">
      <button type="submit" class="btn btn-primary">修改</button>
      <a href="<?php echo base_url().'admin/'.$this->uri->segment(2) ?>" class="btn btn-info hidden-print"><i class="fa fa-mail-reply"></i> 返回上一頁</a>
    </div>
  </div>
  <div class="col-md-12">
    <div class="content-box-large">

      <div class="row">
        <div class="col-md-3">
          <div class="form-group">
            <?php if(!empty($category)): ?>
            <label for="contact_category">分類</label>
            <?php $att = 'id="category_id" class="form-control chosen" data-rule-required="true"';
            $data = array();
            foreach ($category as $c){
            $data[$c['contact_category_id']] = $c['contact_category_name'];
            }
            echo form_dropdown('contact_category', $data, $contact['contact_category'], $att);
            else: echo '<label>沒有分類</label><input type="text" class="form-control" id="contact_category" name="contact_category" value="0" readonly>';
            endif; ?>
          </div>
        </div>

        <div class="col-md-3">
          <div class="form-group">
            <label for="contact_title">標題 *</label>
            <input type="text" class="form-control" id="contact_title" name="contact_title" value="<?php echo $contact['contact_title'] ?>" required>
          </div>
        </div>

        <div class="col-md-3">
          <div class="form-group">
            <label for="contact_href">連結 *</label>
            <input type="text" class="form-control" id="contact_href" name="contact_href" value="<?php echo $contact['contact_href'] ?>">
          </div>
        </div>

        <div class="col-md-3">
          <div class="form-group">
            <label class="control-label">圖片</label><br>
            <?php if(!empty($contact['contact_image'])) { ?>
              <img src="/assets/uploads/<?php echo $contact['contact_image']; ?>" id="contact_image_preview" class="img-responsive" style="<?php if (empty($contact['contact_image'])) {echo 'display: none';}?>">
            <?php } else { ?>
              <img src="" id="contact_image_preview" class="img-responsive">
            <?php } ?>
            <input type="hidden" id="contact_image" name="contact_image" value="<?php echo $contact['contact_image']; ?>"/>
            <a href="/assets/admin/filemanager/dialog.php?type=1&field_id=contact_image&relative_url=1&akey=NshstuPrivateKey" class="btn btn-primary fancybox" type="button" style="margin-top: 5px;">選擇圖片</a>
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
        document.getElementById("contact").submit();
        //alert("submitted!");
    }
});
</script>