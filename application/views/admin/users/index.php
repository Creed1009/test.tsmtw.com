<div class="row">
	<div class="col-md-4">
		<div class="form-group">
      <?php if($this->ion_auth->is_admin()){ ?>
  		  <a href="/admin/users/create_user" class="btn btn-primary">新增會員</a>
        <!-- 短的資料 -->
        <a href="/admin/export/users_quick?type=csv" class="btn btn-info">匯出會員</a>
        <a href="/admin/import/quick_users" class="btn btn-success">匯入會員</a>
        <!-- 長的資料 -->
        <!-- <a href="/admin/export/users?type=csv" class="btn btn-info">匯出會員</a> -->
        <!-- <a href="/admin/import/users" class="btn btn-success">匯入會員</a> -->
      <?php } else { ?>
        <a href="/admin/export/users_quick?type=csv" class="btn btn-info">匯出會員</a>
        <span class="btn btn-success" onclick="$('#upload_area').show();">上傳會員</span>
      <?php } ?>
  	</div>
	</div>
	<div class="col-md-8">
  	<div class="form-inline text-right">
      <input type="text" id="keywords" class="form-control" placeholder="關鍵字..." onkeyup="searchFilter()"/>
      <!-- <input type="hidden" id="keywords"> -->
      <input type="hidden" id="sortBy">
      <input type="hidden" id="status">
      <?php if($this->ion_auth->in_group('admin')){ ?>
        <div class="pull-right">
          <select id="category" class="form-control chosen" onchange="searchFilter()">
            <option value="">---選擇學校---</option>
            <?php foreach ($schools as $school) {
              echo '<option value='.$school['school_code'].'>'.$school['school_code'].' - '.$school['school_name'].'</option>';
            } ?>
          </select>
        </div>
      <?php } else { ?>
        <input type="hidden" id="category">
      <?php } ?>
      <select id="category2" class="form-control" onchange="searchFilter()">
        <option value="">---會員屬性---</option>
        <option value="1">一般會員</option>
        <option value="2">無效會員</option>
        <option value="3">特殊會員</option>
      </select>
    	<!-- <select id="sortBy" class="form-control" onchange="searchFilter()">
        <option value="0">排序</option>
        <option value="asc">升冪</option>
        <option value="desc">降冪</option>
    	</select> -->
  	</div>
	</div>
  <div class="col-md-12" id="upload_area" style="display: none;">
    <form id="submit" action="<?php echo base_url();?>admin/upload/do_upload" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <input type="file" class="form-control" name="file" id="file">
            <button class="btn btn-success" type="submit">上傳</button>
        </div>
    </form>
  </div>
</div>

<div class="table-responsive" id="datatable">
  <?php require('ajax-data.php'); ?>
</div>

<script type="text/javascript">
$(document).ready(function() {
    $('#submit').submit(function(e) {
        e.preventDefault();
        $.ajax({
            url: '<?php echo base_url();?>admin/upload/do_upload',
            type: "post",
            data: new FormData(this),
            processData: false,
            contentType: false,
            cache: false,
            async: false,
            success: function(file_name) {
                // alert("Upload Image Successful.");
                $('#upload_area').hide();
                alert(file_name);
            }
        });
    });
});
</script>