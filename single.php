<?php get_header(); ?>

					<?php if (have_posts()) : ?>

						<?php while (have_posts()) : the_post(); ?>
		
							<article>
								<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
									<h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
									<p class="metadata"><span class="updated">Posted on <time pubdate datetime="<?php the_time('Y-m-d H:i'); ?>"><?php the_time('F jS, Y'); ?></time></span> <?php if ( $user_ID ) : ?> &middot; <?php edit_post_link(); ?> <?php endif; ?>&middot; <?php comments_popup_link('No Comments', '1 Comment &raquo;', '% Comments &raquo;'); ?></p>
									<div class="content">
										<?php the_content(); ?>
										<?php wp_link_pages('before=<p class="post-pagination"><span>Pages:</span>&after=</p>'); ?>
									</div>
									<?php if (is_attachment()) : ?>
										<p class="category">Author: <span class="author vcard"><a class="url fn" href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><?php the_author(); ?></a></span> &middot; This is an attachment</p>
									<?php else : ?>
										<p class="category">Author: <span class="author vcard"><a class="url fn" href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><?php the_author(); ?></a></span> &middot; Filed under: <?php the_category(', '); ?> <?php the_tags(' &middot; Tags: ', ', ', ''); ?></p>
									<?php endif; ?>
									
								</div>
							</article>
							
							<?php comments_template(); ?>	
		
						<?php endwhile; ?>

					<?php else : ?>

						<h2 class="center">Not Found</h2>
						<p class="center">Sorry, but you are looking for something that isn't here.</p>

					<?php endif; ?>

				</div><!-- /mainColumn -->
				

<?php get_sidebar(); ?>
		
<?php get_footer(); ?>