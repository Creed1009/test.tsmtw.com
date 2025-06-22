
<style>
    .row {
        margin-top: 50px;
    }
    
    .category_btn {
        display: block;
        padding: 10px;
        color: #333;
        text-decoration:none;
        cursor: pointer;
    }

    .category:hover {
        background-color: #f2f2f2;
        color: #000;
    }
</style>

<section class="posts-12">
    <div class="container">
        <div class="row">
            <!-- Posts -->

            <div class="col-md-2 sidebar" style="padding: 10px 0; background: transparent;">
            <ul class="list-unstyled">
                <li>
                    <a href="/posts?category=0" class="category_btn" onclick="setcategory(0)searchFilter()";>最新消息</a>
                </li>
                <li>
                    <a href="/posts?category=2" class="category_btn" onclick="setcategory(2)searchFilter()";>教師專業</a>
                </li>
                <li>
                    <a href="/posts?category=3" class="category_btn" onclick="setcategory(3)searchFilter()";>新聞及法規</a>
                </li>
                <li>
                    <a href="/posts?category=5" class="category_btn" onclick="setcategory(5)searchFilter()";>會務訊息</a>
                </li>
                
                <?php if(!empty($post_category)) { foreach($post_category as $pc) { ?>
                <li class="nav nav-tabs" style="padding: 15px;">
                    <p class="category_btn" id="category_btn_<?php echo $pc['posts_category_id'] ?>" onclick="setcategory(<?php echo $pc['posts_category_id'] ?>);searchFilter()" style="cursor: pointer;">
                        <?php echo $pc['post_category_name'] ?>
                    </p>
                </li>
                <?php }} ?>
            </ul>
        </div>

            <div class="col-12 col-md-8 col-lg-9">
                <?php if (!empty($posts)) { ?>
                    <?php foreach ($posts as $post) { ?>
                        <article class="mb-4">
                            <h2><?php echo $post['post_title']; ?></h2>
                            <p>
                                <?php 
                                    $preview = substr($post['post_content'], 0, 300);
                                    echo strip_tags($preview) . '...';
                                ?>
                            </p>
                            <a href="/posts/view/<?php echo $post['post_id']; ?>" class="btn btn-primary">
                                Read More
                            </a>
                            <!-- <small><?php echo $post['post_content']; ?></small> -->
                            <hr>
                        </article>
                    <?php } ?>
                <?php } else { ?>
                    <p>No posts available at the moment.</p>
                <?php } ?>
            </div>

            <!-- Posts sidebar -->
            <div class="col-12 col-md-4 col-lg-3">
                <!-- Add your sidebar or additional content here -->
                <p>Sidebar content goes here.</p>
            </div>
        </div>
    </div>
</section>

<input type="hidden" id="category" value="0">
<script>
    function setcategory(value){
        // $('#category').val(value);
        // $('.category_btn').removeClass('active');
        // $('#category_btn_'+value).addClass('active');

        // searchFilter();
    }

    function searchFilter(){
        var category_id = $('#category').val();
        var status = $('#status').val();
        var sortBy = $('#sortBy').val();
        console.log("過濾分類", category_id, "狀態", status, "排序", sortBy);

        $.ajax({
            type: "GET",
            url: "/posts/filter",
            data: { category: category_id,
                    status: status,
                    sortBy: sortBy 
                }, 
            success: function(response){
                $(".col-12.col-.col-lg-9").html(response);
            },
            error: function(){
                console.log("Error loading posts.");
            }
        });
    }
</script>