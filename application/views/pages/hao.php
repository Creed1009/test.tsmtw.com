<?php if(!empty($banner['page_banner'])): ?>
    <img src="/assets/uploads/<?php echo $banner['page_banner'] ?>" class="img-fluid">

<?php endif; ?>

<section>
    <div class="container">
        <h1><?php echo $page_title; ?></h1>
        <p>這是新控制器的首頁。</p>
        <p>您可以在這裡添加更多內容或功能。</p>
        
        <a href="<?php echo site_url('posts'); ?>" class="btn btn-primary">查看最新消息</a>
    </div>
</section>
