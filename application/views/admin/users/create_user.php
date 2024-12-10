<style>
    input:required {
        border-color: #f00;
    }
</style>
<div class="row">
    <?php $attributes = array('class' => 'create_user', 'id' => 'create_user'); ?>
    <?php echo form_open('admin/users/create_user', $attributes); ?>
    <div class="col-md-12">
        <div class="form-group">
            <button type="submit" class="btn btn-primary">新增</button>
            <a href="<?php echo base_url().'admin/'.$this->uri->segment(2) ?>" class="btn btn-info hidden-print"><i class="fa fa-mail-reply"></i> 返回上一頁</a>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label>帳號</label>
            <input type="text" class="form-control" name="identity" id="identity">
        </div>
        <div class="form-group">
            <label>姓名</label>
            <input type="text" class="form-control" name="name" id="name" required>
        </div>
        <div class="form-group">
            <label>電子信箱</label>
            <input type="text" class="form-control" name="email" id="email">
        </div>
        <div class="form-group">
            <label>聯絡電話</label>
            <input type="text" class="form-control" name="phone" id="phone">
        </div>
        <div class="form-group">
            <label>手機號碼</label>
            <input type="text" class="form-control" name="cellphone" id="cellphone">
        </div>
        <div class="form-group">
            <label>備註</label>
            <textarea class="form-control" name="remark" id="remark" cols="30" rows="3"></textarea>
        </div>
        <div class="form-group">
            <label>是否訂閱電子報</label>
            <label class="radio-inline">
                <input type="radio" name="subscript" id="subscriptRadio1" value="Y" checked=""> 是
            </label>
            <label class="radio-inline">
                <input type="radio" name="subscript" id="subscriptRadio2" value="N"> 否
            </label>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label>會員編號</label>
            <input type="text" class="form-control" name="member_number" id="member_number" required>
        </div>
        <div class="form-group">
            <label>服務學校</label>
            <?php
            if($this->ion_auth->in_group('admin')) {
                if(!empty($schools)):
                    $att = 'id="school" class="form-control chosen" data-rule-required="true"';
                    $data = array('' => '服務學校');
                    foreach ($schools as $c)
                    {
                        $data[$c['school_code']] = $c['school_name'];
                    }
                    echo form_dropdown('school', $data, '0', $att);
                else:
                    echo '<input type="text" class="form-control" id="school" name="school" value="0" readonly>';
                endif;
            }
            //
            if($this->ion_auth->in_group('president')) {
                echo '<input type="text" class="form-control" value="'.get_school_name_by_code($this->ion_auth->user()->row()->school).'" readonly>';
                echo '<input type="hidden"  name="school" value="'.$this->ion_auth->user()->row()->school.'">';
            }
            ?>
        </div>
        <div class="form-group">
            <label>職稱</label>
            <input type="text" class="form-control" name="job_title" id="job_title">
        </div>
        <!-- <div class="form-group">
            <label>任期到期日</label>
            <input type="text" class="form-control datepicker" name="term_of_office" id="term_of_office" autocomplete="off">
        </div> -->
        <div class="form-group">
            <label>權利狀態</label>
            <select class="form-control" name="active" id="active">
                <option value="1">正常</option>
                <option value="0">停權</option>
            </select>
        </div>
        <div class="form-group">
            <label>會員屬性</label>
            <select class="form-control" name="certification" id="certification">
                <option value="1">一般會員</option>
                <option value="2">無效會員</option>
                <option value="3">特殊會員</option>
            </select>
        </div>
        <div class="form-group">
            <label>會員認證年份</label>
            <input type="text" class="form-control datepicker-y-mu" name="certification_year" id="certification_year" autocomplete="off">
        </div>
        <!-- <div class="row">
            <div class="form-group col-md-4">
                <div class="radio">
                    <label>
                        <input type="radio" name="member_category" id="member_categoryRadios1" value="general" checked>
                        一般會員
                    </label>
                </div>
            </div>
            <div class="form-group col-md-4">
                <select class="form-control" name="general_public_private">
                    <option value="public" selected>公立</option>
                    <option value="private">私立</option>
                </select>
            </div>
            <div class="form-group col-md-4">
                <select class="form-control" name="general_member_type">
                    <option value="專任教師(含代理代課教師)" selected>專任教師(含代理代課教師)</option>
                    <option value="職工">職工</option>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-4">
                <div class="radio">
                    <label>
                        <input type="radio" name="member_category" id="member_categoryRadios2" value="special">
                        特別會員
                    </label>
                </div>
            </div>
            <div class="form-group col-md-4">
                <select class="form-control" name="special_public_private">
                    <option value="public" selected>公立</option>
                    <option value="private">私立</option>
                </select>
            </div>
            <div class="form-group col-md-4">
                <select class="form-control" name="special_member_type">
                    <option value="兼代課教師" selected>兼代課教師</option>
                    <option value="兼職員工">兼職員工</option>
                    <option value="具教師證書且無一定雇主之教師">具教師證書且無一定雇主之教師</option>
                    <option value="其他">其他</option>
                </select>
            </div>
        </div> -->
        <div class="form-group">
            <label>密碼</label>
            <input type="password" class="form-control" name="password" id="password" required>
        </div>
        <div class="form-group">
            <label>確認密碼</label>
            <input type="password" class="form-control" name="password_confirm" id="password_confirm" required>
        </div>
        <!-- <div class="form-group">
            <button type="submit" class="btn btn-primary">新增</button>
        </div> -->
    </div>
    <?php echo form_close() ?>
</div>

<script src="/node_modules/jquery-validation/dist/jquery.validate.min.js"></script>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.min.js"></script> -->
<script src="/node_modules/jquery-validation/dist/localization/messages_zh_TW.js"></script>
<script>
$.validator.setDefaults({
    submitHandler: function() {
        document.getElementById("create_user").submit();
        //alert("submitted!");
    }
});
$(document).ready(function() {
  $("#create_user").validate({});
});
</script>