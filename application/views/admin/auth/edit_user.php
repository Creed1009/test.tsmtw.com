<div class="row">
  <div class="col-md-6">
    <?php echo form_open(uri_string());?>
    <div class="form-group">
      <p><?php echo $user->name; ?></p>
    </div>
    <!-- <div class="form-group">
      <label>名字:</label>
      <input type="text" class="form-control" name="first_name" id="first_name" value="<?php echo $user->first_name; ?>">
    </div>
    <div class="form-group">
      <label>姓氏:</label>
      <input type="text" class="form-control" name="last_name" id="last_name" value="<?php echo $user->last_name; ?>">
    </div>
    <div class="form-group">
      <label>公司:</label>
      <input type="text" class="form-control" name="company" id="company" value="<?php echo $user->company; ?>">
    </div>
    <div class="form-group">
      <label>聯絡電話:</label>
      <input type="text" class="form-control" name="phone" id="phone" value="<?php echo $user->phone; ?>">
    </div> -->
    <div class="form-group">
      <?php echo lang('edit_user_password_label', 'password');?>
      <?php echo form_input($password);?>
    </div>
    <div class="form-group">
      <?php echo lang('edit_user_password_confirm_label', 'password_confirm');?>
      <?php echo form_input($password_confirm);?>
    </div>
    <?php if ($this->ion_auth->is_admin()): ?>

    <h3>角色</h3>
    <?php foreach ($groups as $group):?>
    <div class="checkbox">
      <label class="checkbox">
        <?php
        $gID=$group['id'];
        $checked = null;
        $item = null;
        foreach($currentGroups as $grp) {
          if ($gID == $grp->id) {
            $checked= ' checked="checked"';
            break;
          }
        } ?>
        <input type="checkbox" name="groups[]" value="<?php echo $group['id'];?>"<?php echo $checked;?>>
        <?php echo htmlspecialchars($group['description'],ENT_QUOTES,'UTF-8');?>
      </label>
    </div>
    <?php endforeach?>

    <?php endif ?>
    <?php echo form_hidden('id', $user->id);?>
    <?php echo form_hidden($csrf); ?>
    <div class="form-group">
      <button type="submit" class="btn btn-primary">儲存修改</button>
    </div>
    <?php echo form_close() ?>
  </div>
</div>