<?php if(!empty($banner['page_banner'])){ ?>
    <img src="/assets/uploads/<?php echo $banner['page_banner'] ?>" class="img-fluid">
<?php } ?>

<style>
    .sidebar {
        width: 250px;
        background-color: rgb(253, 252, 162); /* 側邊欄背景色 */
        padding: 15px;
        border-right: 1px solid #ddd;
    }

    .product-list {
        list-style: none;
        margin: 0;
        padding: 0;
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
    }

    .product-card {
        width: 100%;
        height: 300px;
        padding: 10px;
        background-color: rgb(216, 188, 188);
        border: 1px solid rgb(190, 209, 216);
        border-radius: 5px;
        display: flex;
        flex-direction: column;
        align-items: center;
        text-align: center;
    }

    .product-image {
        width: 100%;
        height: 250px;
        overflow: hidden;
    }

    .product-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

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

    .container {
        width: 100%;
        padding-right: var(--bs-gutter-x, 0.75rem);
        padding-left: var(--bs-gutter-x, 0.75rem);
        margin-top: 100px;
        margin-right: auto;
        margin-left: auto;
    }

</style>

<section class="py-11">
  <div class="container">
    <div class="row">
      
      <div class="col-12 col-md-4 col-lg-3 sidebar">
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
        <!-- Products -->
        <div class="row">
          <?php
          // 每頁顯示的商品數量
          $products_per_page = 12;
          $current_page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
          $total_products = count($products);
          $total_pages = ceil($total_products / $products_per_page);
          
          // 計算當前頁應顯示的商品
          $start_index = ($current_page - 1) * $products_per_page;
          $current_products = array_slice($products, $start_index, $products_per_page);

          if (!empty($current_products)) {
            foreach ($current_products as $product) { ?>
              <div class="col-6 col-md-4 col-lg-3">
                <div class="product-card">
                  <!-- Image -->
                  <div class="product-image">
                    <img src="/assets/uploads/<?php echo $product['product_image1'] ?>" alt="<?php echo $product['product_title'] ?>">
                  </div>
                  <!-- Title -->
                  <div class="fw-bold">
                    <a class="text-body" href="<?= base_url('products/' . $product['product_id']) ?>">
                      <?php echo $product['product_title'] ?>
                    </a>
                  </div>
                  <!-- Price -->
                  <div class="product-price">
                    <?php echo $product['product_price'] ?>
                  </div>
                </div>
              </div>
          <?php }
          } ?>
        </div>

        <!-- Pagination -->
  <nav class="d-flex justify-content-center mt-4">
    <ul class="pagination">
        <!-- 上一頁 -->
        <?php if ($current_page > 1) { ?>
            <li class="page-item">
                <a class="page-link" href="?page=<?= $current_page - 1 ?>">«</a>
            </li>
        <?php } ?>

        <!-- 第一頁 -->
        <?php if ($current_page > 3) { ?>
            <li class="page-item">
                <a class="page-link" href="?page=1">1</a>
            </li>
            <?php if ($current_page > 4) { ?>
                <li class="page-item disabled">
                    <span class="page-link">...</span>
                </li>
            <?php } ?>
        <?php } ?>

        <!-- 當前頁碼的前後頁 -->
        <?php
        $start = max(1, $current_page - 2);
        $end = min($total_pages, $current_page + 2);
        for ($i = $start; $i <= $end; $i++) {
        ?>
            <li class="page-item <?= ($i == $current_page) ? 'active' : '' ?>">
                <a class="page-link" href="?page=<?= $i ?>"><?= $i ?></a>
            </li>
        <?php } ?>

        <!-- 最後一頁 -->
        <?php if ($current_page < $total_pages - 2) { ?>
            <?php if ($current_page < $total_pages - 3) { ?>
                <li class="page-item disabled">
                    <span class="page-link">...</span>
                </li>
            <?php } ?>
            <li class="page-item">
                <a class="page-link" href="?page=<?= $total_pages ?>"><?= $total_pages ?></a>
            </li>
        <?php } ?>

        <!-- 下一頁 -->
        <?php if ($current_page < $total_pages) { ?>
            <li class="page-item">
                <a class="page-link" href="?page=<?= $current_page + 1 ?>">»</a>
            </li>
        <?php } ?>
    </ul>
</nav>

      </div>
      
    </div>
  </div>
</section>