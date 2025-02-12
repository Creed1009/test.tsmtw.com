<?php if(!empty($banner['page_banner'])){ ?>
    <img src="/assets/uploads/<?php echo $banner['page_banner'] ?>" class="img-fluid">
<?php } ?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1><?php echo $page_title; ?></h1>

            <?php if (!empty($products)): ?>
                <div class="product-detail">
                    <h2><?php echo $products['product_title']; ?></h2>
                    <p><strong>價格：</strong> $<?php echo number_format($products['product_price'], 2); ?></p>
                    <p><strong>描述：</strong> <?php echo nl2br($products['product_content']); ?></p>

                    <!-- <?php if (!empty($product['image'])): ?>
                        <img src="<?php echo base_url('uploads/products/' . $product['image']); ?>" alt="<?php echo $product['name']; ?>" class="img-fluid">
                    <?php endif; ?> -->

                    <a href="<?php echo site_url('cart/add/' . $products['product_id']); ?>" class="btn btn-primary">加入購物車</a>
                </div>
            <?php else: ?>
                <p>此商品不存在或已被刪除。</p>
            <?php endif; ?>

            <a href="<?php echo site_url('products'); ?>" class="btn btn-secondary">返回商品列表</a>
        </div>
    </div>
</div>
