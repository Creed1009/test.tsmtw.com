<div class="row">
	<div class="col-md-12">
		<div class="form-group">
			<a href="<?php echo base_url().'admin/'.$this->uri->segment(2) ?>" class="btn btn-info hidden-print"><i class="fa fa-mail-reply"></i> 返回上一頁	</a>
		</div>
	</div>
	<div class="col-md-6">
		<div class="content-box-large">
			<?php $attributes = array('class' => 'download_category', 'id' => 'download_category');?>
			<?php echo form_open('admin/downloads/update_category/' . $category['download_category_id'], $attributes); ?>
			  	<div class="form-group">
			    	<label for="download_category_name">分類名稱</label>
			    	<input type="text" class="form-control" name="download_category_name" value="<?php echo $category['download_category_name']; ?>">
			  	</div>
			    <div class="form-group">
			  		<button type="submit" class="btn btn-primary">修改</button>
			  	</div>
			<?php echo form_close(); ?>
		</div>
	</div>
</div>