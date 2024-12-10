<div class="row">
	<div class="col-md-12">
		<a href="<?php echo base_url(),$this->uri->segment(1) ?>/category" class="btn btn-info hidden-print"><i class="fa fa-mail-reply"></i> 返回上一頁</a>
		<hr>
	</div>
	<div class="col-md-6">
		<div class="content-box-large">
			<?php $attributes = array('class' => 'message_category', 'id' => 'message_category');?>
			<?php echo form_open('admin/messages/update_category/' . $category['message_category_id'], $attributes); ?>
			  	<div class="form-group">
			    	<label for="message_category_name">分類名稱</label>
			    	<input type="text" class="form-control" name="message_category_name" value="<?php echo $category['message_category_name']; ?>">
			  	</div>
			    <div class="form-group">
			  		<button type="submit" class="btn btn-primary">修改</button>
			  	</div>
			<?php echo form_close(); ?>
		</div>
	</div>
</div>