<div class="row">
	<div class="col-md-12">
		<div class="form-group">
			<a href="<?php echo base_url().'admin/'.$this->uri->segment(2) ?>" class="btn btn-info hidden-print"><i class="fa fa-mail-reply"></i> 返回上一頁	</a>
		</div>
	</div>
	<div class="col-md-6">
		<div class="content-box-large">
			<?php $attributes = array('class' => 'product_category', 'id' => 'product_category');?>
			<?php echo form_open('admin/products/update_category/' . $category['product_category_id'], $attributes); ?>
			  	<div class="form-group">
			    	<label for="product_category_name">分類名稱</label>
			    	<input type="text" class="form-control" name="product_category_name" value="<?php echo $category['product_category_name']; ?>">
			  	</div>
			  	<div class="form-group">
			        <label>上層分類</label>
			        <select class="form-control" name="product_category_parent" id="product_category_parent">
			          	<option value="0">---選擇分類---</option>
			          	<?php echo get_product_category_option(0,'',$category['product_category_parent']) ?>
			        </select>
			    </div>
			    <div class="form-group">
			    	<label for="product_category_sort">分類順序</label>
			    	<input type="text" class="form-control" name="product_category_sort" value="<?php echo $category['product_category_sort']; ?>">
			  	</div>
			    <div class="form-group">
			  		<button type="submit" class="btn btn-primary">修改</button>
			  	</div>
			<?php echo form_close(); ?>
		</div>
	</div>
</div>