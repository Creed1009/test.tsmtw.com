<div class="row" style="padding: 15px 0px;">
    <div class="col-md-4 col-md-offset-4">
        <form id="submit" action="<?php echo base_url();?>admin/upload/do_upload" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <input type="file" class="form-control" name="file" id="file">
            </div>
            <div class="form-group">
                <button class="btn btn-success" type="submit">上傳</button>
            </div>
        </form>
    </div>
</div>

<script type="text/javascript">
$(document).ready(function() {
    $('#submit').submit(function(e) {
        e.preventDefault();
        $.ajax({
            url: '<?php echo base_url();?>admin/upload/do_upload',
            type: "post",
            data: new FormData(this),
            processData: false,
            contentType: false,
            cache: false,
            async: false,
            success: function(file_name) {
                // alert("Upload Image Successful.");
                alert(file_name);
            }
        });
    });
});
</script>