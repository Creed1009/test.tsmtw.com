<style>
    input:required {
        border-color: #f00;
    }
</style>
<div class="row">
  <?php echo form_open(uri_string());?>
    <div class="col-md-12">
      <div class="form-group">
        <button type="submit" class="btn btn-primary">儲存</button>
        <a href="<?php echo base_url().'admin/'.$this->uri->segment(2) ?>" class="btn btn-info hidden-print"><i class="fa fa-mail-reply"></i> 返回上一頁</a>
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group">
        <label>帳號</label>
        <input type="text" class="form-control" value="<?php echo $user->username; ?>" readonly>
      </div>
      <div class="form-group">
        <label>姓名 *</label>
        <input type="text" class="form-control" name="name" id="name" value="<?php echo $user->name; ?>" required>
      </div>
      <div class="form-group">
        <label>電子郵件 *</label>
        <input type="text" class="form-control" name="email" id="email" value="<?php echo $user->email; ?>">
      </div>
      <div class="form-group">
        <label>聯絡電話</label>
        <input type="text" class="form-control" name="phone" id="phone" value="<?php echo $user->phone; ?>">
      </div>
      <div class="form-group">
        <label>手機號碼 *</label>
        <input type="text" class="form-control" name="cellphone" id="cellphone" value="<?php echo $user->cellphone; ?>">
      </div>
      <div class="form-group">
        <label>備註</label>
        <textarea name="remark" id="remark" class="form-control" cols="30" rows="3"><?php echo $user->remark; ?></textarea>
      </div>
      <div class="form-group">
          <label>是否訂閱電子報</label>
          <label class="radio-inline">
              <input type="radio" name="subscript" id="subscriptRadio1" value="Y" <?php echo ($user->subscript=='Y'?'checked':'') ?>> 是
          </label>
          <label class="radio-inline">
              <input type="radio" name="subscript" id="subscriptRadio2" value="N" <?php echo ($user->subscript=='N'?'checked':'') ?>> 否
          </label>
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group">
        <label>會員編號</label>
        <input type="text" class="form-control" name="member_number" id="member_number" value="<?php echo $user->member_number ?>" required>
      </div>
      <div class="form-group">
        <?php if ($this->ion_auth->in_group('president')){ ?>
          <label>服務學校</label>
          <input type="hidden" name="school" id="school" value="<?php echo $user->school ?>" >
          <input type="text" class="form-control" value="<?php echo get_school_name_by_code($user->school) ?>" readonly>
        <?php } else { ?>
          <?php if(!empty($schools)): ?>
          <label>服務學校</label>
          <?php $att = 'id="school" class="form-control chosen" data-rule-required="true"';
          $data = array('' => '＊ 服務學校');
          foreach ($schools as $c)
          {
            $data[$c['school_code']] = $c['school_name'];
          }
          echo form_dropdown('school', $data, $user->school, $att);
          else: echo '<label>服務學校</label><input type="text" class="form-control" id="school" name="school" value="0" readonly>';
          endif; ?>
        <?php } ?>
      </div>
      <div class="form-group">
        <label>職稱</label>
        <?php
        $att = 'class="form-control" id="job_title"';
        $options = array (
            // '' => '選擇職稱',
            '學校教師會理事長' =>  '學校教師會理事長',
            '支會長(聯絡人)'  =>  '支會長(聯絡人)',
        );
        echo form_dropdown('job_title', $options, $user->job_title, $att); ?>
        <!-- <input type="text" class="form-control" name="job_title" id="job_title" value="<?php echo $user->job_title ?>"> -->
      </div>
      <div class="form-group">
        <label>任期到期日</label>
        <input type="text" class="form-control datepicker" name="term_of_office" id="term_of_office" value="<?php echo $user->term_of_office ?>" autocomplete="off">
      </div>
      <div class="form-group">
        <label>權利狀態</label>
        <select class="form-control" name="active" id="active">
          <option value="1" <?php echo ($user->active==1)?('selected'):('') ?>>正常</option>
          <option value="0" <?php echo ($user->active!=1)?('selected'):('') ?>>停權</option>
        </select>
      </div>
      <div class="form-group">
        <label>會員屬性</label>
        <select class="form-control" name="certification" id="certification">
          <option value="1" <?php echo ($user->certification==1)?('selected'):('') ?>>一般會員</option>
          <option value="2" <?php echo ($user->certification==2)?('selected'):('') ?>>無效會員</option>
          <option value="3" <?php echo ($user->certification==3)?('selected'):('') ?>>特殊會員</option>
        </select>
      </div>
      <div class="form-group">
        <label>會員認證年份</label>
        <input type="text" class="form-control" name="certification_year" id="certification_year" value="<?php echo $user->certification_year; ?>" autocomplete="off">
      </div>
      <div class="form-group">
        <?php echo lang('edit_user_password_label', 'password');?>
        <?php echo form_input($password);?>
      </div>
      <div class="form-group">
        <?php echo lang('edit_user_password_confirm_label', 'password_confirm');?>
        <?php echo form_input($password_confirm);?>
      </div>
      <?php if ($this->ion_auth->is_admin()): ?>
      <h3>群組</h3>
      <?php foreach ($groups as $group):?>
      <?php if($group['name']!='admin'){ ?>
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
      <?php } ?>
      <?php endforeach?>
      <?php endif ?>
      <?php echo form_hidden('id', $user->id);?>
      <?php echo form_hidden($csrf); ?>
    </div>
  <?php echo form_close() ?>
</div>

<div class="row">
  <div class="col-md-6"></div>
  <div class="col-md-6">
    <?php if ($this->ion_auth->is_admin()){ ?>
      <?php echo form_open('admin/users/delete_user/'.$user->id);?>
        <div class="form-group">
          <?php echo form_hidden('user_id', $user->id);?>
          <button type="submit" class="btn btn-danger" onClick="return confirm('您確定要刪除此會員嗎?')">刪除會員</button>
        </div>
      <?php echo form_close() ?>
    <?php } ?>
  </div>
</div>