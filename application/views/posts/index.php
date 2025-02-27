<?php if(!empty($banner['page_banner'])){ ?>
    <img src="/assets/uploads/<?php echo $banner['page_banner'] ?>" class="img-fluid">
<?php } ?>

<section class="posts-12">
    <div class="container">
        <div class="row">
            <!-- Posts -->

            <div class="col-md-2" style="padding-top: 20px; padding-bottom: 30px; background: #E6E6E6;">
            <ul style="padding: 0px;">
                <li class="nav nav-tabs" style="padding: 15px;">
                    <p class="category_btn" id="category_btn_0" onclick="setcategory(0);searchFilter()" style="cursor: pointer;">
                        <a href="/posts?category=0">最新消息</a>
                    </p>
                </li>
                <li class="nav nav-tabs" style="padding: 15px;">
                    <p class="category_btn" id="category_btn_2" onclick="setcategory(2);searchFilter()" style="cursor: pointer;">
                        <a href="/posts?category=2">教師專業</a>
                    </p>
                </li>
                <li class="nav nav-tabs" style="padding: 15px;">
                    <p class="category_btn" id="category_btn_3" onclick="setcategory(3);searchFilter()" style="cursor: pointer;">
                        <a href="/posts?category=3">新聞及法規</a>
                    </p>
                </li>
                <li class="nav nav-tabs" style="padding: 15px;">
                    <p class="category_btn" id="category_btn_5" onclick="setcategory(5);searchFilter()" style="cursor: pointer;">
                        <a href="/posts?category=5">會務訊息</a>
                    </p>
                </li>
                <li class="nav nav-tabs" style="padding: 15px;">
                    <p class="category_btn" id="category_btn_6" onclick="setcategory(6);searchFilter()" style="cursor: pointer;">
                        <a href="/posts?category=6">工作報告</a>
                    </p>
                </li>
                <li class="nav nav-tabs" style="padding: 15px;">
                    <p class="category_btn" id="category_btn_7" onclick="setcategory(7);searchFilter()" style="cursor: pointer;">
                        <a href="/posts?category=7">法規專區</a>
                    </p>
                </li>
                <li class="nav nav-tabs" style="padding: 15px;">
                    <p class="category_btn" id="category_btn_8" onclick="setcategory(8);searchFilter()" style="cursor: pointer;">
                        <a href="/posts?category=8">其他</a>
                    </p>
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
        // var category_id = $('category').val();
        // console.log("過濾分類", category_id);

        // $.ajax({
        //     type: "GET",
        //     url: "/posts/filter",
        //     data: { category: category_id },
        //     success: function(response){
        //         $(".col-12.col-.col-lg-9").html(response);
        //     },
        //     error: function(){
        //         console.log("Error loading posts.");
        //     }
        // });
    }
</script>