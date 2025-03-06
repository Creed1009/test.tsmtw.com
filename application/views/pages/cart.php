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

                <?php if ($this->cart->total_items() > 0) { ?>
                    <?php foreach ($this->cart->contents() as $item) { ?>
                        <div class="card rounded-3 mb-4">
                            <div class="card-body p-4">
                                <div class="row d-flex justify-content-between align-items-center">
                                    <div>
                                        <?php echo $item['name']; ?>
                                        <?php echo $item['price']; ?>
                                        <?php echo $item['qty']; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>

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
                            <h4>Total: $<?php echo number_format($this->cart->total(), 2); ?></h4>
                            <a href="<?php echo site_url('cart/checkout'); ?>" class="btn btn-warning btn-lg">確認付款</a>
                        </div>
                    </div>

                    <div class="button-return">
                        <button type="button" class="button-return btn-lg ms-3" onclick="goToProducts()">繼續購物</button>
                    </div>

                <?php } else { ?>
                    <p class="text-center text-muted">Your shopping cart is empty.</p>
                <?php } ?>

            </div>
        </div>
    </div>
</section>


<script>
    function goToProducts() {
        window.location.href ="/products";
    }
</script>