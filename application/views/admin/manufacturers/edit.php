<div class="row">
<?php $attributes = array('class' => 'manufacturer', 'id' => 'manufacturer');?>
<?php echo form_open('admin/manufacturers/update/' . $manufacturer['manufacturer_id'], $attributes); ?>
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
            <label for="manufacturer_name">名稱 *</label>
            <input type="text" class="form-control" id="manufacturer_name" name="manufacturer_name" value="<?php echo $manufacturer['manufacturer_name'] ?>" required>
          </div>
        </div>
        <div class="col-md-3">
          <div class="form-group">
            <label for="manufacturer_web">網站連結 *</label>
            <input type="text" class="form-control" id="manufacturer_web" name="manufacturer_web" value="<?php echo $manufacturer['manufacturer_web'] ?>">
          </div>
        </div>
        <div class="col-md-3">
          <div class="form-group">
            <label for="manufacturer_sort">順序</label>
            <input type="number" class="form-control" id="manufacturer_sort" name="manufacturer_sort" value="<?php echo $manufacturer['manufacturer_sort'] ?>">
          </div>
        </div>
        <div class="col-md-3">
          <div class="form-group">
            <label>照片</label><br>
            <?php if(!empty($manufacturer['manufacturer_image'])) { ?>
            <img src="/assets/uploads/<?php echo $manufacturer['manufacturer_image']; ?>" id="manufacturer_image_preview" class="img-responsive" style="<?php if (empty($manufacturer['manufacturer_image'])) {echo 'display: none';}?>">
            <?php } else { ?>
              <img src="" id="manufacturer_image_preview" class="img-responsive" style="width: 100px;">
            <?php } ?>
            <input type="hidden" id="manufacturer_image" name="manufacturer_image" value="<?php echo $manufacturer['manufacturer_image']; ?>"/>
            <a href="/assets/admin/filemanager/dialog.php?type=1&field_id=manufacturer_image&relative_url=1&akey=NshstuPrivateKey" class="btn btn-primary fancybox" type="button" style="margin-top:5px;">選擇照片</a>
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
        document.getElementById("manufacturer").submit();
        //alert("submitted!");
    }
});
</script>