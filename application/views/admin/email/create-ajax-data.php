<?php // echo $this->ajax_pagination_admin->create_links(); ?>
<table class="table table-striped table-bordered table-hover" id="data-table">
  <thead>
    <tr class="info">
      <th><span class="btn btn-primary" onclick="add_all()">全部添加</span></th>
      <th>姓名</th>
      <th>E-mail</th>
      <th>學校</th>
      <!-- <th>操作</th> -->
    </tr>
  </thead>
  <?php if(!empty($users)): foreach($users as $user): ?>
    <tr>
      <td>
        <button type="button" class="btn btn-primary" id="email_<?php echo $user['email']; ?>_btn" onclick="add_to_send('<?php echo $user['email']; ?>');">添加</button>
      </td>
      <td>
        <?php echo $user['name']; ?>
      </td>
      <td class="email_list">
        <input type="hidden" id="<?php echo $user['email'] ?>" value="<?php echo $user['email'] ?>">
        <?php echo $user['email']; ?>
      </td>
      <td>
        <?php echo get_school_name_by_code($user['school']); ?>
      </td>
    </tr>
  <?php endforeach ?>
  <?php else: ?>
    <!-- <tr>
      <td colspan="10"><center>對不起，沒有資料。</center></td>
    </tr> -->
  <?php endif; ?>
</table>

<script>
function add_all(){
  var $inputs = $('.email_list :input');
  $inputs.each(function(index)
  {
    // console.log(index + ': ' + $(this).attr('id'));
    var text = $(this).attr('id');
    // console.log(text);
    add_to_send(text);
  });
}

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