<h2>訂單完成！</h2>
<p>您的訂單編號是 <?= isset($order_id) ? $order_id : '未知' ?></p>
<a href="<?= site_url('products') ?>">➡ 回商品頁</a>

<script>
    setTimeout(function () {
        window.location.href = "<?= site_url('products') ?>";
    }, 3000); // 3 秒後自動跳轉
</script>