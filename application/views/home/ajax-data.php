<?php if(!empty($posts)) { foreach($posts as $post) { ?>
	<?php // if($post['post_category']==$data['post_category_id']){ ?>
	<li class="list-group-item">
	    <span style="color: #019FE8"><?php echo substr($post['created_at'], 0, 10) ?></span>
	    <a href="/billboard?post=<?php echo $post['post_id'] ?>#post_<?php echo $post['post_id'] ?>" style="color: black; word-break: break-all;">
	        <?php echo $post['post_title'] ?><?php echo($post['post_topping']=='1')?(' (置頂)'):('') ?>
	    </a>
	</li>
	<?php // } ?>
<?php }} ?>
<nav aria-label="Page navigation" style="padding-top: 5px; padding-bottom: 5px;">
    <?php echo $this->ajax_pagination->create_links(); ?>
</nav>