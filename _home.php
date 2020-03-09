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
				get_template_part( 'template-parts/content', get_post_format() );
			?>

		<?php endwhile; ?>
		<!-- End of the main loop -->

		<?php

			_l7_custom_pagination();

		?>

<?php else : ?>
		<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
<?php endif; ?>
	</div>
</div>
<?php get_footer(); ?>