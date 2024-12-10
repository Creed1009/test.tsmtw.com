<?php echo $this->ajax_pagination_admin->create_links(); ?>
<?php $attributes = array('class' => 'submit_form', 'id' => 'submit_form'); ?>
<?php echo form_open('admin/users/multiple_action' , $attributes); ?>

<?php if($this->ion_auth->is_admin()){ ?>
<div class="form-group">
  <div class="form-inline">
    <select name="action" id="action" class="form-control">
      <option value="">選擇項目</option>
      <option value="delete">刪除</option>
      <!-- <option value="export">匯出</option> -->
    </select>
    <button type="submit" class="btn btn-primary" onClick="return confirm('您確定要執行此操作嗎?')">操作</button>
  </div>
</div>
<?php } ?>

<table class="table table-striped table-bordered table-hover" id="data-table">
  <thead>
    <tr class="info">
      <th class="text-center"><input type="checkbox" id="checkAll"></th>
      <th>帳號</th>
      <th>編號</th>
      <th>姓名</th>
      <th>學校</th>
      <th>會員屬性</th>
      <th>權利狀態</th>
      <th>操作</th>
    </tr>
  </thead>
  <?php if(!empty($users)): foreach($users as $user): ?>
    <tr>
      <td class="text-center"><input type="checkbox" name="user_id[]" value="<?php echo $user['user_id'] ?>"></td>
      <td><?php echo $user['username'] ?></td>
      <td><?php echo $user['member_number'] ?></td>
      <td><?php echo $user['name'] ?></td>
      <td><?php echo get_school_name_by_code($user['school']) ?></td>
      <td>
        <?php
        echo get_user_certification($user['certification']);
        if($user['certification']!=2){
          echo ' '.$user['certification_year'];
        }
        // if(!empty(get_user_group($user['user_id']))){ foreach(get_user_group($user['user_id']) as $group){
        //   echo '['.$group['description'].']';
        // }}
        ?>
      </td>
      <td>
        <?php echo ($user['active']==1)?('正常會員'):('停權會員') ?>
      </td>
      <td>
        <?php if($this->ion_auth->is_admin()){ ?>
        <a href="/admin/users/edit_user/<?php echo $user['user_id'] ?>" class="btn btn-info btn-sm" target="_blank"><i class="fa fa-edit"></i> 編輯</a>
        <?php // echo ($user['active']) ? anchor("admin/users/deactivate/".$user['user_id'], 'Email已認證', 'class="btn btn-success btn-sm"') : anchor("admin/users/activate/". $user['user_id'], 'Email未認證', 'class="btn btn-danger btn-sm"');?>
        <!-- <a href="/admin/users/delete_user/<?php echo $user['user_id'] ?>" class="btn btn-danger btn-sm" onClick="return confirm('您確定要刪除嗎?')"><i class="fa fa-trash-o"></i> 刪除</a> -->
        <?php } ?>
      </td>
    </tr>
  <?php endforeach ?>
  <?php else: ?>
    <tr>
      <td colspan="15"><center>對不起, 沒有資料 !</center></td>
    </tr>
  <?php endif; ?>
</table>
<?php echo form_close() ?>

<script>
$(document).ready(function() {
  $("#checkAll").click(function(){
    $('#data-table input:checkbox').not(this).prop('checked', this.checked);
  });
  // $('#data-table').DataTable( {
  //   // "order": [[ 0, "desc" ]],
  //   stateSave: true,
  //   // ordering: false,
  //   bFilter: false,
  //   // bLengthChange: false,
  //   "dom": '<"top"iflp<"clear">>',
  //   "language": {
  //     "processing":   "處理中...",
  //     "loadingRecords": "載入中...",
  //     "lengthMenu":   "顯示 _MENU_ 項結果",
  //     "zeroRecords":  "沒有符合的結果",
  //     "emptyTable":   "沒有資料",
  //     "info":         "顯示第 _START_ 至 _END_ 項結果，共 _TOTAL_ 項",
  //     "infoEmpty":    "顯示第 0 至 0 項結果，共 0 項",
  //     "infoFiltered": "(從 _MAX_ 項結果中過濾)",
  //     "infoPostFix":  "",
  //     "search":       "搜尋:",
  //     "paginate": {
  //         "first":    "第一頁",
  //         "previous": "上一頁",
  //         "next":     "下一頁",
  //         "last":     "最後一頁"
  //     },
  //     "aria": {
  //         "sortAscending":  ": 升冪排列",
  //         "sortDescending": ": 降冪排列"
  //     }
  //   }
  // });
});
</script>