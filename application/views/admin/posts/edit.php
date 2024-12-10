<div class="row">
<?php $attributes = array('class' => 'post', 'id' => 'post');?>
<?php echo form_open('admin/posts/update/' . $post['post_id'], $attributes); ?>
  <div class="col-md-12">
    <div class="form-group">
      <button type="submit" class="btn btn-primary">修改</button>
      <a href="<?php echo base_url().'admin/'.$this->uri->segment(2) ?>" class="btn btn-info hidden-print"><i class="fa fa-mail-reply"></i> 返回上一頁</a>
    </div>
  </div>
  <div class="col-md-12">
    <div class="content-box-large">
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label for="post_title">＊標題</label>
            <input type="text" class="form-control" id="post_title" name="post_title" value="<?php echo $post['post_title'] ?>" required>
          </div>
        </div>

        <div class="col-md-3">
          <div class="form-group">
            <?php if(!empty($category)): ?>
            <label for="post_category">分類</label>
            <?php $att = 'id="category_id" class="form-control chosen" data-rule-required="true"';
            $data = array();
            foreach ($category as $c){
            $data[$c['post_category_id']] = $c['post_category_name'];
            }
            echo form_dropdown('post_category', $data, $post['post_category'], $att);
            else: echo '<label>沒有分類</label><input type="text" class="form-control" id="post_category" name="post_category" value="0" readonly>';
            endif; ?>
          </div>
        </div>

        <div class="col-md-3">
          <div class="form-group">
            <label for="post_topping">置頂</label>
            <select name="post_topping" id="post_topping" class="form-control">
              <option value="0" <?php echo ($post['post_topping']=='0')?('selected'):('') ?>>否</option>
              <option value="1" <?php echo ($post['post_topping']=='1')?('selected'):('') ?>>是</option>
            </select>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-md-3">
          <div class="form-group">
            <label for="post_on_the_shelf">＊上架日期</label>
            <input type="text" class="form-control datetimepicker" id="post_on_the_shelf" name="post_on_the_shelf" value="<?php echo $post['post_on_the_shelf'] ?>" required>
          </div>
        </div>
        <div class="col-md-3">
          <div class="form-group">
            <label for="post_off_the_shelf">下架日期</label>
            <input type="text" class="form-control datetimepicker" id="post_off_the_shelf" name="post_off_the_shelf" value="<?php echo $post['post_off_the_shelf'] ?>" >
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-md-12">
          <div class="form-group">
            <label for="post_content">描述</label>
            <textarea class="form-control tinymce" name="post_content" id="post_content" cols="30" rows="8"><?php echo $post['post_content'] ?></textarea>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-md-6">
          <div style="border: 1px solid #888; padding: 15px;">
            <div class="form-group">
              <label for="post_link1">連結1</label>
              <input type="text" class="form-control" id="post_link1" name="post_link1" value="<?php echo $post['post_link1'] ?>">
            </div>
            <div class="form-group">
              <label for="post_link_name1">連結名稱1</label>
              <input type="text" class="form-control" id="post_link_name1" name="post_link_name1" value="<?php echo $post['post_link_name1'] ?>">
            </div>
          </div>
          <div style="border: 1px solid #888; padding: 15px;">
            <div class="form-group">
              <label for="post_link2">連結2</label>
              <input type="text" class="form-control" id="post_link2" name="post_link2" value="<?php echo $post['post_link2'] ?>">
            </div>
            <div class="form-group">
              <label for="post_link_name2">連結名稱2</label>
              <input type="text" class="form-control" id="post_link_name2" name="post_link_name2" value="<?php echo $post['post_link_name2'] ?>">
            </div>
          </div>
          <div style="border: 1px solid #888; padding: 15px;">
            <div class="form-group">
              <label for="post_link3">連結3</label>
              <input type="text" class="form-control" id="post_link3" name="post_link3" value="<?php echo $post['post_link3'] ?>">
            </div>
            <div class="form-group">
              <label for="post_link_name3">連結名稱3</label>
              <input type="text" class="form-control" id="post_link_name3" name="post_link_name3" value="<?php echo $post['post_link_name3'] ?>">
            </div>
          </div>
          <div style="border: 1px solid #888; padding: 15px;">
            <div class="form-group">
              <label for="post_link4">連結4</label>
              <input type="text" class="form-control" id="post_link4" name="post_link4" value="<?php echo $post['post_link4'] ?>">
            </div>
            <div class="form-group">
              <label for="post_link_name4">連結名稱4</label>
              <input type="text" class="form-control" id="post_link_name4" name="post_link_name4" value="<?php echo $post['post_link_name4'] ?>">
            </div>
          </div>
          <div style="border: 1px solid #888; padding: 15px;">
            <div class="form-group">
              <label for="post_link5">連結5</label>
              <input type="text" class="form-control" id="post_link5" name="post_link5" value="<?php echo $post['post_link5'] ?>">
            </div>
            <div class="form-group">
              <label for="post_link_name5">連結名稱5</label>
              <input type="text" class="form-control" id="post_link_name5" name="post_link_name5" value="<?php echo $post['post_link_name5'] ?>">
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div style="border: 1px solid gray; padding: 15px;">
            <div class="form-group">
              <label>附加檔案1</label><br>
              <img src="" id="post_file1_preview" class="img-responsive hide" style="display: none;">
              <input type="text" class="form-control" id="post_file1" name="post_file1" value="<?php echo $post['post_file1'] ?>" readonly="">
              <a href="/assets/admin/filemanager/dialog.php?&field_id=post_file1&relative_url=1&akey=NshstuPrivateKey" class="btn btn-primary fancybox" type="button" style="margin-top:5px;">選擇附加檔案</a>
              <span class="btn btn-danger" onclick="cancel_file('post_file1');cancel_file('post_file_name1');" style="margin-top:5px;">移除</span>
            </div>
            <div class="form-group">
              <label for="post_file_name1">附加檔案名稱1</label>
              <input type="text" class="form-control" id="post_file_name1" name="post_file_name1" value="<?php echo $post['post_file_name1'] ?>">
            </div>
          </div>
          <div style="border: 1px solid gray; padding: 15px;">
            <div class="form-group">
              <label>附加檔案2</label><br>
              <img src="" id="post_file2_preview" class="img-responsive hide" style="display: none;">
              <input type="text" class="form-control" id="post_file2" name="post_file2" value="<?php echo $post['post_file2'] ?>" readonly="">
              <a href="/assets/admin/filemanager/dialog.php?&field_id=post_file2&relative_url=1&akey=NshstuPrivateKey" class="btn btn-primary fancybox" type="button" style="margin-top:5px;">選擇附加檔案</a>
              <span class="btn btn-danger" onclick="cancel_file('post_file2');cancel_file('post_file_name2');" style="margin-top:5px;">移除</span>
            </div>
            <div class="form-group">
              <label for="post_file_name2">附加檔案名稱2</label>
              <input type="text" class="form-control" id="post_file_name2" name="post_file_name2" value="<?php echo $post['post_file_name2'] ?>">
            </div>
          </div>
          <div style="border: 1px solid gray; padding: 15px;">
            <div class="form-group">
              <label>附加檔案3</label><br>
              <img src="" id="post_file3_preview" class="img-responsive hide" style="display: none;">
              <input type="text" class="form-control" id="post_file3" name="post_file3" value="<?php echo $post['post_file3'] ?>" readonly="">
              <a href="/assets/admin/filemanager/dialog.php?&field_id=post_file3&relative_url=1&akey=NshstuPrivateKey" class="btn btn-primary fancybox" type="button" style="margin-top:5px;">選擇附加檔案</a>
              <span class="btn btn-danger" onclick="cancel_file('post_file3');cancel_file('post_file_name3');" style="margin-top:5px;">移除</span>
            </div>
            <div class="form-group">
              <label for="post_file_name3">附加檔案名稱3</label>
              <input type="text" class="form-control" id="post_file_name3" name="post_file_name3" value="<?php echo $post['post_file_name3'] ?>">
            </div>
          </div>
          <div style="border: 1px solid gray; padding: 15px;">
            <div class="form-group">
              <label>附加檔案4</label><br>
              <img src="" id="post_file4_preview" class="img-responsive hide" style="display: none;">
              <input type="text" class="form-control" id="post_file4" name="post_file4" value="<?php echo $post['post_file4'] ?>" readonly="">
              <a href="/assets/admin/filemanager/dialog.php?&field_id=post_file4&relative_url=1&akey=NshstuPrivateKey" class="btn btn-primary fancybox" type="button" style="margin-top:5px;">選擇附加檔案</a>
              <span class="btn btn-danger" onclick="cancel_file('post_file4');cancel_file('post_file_name4');" style="margin-top:5px;">移除</span>
            </div>
            <div class="form-group">
              <label for="post_file_name4">附加檔案名稱4</label>
              <input type="text" class="form-control" id="post_file_name4" name="post_file_name4" value="<?php echo $post['post_file_name4'] ?>">
            </div>
          </div>
          <div style="border: 1px solid gray; padding: 15px;">
            <div class="form-group">
              <label>附加檔案5</label><br>
              <img src="" id="post_file5_preview" class="img-responsive hide" style="display: none;">
              <input type="text" class="form-control" id="post_file5" name="post_file5" value="<?php echo $post['post_file5'] ?>" readonly="">
              <a href="/assets/admin/filemanager/dialog.php?&field_id=post_file5&relative_url=1&akey=NshstuPrivateKey" class="btn btn-primary fancybox" type="button" style="margin-top:5px;">選擇附加檔案</a>
              <span class="btn btn-danger" onclick="cancel_file('post_file5');cancel_file('post_file_name5');" style="margin-top:5px;">移除</span>
            </div>
            <div class="form-group">
              <label for="post_file_name5">附加檔案名稱5</label>
              <input type="text" class="form-control" id="post_file_name5" name="post_file_name5" value="<?php echo $post['post_file_name5'] ?>">
            </div>
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
        document.getElementById("post").submit();
        //alert("submitted!");
    }
});
</script>

<script>
  function cancel_file(target){
    $('#'+target).val('');
  }
</script>