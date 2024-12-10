<div class="row">
<?php $attributes = array('class' => 'link', 'id' => 'link');?>
<?php echo form_open('admin/links/update/' . $link['link_id'], $attributes); ?>
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
            <?php if(!empty($category)): ?>
            <label for="link_category">分類</label>
            <?php $att = 'id="category_id" class="form-control chosen" data-rule-required="true"';
            $data = array();
            foreach ($category as $c){
            $data[$c['link_category_id']] = $c['link_category_name'];
            }
            echo form_dropdown('link_category', $data, $link['link_category'], $att);
            else: echo '<label>沒有分類</label><input type="text" class="form-control" id="link_category" name="link_category" value="0" readonly>';
            endif; ?>
          </div>
        </div>

        <div class="col-md-3">
          <div class="form-group">
            <label for="link_title">標題 *</label>
            <input type="text" class="form-control" id="link_title" name="link_title" value="<?php echo $link['link_title'] ?>" required>
          </div>
        </div>

        <div class="col-md-3">
          <div class="form-group">
            <label for="link_href">連結 *</label>
            <input type="text" class="form-control" id="link_href" name="link_href" value="<?php echo $link['link_href'] ?>">
          </div>
        </div>

        <div class="col-md-3">
          <div class="form-group">
            <label class="control-label">圖片</label><br>
            <?php if(!empty($link['link_image'])) { ?>
              <img src="/assets/uploads/<?php echo $link['link_image']; ?>" id="link_image_preview" class="img-responsive" style="<?php if (empty($link['link_image'])) {echo 'display: none';}?>">
            <?php } else { ?>
              <img src="" id="link_image_preview" class="img-responsive">
            <?php } ?>
            <input type="hidden" id="link_image" name="link_image" value="<?php echo $link['link_image']; ?>"/>
            <a href="/assets/admin/filemanager/dialog.php?type=1&field_id=link_image&relative_url=1&akey=NshstuPrivateKey" class="btn btn-primary fancybox" type="button" style="margin-top: 5px;">選擇圖片</a>
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
        document.getElementById("link").submit();
        //alert("submitted!");
    }
});
</script>