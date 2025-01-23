<h1>News</h1>


<section class="posts-12">
    <div class="container">
        <div class="row">
            <!-- Posts -->
            <div class="col-12 col-md-8 col-lg-9">
                <?php if (!empty($posts)) { ?>
                    <?php foreach ($posts as $post) { ?>
                        <article class="mb-4">
                            <h2><?php echo $post['post_title']; ?></h2>
                            <p>
                                <?php 
                                    $preview = substr($post['post_content'], 0, 100); 
                                    echo htmlspecialchars($preview) . '...';
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