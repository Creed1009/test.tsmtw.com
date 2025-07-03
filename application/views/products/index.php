<?php if(!empty($banner['page_banner'])){ ?>
    <img src="/assets/uploads/<?php echo $banner['page_banner'] ?>" class="img-fluid">
<?php } ?>

<style>
    /* body {
      background: #278092; 
      background: -webkit-gradient(linear, left top, left bottom, from(#00475E), to(#007276)); 
      background: -webkit-linear-gradient(top, #00475E, #007276); 
      background: -moz-linear-gradient(top, #00475E, #007276); 
      background: -o-linear-gradient(top, #00475E, #007276); 
      background: linear-gradient(to bottom, #00475E, #007276); 
      filter: progid:DXImageTransform.Microsoft.gradient(GradientType=0,startColorstr='#00475E', endColorstr='#007276'); 
    } */
    .sidebar {
        width: 250px;
        background-color: rgb(255, 255, 255); 
        padding: 15px;
        border-right: 1px solid #ddd;
    }

    .product-list {
        list-style: none;
        margin: 0;
        padding: 0;
        gap: 10px;
    }

    .product-card {
        width: 100%;
        height: 315px;
        padding: 10px;
        margin-bottom: 5px;
        background-color: rgb(255, 255, 255);
        border: 1px solid rgb(190, 209, 216);
        border-radius: 5px;
        display: flex;
        flex-direction: column;
        align-items: center;
        text-align: center;
        transition: transform 0.3s ease;
    }

    .product-card:hover .product-image img {
        transform: scale(1.1);
        transition: transform 0.3s ease;
    }

    .product-image {
        width: 100%;
        height: 250px;
        overflow: hidden;
        transition: transform 0.3s ease;
    }

    .product-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        display: block;
    }

    .col-12.col-md-4.col-lg-3 {
        width: 250px;
        background-color: rgb(255, 255, 255); 
        border: 1px solid rgb(190, 209, 216);
        border-radius: 5px;
        padding: 15px;
        border-right: 1px solid #ddd;
        
    }

    .col-12.col-md-4.col-lg-3-list {
        list-style: none;
        margin: 0;
        padding: 0;
        display: flex;
        flex-direction: column; 
        gap: 10px; 
    }

    .col-12.col-md-4.col-lg-3-list li {
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

    .category_btn {
    display: block;
    padding: 8px 12px;
    color: #333;
    text-decoration: none;
    border-radius: 4px;
    margin-bottom: 4px;
    transition: all 0.2s;
    }

    .productsNav {
        list-style: none;
        padding-left: 0;
        margin: 0;
    }

    .category_btn:hover {
        background-color: #f8f9fa;
        color: #007bff;
        text-decoration: none;
    }

    .category_btn.active {
        background-color: #007bff;
        color: white;
    }

    .spinner-border {
        width: 3rem;
        height: 3rem;
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
                分類
              </a>

              <!-- Collapse -->
              <div class="collapse show" id="categoryCollapse">
                <div class="form-group">
                  <ul class="productsNav">
                    <li>
                      <a href="javascript:void(0);" class="category_btn active" id="category_btn_0" onclick="setcategory(0)">全部商品</a>
                    </li>
                    <li>
                      <a href="javascript:void(0);" class="category_btn" id="category_btn_1" onclick="setcategory(1)">鍵盤</a>
                    </li>
                    <li>
                      <a href="javascript:void(0);" class="category_btn" id="category_btn_2" onclick="setcategory(2)">滑鼠</a>
                    </li>
                    <li>
                      <a href="javascript:void(0);" class="category_btn" id="category_btn_3" onclick="setcategory(3)">耳機</a>
                    </li>

                    <?php if(!empty($product_categories)) { foreach($product_categories as $category) { ?>
                  <li>
                    <a href="javascript:void(0);" class="category_btn" 
                       id="category_btn_<?php echo $category['category_id'] ?>" 
                       onclick="setcategory(<?php echo $category['category_id'] ?>)">
                       <?php echo $category['category_name'] ?>
                    </a>
                  </li>
                  <?php }} ?>

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
                  <a class="text-body" href="<?= base_url('products/' . $product['product_id']) ?>">
                    <!-- Image -->
                    <div class="product-image">
                      <img src="/assets/uploads/<?php echo $product['product_image1'] ?>" alt="<?php echo $product['product_title'] ?>">
                    </div>
                    <!-- Title -->
                    <div class="fw-bold">
                      <?php echo $product['product_title'] ?>
                    </div>
                    <!-- Price -->
                    <div class="product-price">
                      <?php echo $product['product_price'] ?>
                    </div>
                  </a>
                </div>
              </div>
            <?php  }
          } ?>
        </div>

            <!-- 分頁 -->
        
            <nav class="d-flex justify-content-center mt-4">
              <ul class="pagination">
                  
                  <?php if ($current_page > 1) { ?>
                      <li class="page-item">
                          <a class="page-link" href="?page=<?= $current_page - 1 ?>">«</a>
                      </li>
                  <?php } ?>

                  
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

                  
                  <?php
                  $start = max(1, $current_page - 2);
                  $end = min($total_pages, $current_page + 2);
                  for ($i = $start; $i <= $end; $i++) {
                  ?>
                      <li class="page-item <?= ($i == $current_page) ? 'active' : '' ?>">
                          <a class="page-link" href="?page=<?= $i ?>"><?= $i ?></a>
                      </li>
                  <?php } ?>

                  
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

<input type="hidden" id="category" value="0">

<script>

function setcategory(value) {
    $('#category').val(value);
    $('.category_btn').removeClass('active');
    $('#category_btn_' + value).addClass('active');
    
    searchProducts();
}


function searchProducts() {
    var category_id = $('#category').val();
    console.log("搜尋商品分類:", category_id);
    
    
    $("#productList").html('<div class="text-center py-5"><div class="spinner-border" role="status"><span class="visually-hidden">載入中...</span></div></div>');
    
    $.ajax({
        type: "GET",
        url: "<?= site_url('products/filter') ?>",
        data: { 
            category: category_id
        },
        success: function(response) {
            console.log("AJAX 成功:", response);
            $("#productList").html(response);
        },
        error: function(xhr, status, error) {
            console.log("AJAX 錯誤:", xhr.status, xhr.responseText);
            $("#productList").html('<div class="alert alert-danger">載入商品時發生錯誤，請稍後再試。</div>');
        }
    });
}

    
    $(document).ready(function() {
        setcategory(0);
    });
</script>