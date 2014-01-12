<?php get_header(); ?>

					<?php if (have_posts()) : ?>

						<?php while (have_posts()) : the_post(); ?>
		
							<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
								<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
								<p class="metadata">Posted on <?php the_time('F jS, Y'); ?> <?php if ( $user_ID ) : ?> &middot; <?php edit_post_link(); ?> <?php endif; ?>&middot; <?php comments_popup_link('No Comments', '1 Comment &raquo;', '% Comments &raquo;'); ?></p>
								<div class="content">
									<?php if (is_sticky()) : ?>
										<?php the_excerpt(); ?>
									<?php else : ?>
										<?php the_content('[Read more...]'); ?>
									<?php endif; ?>
								</div>
								<?php if (is_sticky()) : ?>
									<p class="continue"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">Read the full story... &raquo;</a></p>
								<?php else : ?>
									<p class="category">Author: <?php the_author_posts_link(); ?> &middot; Filed under: <?php the_category(', '); ?> <?php the_tags(' &middot; Tags: ', ', ', ''); ?></p>
								<?php endif; ?>
							</div>
		
						<?php endwhile; ?>

						<div class="navigation">
							<div class="navleft"><?php next_posts_link('&laquo; Older Entries'); ?></div>
							<div class="navright"><?php previous_posts_link('Newer Entries &raquo;'); ?></div>
						</div>

					<?php else : ?>

						<h2 class="center">Not Found</h2>
						<p class="center">Sorry, but you are looking for something that isn't here.</p>

					<?php endif; ?>

				</div><!-- /mainColumn -->
				

<?php get_sidebar(); ?>
		
<?php get_footer(); ?>