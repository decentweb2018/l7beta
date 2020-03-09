<?php
	$contrast_color = l7_pb::contrast_color($component['background'][0]);
?>
<section class="<?php l7_pb::component_class( $component ); ?> <?php l7_pb::animate_classes( $component['animate_options'][0] ); ?>" style="<?php l7_pb::background_style( $component['background'][0] ); ?>">
	<?php if (defined('WP_DEBUG') && true === WP_DEBUG){ ?><div style="display: none;"><?php print_r( $component ); ?></div><?php } ?>
	<div class="max-width-container">
		<div class="reading-well">
			<?php
				echo apply_filters( 'the_content', $component['content'] );
			?>
			<?php if( !empty($component['links']) ): ?>
				<?php foreach ( $component['links'] as $link ): ?>
					<?php
						$target = ( $link['new_window'] ? '_blank' : '_self' );
					?>
					<a href="<?php echo $link['url']; ?>" class="cta over-effect" target="<?php echo $target; ?>" >
						<span class="over-effect-label"><?php echo $link['label'] ?></span><span class="icon icon-fast-forward"></span>
					</a>
				<?php endforeach; ?>
			<?php endif; ?>
		</div>
	</div>
	<?php l7_pb::overlay_bg( $component['background'][0] ) ?>
	<?php l7_pb::parallax_bg( $component['background'][0] ) ?>
	<?php l7_pb::background_video( $component['background'][0] ) ?>
</section>
