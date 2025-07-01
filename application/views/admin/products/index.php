<div class="row">
  <div class="col-md-6">
    <a href="/admin/products/create" class="btn btn-primary hidden-print">新增商品</a>
  </div>
  <div class="col-md-6">
    <div class="form-inline text-right">
      <input type="text" id="keywords" class="form-control" placeholder="搜尋..." onkeyup="searchFilter()"/>
      <!-- <select id="category" class="form-control" onchange="searchFilter()">
        <option value="0">---選擇分類---</option>
        <?php foreach ($category as $data) {
          echo '<option value='.$data['product_category_id'].'>'.$data['product_category_name'].'</option>';
        } ?>
      </select> -->
      
      <select id="status" class="form-control" onchange="searchFilter()">
        <option value="1" selected>上架中</option>
        <option value="0" >已下架</option>
        <option value="" >全部</option>
      </select>

      <select id="sortBy" class="form-control" onchange="searchFilter()">
        <option value="0">排序</option>
        <option value="asc">升冪</option>
        <option value="desc">降冪</option>
      </select>
      <!-- <select id="status" class="form-control" onchange="searchFilter()">
        <option value="1">啟用</option>
        <option value="2">禁用</option>
      </select> -->
    </div>
  </div>
</div>
<div class="table-responsive" id="datatable">
  <?php require('ajax-data.php'); ?>
  </table>
</div>