<style>
	#logo_preview{
		background: #efefef;
		border: 1px solid #000;
	}
</style>
<div class="row">
	<div class="col-md-12">
		<?php echo form_open('admin/setting/update_general',array('class'=>'form-horizontal')); ?>
		<div class="tabbable">
		  	<!-- Nav tabs -->
		  	<ul class="nav nav-tabs" role="tablist">
		    	<li role="presentation" class="active">
		      		<a href="#company" aria-controls="company" role="tab" data-toggle="tab">公司設定</a>
		      	</li>
		      	<li role="presentation">
		      		<a href="#smtp" aria-controls="smtp" role="tab" data-toggle="tab">郵件簽名檔設定</a>
		      	</li>
		  </ul>

			<!-- Tab panes -->
			<div class="tab-content">
			    <div role="tabpanel" class="tab-pane active" id="company">

			      	<div class="form-group">
						<label class="col-md-2" for="name">網站名稱</label>
						<div class="col-md-4">
							<input type="text" name="name" id="name" class="form-control" value="<?php echo get_setting_general('name') ?>"/>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-2" for="contact_person">聯絡人</label>
						<div class="col-md-4">
							<input type="text" name="contact_person" id="contact_person" class="form-control" value="<?php echo get_setting_general('contact_person') ?>"/>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-2" for="phone1">市話</label>
						<div class="col-md-4">
							<input type="text" name="phone1" id="phone1" class="form-control" value="<?php echo get_setting_general('phone1') ?>"/>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-2" for="fax">傳真</label>
						<div class="col-md-4">
							<input type="text" name="fax" id="fax" class="form-control" value="<?php echo get_setting_general('fax') ?>"/>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-2" for="VAT_number">統一編號</label>
						<div class="col-md-4">
							<input type="text" name="VAT_number" id="VAT_number" class="form-control" value="<?php echo get_setting_general('VAT_number') ?>"/>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-2" for="address">聯絡地址</label>
						<div class="col-md-4">
							<input type="text" name="address" id="address" class="form-control" value="<?php echo get_setting_general('address') ?>"/>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-2" for="email">電子郵件</label>
						<div class="col-md-4">
							<input type="text" name="email" id="email" class="form-control" value="<?php echo get_setting_general('email') ?>"/>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-2" for="facebook_link">Facebook連結</label>
						<div class="col-md-4">
							<input type="text" name="facebook_link" id="facebook_link" class="form-control" value="<?php echo get_setting_general('facebook_link') ?>"/>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-2" for="meta_keywords">網站meta關鍵字</label>
						<div class="col-md-4">
							<input type="text" name="meta_keywords" id="meta_keywords" class="form-control" value="<?php echo get_setting_general('meta_keywords') ?>"/>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-2" for="meta_description">網站meta描述</label>
						<div class="col-md-4">
							<input type="text" name="meta_description" id="meta_description" class="form-control" value="<?php echo get_setting_general('meta_description') ?>"/>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-2" for="per_page">列表顯示筆數</label>
						<div class="col-md-4">
							<?php $options = array(
								'5'  => '5',
								'10' => '10',
								'15' => '15',
								'20' => '20',
								'25' => '25',
								'30' => '30',
								'35' => '35',
								'40' => '40',
							);
							$att = 'id="per_page" class="form-control bfh-selectbox"';
							echo form_dropdown('per_page', $options, get_setting_general('per_page'), $att); ?>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-2" for="file_upload">LOGO</label>
						<div class="col-md-4">

							<img src="<?php if (!empty(get_setting_general('logo'))) { echo base_url().'assets/uploads/'.get_setting_general('logo'); } ?>" id="logo_preview" class="img-responsive" <?php if (empty(get_setting_general('logo'))) { echo "style='display:none;'"; } ?>>

							<input type="hidden" id="logo" name="logo" value="<?php echo get_setting_general('logo') ?>"/>

				            <a href="/assets/admin/filemanager/dialog.php?type=1&field_id=logo&relative_url=1&akey=NshstuPrivateKey" class="btn btn-primary fancybox" type="button" style="margin-top: 5px;">選擇LOGO</a>
						</div>
					</div>

			    </div>

			    <div role="tabpanel" class="tab-pane" id="smtp">

			      	<div class="form-group hide">
						<label class="col-md-2" for="smtp_host">主機位置</label>
						<div class="col-md-4">
							<input type="text" name="smtp_host" id="smtp_host" class="form-control" value="<?php echo get_setting_general('smtp_host') ?>"/>
						</div>
					</div>

					<div class="form-group hide">
						<label class="col-md-2" for="smtp_port">Port</label>
						<div class="col-md-4">
							<input type="text" name="smtp_port" id="smtp_port" class="form-control" value="<?php echo get_setting_general('smtp_port') ?>"/>
						</div>
					</div>

					<div class="form-group hide">
						<label class="col-md-2" for="smtp_crypto">加密方式</label>
						<div class="col-md-4">
							<input type="text" name="smtp_crypto" id="smtp_crypto" class="form-control" value="<?php echo get_setting_general('smtp_crypto') ?>" placeholder="tls,ssl"/>
						</div>
					</div>

					<div class="form-group hide">
						<label class="col-md-2" for="smtp_email">電子郵件</label>
						<div class="col-md-4">
							<input type="text" name="smtp_email" id="smtp_email" class="form-control" value="<?php echo get_setting_general('smtp_email') ?>"/>
						</div>
					</div>

					<div class="form-group hide">
						<label class="col-md-2" for="smtp_password">密碼</label>
						<div class="col-md-4">
							<input type="text" name="smtp_password" id="smtp_password" class="form-control" value="<?php echo get_setting_general('smtp_password') ?>"/>
						</div>
					</div>

					<div class="form-group hide">
						<label class="col-md-2" for="smtp_forname">寄件者名稱</label>
						<div class="col-md-4">
							<input type="text" name="smtp_forname" id="smtp_forname" class="form-control" value="<?php echo get_setting_general('smtp_forname') ?>"/>
						</div>
					</div>

					<div class="form-group">
						<label class="col-md-2" for="mail_footer">電子郵件簽名檔</label>
						<div class="col-md-10">
							<textarea class="form-control tinymce1" name="mail_footer" id="mail_footer" cols="30" rows="10">
								<?php echo get_setting_general('mail_footer') ?>
							</textarea>
						</div>
					</div>

			    </div>

			    <div role="tabpanel" class="tab-pane" id="pos">


			    </div>

			    <!-- <div role="tabpanel" class="tab-pane" id="purchase_sales">

			      	<div class="form-group">
				        <label for="employee_take_office_date">到職日:</label>
				        <input type="text" class="form-control datepicker" name="employee_take_office_date" id="employee_take_office_date">
			      	</div>

			    </div> -->

			    <div role="tabpanel" class="tab-pane" id="account">

			    </div>
			</div>
		</div>
		<div class="form-group">
			<div class="col-md-12">
				<input type="submit" name="submit" value="儲存設定" class="btn btn-primary"/>
			</div>
		</div>
		<?php echo form_close() ?>
	</div>
</div>