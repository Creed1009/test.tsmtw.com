<div class="row">
<?php $attributes = array('class' => 'activity', 'id' => 'activity'); ?>
<?php echo form_open('admin/activitys/insert' , $attributes); ?>
  <div class="col-md-12">
    <div class="form-group">
      <button type="submit" class="btn btn-primary">建立</button>
      <a href="<?php echo base_url().'admin/'.$this->uri->segment(2) ?>" class="btn btn-info hidden-print"><i class="fa fa-mail-reply"></i> 返回上一頁</a>
    </div>
  </div>
  <div class="col-md-12">
    <div class="content-box-large">
      <div class="row">
        <div class="col-md-3">
          <div class="form-group">
            <?php if(!empty($category)): ?>
            <label for="activity_category">分類</label>
            <?php $att = 'id="activity_category" class="form-control chosen" data-rule-required="true"';
            $data = array();
            foreach ($category as $c)
            {
            $data[$c['activity_category_id']] = $c['activity_category_name'];
            }
            echo form_dropdown('activity_category', $data, '0', $att);
            else: echo '<label>沒有分類</label><input type="text" class="form-control" id="activity_category" name="activity_category" value="0" readonly>';
            endif; ?>
          </div>
        </div>

        <div class="col-md-3">
          <div class="form-group">
            <label for="activity_name">名稱 *</label>
            <input type="text" class="form-control" id="activity_name" name="activity_name" required>
          </div>
        </div>

        <div class="col-md-3">
          <div class="form-group" style="border: 1px solid gray; padding: 10px;">
            <label>封面圖片</label><br>
            <img src="" id="activity_image_preview" class="img-responsive" style="width: 100px;">
            <input type="hidden" id="activity_image" name="activity_image">
            <a href="/assets/admin/filemanager/dialog.php?type=1&field_id=activity_image&relative_url=1&akey=NshstuPrivateKey" class="btn btn-primary fancybox" type="button" style="margin-top:5px;">選擇圖片</a>
            <span class="btn btn-danger" onclick="cancel_image('activity_image')" style="margin-top:5px;">取消圖片</span>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-md-12">
          <div class="form-group">
            <span class="btn btn-warning" onclick="add_image()">新增圖片</span>
          </div>
        </div>
      </div>

      <div class="row" id="image_area">

        <div class="col-md-6">
          <div class="form-group" style="border: 1px solid gray; padding: 10px;">
            <div class="form-group">
              <label>圖片</label><br>
              <img src="" id="activity_item_image1_preview" class="img-responsive" style="max-height: 80px;">
              <input type="hidden" id="activity_item_image1" name="activity_item_image[]">
            </div>
            <div class="form-group">
              <a href="/assets/admin/filemanager/dialog.php?type=1&field_id=activity_item_image1&relative_url=1&akey=NshstuPrivateKey" class="btn btn-primary fancybox" type="button" style="margin-top:5px;">選擇圖片</a>
            </div>
            <input type="text" class="form-control" id="activity_item_description" name="activity_item_description[]" placeholder="圖片描述...">
          </div>
        </div>

        <div class="col-md-6">
          <div class="form-group" style="border: 1px solid gray; padding: 10px;">
            <div class="form-group">
              <label>圖片</label><br>
              <img src="" id="activity_item_image2_preview" class="img-responsive" style="max-height: 80px;">
              <input type="hidden" id="activity_item_image2" name="activity_item_image[]">
            </div>
            <div class="form-group">
              <a href="/assets/admin/filemanager/dialog.php?type=1&field_id=activity_item_image2&relative_url=1&akey=NshstuPrivateKey" class="btn btn-primary fancybox" type="button" style="margin-top:5px;">選擇圖片</a>
            </div>
            <input type="text" class="form-control" id="activity_item_description" name="activity_item_description[]" placeholder="圖片描述...">
          </div>
        </div>

        <div class="col-md-6">
          <div class="form-group" style="border: 1px solid gray; padding: 10px;">
            <div class="form-group">
              <label>圖片</label><br>
              <img src="" id="activity_item_image3_preview" class="img-responsive" style="max-height: 80px;">
              <input type="hidden" id="activity_item_image3" name="activity_item_image[]">
            </div>
            <div class="form-group">
              <a href="/assets/admin/filemanager/dialog.php?type=1&field_id=activity_item_image3&relative_url=1&akey=NshstuPrivateKey" class="btn btn-primary fancybox" type="button" style="margin-top:5px;">選擇圖片</a>
            </div>
            <input type="text" class="form-control" id="activity_item_description" name="activity_item_description[]" placeholder="圖片描述...">
          </div>
        </div>

        <div class="col-md-6">
          <div class="form-group" style="border: 1px solid gray; padding: 10px;">
            <div class="form-group">
              <label>圖片</label><br>
              <img src="" id="activity_item_image4_preview" class="img-responsive" style="max-height: 80px;">
              <input type="hidden" id="activity_item_image4" name="activity_item_image[]">
            </div>
            <div class="form-group">
              <a href="/assets/admin/filemanager/dialog.php?type=1&field_id=activity_item_image4&relative_url=1&akey=NshstuPrivateKey" class="btn btn-primary fancybox" type="button" style="margin-top:5px;">選擇圖片</a>
            </div>
            <input type="text" class="form-control" id="activity_item_description" name="activity_item_description[]" placeholder="圖片描述...">
          </div>
        </div>

      </div>
    </div>
  </div>
<?php echo form_close() ?>
</div>

<script src="/node_modules/jquery-validation/dist/jquery.validate.min.js"></script>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.min.js"></script> -->
<script src="/node_modules/jquery-validation/dist/localization/activitys_zh_TW.js"></script>
<script>
$.validator.setDefaults({
    submitHandler: function() {
        document.getElementById("activity").submit();
        //alert("submitted!");
    }
});
</script>

<script>
  function makeid() {
    var text = "";
    var possible = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";

    for (var i = 1; i <= 10; i++)
      text += possible.charAt(Math.floor(Math.random() * possible.length));

    return text;
  }

  function add_image(){
    var rand = makeid();
    $("#image_area").append('<div class="col-md-6"><div class="form-group" style="border: 1px solid gray; padding: 10px;"><div class="form-group"><label>圖片</label><br><img src="" id="activity_item_image'+rand+'_preview" class="img-responsive" style="max-height: 80px;"><input type="hidden" id="activity_item_image'+rand+'" name="activity_item_image[]"></div><div class="form-group"><a href="/assets/admin/filemanager/dialog.php?type=1&field_id=activity_item_image'+rand+'&relative_url=1&akey=NshstuPrivateKey" class="btn btn-primary fancybox" type="button" style="margin-top:5px;">選擇圖片</a></div><input type="text" class="form-control" id="activity_item_description" name="activity_item_description[]" placeholder="圖片描述..."></div></div>');

    $('.fancybox').fancybox({
      'width'     : 1920,
      'height'    : 1080,
      'type'      : 'iframe',
      'autoScale' : false
    });
  };

  function cancel_image(target){
    $('#'+target+'_preview').attr('src','');
    $('#'+target).val('');
  }
</script>