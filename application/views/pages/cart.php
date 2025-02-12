<?php if(!empty($banner['page_banner'])){ ?>
    <img src="/assets/uploads/<?php echo $banner['page_banner'] ?>" class="img-fluid">
<?php } ?>

<section class="h-100">
    <div class="container h-100 py-5">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-10">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h3 class="fw-normal mb-0">Shopping Cart</h3>
                </div>

                <?php if ($this->cart->total_items() > 0) { ?>
                    <?php foreach ($this->cart->contents() as $item) { ?>
                        <div class="card rounded-3 mb-4">
                            <div class="card-body p-4">
                                <div class="row d-flex justify-content-between align-items-center">
                                    <div class="col-md-2 col-lg-2 col-xl-2">
                                        <img src="/assets/uploads/<?php echo $item['options']['image']; ?>" 
                                            class="img-fluid rounded-3" alt="<?php echo $item['name']; ?>">
                                    </div>
                                    <div class="col-md-3 col-lg-3 col-xl-3">
                                        <p class="lead fw-normal mb-2"><?php echo $item['name']; ?></p>
                                        <p>
                                            <span class="text-muted">Size: </span><?php echo $item['options']['size']; ?> 
                                            <span class="text-muted">Color: </span><?php echo $item['options']['color']; ?>
                                        </p>
                                    </div>
                                    <div class="col-md-3 col-lg-3 col-xl-2 d-flex">
                                        <a href="<?php echo site_url('cart/update_qty/' . $item['rowid'] . '/decrease'); ?>" 
                                        class="btn btn-link px-2">
                                            <i class="fas fa-minus"></i>
                                        </a>

                                        <input min="1" name="quantity" value="<?php echo $item['qty']; ?>" 
                                            type="number" class="form-control form-control-sm" readonly />

                                        <a href="<?php echo site_url('cart/update_qty/' . $item['rowid'] . '/increase'); ?>" 
                                        class="btn btn-link px-2">
                                            <i class="fas fa-plus"></i>
                                        </a>
                                    </div>
                                    <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                                        <h5 class="mb-0">$<?php echo number_format($item['subtotal'], 2); ?></h5>
                                    </div>
                                    <div class="col-md-1 col-lg-1 col-xl-1 text-end">
                                        <a href="<?php echo site_url('cart/remove/' . $item['rowid']); ?>" 
                                        class="text-danger">
                                            <i class="fas fa-trash fa-lg"></i>
                                        </a>
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
