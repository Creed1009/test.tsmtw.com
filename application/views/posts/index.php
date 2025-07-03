
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
            
            <!-- Posts sidebar -->
            <div class="col-md-2 sidebar" style="padding: 10px 0; background: transparent;">
            <ul class="list-unstyled">
                <li>
                    <a href="javascript:void(0);" class="category_btn" id="category_btn_0" onclick="setcategory(0)";>最新消息</a>
                </li>
                <li>
                    <a href="javascript:void(0);" class="category_btn" id="category_btn_2" onclick="setcategory(2)";>教師專業</a>
                </li>
                <li>
                    <a href="javascript:void(0);" class="category_btn" id="category_btn_3" onclick="setcategory(3)";>新聞及法規</a>
                </li>
                <li>
                    <a href="javascript:void(0);" class="category_btn" id="category_btn_5" onclick="setcategory(5)";>會務訊息</a>
                </li>
                
                <?php if(!empty($post_category)) { foreach($post_category as $pc) { ?>
                <li class="nav nav-tabs" style="padding: 15px;">
                <a href="javascript:void(0);" class="category_btn"
                    id="category_btn_<?php echo $pc['posts_category_id'] ?>"
                    onclick="setcategory(<?php echo $pc['posts_category_id'] ?>);">
                    <?php echo $pc['post_category_name'] ?>
                </a>
                </li>
                <?php }} ?>
            </ul>
            </div>
            
            <!-- Posts -->
            <div id="postList" class="col-12 col-md-8 col-lg-9">
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
            
        </div>
    </div>
</section>

<input type="hidden" id="category" value="0">
<script>
    function setcategory(value){
        $('#category').val(value);
        $('.category_btn').removeClass('active');
        $('#category_btn_'+value).addClass('active');

        searchFilter();
    }

    function searchFilter(){
        var category_id = $('#category').val();
        console.log("過濾分類", category_id);

        $.ajax({
            type: "GET",
            url: "<?= site_url('posts/filter') ?>",
            data: { category: category_id,
            }, 
            success: function(response){
                $("#postList").html(response);
            },
            error: function(){
                console.log("Error loading posts.");
            }
        });
    }
</script>