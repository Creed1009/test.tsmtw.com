<div class="row">
    <div class="col-md-6">
        <?php echo form_open("admin/auth/create_user");?>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">新增</button>
        </div>
        <div class="form-group">
            <label>帳號</label>
            <input type="text" class="form-control" name="identity" id="identity" required="">
        </div>
        <div class="form-group">
            <label>電子郵件</label>
            <input type="text" class="form-control" name="email" id="email" required="">
        </div>
        <div class="form-group">
            <label>姓名</label>
            <input type="text" class="form-control" name="name" id="name" required="">
        </div>
        <div class="form-group">
            <label>密碼</label>
            <input type="password" class="form-control" name="password" id="password" required="">
        </div>
        <div class="form-group">
            <label>確認密碼</label>
            <input type="password" class="form-control" name="password_confirm" id="password_confirm" required="">
        </div>
        <?php echo form_close() ?>
    </div>
</div>