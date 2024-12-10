<div class="row">
  <div class="col-md-6">
    <h1><?php echo lang('deactivate_heading');?></h1>
    <p><?php echo sprintf(lang('deactivate_subheading'), $user->username);?></p>
    <?php echo form_open("admin/users/deactivate/".$user->id);?>
    <div class="form-group">
      <label class="radio-inline">
        <input type="radio" name="confirm" value="yes" checked="checked" /> 是
      </label>
      <label class="radio-inline">
        <input type="radio" name="confirm" value="no" /> 否
      </label>
    </div>
    <div class="form-group">
      <?php echo form_hidden($csrf); ?>
      <?php echo form_hidden(array('id'=>$user->id)); ?>
      <button type="submit" class="btn btn-primary">儲存修改</button>
    </div>
    <?php echo form_close() ?>
  </div>
</div>