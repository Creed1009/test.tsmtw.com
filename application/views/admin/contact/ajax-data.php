<?php // echo $this->ajax_pagination_admin->create_contact(); ?>
<?php $attributes = array('class' => 'contact', 'id' => 'contact'); ?>
<?php echo form_open('admin/contact/multiple_action' , $attributes); ?>
<div class="form-group hide">
  <div class="form-inline">
    <label><input type="checkbox" id="checkAll"> 全選</label>
    <select name="action" id="action" class="form-control">
      <option value="0">--動作--</option>
      <option value="delete">刪除</option>
    </select>
    <button type="submit" class="btn btn-primary">操作</button>
  </div>
</div>

<table class="table table-striped table-bordered table-hover" id="data-table">
  <thead>
    <tr class="info">
      <th>性別</th>
      <th>姓名</th>
      <th>公司</th>
      <th>電話</th>
      <th>電子郵件</th>
      <th>訊息</th>
      <!-- <th>狀態</th>
      <th>操作</th> -->
    </tr>
  </thead>
  <?php if(!empty($contact)): foreach ($contact as $data): ?>
    <tr>
      <!-- <td class="text-center"><input type="checkbox" name="contact_id[]" value="<?php echo $data['contact_id'] ?>"></td> -->
      <!-- <td><?php echo get_user_name($data['contact_name']) ?></td> -->
      <th><?php echo $data['contact_gender'] ?></th>
      <td><?php echo $data['contact_name'] ?></td>
      <td><?php echo $data['contact_company'] ?></td>
      <td><?php echo $data['contact_phone'] ?></td>
      <td><?php echo $data['contact_email'] ?></td>
      <td><?php echo $data['contact_messages'] ?></td>
      <!-- <td><?php echo ($data['contact_is_view']==1)?('<span style="color: blue;">已處理</span>'):('<span style="color: red;">未讀取</span>') ?></td>
      <td>
        <a href="/admin/contact/view/<?php echo $data['contact_id'] ?>" class="btn btn-info btn-sm"><i class="fa fa-eye"></i></a>
        <a href="/admin/contact/delete/<?php echo $data['contact_id'] ?>" class="btn btn-danger btn-sm" onClick="return confirm('您確定要刪除嗎?')"><i class="fa fa-trash-o"></i></a>
      </td> -->
    </tr>
  <?php endforeach ?>
  <?php else: ?>
    <!-- <tr>
      <td colspan="15"><center>對不起, 沒有資料 !</center></td>
    </tr> -->
  <?php endif; ?>
</table>
<?php // echo form_close() ?>

<script>
$(document).ready(function() {
  // $("#checkAll").click(function(){
  //   $('#data-table input:checkbox').not(this).prop('checked', this.checked);
  // });
  $('#data-table').DataTable( {
    "order": [[ 1, "asc" ]],
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