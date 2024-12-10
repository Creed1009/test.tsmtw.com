<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>寄送排程</title>
    <link rel="stylesheet" href="/assets/admin/bootstrap/dist/css/bootstrap.min.css?v=3.3.7">
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css"> -->
    <link rel="stylesheet" href="/assets/admin/jqueryui/1.12.1/jquery-ui.min.css">
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css"> -->
    <!-- jquery因為bootstrap的關係，所以只能匯入v2的最新版 -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script> -->
    <script src="/node_modules/jquery/dist/jquery.min.js"></script>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> -->
    <script src="/node_modules/jquery-migrate/dist/jquery-migrate.min.js"></script>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-migrate/3.0.1/jquery-migrate.min.js"></script> -->
    <script src="/assets/admin/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script> -->
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="row">
                    <div class="col-md-6">
                        <h3 id="notice-text"></h3>
                    </div>
                    <div class="col-md-6">
                        <h3><span>剩餘: </span><span id="count"></span> <span>封郵件未寄送。</span></h3>
                    </div>
                </div>

                <div id="cart_details" style="height: 300px; overflow-y: auto; background: #eee; padding: 15px;">

                </div>
            </div>
        </div>
    </div>
    <script>
    (function start_load()
    {
    	//setTimeout(start_load, 6000);
        $('#notice-text').html('<b>讀取待寄郵件...</b>');
    	$.ajax({
            url: "<?php echo base_url(); ?>admin/email/process_email",
            method: "GET",
            data: {},
            success: function(data) {
            	if(data==0){
            		$('#notice-text').html('<b>目前沒有待寄郵件。</b>');
                    count_send_email();
            		setTimeout(start_load, 3000);
            	} else {
                    $('#notice-text').html('<b>郵件寄送中...</b>');
                    $('#cart_details').prepend(data+'<br>');
                    count_send_email();
                    setTimeout(start_load, 3000);
                }
            }
        });
    })();

    function count_send_email() {
        $.ajax({
            url: "<?php echo base_url(); ?>admin/email/count_send_email",
            method: "GET",
            data: {},
            success: function(data) {
                $('#count').html(data);
            }
        });
    }
  	</script>
  	<?php // echo $include_script; ?>
    <script src="/node_modules/bootstrap3.3.7/dist/js/bootstrap.min.js?v=3.3.7"></script>
</body>
</html>