<div class="row">
<?php $attributes = array('class' => 'product', 'id' => 'product');?>
<?php echo form_open('admin/products/update/' . $product['product_id'], $attributes); ?>
  <div class="col-md-12">
    <div class="form-group">
      <button type="submit" class="btn btn-primary">修改</button>
      <a href="<?php echo base_url().'admin/'.$this->uri->segment(2) ?>" class="btn btn-info hidden-print"><i class="fa fa-mail-reply"></i> 返回上一頁</a>
    </div>
  </div>
  <div class="col-md-12">
    <div class="content-box-large">
      <div class="row">
        <div class="col-md-3">
          <div class="form-group">
            <?php if(!empty($manufacturers)): ?>
            <label for="product_manufacturer">商品廠商</label>
            <?php $att = 'id="product_manufacturer" class="form-control chosen" data-rule-required="true"';
            $data = array('0' => '選擇廠商');
            foreach ($manufacturers as $c)
            {
              $data[$c['manufacturer_id']] = $c['manufacturer_name'];
            }
            echo form_dropdown('product_manufacturer', $data, $product['product_manufacturer'], $att); ?>
            <?php else: echo '<label>沒有廠商</label><input type="text" class="form-control" id="product_manufacturer" name="product_manufacturer" value="0" readonly>';
            endif; ?>
          </div>
        </div>

        <div class="col-md-3">
          <div class="form-group">
            <label for="product_title">＊標題</label>
            <input type="text" class="form-control" id="product_title" name="product_title" value="<?php echo $product['product_title'] ?>" required>
          </div>
        </div>

        <div class="col-md-3">
          <div class="form-group">
            <label for="product_price">原價</label>
            <input type="text" class="form-control" id="product_price" name="product_price" value="<?php echo $product['product_price'] ?>">
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-md-3">
          <div class="form-group">
            <label for="product_activity_price">活動價</label>
            <input type="text" class="form-control" id="product_activity_price" name="product_activity_price" value="<?php echo $product['product_activity_price'] ?>">
          </div>
        </div>

        <!-- <div class="col-md-3">
          <div class="form-group">
            <label for="product_option1">其他選項</label>
            <input type="text" class="form-control" id="product_option1" name="product_option1" value="<?php echo $product['product_option1'] ?>">
          </div>
        </div> -->
        <input type="hidden" class="form-control" id="product_option1" name="product_option1" value="<?php echo $product['product_option1'] ?>">

        <!-- <div class="col-md-3">
          <div class="form-group">
            <label for="product_option2">其他選項</label>
            <input type="text" class="form-control" id="product_option2" name="product_option2" value="<?php echo $product['product_option2'] ?>">
          </div>
        </div> -->
        <input type="hidden" class="form-control" id="product_option2" name="product_option2" value="<?php echo $product['product_option2'] ?>">

        <div class="col-md-3">
          <div class="form-group">
            <label for="product_sort">商品順序</label>
            <input type="text" class="form-control" id="product_sort" name="product_sort" value="<?php echo $product['product_sort'] ?>">
          </div>
        </div>

        <div class="col-md-3">
          <label for="product_category">分類</label>
          <div class="form-group" style="max-height: 400px; overflow-y: auto; background: white; padding: 10px; border: 1px solid #ccc;">
            <?php get_product_category_checkbox_checked($product['product_id']) ?>
            <?php if(!empty($category)): ?>
            <?php $att = 'id="category_id" class="form-control chosen" data-rule-required="true"';
            $data = array();
            foreach ($category as $c)
            {
            $data[$c['product_category_id']] = $c['product_category_name'];
            }
            // echo form_dropdown('product_category', $data, $product['product_category'], $att);
            else: echo '<label>沒有分類</label><input type="text" class="form-control" id="product_category" name="product_category" value="0" readonly>';
            endif; ?>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-md-3">
          <div class="form-group">
            <label for="product_on_the_shelf">＊上架日期</label>
            <input type="text" class="form-control datetimepicker" id="product_on_the_shelf" name="product_on_the_shelf" value="<?php echo $product['product_on_the_shelf'] ?>" required>
          </div>
        </div>
        <div class="col-md-3">
          <div class="form-group">
            <label for="product_off_the_shelf">＊下架日期</label>
            <input type="text" class="form-control datetimepicker" id="product_off_the_shelf" name="product_off_the_shelf" value="<?php echo $product['product_off_the_shelf'] ?>" required>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-md-4">
          <div class="form-group" style="border: 1px solid gray; padding: 5px;">
            <label>照片1</label><br>
            <?php if(!empty($product['product_image1'])) { ?>
            <img src="/assets/uploads/<?php echo $product['product_image1']; ?>" id="product_image1_preview" class="img-responsive" style="<?php if (empty($product['product_image1'])) {echo 'display: none';}?>">
            <?php } else { ?>
              <img src="" id="product_image1_preview" class="img-responsive">
            <?php } ?>
            <input type="hidden" id="product_image1" name="product_image1" value="<?php echo $product['product_image1']; ?>"/>
            <a href="/assets/admin/filemanager/dialog.php?type=1&field_id=product_image1&relative_url=1&akey=NshstuPrivateKey" class="btn btn-primary fancybox" type="button">選擇照片</a>
            <span class="btn btn-danger" onclick="cancel_image('1')">移除</span>
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group" style="border: 1px solid gray; padding: 5px;">
            <label>照片2</label><br>
            <?php if(!empty($product['product_image2'])) { ?>
            <img src="/assets/uploads/<?php echo $product['product_image2']; ?>" id="product_image2_preview" class="img-responsive" style="<?php if (empty($product['product_image2'])) {echo 'display: none';}?>">
            <?php } else { ?>
              <img src="" id="product_image2_preview" class="img-responsive">
            <?php } ?>
            <input type="hidden" id="product_image2" name="product_image2" value="<?php echo $product['product_image2']; ?>"/>
            <a href="/assets/admin/filemanager/dialog.php?type=1&field_id=product_image2&relative_url=1&akey=NshstuPrivateKey" class="btn btn-primary fancybox" type="button">選擇照片</a>
            <span class="btn btn-danger" onclick="cancel_image('2')">移除</span>
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group" style="border: 1px solid gray; padding: 5px;">
            <label>照片3</label><br>
            <?php if(!empty($product['product_image3'])) { ?>
            <img src="/assets/uploads/<?php echo $product['product_image3']; ?>" id="product_image3_preview" class="img-responsive" style="<?php if (empty($product['product_image3'])) {echo 'display: none';}?>">
            <?php } else { ?>
              <img src="" id="product_image3_preview" class="img-responsive">
            <?php } ?>
            <input type="hidden" id="product_image3" name="product_image3" value="<?php echo $product['product_image3']; ?>"/>
            <a href="/assets/admin/filemanager/dialog.php?type=1&field_id=product_image3&relative_url=1&akey=NshstuPrivateKey" class="btn btn-primary fancybox" type="button">選擇照片</a>
            <span class="btn btn-danger" onclick="cancel_image('3')">移除</span>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-md-4">
          <div class="form-group" style="border: 1px solid gray; padding: 5px;">
            <label>照片4</label><br>
            <?php if(!empty($product['product_image4'])) { ?>
            <img src="/assets/uploads/<?php echo $product['product_image4']; ?>" id="product_image4_preview" class="img-responsive" style="<?php if (empty($product['product_image4'])) {echo 'display: none';}?>">
            <?php } else { ?>
              <img src="" id="product_image4_preview" class="img-responsive">
            <?php } ?>
            <input type="hidden" id="product_image4" name="product_image4" value="<?php echo $product['product_image4']; ?>"/>
            <a href="/assets/admin/filemanager/dialog.php?type=1&field_id=product_image4&relative_url=1&akey=NshstuPrivateKey" class="btn btn-primary fancybox" type="button">選擇照片</a>
            <span class="btn btn-danger" onclick="cancel_image('4')">移除</span>
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group" style="border: 1px solid gray; padding: 5px;">
            <label>照片5</label><br>
            <?php if(!empty($product['product_image2'])) { ?>
            <img src="/assets/uploads/<?php echo $product['product_image5']; ?>" id="product_image5_preview" class="img-responsive" style="<?php if (empty($product['product_image5'])) {echo 'display: none';}?>">
            <?php } else { ?>
              <img src="" id="product_image5_preview" class="img-responsive">
            <?php } ?>
            <input type="hidden" id="product_image5" name="product_image5" value="<?php echo $product['product_image5']; ?>"/>
            <a href="/assets/admin/filemanager/dialog.php?type=1&field_id=product_image5&relative_url=1&akey=NshstuPrivateKey" class="btn btn-primary fancybox" type="button">選擇照片</a>
            <span class="btn btn-danger" onclick="cancel_image('5')">移除</span>
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group" style="border: 1px solid gray; padding: 5px;">
            <label>照片6</label><br>
            <?php if(!empty($product['product_image3'])) { ?>
            <img src="/assets/uploads/<?php echo $product['product_image6']; ?>" id="product_image6_preview" class="img-responsive" style="<?php if (empty($product['product_image6'])) {echo 'display: none';}?>">
            <?php } else { ?>
              <img src="" id="product_image6_preview" class="img-responsive">
            <?php } ?>
            <input type="hidden" id="product_image6" name="product_image6" value="<?php echo $product['product_image6']; ?>"/>
            <a href="/assets/admin/filemanager/dialog.php?type=1&field_id=product_image6&relative_url=1&akey=NshstuPrivateKey" class="btn btn-primary fancybox" type="button">選擇照片</a>
            <span class="btn btn-danger" onclick="cancel_image('6')">移除</span>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-md-12">
          <div class="form-group">
            <label for="product_description">描述 *</label>
            <textarea class="form-control tinymce" name="product_description" id="product_description" cols="30" rows="3"><?php echo $product['product_description'] ?></textarea>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-md-12">
          <div class="form-group">
            <label for="product_content">資訊 *</label>
            <textarea class="form-control tinymce" name="product_content" id="product_content" cols="30" rows="10"><?php echo $product['product_content'] ?></textarea>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-md-12">
          <div class="form-group">
            <label for="product_remark">備註 *</label>
            <textarea class="form-control tinymce" name="product_remark" id="product_remark" cols="30" rows="10"><?php echo $product['product_remark'] ?></textarea>
          </div>
        </div>
      </div>

    </div>
  </div>
  <?php echo form_close(); ?>
</div>

<script src="/node_modules/jquery-validation/dist/jquery.validate.min.js"></script>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.min.js"></script> -->
<script src="/node_modules/jquery-validation/dist/localization/messages_zh_TW.js"></script>
<script>
$.validator.setDefaults({
    submitHandler: function() {
        document.getElementById("product").submit();
        //alert("submitted!");
    }
});

function cancel_image(id){
  $('#product_image'+id+'_preview').attr('src','');
  $('#product_image'+id).val('');
}
</script>