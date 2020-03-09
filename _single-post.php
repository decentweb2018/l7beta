<?php
get_header(); ?>
<div class="max-width-container blog-container">
	<?php get_sidebar(); ?>
<?php if ( have_posts() ) : ?>
	<div id="primary" class="content-area">

		<!-- Start of the main loop. -->
		<?php while ( have_posts() ) : the_post();  ?>

			<?php
				/*
				 * Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */

				//get_template_part( 'template-parts/content', get_post_format() );

			?>

			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<div class="reading-well">
					<?php if( is_single() ): ?>
						<a href="/blog" class="back-button">Go Back</a>
					<?php endif; ?>
					<header class="entry-header">
						<?php the_category(); ?>
						<?php the_title( sprintf( '<h1 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>
					</header><!-- .entry-header -->


<?php

$ipi = get_field('inner_post_image');

if ($ipi == 'image') { ?>
	<img src="<?php echo get_the_post_thumbnail_url(); ?>" width="100%">
<?php } else if ($ipi == 'solid-color') { ?>
	<div class="solid-color" style="background:<?php the_field('inner_post_solid_color'); ?>"></div>
<?php } else { ?>
	<div class="video-container">
				<iframe src="https://www.youtube.com/embed/<?php the_field('inner_post_video');?>?autoplay=1&controls=0&showinfo=0&loop=1" controls="0" showinfo="0" rel="0" autoplay="1" loop="1" frameborder="0" allowfullscreen></iframe>
	</div>

<? } ?>


					<div class="entry-content">
						<?php
							if( is_search() || is_category() || is_tag() || is_archive() || is_home() ){
								echo "<p>" . get_the_excerpt() . "</p>";
							} else{

								the_content( sprintf(
									/* translators: %s: Name of current post. */
									wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', '_l7_theme' ), array( 'span' => array( 'class' => array() ) ) ),
									the_title( '<span class="screen-reader-text">"', '"</span>', false )
								) );
							}
						?>

						<?php
							wp_link_pages( array(
								'before' => '<div class="page-links">' . esc_html__( 'Pages:', '_l7_theme' ),
								'after'  => '</div>',
							) );
						?>
					</div><!-- .entry-content -->
				</div>
			</article><!-- #post-## -->


		<?php endwhile; ?>
		<!-- End of the main loop -->

		<?php
		$orig_post = $post;
		global $post;
		$cats = wp_get_post_categories($post->ID);

		if ($cats) {
			$cat_ids = array();
			foreach($cats as $individual_cat) {
				$cat_ids[] = $individual_cat;
			}
			$args=array(
				'category__in' => $cat_ids,
				'post__not_in' => array($post->ID),
				'posts_per_page'=>4, // Number of related posts to display.
			);

			$my_query = new wp_query( $args );

			if( $my_query->have_posts() ):
				?>
					<div class="related-articles-title">
						<h3>More articles you might find interesting.</h3>
					</div>
					<div class="related-articles">
				<?php

						while( $my_query->have_posts() ) {
							$my_query->the_post();
							?>

							<div class="related-article">
								<?php the_category(); ?>
								<?php the_title( sprintf( '<h1 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>
								<a class="read-more-link" href="<?php the_permalink(); ?>">View Post</a>
							</div>

						<?php } ?>
					</div>
				<?php
			endif;
		}
		$post = $orig_post;
		wp_reset_query();
		?>
<?php else : ?>
		<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
<?php endif; ?>
	</div>

</div>
<?php get_template_part('template-parts/share-links'); ?>
<?php get_footer(); ?>
