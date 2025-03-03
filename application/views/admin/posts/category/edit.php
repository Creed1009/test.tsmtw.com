<div class="row">
	<div class="col-md-12">
		<div class="form-group">
			<a href="<?php echo base_url().'admin/'.$this->uri->segment(2) ?>" class="btn btn-info hidden-print"><i class="fa fa-mail-reply"></i> 返回上一頁</a>
		</div>
	</div>
	<div class="col-md-6">
		<div class="content-box-large">
			<?php $attributes = array('class' => 'post_category', 'id' => 'post_category');?>
			<?php echo form_open('admin/posts/update_category/' . $category['post_category_id'], $attributes); ?>
			<div class="form-group">
			<label for="post_category_name">分類名稱</label>
			<input type="text" class="form-control" name="post_category_name" value="<?php echo $category['post_category_name']; ?>">
			</div>
			<div class="form-group">
				<label for="post_category_name_en">分類英文名稱</label>
				<input type="text" class="form-control" name="post_category_name_en" value="<?php echo $category['post_category_name_en']; ?>">
				</div>
			<div class="form-group">
				<label for="post_category_show_home">顯示在首頁</label>
				<select name="post_category_show_home" id="post_category_show_home" class="form-control">
					<option value="1" <?php echo ($category['post_category_show_home']=='1')?('selected'):('') ?>>顯示</option>
					<option value="0" <?php echo ($category['post_category_show_home']=='0')?('selected'):('') ?>>不顯示</option>
				</select>
			</div>
			<div class="form-group">
				<label for="post_category_sort">分類順序</label>
				<input type="text" class="form-control" name="post_category_sort" value="<?php echo $category['post_category_sort']; ?>">
			</div>
			<div class="form-group">
				<button type="submit" class="btn btn-primary">修改</button>
			</div>
			<?php echo form_close(); ?>
		</div>
	</div>
</div>