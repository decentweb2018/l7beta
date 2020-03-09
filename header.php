<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package _l7_theme
 */

?><!DOCTYPE html>
<!--[if lte IE 8]>
<html class="no-js lt-ie10 lt-ie9 oldie" <?php language_attributes() ?>> <![endif]-->
<!--[if IE 9]>
<html class="no-js lt-ie10 oldie" <?php language_attributes() ?>> <![endif]-->
<!--[if gt IE 9]><!-->
<html class="no-js" <?php language_attributes() ?>> <!--<![endif]-->
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>

    <!-- Typekit -->
    <script src="https://use.typekit.net/fdx3mlw.js"></script>
    <script>try {
            Typekit.load({async: true});
        } catch (e) {
        }</script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>

    <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/assets/dist/7beta.js"></script>

    <script src="https://use.fontawesome.com/d573432fa9.js"></script>

	<?php wp_head(); ?>
</head>
<?php
    $should_display_notification = get_field( 'should_display_notification', 'option' );

$body_class = '';
if ( !empty($should_display_notification) ){
	$body_class = 'show-page-alert';
}

    $notification = get_field( 'notification', 'option' );

?>

<body <?php body_class( $body_class ); ?>>
<div class="breakpoint-context"></div>
<div id="page" class="hfeed site" data-wow-duration="2s">
    <a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', '_l7_theme' ); ?></a>

    <header id="masthead" class="site-header <?php echo get_field('shorter_header', 'option') ? 'smaller-header' : ''; ?>" role="banner" >
        <button type="button" class="menu-toggle header__menu-toggle" role="button">
			<div class="menu-hamburger">

				<span class="closed">
					<div class="hamburger">
						<span class="base"></span>
					</div>

					<!-- <img src="<?php echo get_template_directory_uri(); ?>/assets/img/btn-open.svg" alt="<?php echo bloginfo('name'); ?>"> -->
				</span>

				<span class="opened"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/btn-close.svg" alt="<?php echo bloginfo('name'); ?>"></span>
			</div>
		</button>
	    <?php
	    if ( !empty($should_display_notification) ):
		    ?>
            <div class="page-alert" <?php
            if( !empty( $notification[0]['custom_color_1'] ) ){
	            $color1 = $notification[0]['custom_color_1'];
	            $color2 = $notification[0]['custom_color_2'];
	            ?> style="background:<?php echo $color1; ?>;background:-moz-linear-gradient(left, <?php echo $color1; ?> 30%, <?php echo $color2; ?> 70%);background:-webkit-linear-gradient(left, <?php echo $color1; ?> 30%,<?php echo $color2; ?> 70%);background:linear-gradient(to right, <?php echo $color1; ?> 30%,<?php echo $color2; ?> 70%);filter:progid:DXImageTransform.Microsoft.gradient( startColorstr='<?php echo $color1; ?>', endColorstr='<?php echo $color2; ?>',GradientType=1 );" <?php
            }
            ?>>
                <div class="max-width-container">
                    <button>X</button>
				    <?php
				    echo "<span>" . $notification[0]['text'] . "</span>";
				    foreach ( $notification[0]['cta'] as $link ):
					    $target = ( $link['new_window'] ? '_blank' : '_self' );
					    ?>
                        <a href="<?php echo $link['url']; ?>"
                           class="cta over-effect <?php echo $link['css_class'] ?>" target="<?php echo $target; ?>">
                            <?php echo $link['label'] ?>
                        </a>
					    <?php
				    endforeach;
				    ?>
                </div>
            </div>
		    <?php
	    endif;
	    ?>
<!--
		<div class="nav-trigger-container">
              <button id="nav-trigger" class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
                  <span class="label">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/menu-button.svg">
                  </span>
                  <div class="icon">
                      <div class="top"></div>
                      <div class="center"></div>
                      <div class="bottom"></div>
                  </div>
              </button>
          </div>
-->
<!--           Navigation Trigger -->
        <div class="max-width-container header-container-flex">




		<div class="header-container-flex--left">
          <div class="site-branding">
              <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="site-logo" rel="home">
                  <?php
                      $logo     = get_field( 'logo', 'options' );
                      $logo_alt = get_field( 'logo_alt', 'options' );

                      if ( empty( $logo ) ) {
                          $logo = get_template_directory_uri() . '/assets/img/l7alpha.png';
                      } else {
                          $logo = $logo['url'];
                      }

                      if ( empty( $logo_alt ) ) {
                          $logo_alt = get_template_directory_uri() . '/assets/img/l7alpha.png';
                      } else {
                          $logo_alt = $logo_alt['url'];
                      }

                      //$width  = get_field( 'logo_width', 'options' );
                      $height = get_field( 'logo_height', 'options' );

                      //if( ! empty($width) ){
                          //$width = "width=\"{$width}\"";
                      //}

                      if( ! empty($height) ){
                        $height = "height:{$height}px";
                      }
                  ?>
                  <img class="show-initial" src="<?php echo $logo; ?>" style="<?php echo $height ?>"
                       alt="<?php bloginfo( 'name' ); ?> logo">
                  <!--<img class="show-on-opaque" src="<?php //echo $logo_alt; ?>" style="<?php //echo $height ?>"
                       alt="<?php //bloginfo( 'name' ); ?> logo">-->
                  <span id="txtlogo" class="text-logo">Home</span>
              </a>
          </div><!-- .site-branding -->

          <div class="main-nav main-navigation">
            <?php wp_nav_menu(
              array(
                'theme_location'  => 'primary',
                'menu_id'         => 'new-primary-menu',
                'container_class' => 'new-primary-menu-container'
              )
            ); ?>
            
            <style>
              <?php 
                $breakpoint = get_field('hide_breakpoint', 'options');
                if($breakpoint) {
                  $breakpoint = $breakpoint;
                }else{
                  $breakpoint = 900;
                }
              ?>
              @media (max-width: <?php echo $breakpoint; ?>px) {
                .site-header .main-navigation {
                  display: none;
                }
              }
            </style>
          </div>
		</div>

			<!-- Search -->

			<button class="mobile-search-toggle"></button>

			<div class="ui-widget ajax-search-widget header__ajax-search-widget">
				<form role="search" method="get" class="ajax-search-widget__form" action="<?php echo home_url( '/' ) ?>" >
					<label for="field1" class="ajax-search-widget__label">Search:</label>
					<input type="text" value="" name="s" class="l7_autocomplete ajax-search-widget__input" id="field1" fields_to_search="post_content,post_title" />
					<input type="submit" class="ajax-search-widget__searchsubmit" value="" />
				</form>
			</div>

          <!-- <nav id="site-navigation" class="main-navigation" role="navigation">
      <?php wp_nav_menu(
        array(
          'theme_location'  => 'primary',
          'menu_id'         => 'new-primary-menu',
          'container_class' => 'new-primary-menu-container'
        )
      ); ?> -->



          </nav><!-- #site-navigation -->


          <!-- <div class="search-top">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/search.svg" width="30px">
          </div> -->
        </div>



        <?php
        $custom_header_color = get_field('custom_header_color');
        if( !empty( $custom_header_color ) || is_home() || is_archive() || is_search() || is_404() || is_single() ){
            ?>
                <style>
                    <?php
                        $header_bg_color = get_field('header_bg_color');
                        $header_logo_color = get_field('header_logo_color');
					   $home_button_color = get_field('header_home_button_color');
                        $header_button_color = get_field('header_button_color');
                        $header_menu_trigger_color = get_field('header_menu_trigger_color');

                        if( ( is_home() || is_archive() || is_search() || is_404() || is_single() ) && empty($custom_header_color) ){
                            $header_colors = get_field('global_header_colors', 'options');

                            $header_bg_color = $header_colors['header_bg_color'];
                            $header_logo_color = $header_colors['header_logo_color'];
						   $home_button_color = $header_colors['header_home_button_color'];
                            $header_button_color = $header_colors['header_button_color'];
                            $header_menu_trigger_color = $header_colors['header_menu_trigger_color'];
                        }

                        if( !empty( $header_bg_color ) ){
                            ?>
                                .site-header{
                                    background-color: <?php echo $header_bg_color; ?>;
                                }
                            <?php
                        }

                        if( !empty( $home_button_color ) ){
                            ?>
							.site-header .max-width-container .site-branding .site-logo .text-logo{
                                    color: <?php echo $home_button_color; ?>;
                                }
                            <?php
                        }

                        if( $header_logo_color === 'dark' ){
                            ?>
                                .site-header .max-width-container .site-branding img.show-initial{
                                    display: none;
                                }

                                .site-header .max-width-container .site-branding img.show-on-opaque{
                                    display: inline-block;
                                }
                            <?php
                        }

                        if( !empty( $header_button_color ) ){
                            ?>
                                .primary-menu-container ul li a{
                                    color: <?php echo $header_button_color; ?>;
                                }
                                .site-header .max-width-container .site-branding .site-logo .text-logo{
                                    color: <?php echo $header_button_color; ?>;
                                }
                            <?php
                        }

                        if( !empty( $header_menu_trigger_color ) ){
                            ?>
                                .main-navigation .menu-toggle{
                                    color: <?php echo $header_menu_trigger_color; ?>;
                                }
                                .main-navigation .menu-toggle#nav-trigger .icon div{
                                    background-color: <?php echo $header_menu_trigger_color; ?>;
                                }
                            <?php
                        }


                    ?>

                </style>
            <?php
        }
        ?>
    </header><!-- #masthead -->

    <div id="content" class="site-content">

      <!-- <div class="ui-widget"><label for="l7_autocomplete_1">Search: </label><br>
      <input class="l7_autocomplete ui-autocomplete-input" id="l7_autocomplete_1" type="text" fields_to_search="post_content,post_title" autocomplete="off"></div>
      <div class="ui-widget" style="margin-top: 2em; font-family: Arial;">Debug:<p></p>
      <div id="l7_autocomplete_debug" class="ui-widget-content" style="height: 200px; width: 300px; overflow: auto;"></div>
      </div> -->
