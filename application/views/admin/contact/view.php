<div class="row">
  <div class="col-md-12">
    <div class="form-group">
      <a href="<?php echo base_url().'admin/'.$this->uri->segment(2) ?>" class="btn btn-info hidden-print"><i class="fa fa-mail-reply"></i> 返回上一頁</a>
    </div>
  </div>
  <div class="col-md-12">
    <div class="content-box-large">
      <div class="row">

        <div class="col-md-4">
          <div class="form-group">
            <label for="contact_user">姓名</label>
            <input type="text" class="form-control" value="<?php echo get_user_name($contact['contact_user']) ?>" readonly>
          </div>
        </div>

        <div class="col-md-4">
          <div class="form-group">
            <label for="contact_school">電話</label>
            <input type="text" class="form-control" value="<?php echo $contact['contact_school'] ?>" readonly>
          </div>
        </div>

        <div class="col-md-4">
          <div class="form-group">
            <label for="contact_phone">電子郵件</label>
            <input type="text" class="form-control" value="<?php echo $contact['contact_phone'] ?>" readonly>
          </div>
        </div>

        <div class="col-md-12">
          <div class="form-group">
            <label for="contact_subject">主旨</label>
            <input type="text" class="form-control" value="<?php echo $contact['contact_subject'] ?>" readonly>
          </div>
        </div>

        <div class="col-md-12">
          <div class="form-group">
            <label for="contact_content">反應與建議</label>
            <textarea class="form-control" cols="30" rows="5" readonly><?php echo $contact['contact_content'] ?></textarea>
          </div>
        </div>

      </div>
    </div>
  </div>
</div>