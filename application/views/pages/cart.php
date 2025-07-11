<?php if(!empty($banner['page_banner'])){ ?>
    <img src="/assets/uploads/<?php echo $banner['page_banner'] ?>" class="img-fluid">
<?php } ?>

<style>
    .button-return {
        display: flex;
        justify-content: start;
        margin-top: 20px;
    }

</style>

<section class="h-100">
    <div class="container h-100 py-5">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-10">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h3 class="fw-normal mb-0"><?php echo $page_title?></h3>
                </div>

                <?php if ($this->cart->total_items() > 0): ?>
                    <form action="<?= site_url('cart/update') ?>" method="post" id="cart-form">
                        <?php foreach ($this->cart->contents() as $item): ?>
                            <div class="card rounded-3 mb-4 cart-item">
                                <div class="card-body p-4">
                                    <div class="row d-flex justify-content-between align-items-center">
                                        <div class="col-md-8">
                                            <p><?= $item['name']; ?></p>
                                            <p>單價：$<?= $item['price']; ?></p>

                                            <label>數量：</label>
                                            <input 
                                                type="number" 
                                                name="qty[<?= $item['rowid']; ?>]" 
                                                class="form-control qty-input d-inline" 
                                                style="width:80px; display:inline-block;" 
                                                value="<?= $item['qty']; ?>" 
                                                min="1"
                                                data-price="<?= $item['price']; ?>"
                                            >
                                        </div>
                                        <div class="col-md-4 text-end">
                                            <a href="<?= site_url('cart/remove/' . $item['rowid']); ?>" class="btn btn-sm btn-danger">刪除</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </form>
                <?php else: ?>
                    <p>購物車是空的</p>
                <?php endif; ?>

                <div class="card mb-4">
                    <div class="card-body p-4 d-flex flex-row">
                        <div class="form-outline flex-fill">
                            <input type="text" class="form-control form-control-lg" placeholder="輸入折扣碼" />
                        </div>
                        <button type="button" class="btn btn-outline-warning btn-lg ms-3">應用</button>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body text-center">
                        <h4 id="total-amount">Total: $<?php echo number_format($this->cart->total(), 2); ?></h4>
                        <a href="<?php echo site_url('cart/checkout'); ?>" class="btn btn-warning btn-lg">確認付款</a>
                    </div>
                </div>

                <div class="button-return mt-3 text-center">
                    <button type="button" class="btn btn-secondary btn-lg" onclick="goToProducts()">繼續購物</button>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    function goToProducts() {
        window.location.href = "/products";
    }

    // 計算總價
    document.querySelectorAll('.qty-input').forEach(input => {
        input.addEventListener('input', updateTotal);
    });

    function updateTotal() {
        let total = 0;
        document.querySelectorAll('.qty-input').forEach(input => {
            const price = parseFloat(input.dataset.price);
            const qty = parseInt(input.value) || 0;
            total += price * qty;
        });
        document.getElementById('total-amount').textContent = 'Total: $' + total.toFixed(2);
    }
</script>