<p>請選擇CSV檔</p>
<form action="<?php echo base_url(); ?>admin/import/quick_users" method="post" name="upload_csv" enctype="multipart/form-data">
  <div class="form-group">
    <input type="file" name="file">
  </div>
  <div class="form-group">
    <button type="submit" name="import" class="btn btn-primary">上傳</button>
  </div>
</form>