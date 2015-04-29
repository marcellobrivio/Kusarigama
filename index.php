<?php get_header(); ?>

					<?php if (have_posts()) : ?>

						<?php while (have_posts()) : the_post(); ?>
		
							<article>
								<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
									<h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
									<p class="metadata"><span class="updated">Posted on <time pubdate datetime="<?php the_time('Y-m-d H:i'); ?>"><?php the_time('F jS, Y'); ?></time></span> <?php if ( $user_ID ) : ?> &middot; <?php edit_post_link(); ?> <?php endif; ?>&middot; <?php comments_popup_link('No Comments', '1 Comment &raquo;', '% Comments &raquo;'); ?></p>
									<div class="content">
										<?php if (is_sticky() && is_home()) : ?>
											<?php the_excerpt(); ?>
										<?php else : ?>
											<?php the_content('[Read more...]'); ?>
										<?php endif; ?>
									</div>
									<?php if (is_sticky() && is_home()) : ?>
										<p class="continue"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">Read the full story... &raquo;</a></p>
										<p class="hidden author vcard"><a class="url fn" href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><?php the_author(); ?></a></span></p>
									<?php else : ?>
										<p class="category">Author: <span class="author vcard"><a class="url fn" href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><?php the_author(); ?></a></span> &middot; Filed under: <?php the_category(', '); ?> <?php the_tags(' &middot; Tags: ', ', ', ''); ?></p>
									<?php endif; ?>
								</div>
							</article>
		
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