<?php get_header(); ?>

					<?php if (have_posts()) : ?>

						<?php while (have_posts()) : the_post(); ?>
		
							<div id="post-<?php the_ID(); ?>" class="post">
								<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
								<div class="content">
									<?php the_content(); ?>
								</div>
							</div>
		
						<?php endwhile; ?>

					<?php else : ?>

						<h2 class="center">Not Found</h2>
						<p class="center">Sorry, but you are looking for something that isn't here.</p>

					<?php endif; ?>

				</div><!-- /mainColumn -->
				

<?php get_sidebar(); ?>
		
<?php get_footer(); ?>