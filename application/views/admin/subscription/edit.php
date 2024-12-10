<div class="row">
<?php $attributes = array('class' => 'subscription', 'id' => 'subscription');?>
<?php echo form_open('admin/subscription/update/' . $subscription['subscription_id'], $attributes); ?>
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
            <label for="subscription_code">代號 *</label>
            <input type="text" class="form-control" id="subscription_code" name="subscription_code" value="<?php echo $subscription['subscription_code'] ?>" required>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label for="subscription_name">名稱 *</label>
            <input type="text" class="form-control" id="subscription_name" name="subscription_name" value="<?php echo $subscription['subscription_name'] ?>" required>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-md-3">
          <div class="form-group">
            <label for="subscription_address">地址</label>
            <input type="text" class="form-control" id="subscription_address" name="subscription_address" value="<?php echo $subscription['subscription_address'] ?>">
          </div>
        </div>
        <div class="col-md-3">
          <div class="form-group">
            <label for="subscription_phone">電話</label>
            <input type="text" class="form-control" id="subscription_phone" name="subscription_phone" value="<?php echo $subscription['subscription_phone'] ?>">
          </div>
        </div>
        <div class="col-md-3">
          <div class="form-group">
            <label for="subscription_site">網站</label>
            <input type="text" class="form-control" id="subscription_site" name="subscription_site" value="<?php echo $subscription['subscription_site'] ?>">
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
        document.getElementById("subscription").submit();
        //alert("submitted!");
    }
});
</script>