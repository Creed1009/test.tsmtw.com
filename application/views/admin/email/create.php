<div class="row">
	<div class="col-md-10 col-md-offset-1">

		<button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal">添加E-mail</button>
		<button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal2">添加訂閱者E-mail</button>
		<!-- <a href="/admin/email/process" class="btn btn-primary" target="_new">開啟電子郵件寄送排程</a> -->
		<a href="<?php echo base_url().'admin/'.$this->uri->segment(2) ?>" class="btn btn-info hidden-print"><i class="fa fa-mail-reply"></i> 返回上一頁</a>
		<div class="mail-page">
		    <div class="mail-content" style="margin-left: 0px;">
		        <div class="mail-compose form-horizontal" action="#">
		            <div class="form-group">
		            	<input type="text" class="form-control" id="email" placeholder="To">
		            </div>
		            <div class="form-group">
		            	<input type="text" class="form-control" id="subject" placeholder="郵件標題...">
		            </div>
		            <div class="form-group">
		            	<label>郵件內容</label>
		            	<textarea class="form-control tinymce1" id="body" rows="20" placeholder="郵件內容..."></textarea>
		            </div>
		            <div class="form-group">
		            	<label>簽名檔</label>
		            	<textarea class="form-control tinymce1" id="body_footer" rows="5">
		            		<?php echo get_setting_general('mail_footer') ?>
		            	</textarea>
		            </div>
		            <div class="form-group">
		            	<!-- <span type="submit" class="btn btn-primary" onclick="send()">
		            		<i class="fa fa-rocket"></i> 立即寄送
		            	</span> -->
		            	<span type="submit" class="btn btn-primary" onclick="add_to_process()">加入排程</span>
		            	<span type="submit" class="btn btn-default" onclick="cancel()">取消</span>
		            </div>
		        </div>
		    </div>
		</div>

	</div>
</div>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">添加寄送電子郵件</h4>
            </div>
            <div class="modal-body">
                <div class="form-inline text-right">
                    <!-- <input type="text" class="form-control" id="關鍵字..." onkeyup="getUsers()"/> -->
                    <div class="row">
                    	<div class="col-md-8"></div>
                    	<div class="col-md-4">
		                    <select class="form-control chosen" id="category" name="category" onchange="getUsers()">
		                        <option value="">---選擇學校---</option>
		                        <?php if(!empty($schools)) { foreach($schools as $school) { ?>
		                        	<option value="<?php echo $school['school_code'] ?>"><?php echo $school['school_code'] ?> - <?php echo $school['school_name'] ?></option>
		                        <?php }} ?>
		                    </select>
	                    </div>
                    </div>
                    <!-- <select id="sortBy" class="form-control" onchange="getUsers()">
		              	<option value=""><?php echo $this->lang->line('sort'); ?></option>
		              	<option value="asc"><?php echo $this->lang->line('sort_asc'); ?></option>
		              	<option value="desc"><?php echo $this->lang->line('sort_desc'); ?></option>
		            </select> -->
                </div>
                <div class="table-responsive" id="datatable">
                    <?php require('create-ajax-data.php') ?>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">關閉</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModal2Label">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModal2Label">添加寄送電子郵件</h4>
            </div>
            <div class="modal-body">
                <div class="form-inline text-right">
                    <!-- <input type="text" class="form-control" id="關鍵字..." onkeyup="getUsers()"/> -->
                    <div class="row hide">
                    	<div class="col-md-8"></div>
                    	<div class="col-md-4">
		                    <select class="form-control chosen" id="category" name="category" onchange="getUsers()">
		                        <option value="">---選擇訂閱者---</option>
		                        <?php if(!empty($subscription)) { foreach($subscription as $sub) { ?>
		                        	<option value="<?php echo $sub['subscription_email'] ?>"><?php echo $sub['subscription_email'] ?></option>
		                        <?php }} ?>
		                    </select>
	                    </div>
                    </div>
                </div>
                <div class="table-responsive" id="datatable">
					<table class="table table-striped table-bordered table-hover" id="subscription-data-table">
					  <thead>
					    <tr class="info">
					      <th><span class="btn btn-primary" onclick="add_all_subscription()">全部添加</span></th>
					      <th>E-mail</th>
					      <!-- <th>操作</th> -->
					    </tr>
					  </thead>
					  <?php if(!empty($subscription)): foreach($subscription as $sub): ?>
					    <tr>
					      <td>
					        <button type="button" class="btn btn-primary" id="email_<?php echo $sub['subscription_email']; ?>_btn" onclick="add_to_send('<?php echo $sub['subscription_email']; ?>');">添加</button>
					      </td>
					      <td class="subscription_email_list">
					        <input type="hidden" id="<?php echo $sub['subscription_email'] ?>" value="<?php echo $sub['subscription_email'] ?>">
					        <?php echo $sub['subscription_email']; ?>
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
					function add_all_subscription(){
					  var $inputs = $('.subscription_email_list :input');
					  $inputs.each(function(index)
					  {
					    // console.log(index + ': ' + $(this).attr('id'));
					    var text = $(this).attr('id');
					    // console.log(text);
					    add_to_send(text);
					  });
					}

					$(document).ready(function() {
					  $('#subscription-data-table').DataTable( {
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
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">關閉</button>
            </div>
        </div>
    </div>
</div>

<script>
	function getUsers(page_num) {
	    page_num = page_num ? page_num : 0;
	    // var keywords = $('#keywords').val();
	    // var sortBy   = $('#sortBy').val();
	    // var category = $('#category').val();
	    // var keywords = document.getElementById("keywords").value;
	    // var sortBy = document.getElementById("sortBy").value;
	    var category = document.getElementById("category").value;
	    $.ajax({
	        type: 'GET',
	        url: '/admin/email/create_ajaxData/' + page_num,
	        data: 'page=' + page_num + '&category=' + category,
	        beforeSend: function() {
	            $('#loading').show();
	        },
	        success: function(html) {
	            $('#datatable').html(html);
	            $('#loading').fadeOut("fast");
	        }
	    });
	}

	function add_to_send(data) {
		var email = document.getElementById("email").value;
		document.getElementById('email').value = email+','+data;
		document.getElementById("email_"+data+"_btn").disabled = true;
	}

	function send() {
		var email = $("#email").val();
		var subject = $("#subject").val();
		// var body = tinyMCE.activeEditor.getContent();
		var body = tinyMCE.get('body').getContent();
		var footer = tinyMCE.get('body_footer').getContent();
    	$.ajax({
            url: "<?php echo base_url(); ?>admin/email/send",
            method: "POST",
            data: { email: email, subject: subject, body: body, footer: footer },
            beforeSend: function () {
	            $('#loading').show();
	        },
            success: function(data) {
            	if(data==0){
            		alert('錯誤！電子郵件寄送失敗。');
            		$('#loading').fadeOut("fast");
            	} else {
                    alert('電子郵件寄送成功。');
                    $("#email").val('');
					$("#subject").val('');
					// $("#body").val('');
					tinyMCE.activeEditor.setContent('');
					$("#email").focus();
					$('#loading').fadeOut("fast");
                }
            }
        });
	}

	function add_to_process() {
		var email = $("#email").val();
		var subject = $("#subject").val();
		// var body = $("#body").val();
		// var body = tinyMCE.activeEditor.getContent();
		var body = tinyMCE.get('body').getContent();
		var footer = tinyMCE.get('body_footer').getContent();
    	$.ajax({
            url: "<?php echo base_url(); ?>admin/email/add_to_process",
            method: "POST",
            data: { email: email, subject: subject, body: body, footer: footer },
            beforeSend: function () {
	            $('#loading').show();
	        },
            success: function(data) {
            	if(data==0){
            		alert('錯誤！電子郵件加入排程失敗。');
            		$('#loading').fadeOut("fast");
            	} else {
                    alert('電子郵件加入排程成功。');
                    $("#email").val('');
					$("#subject").val('');
					// $("#body").val('');
					tinyMCE.activeEditor.setContent('');
					$("#email").focus();
					$('#loading').fadeOut("fast");
                }
            }
        });
	}

	function cancel() {
		$("#email").val('');
		$("#subject").val('');
		// tinyMCE.activeEditor.setContent('');
		tinymce.get('body').setContent('');
		// tinymce.get('body_footer').setContent('');
		$("#email").focus();
	}

	function add_product_option()
	{
	    var checkboxes = document.getElementsByName('add_product_option');
	    var selected = [];
	    for (var i=0; i<checkboxes.length; i++) {
	        if (checkboxes[i].checked) {
	            selected.push(checkboxes[i].value);
	        }
	    }
	    //alert(selected);
	    //$("#all_option").html(selected+',');
	    document.getElementById('add_product_option').value = selected+',';
	    //var option3 = document.getElementById("option3").value;
	}
</script>