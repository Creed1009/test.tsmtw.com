<div class="row">
  <div class="col-md-6">
    <a href="/admin/email/create" id="create-btn" class="btn btn-primary">新增電子郵件</a>
  </div>
  <div class="col-md-6">
    <div class="form-inline text-right">
      <!-- <input type="text" id="keywords" class="form-control" placeholder="搜尋..." onkeyup="searchFilter()"/> -->
      <select id="status" class="form-control" onchange="searchFilter()">
        <option value="n">未寄送</option>
        <option value="y">已寄送</option>
      </select>
    </div>
  </div>
</div>
<div class="table-responsive" id="datatable">
  <?php require('ajax-data.php'); ?>
</div>