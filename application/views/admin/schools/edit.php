<div class="row">
<?php $attributes = array('class' => 'school', 'id' => 'school');?>
<?php echo form_open('admin/schools/update/' . $school['school_id'], $attributes); ?>
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
            <label for="school_code">代號 *</label>
            <input type="text" class="form-control" id="school_code" name="school_code" value="<?php echo $school['school_code'] ?>" required>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label for="school_name">名稱 *</label>
            <input type="text" class="form-control" id="school_name" name="school_name" value="<?php echo $school['school_name'] ?>" required>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-md-3">
          <div class="form-group">
            <label for="school_address">地址</label>
            <input type="text" class="form-control" id="school_address" name="school_address" value="<?php echo $school['school_address'] ?>">
          </div>
        </div>
        <div class="col-md-3">
          <div class="form-group">
            <label for="school_phone">電話</label>
            <input type="text" class="form-control" id="school_phone" name="school_phone" value="<?php echo $school['school_phone'] ?>">
          </div>
        </div>
        <div class="col-md-3">
          <div class="form-group">
            <label for="school_site">網站</label>
            <input type="text" class="form-control" id="school_site" name="school_site" value="<?php echo $school['school_site'] ?>">
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
        document.getElementById("school").submit();
        //alert("submitted!");
    }
});
</script>