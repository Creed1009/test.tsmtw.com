

<style>
    .text-center {
        margin-top: 100px;
        margin-bottom: 100px;
    }
</style>




<div class="text-center">
    <h1 class="text-success">🎉 付款成功！</h1>
    <p class="mt-3">感謝您的購買，您將在 <span id="countdown">5</span> 秒後返回產品頁。</p>
    <a href="<?= site_url('products'); ?>" class="btn btn-primary mt-3">立即返回產品頁</a>
</div>

<script>
    // 倒數計時顯示
    let countdown = 5;
    setInterval(function() {
        countdown--;
        document.getElementById("countdown").innerText = countdown;
    }, 1000);
</script>

<script>
    // 5 秒後自動跳轉回產品頁
    setTimeout(function() {
        window.location.href = "<?= site_url('products'); ?>";
    }, 5000);
</script>

