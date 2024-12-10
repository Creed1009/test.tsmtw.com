<div class="row">
  <div class="col-md-12">
    <div class="form-group">
      <a href="<?php echo base_url().'admin/'.$this->uri->segment(2) ?>" class="btn btn-info hidden-print"><i class="fa fa-mail-reply"></i> 返回上一頁</a>
    </div>
  </div>
  <div class="col-md-4">
    <div class="content-box-large">
    <?php $attributes = array('class' => 'product_category', 'id' => 'product_category');?>
    <?php echo form_open('admin/products/insert_category', $attributes); ?>
      <div class="form-group">
        <label for="product_category_name">分類名稱</label>
        <input type="text" class="form-control" name="product_category_name">
      </div>
      <div class="form-group">
        <label>上層分類</label>
        <select class="form-control" name="product_category_parent" id="product_category_parent">
          <option value="0">---選擇分類---</option>
          <?php echo get_product_category_option() ?>
        </select>
      </div>
      <div class="form-group">
        <label for="product_category_sort">分類順序</label>
        <input type="text" class="form-control" name="product_category_sort">
      </div>
      <div class="form-group">
        <button type="submit" class="btn btn-primary">新增分類</button>
      </div>
    <?php echo form_close(); ?>
    </div>
  </div>
  <div class="col-md-8">
  	<div class="content-box-large">
  	  <table class="table">
        <thead>
          <tr>
            <th>分類名稱</th>
            <th>順序</th>
            <th>操作</th>
          </tr>
        </thead>
        <tbody>
          <?php get_product_category_td() ?>
        </tbody>
        <!-- <?php if(!empty($category)): foreach ($category as $data): ?>
        <tr>
          <td><?php echo $data['product_category_name'] ?></td>
          <td>
            <a href="/admin/products/edit_category/<?php echo $data['product_category_id'] ?>" class="btn btn-info btn-sm"><i class="fa fa-edit"></i></a>
            <a href="/admin/products/delete_category/<?php echo $data['product_category_id'] ?>" class="btn btn-danger btn-sm" onClick="return confirm('確定要刪除嗎?')"><i class="fa fa-trash-o"></i></a>
          </td>
        </tr>
        <?php endforeach ?>
        <?php else: ?>
          <tr>
            <td colspan="4"><center>對不起, 沒有資料 !</center></td>
          </tr>
        <?php endif; ?> -->
      </table>
  	</div>
  </div>
</div>