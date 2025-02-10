<?php if(!empty($banner['page_banner'])){ ?>
    <img src="/assets/uploads/<?php echo $banner['page_banner'] ?>" class="img-fluid">
<?php } ?>

<style>
    .col-12 col-md-4 col-lg-3 {
        width: 250px;
        background-color: rgb(253, 252, 162); /* 側邊欄背景色 */
        padding: 15px;
        border-right: 1px solid #ddd;
    }

    .col-12 col-md-4 col-lg-3-list {
        list-style: none;
        margin: 0;
        padding: 0;
        display: flex;
        flex-direction: column; /* 強制垂直排列 */
        gap: 10px; /* 項目之間的間距 */
    }

    .col-12 col-md-4 col-lg-3-list li {
        height: 300px;
        padding: 10px;
        background-color:rgb(216, 188, 188);
        border: 1px solid rgb(190, 209, 216);
        border-radius: 5px;
    }
    .card.wb-7 {
        height: 300px;
        width: 100%;
        display: flex;
        flex-direction: column;
    }
    .card-img {
      height: 250px;
      overflow: hidden;
    }
    .card-img img {
      width: 100%;
      height: 100%;
      object-fit: cover;
    }
    .card-body {
      flex: 1;
      display: flex;
      flex-direction: column;
      justify-content: space-between;
    }
</style>

<section class="py-11">
  <div class="container">
    <div class="row">
      
      <div class="col-12 col-md-4 col-lg-3">
        <!-- Filters -->
        <form class="mb-10 mb-md-0">
          <ul class="nav nav-vertical" id="filterNav">
            <li class="nav-item">
              <!-- Toggle -->
              <a class="nav-link dropdown-toggle fs-lg text-reset border-bottom mb-6" data-bs-toggle="collapse" href="#categoryCollapse">
                Category
              </a>

              <!-- Collapse -->
              <div class="collapse show" id="categoryCollapse">
                <div class="form-group">
                  <ul class="list-styled mb-0" id="productsNav">
                    <li class="list-styled-item">
                      <a class="list-styled-link" href="#">
                        All Products
                      </a>
                    </li>
                  </ul>
                </div>
              </div>
            </li>                 
          </ul>
        </form>
      </div>

      <div class="col-12 col-md-8 col-lg-9">

        <!-- Tags -->
        <div class="row mb-7">
            <div class="col-12"></div>
          </div>
        <!-- Products -->
        <div class="row">
          <?php if(!empty($products)) { foreach($products as $product) { ?>
              <div class="col-6 col-md-4">
              <!-- Card -->
                <div class="card mb-7">
                  <!-- Image -->
                  
                  <div class="card-img">
                    <!-- Image -->
                    <div class="All product_image">
                      <img src="/assets/uploads/<?php echo $product['product_image1'] ?>" alt="<?php echo $product['product_title'] ?>" class="card-img-top">   
                    </div>
                    <!-- <a class="card-img-hover" href="product.html">
                      <img class="card-img-top card-img-back" src="assets/img/products/product-01.jpg" alt="...">
                      <img class="card-img-top card-img-front" src="assets/img/products/product-5.jpg" alt="...">
                    </a> -->
                  </div>
                  <!-- Body -->
                  <div class="card-body px-0">
                    <!-- Category -->
                    <div class="fs-xs">
                      <a class="text-muted" href="shop.html">AllProducts</a>
                    </div>
                    <!-- Title -->
                    <div class="fw-bold">
                      <a class="text-body" href="<?= base_url('products/'.$product['product_id']) ?>">
                        <?php echo $product['product_title'] ?>
                      </a>
                    </div>
                    <!-- Price -->
                    <div class="All product_price">
                      <?php echo $product['product_price'] ?>  
                    </div>
                    
                  </div>
                </div>
              </div>
            
          <?php }} ?>
        </div>
        <!-- Pagination -->
        <nav class="d-flex justify-content-center justify-content-md-end">
          <ul class="pagination pagination-sm text-gray-400">
            <li class="page-item">
              <a class="page-link page-link-arrow" href="#">
                <svg class="svg-inline--fa fa-caret-left" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="caret-left" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 512" data-fa-i2svg=""><path fill="currentColor" d="M137.4 406.6l-128-127.1C3.125 272.4 0 264.2 0 255.1s3.125-16.38 9.375-22.63l128-127.1c9.156-9.156 22.91-11.9 34.88-6.943S192 115.1 192 128v255.1c0 12.94-7.781 24.62-19.75 29.58S146.5 415.8 137.4 406.6z"></path></svg><!-- <i class="fa fa-caret-left"></i> Font Awesome fontawesome.com -->
              </a>
            </li>
            
            <?php
            $current_page = isset($current_page) ? $current_page : 1;
            $start_page = max(1, $current_page - 2);
            $end_page = min($total_pages, $current_page + 2);

            // for($i = 1; $)

            ?>

            </li>
            <li class="page-item active">
              <a class="page-link" href="#">1</a>
            </li>
            <li class="page-item">
              <a class="page-link" href="#">2</a>
            </li>
            <li class="page-item">
              <a class="page-link" href="#">3</a>
            </li>
            <li class="page-item">
              <a class="page-link" href="#">4</a>
            </li>
            <li class="page-item">
              <a class="page-link" href="#">5</a>
            </li>
            <li class="page-item">
              <a class="page-link" href="#">6</a>
            </li>
            <li class="page-item">
              <a class="page-link page-link-arrow" href="#">
                <svg class="svg-inline--fa fa-caret-right" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="caret-right" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 512" data-fa-i2svg=""><path fill="currentColor" d="M118.6 105.4l128 127.1C252.9 239.6 256 247.8 256 255.1s-3.125 16.38-9.375 22.63l-128 127.1c-9.156 9.156-22.91 11.9-34.88 6.943S64 396.9 64 383.1V128c0-12.94 7.781-24.62 19.75-29.58S109.5 96.23 118.6 105.4z"></path></svg><!-- <i class="fa fa-caret-right"></i> Font Awesome fontawesome.com -->
              </a>
            </li>
          </ul>
        </nav>

        <!-- Slider
        <div class="flickity-page-dots-inner mb-9 flickity-enabled is-draggable" data-flickity="{&quot;pageDots&quot;: true}" tabindex="0">
          <div class="flickity-viewport" style="height: 50px;">
            <div class="flickity-slider" style="transform: translateX(-300%);">
              <div class="w-100 flickity-cell is-selected" style="transform: translateX(300%);"></div>
                <div class="flickity-page-dots"><button type="button" class="flickity-page-dot is-selected" aria-current="step">View slide 1</button><button type="button" class="flickity-page-dot">View slide 2</button><button type="button" class="flickity-page-dot">View slide 3</button>
                </div>
                <div class="w-100 flickity-cell" aria-hidden="true" style="transform: translateX(100%);">
                  <div class="card bg-cover" style="background-image: url(assets/img/covers/cover-29.jpg)"></div>
                </div>
                <div class="w-100 flickity-cell" aria-hidden="true" style="transform: translateX(200%);">
                  <div class="card bg-cover" style="background-image: url(assets/img/covers/cover-30.jpg);"></div>
                </div>
              </div>
            </div>
          </div>
        </div> -->
      
        --------
        
        

      </div>
      
    </div>
  </div>
</section>