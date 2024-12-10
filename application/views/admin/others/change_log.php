<div class="row">
	<div class="col-md-6">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-hover" id="data-table">
			  	<thead>
			    	<tr class="info">
						<th>
							會員
						</th>
						<th>
							修改欄位
						</th>
						<th>
							修改者
						</th>
						<th>
							修改時間
						</th>
					</tr>
			  	</thead>
			  	<?php if(!empty($change_log)) { foreach($change_log as $cl) { ?>
			        <tr>
			          	<td>
			            	<?php echo get_user_name($cl['change_log_column_id']) ?>
			          	</td>
			          	<td>
			            	<?php echo get_column_name($cl['change_log_key']) ?>
			          	</td>
			          	<td>
				            <?php echo get_user_name($cl['change_log_creator_id']) ?>
			          	</td>
			          	<td>
				            <?php echo $cl['change_log_created_at'] ?>
			          	</td>
			        </tr>
			    <?php }} ?>
			</table>
		</div>
	</div>
</div>