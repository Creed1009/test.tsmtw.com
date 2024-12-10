<div class="row">
  <div class="col-md-6">
    <a href="/admin/pages/create" class="btn btn-primary hidden-print">新增頁面</a>
  </div>
  <div class="col-md-6 hide">
    <div class="form-inline text-right">
      <input type="text" id="keywords" class="form-control" placeholder="搜尋..." onkeyup="searchFilter()"/>
      <select id="sortBy" class="form-control" onchange="searchFilter()">
        <option value="0">排序</option>
        <option value="asc">升冪</option>
        <option value="desc">降冪</option>
      </select>
    </div>
  </div>
</div>
<div class="table-responsive" id="datatable">
  <?php require('ajax-data.php'); ?>
  </table>
</div>