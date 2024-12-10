<table class="table table-striped table-bordered table-hover" id="data-table">
  <thead>
    <tr class="info">
      <th>頁面名稱</th>
      <th>頁面英文名稱</th>
      <th>加到選單</th>
      <th>選單順序</th>
      <th>操作</th>
    </tr>
  </thead>
  <?php if(!empty($page)): foreach ($page as $data): ?>
    <tr>
      <td><?php echo $data['page_name'] ?></td>
      <td><?php echo $data['page_name_en'] ?></td>
      <td><?php echo ($data['page_to_menu']==1)?('●'):('') ?></td>
      <td><?php echo $data['page_menu_sort'] ?></td>
      <td>
        <a href="/admin/pages/edit/<?php echo $data['page_id'] ?>" class="btn btn-info btn-sm"><i class="fa fa-edit"></i> 編輯</a>
        <?php if($data['creator_id']!=0){ ?>
          <a href="/admin/pages/delete/<?php echo $data['page_id'] ?>" class="btn btn-danger btn-sm" onClick="return confirm('您確定要刪除嗎?')"><i class="fa fa-trash-o"></i></a>
        <?php } ?>
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