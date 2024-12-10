<div class="row">
	<div class="col-md-10 col-md-offset-1">
		
		<div class="mail-page">
			<a href="<?php echo base_url().'admin/'.$this->uri->segment(2) ?>" id="back-btn" class="btn btn-info hidden-print">回上一頁</a>
		    <div class="mail-content" style="margin-left: 0px;">
		    	<?php $attributes = array('class' => 'email', 'id' => 'email'); ?>
				<?php echo form_open('admin/email/update/'.$email['id'] , $attributes); ?>
			        <div class="mail-compose form-horizontal">
			            <div class="form-group">
			            	<input type="text" class="form-control" name="email" id="email" value="<?php echo $email['email'] ?>">
			            </div>
			            <div class="form-group">
			            	<input type="text" class="form-control" name="subject" id="subject" value="<?php echo $email['subject'] ?>">
			            </div>
			            <div class="form-group">
			            	<textarea class="form-control tinymce1" name="body" id="body" rows="20" placeholder="郵件內容..."><?php echo $email['body'] ?></textarea>
			            </div>
			            <div class="form-group">
			            	<button type="submit" class="btn btn-primary">儲存修改</button>
			            </div>
			        </div>
		        <?php echo form_close() ?>
		    </div>
		</div>

	</div>
</div>