<div class="row">
<?php $attributes = array('class' => 'message', 'id' => 'message');?>
<?php echo form_open('admin/messages/update/' . $message['message_id'], $attributes); ?>
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
            <label for="message_date">日期 *</label>
            <input type="text" class="form-control datepicker" id="message_date" name="message_date" value="<?php echo $message['message_date'] ?>" autocomplete="off" required>
          </div>
        </div>
        <div class="col-md-3">
          <div class="form-group">
            <label for="message_category">類型</label>
            <?php $att = 'id="message_category" class="form-control" onchange="select_user_type()"';
            if($this->ion_auth->is_admin()){
              $data = array(
                'all' => '全部通知',
                'school' => '學校',
                'person' => '個人'
              );
            } else {
              $data = array(
                'school' => '學校',
                'person' => '個人'
              );
            }
            echo form_dropdown('message_category', $data, $message['message_category'], $att); ?>
          </div>
        </div>

        <?php if($this->ion_auth->is_admin()){ ?>
        <div class="col-md-3" id="school_area" style="display: <?php echo ($message['message_category']=='school')?('block'):('none'); ?>;">
          <div class="form-group">
              <?php if(!empty($schools)): ?>
              <label for="message_school">服務學校 *</label>
              <?php $att = 'id="message_school" class="form-control chosen" data-rule-required="true"';
              $data = array('0' => '---選擇學校---');
              foreach ($schools as $c)
              {
                $data[$c['school_code']] = $c['school_name'];
              }
              echo form_dropdown('message_school', $data, $message['message_school'], $att);
              else: echo '<label>服務學校</label><input type="text" class="form-control" id="message_school" name="message_school" value="0" readonly>';
              endif; ?>
          </div>
        </div>
        <div class="col-md-3" id="users_area" style="display: <?php echo ($message['message_category']=='person')?('block'):('none'); ?>;">
          <div class="form-group">
            <?php if(!empty($users)): ?>
            <label for="message_to">對象</label>
            <?php $att = 'id="message_to" class="form-control chosen" data-rule-required="true"';
            $data = array('0' => '選擇對象');
            foreach ($users as $c)
            {
              $data[$c['user_id']] = $c['last_name'].$c['first_name'].' - '.$c['username'];
            }
            echo form_dropdown('message_to', $data,  $message['message_to'], $att);
            else: echo '<label>沒有對象</label><input type="text" class="form-control" id="message_to" name="message_to" value="0" readonly>';
            endif; ?>
            <!-- <input type="hidden" name="message_to" value="0"> -->
          </div>
        </div>
        <?php } else { ?>
          <div class="col-md-3" id="school_area" style="display: <?php echo ($message['message_category']=='school')?('block'):('none'); ?>;">
            <div class="form-group">
              <label for="message_school">服務學校 *</label>
              <input type="text" class="form-control" value="<?php echo get_school_name_by_code($this->ion_auth->user()->row()->school) ?>" readonly>
            </div>
          </div>
          <input type="hidden" name="message_school" id="message_school" value="<?php echo $this->ion_auth->user()->row()->school ?>">
          <div class="col-md-3" id="users_area" style="display: <?php echo ($message['message_category']=='person')?('block'):('none'); ?>;">
            <div class="form-group">
              <?php if(!empty($users)): ?>
              <label for="message_to">對象</label>
              <?php $att = 'id="message_to" class="form-control chosen" data-rule-required="true"';
              $data = array('0' => '選擇對象');
              foreach ($users as $c)
              {
                $data[$c['user_id']] = $c['last_name'].$c['first_name'].' - '.$c['username'];
              }
              echo form_dropdown('message_to', $data,  $message['message_to'], $att);
              else: echo '<label>沒有對象</label><input type="text" class="form-control" id="message_to" name="message_to" value="0" readonly>';
              endif; ?>
            </div>
          </div>
        <?php } ?>
      </div>

      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label for="message_title">標題 *</label>
            <input type="text" class="form-control" id="message_title" name="message_title" value="<?php echo $message['message_title'] ?>" required>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-md-12">
          <div class="form-group">
            <label for="message_content">內容 *</label>
            <textarea class="form-control tinymce" name="message_content" id="message_content" cols="30" rows="20"><?php echo $message['message_content'] ?></textarea>
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
        document.getElementById("message").submit();
        //alert("submitted!");
    }
});

function select_user_type(){
  var message_category = $("#message_category").val();
  $('#school_area').hide();
  $('#users_area').hide();
  if(message_category=='school'){
    $('#school_area').show();
  } else if(message_category=='person') {
    $('#users_area').show();
  } else {
    $('#school_area').hide();
    $('#users_area').hide();
  }
}
</script>