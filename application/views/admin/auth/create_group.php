<div class="row">
  <div class="col-md-6">
    <h1><?php echo lang('create_group_heading');?></h1>
    <p><?php echo lang('create_group_subheading');?></p>
    <div id="infoMessage"><?php echo $message;?></div>
    <?php echo form_open("admin/auth/create_group");?>
    <div class="form-group">
      <?php echo lang('create_group_name_label', 'group_name');?>
      <?php echo form_input($group_name);?>
    </div>
    <div class="form-group">
      <?php echo lang('create_group_desc_label', 'description');?>
      <?php echo form_input($description);?>
    </div>
    <div class="form-group">
      <button type="submit" class="btn btn-primary">儲存修改</button>
    </div>
    <?php echo form_close() ?>
  </div>
</div>