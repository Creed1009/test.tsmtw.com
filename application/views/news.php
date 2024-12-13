<h1>News</h1>
<?php if(!empty($posts)) { foreach($posts as $post) { ?>
    <h2><?php echo $post['post_title'] ?></h2>
    <small><?php echo $post['post_content'] ?></small>
    <hr>
<?php }} ?>