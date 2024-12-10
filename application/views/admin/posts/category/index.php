<div class="row">
  <div class="col-md-12">
    <div class="form-group">
      <a href="<?php echo base_url().'admin/'.$this->uri->segment(2) ?>" class="btn btn-info hidden-print"><i class="fa fa-mail-reply"></i> 返回上一頁 </a>
    </div>
  </div>
  <div class="col-md-4">
    <div class="content-box-large">
    <?php $attributes = array('class' => 'post_category', 'id' => 'post_category');?>
    <?php echo form_open('admin/posts/insert_category', $attributes); ?>
      <div class="form-group">
        <label for="post_category_name">分類名稱</label>
        <input type="text" class="form-control" name="post_category_name">
      </div>
      <div class="form-group">
        <label for="post_category_name_en">分類英文名稱</label>
        <input type="text" class="form-control" name="post_category_name_en">
      </div>
      <div class="form-group">
        <label for="post_category_show_home">顯示在首頁</label>
        <select name="post_category_show_home" id="post_category_show_home" class="form-control">
          <option value="1" selected="">顯示</option>
          <option value="0">不顯示</option>
        </select>
      </div>
      <div class="form-group">
        <label for="post_category_sort">分類順序</label>
        <input type="text" class="form-control" name="post_category_sort" value="10">
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
            <th>分類英文名稱</th>
            <th>顯示在首頁</th>
            <th>順序</th>
            <th>操作</th>
          </tr>
        </thead>
        <?php if(!empty($category)): foreach ($category as $data): ?>
        <tr>
          <td><?php echo $data['post_category_name'] ?></td>
          <td><?php echo $data['post_category_name_en'] ?></td>
          <td><?php echo ($data['post_category_show_home']=='1')?('●'):('') ?></td>
          <td><?php echo $data['post_category_sort'] ?></td>
          <td>
            <a href="/admin/posts/edit_category/<?php echo $data['post_category_id'] ?>" class="btn btn-info btn-sm"><i class="fa fa-edit"></i></a>
            <a href="/admin/posts/delete_category/<?php echo $data['post_category_id'] ?>" class="btn btn-danger btn-sm" onClick="return confirm('確定要刪除嗎?')"><i class="fa fa-trash-o"></i></a>
          </td>
        </tr>
        <?php endforeach ?>
        <?php else: ?>
          <tr>
            <td colspan="4"><center>對不起, 沒有資料 !</center></td>
          </tr>
        <?php endif; ?>
      </table>
  	</div>
  </div>
</div>