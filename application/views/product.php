<?php if(!empty($banner['page_banner'])){ ?>
    <img src="/assets/uploads/<?php echo $banner['page_banner'] ?>" class="img-fluid">
<?php } ?>

<style>
    .col-12 col-md-4 col-lg-3 {
        width: 250px;
        background-color: #f4f4f4; /* 側邊欄背景色 */
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
        padding: 10px;
        background-color: #fff;
        border: 1px solid #ddd;
        border-radius: 5px;
        text-align: left;
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
                        <li class="list-styled-item">
                          <!-- Toggle -->
                          <a class="list-styled-link" data-bs-toggle="collapse" href="#jumpersCollapse">
                            Jumpers and Cardigans
                          </a>
                          <!-- Collapse -->
                          <div class="collapse" id="jumpersCollapse" data-bs-parent="#productsNav">
                            <div class="py-4 ps-5">
                              <div class="form-check mb-3">
                                <input class="form-check-input" id="jumpersOne" type="checkbox">
                                <label class="form-check-label" for="jumpersOne">
                                  Sweaters Plus-Size
                                </label>
                              </div>
                              <div class="form-check mb-3">
                                <input class="form-check-input" id="jumpersTwo" type="checkbox">
                                <label class="form-check-label" for="jumpersTwo">
                                  Plus Sweaters
                                </label>
                              </div>
                              <div class="form-check mb-3">
                                <input class="form-check-input" id="jumpersThree" type="checkbox">
                                <label class="form-check-label" for="jumpersThree">
                                  Petite Cardigans
                                </label>
                              </div>
                              <div class="form-check">
                                <input class="form-check-input" id="jumpersFour" type="checkbox">
                                <label class="form-check-label" for="jumpersFour">
                                  Tops, Tees &amp; Blouses
                                </label>
                              </div>
                            </div>
                          </div>
                        </li>
                        <li class="list-styled-item">
                          <!-- Toggle -->
                          <a class="list-styled-link" data-bs-toggle="collapse" href="#legginsCollapse">
                            Leggings
                          </a>
                          <!-- Collapse -->
                          <div class="collapse" id="legginsCollapse" data-bs-parent="#productsNav">
                            <div class="py-4 ps-5">
                              <div class="form-check mb-3">
                                <input class="form-check-input" id="legginsOne" type="checkbox">
                                <label class="form-check-label" for="legginsOne">
                                  Novelty Leggings
                                </label>
                              </div>
                              <div class="form-check mb-3">
                                <input class="form-check-input" id="legginsTwo" type="checkbox">
                                <label class="form-check-label" for="legginsTwo">
                                  Novelty Pants &amp; Capris
                                </label>
                              </div>
                              <div class="form-check mb-3">
                                <input class="form-check-input" id="legginsThree" type="checkbox">
                                <label class="form-check-label" for="legginsThree">
                                  Women Yoga Leggings
                                </label>
                              </div>
                              <div class="form-check">
                                <input class="form-check-input" id="legginsFour" type="checkbox">
                                <label class="form-check-label" for="legginsFour">
                                  Workout &amp; Training Leggings
                                </label>
                              </div>
                            </div>
                          </div>

                        </li>
                      </ul>
                    </div>
                  </div>

                </li>                 
              </ul>
            </form>

          </div>
          <div class="col-12 col-md-8 col-lg-9">

            <!-- Slider -->
            <div class="flickity-page-dots-inner mb-9 flickity-enabled is-draggable" data-flickity="{&quot;pageDots&quot;: true}" tabindex="0">

            <div class="flickity-viewport" style="height: 50px;">
              <div class="flickity-slider" style="transform: translateX(-300%);">
                <div class="w-100 flickity-cell is-selected" style="transform: translateX(300%);"></div>
                  <div class="flickity-page-dots"><button type="button" class="flickity-page-dot is-selected" aria-current="step">View slide 1</button><button type="button" class="flickity-page-dot">View slide 2</button><button type="button" class="flickity-page-dot">View slide 3</button>
                  </div>
                  <div class="w-100 flickity-cell" aria-hidden="true" style="transform: translateX(100%);">
                    <div class="card bg-cover" style="background-image: url(assets/img/covers/cover-29.jpg)">
                    </div>
                  </div>
              <div class="w-100 flickity-cell" aria-hidden="true" style="transform: translateX(200%);">
                <div class="card bg-cover" style="background-image: url(assets/img/covers/cover-30.jpg);">
                </div>
              </div></div></div>
                    </div>
            <!-- Tags -->
            <div class="row mb-7">
              <div class="col-12">
              </div>
            </div>
            <!-- Products -->
            <div class="row">
              <div class="col-6 col-md-4">
                <!-- Card -->
                <div class="card mb-7">
                  <!-- Image -->
                  <div class="card-img">
                    <!-- Image -->
                    <a class="card-img-hover" href="product.html">
                      <img class="card-img-top card-img-back" src="assets/img/products/product-01.jpg" alt="...">
                      <!-- <img class="card-img-top card-img-front" src="assets/img/products/product-5.jpg" alt="..."> -->
                    </a>
                    <!-- Actions -->
                    <div class="card-actions">
                      <span class="card-action">
                        <button class="btn btn-xs btn-circle btn-white-primary" data-bs-toggle="modal" data-bs-target="#modalProduct">
                          <i class="fe fe-eye"></i>
                        </button>
                      </span>
                      <span class="card-action">
                        <button class="btn btn-xs btn-circle btn-white-primary" data-toggle="button">
                          <i class="fe fe-shopping-cart"></i>
                        </button>
                      </span>
                      <span class="card-action">
                        <button class="btn btn-xs btn-circle btn-white-primary" data-toggle="button">
                          <i class="fe fe-heart"></i>
                        </button>
                      </span>
                    </div>
                  </div>
                  <!-- Body -->
                  <div class="card-body px-0">
                    <!-- Category -->
                    <div class="fs-xs">
                      <a class="text-muted" href="shop.html">Shoes</a>
                    </div>
                    <!-- Title -->
                    <div class="fw-bold">
                      <a class="text-body" href="product.html">
                        Leather mid-heel Sandals
                      </a>
                    </div>
                    <!-- Price -->
                    <div class="fw-bold text-muted">
                      $129.00
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-6 col-md-4">
                <!-- Card -->
                <div class="card mb-7">
                  <!-- Image -->
                  <div class="card-img">

                    <!-- Image -->
                    <a class="card-img-hover" href="product.html">
                      <img class="card-img-top card-img-back" src="assets/img/products/product-01.jpg" alt="...">
                      <img class="card-img-top card-img-front" src="assets/img/products/product-6.jpg" alt="...">
                    </a>

                    <!-- Actions -->
                    <div class="card-actions">
                      <span class="card-action">
                        <button class="btn btn-xs btn-circle btn-white-primary" data-bs-toggle="modal" data-bs-target="#modalProduct">
                          <i class="fe fe-eye"></i>
                        </button>
                      </span>
                      <span class="card-action">
                        <button class="btn btn-xs btn-circle btn-white-primary" data-toggle="button">
                          <i class="fe fe-shopping-cart"></i>
                        </button>
                      </span>
                      <span class="card-action">
                        <button class="btn btn-xs btn-circle btn-white-primary" data-toggle="button">
                          <i class="fe fe-heart"></i>
                        </button>
                      </span>
                    </div>
                  </div>
                  <!-- Body -->
                  <div class="card-body px-0">
                    <!-- Category -->
                    <div class="fs-xs">
                      <a class="text-muted" href="shop.html">Dresses</a>
                    </div>
                    <!-- Title -->
                    <div class="fw-bold">
                      <a class="text-body" href="product.html">
                        Cotton floral print Dress
                      </a>
                    </div>
                    <!-- Price -->
                    <div class="fw-bold text-muted">
                      $40.00
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-6 col-md-4">
                <!-- Card -->
                <div class="card mb-7">
                  <!-- Badge -->
                  <div class="badge bg-dark card-badge card-badge-start text-uppercase">
                    Sale
                  </div>
                  <!-- Image -->
                  <div class="card-img">
                    <!-- Image -->
                    <a class="card-img-hover" href="product.html">
                      <img class="card-img-top card-img-back" src="assets/img/products/product-122.jpg" alt="...">
                      <img class="card-img-top card-img-front" src="assets/img/products/product-7.jpg" alt="...">
                    </a>
                    <!-- Actions -->
                    <div class="card-actions">
                      <span class="card-action">
                        <button class="btn btn-xs btn-circle btn-white-primary" data-bs-toggle="modal" data-bs-target="#modalProduct">
                          <i class="fe fe-eye"></i>
                        </button>
                      </span>
                      <span class="card-action">
                        <button class="btn btn-xs btn-circle btn-white-primary" data-toggle="button">
                          <i class="fe fe-shopping-cart"></i>
                        </button>
                      </span>
                      <span class="card-action">
                        <button class="btn btn-xs btn-circle btn-white-primary" data-toggle="button">
                          <i class="fe fe-heart"></i>
                        </button>
                      </span>
                    </div>
                  </div>
                  <!-- Body -->
                  <div class="card-body px-0">
                    <!-- Category -->
                    <div class="fs-xs">
                      <a class="text-muted" href="shop.html">Shoes</a>
                    </div>
                    <!-- Title -->
                    <div class="fw-bold">
                      <a class="text-body" href="product.html">
                        Leather Sneakers
                      </a>
                    </div>

                    <!-- Price -->
                    <div class="fw-bold">
                      <span class="fs-xs text-gray-350 text-decoration-line-through">$85.00</span>
                      <span class="text-primary">$85.00</span>
                    </div>

                  </div>

                </div>

              </div>
              <div class="col-6 col-md-4">

                <!-- Card -->
                <div class="card mb-7">

                  <!-- Image -->
                  <div class="card-img">

                    <!-- Image -->
                    <a href="#!">
                      <img class="card-img-top card-img-front" src="assets/img/products/product-8.jpg" alt="...">
                    </a>

                    <!-- Actions -->
                    <div class="card-actions">
                      <span class="card-action">
                        <button class="btn btn-xs btn-circle btn-white-primary" data-bs-toggle="modal" data-bs-target="#modalProduct">
                          <i class="fe fe-eye"></i>
                        </button>
                      </span>
                      <span class="card-action">
                        <button class="btn btn-xs btn-circle btn-white-primary" data-toggle="button">
                          <i class="fe fe-shopping-cart"></i>
                        </button>
                      </span>
                      <span class="card-action">
                        <button class="btn btn-xs btn-circle btn-white-primary" data-toggle="button">
                          <i class="fe fe-heart"></i>
                        </button>
                      </span>
                    </div>

                  </div>

                  <!-- Body -->
                  <div class="card-body px-0">

                    <!-- Category -->
                    <div class="fs-xs">
                      <a class="text-muted" href="shop.html">Tops</a>
                    </div>

                    <!-- Title -->
                    <div class="fw-bold">
                      <a class="text-body" href="product.html">
                        Cropped cotton Top
                      </a>
                    </div>

                    <!-- Price -->
                    <div class="fw-bold text-muted">
                      $29.00
                    </div>

                  </div>

                </div>

              </div>
              <div class="col-6 col-md-4">

                <!-- Card -->
                <div class="card mb-7">

                  <!-- Image -->
                  <div class="card-img">

                    <!-- Image -->
                    <a href="#!">
                      <img class="card-img-top card-img-front" src="assets/img/products/product-9.jpg" alt="...">
                    </a>

                    <!-- Actions -->
                    <div class="card-actions">
                      <span class="card-action">
                        <button class="btn btn-xs btn-circle btn-white-primary" data-bs-toggle="modal" data-bs-target="#modalProduct">
                          <i class="fe fe-eye"></i>
                        </button>
                      </span>
                      <span class="card-action">
                        <button class="btn btn-xs btn-circle btn-white-primary" data-toggle="button">
                          <i class="fe fe-shopping-cart"></i>
                        </button>
                      </span>
                      <span class="card-action">
                        <button class="btn btn-xs btn-circle btn-white-primary" data-toggle="button">
                          <i class="fe fe-heart"></i>
                        </button>
                      </span>
                    </div>

                  </div>

                  <!-- Body -->
                  <div class="card-body px-0">

                    <!-- Category -->
                    <div class="fs-xs">
                      <a class="text-muted" href="shop.html">Dresses</a>
                    </div>

                    <!-- Title -->
                    <div class="fw-bold">
                      <a class="text-body" href="product.html">
                        Floral print midi Dress
                      </a>
                    </div>

                    <!-- Price -->
                    <div class="fw-bold text-muted">
                      $50.00
                    </div>

                  </div>

                </div>

              </div>
              <div class="col-6 col-md-4">

                <!-- Card -->
                <div class="card mb-7">

                  <!-- Badge -->
                  <div class="badge bg-dark card-badge card-badge-start text-uppercase">
                    Sale
                  </div>

                  <!-- Image -->
                  <div class="card-img">

                    <!-- Image -->
                    <a class="card-img-hover" href="product.html">
                      <img class="card-img-top card-img-back" src="assets/img/products/product-123.jpg" alt="...">
                      <img class="card-img-top card-img-front" src="assets/img/products/product-10.jpg" alt="...">
                    </a>

                    <!-- Actions -->
                    <div class="card-actions">
                      <span class="card-action">
                        <button class="btn btn-xs btn-circle btn-white-primary" data-bs-toggle="modal" data-bs-target="#modalProduct">
                          <i class="fe fe-eye"></i>
                        </button>
                      </span>
                      <span class="card-action">
                        <button class="btn btn-xs btn-circle btn-white-primary" data-toggle="button">
                          <i class="fe fe-shopping-cart"></i>
                        </button>
                      </span>
                      <span class="card-action">
                        <button class="btn btn-xs btn-circle btn-white-primary" data-toggle="button">
                          <i class="fe fe-heart"></i>
                        </button>
                      </span>
                    </div>

                  </div>

                  <!-- Body -->
                  <div class="card-body px-0">

                    <!-- Category -->
                    <div class="fs-xs">
                      <a class="text-muted" href="shop.html">Bags</a>
                    </div>

                    <!-- Title -->
                    <div class="fw-bold">
                      <a class="text-body" href="product.html">
                        Suede cross body Bag
                      </a>
                    </div>

                    <!-- Price -->
                    <div class="fw-bold">
                      <span class="fs-xs text-gray-350 text-decoration-line-through">$79.00</span>
                      <span class="text-primary">$49.00</span>
                    </div>

                  </div>

                </div>

              </div>
              <div class="col-6 col-md-4">

                <!-- Card -->
                <div class="card mb-7">

                  <!-- Image -->
                  <div class="card-img">

                    <!-- Image -->
                    <a class="card-img-hover" href="product.html">
                      <img class="card-img-top card-img-back" src="assets/img/products/product-124.jpg" alt="...">
                      <img class="card-img-top card-img-front" src="assets/img/products/product-11.jpg" alt="...">
                    </a>

                    <!-- Actions -->
                    <div class="card-actions">
                      <span class="card-action">
                        <button class="btn btn-xs btn-circle btn-white-primary" data-bs-toggle="modal" data-bs-target="#modalProduct">
                          <i class="fe fe-eye"></i>
                        </button>
                      </span>
                      <span class="card-action">
                        <button class="btn btn-xs btn-circle btn-white-primary" data-toggle="button">
                          <i class="fe fe-shopping-cart"></i>
                        </button>
                      </span>
                      <span class="card-action">
                        <button class="btn btn-xs btn-circle btn-white-primary" data-toggle="button">
                          <i class="fe fe-heart"></i>
                        </button>
                      </span>
                    </div>

                  </div>

                  <!-- Body -->
                  <div class="card-body px-0">

                    <!-- Category -->
                    <div class="fs-xs">
                      <a class="text-muted" href="shop.html">Skirts</a>
                    </div>
                    <!-- Title -->
                    <div class="fw-bold">
                      <a class="text-body" href="product.html">
                        Printed A-line Skirt
                      </a>
                    </div>
                    <!-- Price -->
                    <div class="fw-bold text-muted">
                      $79.00
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-6 col-md-4">
                <!-- Card -->
                <div class="card mb-7">
                  <!-- Badge -->
                  <div class="badge bg-white text-body card-badge card-badge text-uppercase">
                    New
                  </div>
                  <!-- Image -->
                  <div class="card-img">
                    <!-- Image -->
                    <a href="#!">
                      <img class="card-img-top card-img-front" src="assets/img/products/product-12.jpg" alt="...">
                    </a>
                    <!-- Actions -->
                    <div class="card-actions">
                      <span class="card-action">
                        <button class="btn btn-xs btn-circle btn-white-primary" data-bs-toggle="modal" data-bs-target="#modalProduct">
                          <i class="fe fe-eye"></i>
                        </button>
                      </span>
                      <span class="card-action">
                        <button class="btn btn-xs btn-circle btn-white-primary" data-toggle="button">
                          <i class="fe fe-shopping-cart"></i>
                        </button>
                      </span>
                      <span class="card-action">
                        <button class="btn btn-xs btn-circle btn-white-primary" data-toggle="button">
                          <i class="fe fe-heart"></i>
                        </button>
                      </span>
                    </div>

                  </div>
                  <!-- Body -->
                  <div class="card-body px-0">
                    <!-- Category -->
                    <div class="fs-xs">
                      <a class="text-muted" href="shop.html">Shoes</a>
                    </div>
                    <!-- Title -->
                    <div class="fw-bold">
                      <a class="text-body" href="product.html">
                        Heel strappy Sandals
                      </a>
                    </div>
                    <!-- Price -->
                    <div class="fw-bold text-muted">
                      $90.00
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- Pagination -->
            <nav class="d-flex justify-content-center justify-content-md-end">
              <ul class="pagination pagination-sm text-gray-400">
                <li class="page-item">
                  <a class="page-link page-link-arrow" href="#">
                    <svg class="svg-inline--fa fa-caret-left" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="caret-left" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 512" data-fa-i2svg=""><path fill="currentColor" d="M137.4 406.6l-128-127.1C3.125 272.4 0 264.2 0 255.1s3.125-16.38 9.375-22.63l128-127.1c9.156-9.156 22.91-11.9 34.88-6.943S192 115.1 192 128v255.1c0 12.94-7.781 24.62-19.75 29.58S146.5 415.8 137.4 406.6z"></path></svg><!-- <i class="fa fa-caret-left"></i> Font Awesome fontawesome.com -->
                  </a>
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

          </div>
        </div>
      </div>
    </section>