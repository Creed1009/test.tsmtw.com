<?php if(!empty($banner['page_banner'])){ ?>
    <img src="/assets/uploads/<?php echo $banner['page_banner'] ?>" class="img-fluid">
<?php } ?>

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
                                <input type="text" class="form-control form-control-lg" placeholder="Enter discount code" />
                            </div>
                            <button type="button" class="btn btn-outline-warning btn-lg ms-3">Apply</button>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-body text-center">
                            <h4>Total: $<?php echo number_format($this->cart->total(), 2); ?></h4>
                            <a href="<?php echo site_url('checkout'); ?>" class="btn btn-warning btn-lg">Proceed to Pay</a>
                        </div>
                    </div>

                <?php } else { ?>
                    <p class="text-center text-muted">Your shopping cart is empty.</p>
                <?php } ?>

            </div>
        </div>
    </div>
</section>
