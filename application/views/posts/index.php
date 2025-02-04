<h1>News</h1>


<section class="posts-12">
    <div class="container">
        <div class="row">
            <!-- Posts -->

            <div class="col-md-2" style="padding-top: 20px; padding-bottom: 00px; background: #E6E6E6;">
            <ul style="padding: 0px;">
                <li class="nav nav-tabs" style="padding: 15px;">
                    <p class="category_btn" id="category_btn_0" onclick="setcategory(0);searchFilter()" style="cursor: pointer;">
                        最新消息
                    </p>
                </li>
                <?php if(!empty($post_category)) { foreach($post_category as $pc) { ?>
                <li class="nav nav-tabs" style="padding: 15px;">
                    <p class="category_btn" id="category_btn_<?php echo $pc['post_category_id'] ?>" onclick="setcategory(<?php echo $pc['post_category_id'] ?>);searchFilter()" style="cursor: pointer;">
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