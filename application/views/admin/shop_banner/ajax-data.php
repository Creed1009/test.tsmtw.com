<?php // echo $this->ajax_pagination_admin->create_links(); ?>
<?php $attributes = array('class' => 'shop_banner', 'id' => 'shop_banner'); ?>
<?php echo form_open('admin/shop_banner/multiple_action' , $attributes); ?>
<div class="form-group hide">
  <div class="form-inline">
    <label><input type="checkbox" id="checkAll"> 全選</label>
    <select name="action" id="action" class="form-control">
      <option value="0">--動作--</option>
      <option value="on_the_shelf">上架</option>
      <option value="go_off_the_shelf">下架</option>
      <option value="delete">刪除</option>
    </select>
    <button type="submit" class="btn btn-primary">操作</button>
  </div>
</div>

<table class="table table-striped table-bordered table-hover" id="data-table">
  <thead>
    <tr class="info">
      <!-- <th></th> -->
      <th width="50px">預覽</th>
      <th>類型</th>
      <th>標題</th>
      <th>連結</th>
      <th>順序</th>
      <!-- <th>垂直對齊</th> -->
      <th>狀態</th>
      <th>上架日期</th>
      <th>下架日期</th>
      <th>操作</th>
    </tr>
  </thead>
  <?php if(!empty($shop_banner)): foreach($shop_banner as $data): ?>
    <tr>
      <!-- <td><input type="checkbox" name="shop_banner_id[]" value="<?php echo $data['shop_banner_id'] ?>"></td> -->
      <td><?php echo get_image($data['shop_banner_image']) ?></td>
      <td>
        <?php echo ($data['shop_banner_type']=='image'?'圖片':'') ?>
        <?php echo ($data['shop_banner_type']=='youtube'?'Youtube':'') ?>
      </td>
      <td><?php echo $data['shop_banner_name'] ?></td>
      <td><?php echo $data['shop_banner_link'] ?></td>
      <td><?php echo $data['shop_banner_sort'] ?></td>
      <!-- <td><?php echo $data['shop_banner_vertical_alignment'] ?></td> -->
      <td>
        <?php
          if(strtotime($data['shop_banner_on_the_shelf'])<=strtotime(date('Y-m-d H:i:s')) && strtotime($data['shop_banner_off_the_shelf'])>=strtotime(date('Y-m-d H:i:s')) && $data['shop_banner_status']==1){
            echo '上架';
          } else {
            echo '下架';
          }
        ?>
      </td>
      <td><?php echo $data['shop_banner_on_the_shelf'] ?></td>
      <td><?php echo $data['shop_banner_off_the_shelf'] ?></td>
      <td>
        <a href="/admin/shop_banner/edit/<?php echo $data['shop_banner_id'] ?>" class="btn btn-info btn-sm"><i class="fa fa-edit"></i> 編輯</a>
        <a href="/admin/shop_banner/delete/<?php echo $data['shop_banner_id'] ?>" class="btn btn-danger btn-sm" onClick="return confirm('您確定要刪除嗎?')"><i class="fa fa-trash-o"></i> 刪除</a>
      </td>
    </tr>
  <?php endforeach ?>
  <?php else: ?>
    <!-- <tr>
      <td colspan="15"><center>對不起, 沒有資料 !</center></td>
    </tr> -->
  <?php endif; ?>
</table>

<script>
  $("#checkAll").click(function(){
    $('#data-table input:checkbox').not(this).prop('checked', this.checked);
  });
</script>

<script>
$(document).ready(function() {
  $('#data-table').DataTable( {
    // "order": [[ 0, "desc" ]],
    stateSave: true,
    ordering: false,
    bFilter: false,
    // bLengthChange: false,
    "dom": '<"top"iflp<"clear">>',
    "language": {
      "processing":   "處理中...",
      "loadingRecords": "載入中...",
      "lengthMenu":   "顯示 _MENU_ 項結果",
      "zeroRecords":  "沒有符合的結果",
      "emptyTable":   "沒有資料",
      "info":         "顯示第 _START_ 至 _END_ 項結果，共 _TOTAL_ 項",
      "infoEmpty":    "顯示第 0 至 0 項結果，共 0 項",
      "infoFiltered": "(從 _MAX_ 項結果中過濾)",
      "infoPostFix":  "",
      "search":       "搜尋:",
      "paginate": {
          "first":    "第一頁",
          "previous": "上一頁",
          "next":     "下一頁",
          "last":     "最後一頁"
      },
      "aria": {
          "sortAscending":  ": 升冪排列",
          "sortDescending": ": 降冪排列"
      }
    }
  });
});
</script>