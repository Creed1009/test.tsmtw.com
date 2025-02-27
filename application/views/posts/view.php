<?php if (!empty($banner['page_banner'])) { ?>
    <img src="/assets/uploads/<?php echo $banner['page_banner'] ?>" class="img-fluid">
<?php } ?>


<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1><?php echo $page_title; ?></h1>

            <article class="post-detail">
                <h2><?php echo $post['post_title']; ?></h2>
                <p><?php echo $post['post_content']; ?></p>
            </article>

            <a href="<?php echo site_url('posts'); ?>" class="btn btn-secondary">Back to Posts</a>

        </div>
    </div>
</div>

