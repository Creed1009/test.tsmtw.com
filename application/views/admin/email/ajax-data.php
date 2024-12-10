<?php echo $this->ajax_pagination_admin->create_links(); ?>
<table class="table table-striped table-bordered table-hover" id="data-table">
  <thead>
    <tr class="info">
      <th>收件人</th>
      <th>主旨</th>
      <!-- <th>內容</th> -->
      <th>狀態</th>
      <th>操作</th>
    </tr>
  </thead>
  <?php if(!empty($email)): foreach ($email as $data): ?>
    <tr>
      <td><?php echo $data['email'] ?></td>
      <td><?php echo $data['subject'] ?></td>
      <!-- <td><?php echo $data['body'] ?></td> -->
      <td><?php echo ($data['is_send']=='y'?$data['sended_at']:'未寄送') ?></td>
      <td>
        <a href="/admin/email/send_now/<?php echo $data['id'] ?>" class="btn btn-success btn-sm">馬上寄送</a>
        <a href="/admin/email/edit/<?php echo $data['id'] ?>" class="btn btn-info btn-sm" target="_blank"><i class="fa fa-edit"></i></a>
        <a href="/admin/email/delete/<?php echo $data['id'] ?>" class="btn btn-danger btn-sm" onClick="return confirm('您確定要刪除嗎?')"><i class="fa fa-trash-o"></i></a>
      </td>
    </tr>
  <?php endforeach ?>
  <?php else: ?>
    <tr>
      <td colspan="15"><center>對不起, 沒有資料 !</center></td>
    </tr>
  <?php endif; ?>
</table>

<!-- <script>
$(document).ready(function() {
  $('#data-table').DataTable( {
    "order": [[ 0, "desc" ]],
    stateSave: true,
    "dom": '<"top"iflp<"clear">>rt<"bottom"iflp<"clear">>',
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
          "sortAscending":  ": <?php echo $this->lang->line('sort_asc'); ?>",
          "sortDescending": ": <?php echo $this->lang->line('sort_desc'); ?>"
      }
    }
  });
});
</script> -->