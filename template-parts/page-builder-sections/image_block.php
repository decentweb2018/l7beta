<?php


?>
<section class="<?php l7_pb::component_class( $component ); ?> <?php l7_pb::animate_classes( $component['animate_options'][0] ); ?>" >
	<?php if (defined('WP_DEBUG') && true === WP_DEBUG){ ?><div style="display: none;"><?php print_r( $component ); ?></div><?php } ?>

	<?php if ( $component['is_full_width'] === 'false'): ?>
	<div class="max-width-container">
	<?php endif; ?>

		<?php
			$toggle = $component['image'][0]['bg_toggle'];
			if( $toggle === 'Image' ){
				if ( in_array( 'single', $component['image'][0]['responsive_options'] ) ){
					?>
						<img src="<?php echo $component['image'][0]['bg_image']['url']; ?>">
					<?php
				}else{

				}
			}else if( $toggle === 'Video' ){
				?><div class="oembed-container"><?php
				l7_pb::background_video( $component['image'][0] );
				?>
				</div><?php
			}else if( $toggle === 'Parallax' ){
				$image = $component['image'][0]['bg_image'];
				?>
				<div class="parallax-container" >
					<div class="parallax">
						<div class="parallax_item" style="background-image: url( <?php echo $image['url']; ?> );">
						</div>
					</div>
				</div>
				<?php
			}
		?>

	<?php if ( $component['is_full_width'] === 'false'): ?>
	</div>
	<?php endif; ?>

</section>
