<div class="row">
  <?php $attributes = array('class' => 'shop_ad', 'id' => 'shop_ad'); ?>
  <?php echo form_open('admin/shop_ad/update/'.$shop_ad['shop_ad_id'] , $attributes); ?>
  <div class="col-md-12">
    <div class="form-group">
      <button type="submit" class="btn btn-primary">修改</button>
      <a href="<?php echo base_url().'admin/'.$this->uri->segment(2) ?>" class="btn btn-info hidden-print"><i class="fa fa-mail-reply"></i> 返回上一頁</a>
      <hr>
    </div>
    <div class="content-box-large">

      <div class="row">
        <div class="col-md-6">
          <div class="form-horizontal">
            <div class="form-group">
              <label for="shop_ad_link" class="col-sm-3 control-label">＊連結：</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" name="shop_ad_link" id="shop_ad_link" value="<?php echo $shop_ad['shop_ad_link'] ?>" required>
              </div>
            </div>
            <div class="form-group">
              <label for="shop_ad_sort" class="col-sm-3 control-label">＊順序：</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" name="shop_ad_sort" id="shop_ad_sort" value="<?php echo $shop_ad['shop_ad_sort'] ?>" required>
              </div>
            </div>
            <div class="form-group">
              <label for="shop_ad_content" class="col-sm-3 control-label">＊圖片：</label>
              <div class="col-sm-9">
                <img src="/assets/uploads/<?php echo $shop_ad['shop_ad_image'] ?>" id="shop_ad_image_preview" class="img-responsive" style="<?php if(empty($shop_ad['shop_ad_image'])){echo 'display: none';} ?>">

                <input type="hidden" id="shop_ad_image" name="shop_ad_image" value="<?php echo $shop_ad['shop_ad_image'] ?>"/>

                <a href="/assets/admin/filemanager/dialog.php?type=1&field_id=shop_ad_image&relative_url=1&akey=NshstuPrivateKey" class="btn btn-primary fancybox" type="button" style="margin-top: 5px;">選擇圖片</a>
              </div>
            </div>
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
        document.getElementById("shop_ad").submit();
        //alert("submitted!");
    }
});
$(document).ready(function() {
  $("#shop_ad").validate({});
});
</script>