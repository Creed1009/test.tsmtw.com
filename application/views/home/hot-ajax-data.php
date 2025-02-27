<div id="blogCarousel" class="carousel slide" data-ride="carousel">
    <!-- Carousel items -->
    <div class="carousel-inner">
        <div class="carousel-item active">
            <div class="row" style="background: white;">
                <?php $count=1; ?>
                <?php if(!empty($products)) { foreach($products as $product) { ?>
                <?php if($count<=6){ ?>
                <div class="col-md-2 text-center">
                    <div>
                        <div class="d-flex align-items-center justify-content-center" style="min-height: 200px;">
                            <a href="/commodity/product/<?php echo $product['product_id'] ?>">
                                <?php if(!empty($product['product_image1'])){ ?>
                                <img src="/assets/uploads/<?php echo $product['product_image1'] ?>" class="img-fluid" style="padding-left: 10px; padding-right: 10px; padding-top: 10px; max-height: 200px;">
                                <?php } ?>
                            </a>
                        </div>
                        <div style="padding: 6px 12px;">
                            <h6 style="margin-bottom: 5px;">
                                <?php echo $product['product_title'] ?>
                            </h6>
                            <p style="margin-bottom: 5px;">
                                <small>
                                    <?php echo $product['product_description'] ?>
                                </small>
                            </p>
                            <?php if($product['product_price']!=0){ ?>
                            <p style="margin-bottom: 0px;">
                                <small style="color: #333;">
                                    原價 NT$ <?php echo number_format($product['product_price']) ?>
                                </small>
                            </p>
                            <?php } ?>
                            <?php if($product['product_activity_price']!=0){ ?>
                            <p style="color: #871658;">
                                <span>活動價</span> <span style="font-size: 22px;">NT$ <?php echo number_format($product['product_activity_price']) ?></span>
                            </p>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <?php } ?>
                <?php $count++; ?>
                <?php }} ?>
            </div>
            <!--.row-->
        </div>
    </div>
    <!--.carousel-inner-->
    <!-- <ol class="carousel-indicators">
        <?php if(count($hot_products)>0){ ?>
        <li data-target="#blogCarousel" data-slide-to="0" class="active" style="border-bottom: 3px solid #000;"></li>
        <?php } ?>
        <?php if(count($hot_products)>0 && count($hot_products)> 6 && count($hot_products) < 13){ ?>
        <li data-target="#blogCarousel" data-slide-to="1" style="border-bottom: 3px solid #000;"></li>
        <?php } ?>
    </ol> -->
</div>
<!--.Carousel-->