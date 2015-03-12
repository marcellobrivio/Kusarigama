			</div>
		</div>
		
		<footer>
		<div id="footer">

	<?php if ( !dynamic_sidebar('Footer') ) : ?>

				<div class="widget">
					<h4>Recent Posts</h4>
					<ul>
						<?php 
						$postslist = get_posts('numberposts=10');
						foreach ($postslist as $post) : 
							setup_postdata($post);
						?> 
						<li><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></li>
						<?php endforeach; ?>
					</ul>
				</div>
				
				<div class="widget">
					<h4>Archive</h4>
					<ul>
						<?php wp_get_archives('limit=10&show_post_count=true'); ?> 
					</ul>
				</div>

				<div class="widget">
					<h4>Categories</h4>
					<ul>
						<?php wp_list_categories('title_li=&orderby=name&show_count=1&depth=1'); ?>
					</ul>
				</div>		
			
				<div class="widget">
					<h4>Pages</h4>
					<ul>
						<?php wp_list_pages('title_li=&sort_column=menu_order&depth=-1'); ?>
					</ul>
				</div>
				
	 <?php endif; ?>

				<div class="specialWidget">
					<h4>Links</h4>
					<?php wp_nav_menu( array('theme_location' => 'specialWidget', 'fallback_cb' => 'specialWidget_fallback', 'container' => '', 'menu_class' => '')); ?>
				</div>
				
				<div id="feedLinks">
					<p class="rss"><a href="<?php bloginfo('rss2_url'); ?>" target="_blank">RSS Feed</a></p>
					<p class="top"><a href="#upperStrip" class="scrollPage">Top of page</a></p>
				</div>
				
				<div class="separator">&nbsp;</div>

				<nav>
					<div id="subMenu">
						<?php wp_nav_menu( array('theme_location' => 'footer_nav', 'fallback_cb' => 'defaultNavigation', 'container' => 'menu', 'menu_class' => '')); ?>
					</div>
				</nav>
				
				<p class="credits">&copy; <?php bloginfo('name'); ?> <?php echo date('Y'); ?> | Powered by <a href="http://www.wordpress.org/" title="WordPress, the best platform for bloging &amp; more" target="_blank">WordPress</a> and <a href="http://www.marcellobrivio.com/wordpress/kusarigama/" title="Kusarigama Theme for WordPress" target="_blank">Kusarigama</a>, a theme by Marcello Brivio | This page has been tested in all major browsers.</p>
			</div>
		</footer>
		
		<?php if (get_option("kusarigama_selectable_skin") == "1") : ?>
			<div id="skinControl">
				<ul>
					<li><a title="Activate Angry Ninja skin" href="?style=angry-ninja" rel="angry-ninja" class="styleswitch"><img src="<?php echo get_template_directory_uri(); ?>/images/angry-ninja-palette.png" alt="Angry Ninja" /></a></li>
					<li><a title="Activate Bright Angel skin" href="?style=bright-angel" rel="bright-angel" class="styleswitch"><img src="<?php echo get_template_directory_uri(); ?>/images/bright-angel-palette.png" alt="Bright Angel" /></a></li>
					<li><a title="Activate Verderio skin" href="?style=verderio" rel="verderio" class="styleswitch"><img src="<?php echo get_template_directory_uri(); ?>/images/verderio-palette.png" alt="Verderio" /></a></li>
				</ul>
			</div>
		<?php endif; ?>
		
						
		<script>
		// Scroll to top with animation
		$(function() {
		  $('.scrollPage').click(function() {
			if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
			  var target = $(this.hash);
			  target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
			  if (target.length) {
				$('html,body').animate({
				  scrollTop: target.offset().top
				}, 1000);
				return false;
			  }
			}
		  });
		});
		</script>
		
		<?php echo get_option("kusarigama_google_analytics"); ?>
		
		<?php wp_footer(); ?>
		
	</body>
</html>