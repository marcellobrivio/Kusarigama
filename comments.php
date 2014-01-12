<div id="comments">

<?php if ( post_password_required() ) : ?>
	<h3 class="highlight">Enter your password to view comments.</h3>
</div>
<?php
/* Stop the rest of comments.php from being processed but don't kill the script entirely */
	return;
endif;
?>

<?php if ($comments) : ?>

	<h3><?php comments_number('No Comments', 'One Comment', '% Comments' );?> on &quot;<?php the_title(); ?>&quot;</h3>
	
	<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
		<div class="navigation">
			<div class="navleft"><?php previous_comments_link('&laquo; Older Comments'); ?></div>
			<div class="navright"><?php next_comments_link('Newer Comments &raquo;'); ?></div>
		</div>
	<?php endif; ?>
	
	<ol class="commentlist">
		<?php wp_list_comments(); ?>
	</ol>

 <?php else : // this is displayed if there are no comments so far ?>

	<?php if ('open' == $post->comment_status) : ?>
		<!-- If comments are open, but there are no comments. -->
		<h3>There are still no comment for this article.<br />Quick, you can be the first!</h3>

	 <?php else : ?>
		<!-- If comments are closed. -->
		<h3>Comments are closed.</h3>

	<?php endif; ?>
<?php endif; ?>



<?php if ('open' == $post->comment_status) : ?>

	<?php comment_form(); ?>
	
<?php endif;?>

</div>