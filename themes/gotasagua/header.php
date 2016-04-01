<!DOCTYPE html>
<!--[if IE 8]> <html <?php language_attributes(); ?> class="ie8"> <![endif]-->
<!--[if !IE]><!--> <html <?php language_attributes(); ?>> <!--<![endif]-->
<head>
  	<meta charset="<?php bloginfo('charset'); ?>">
	<title><?php wp_title('|', true, 'right'); ?><?php bloginfo('name'); ?></title>
	<meta name="description" content="<?php bloginfo('description'); ?>">
	<meta name="author" content="">

	<!-- Mobile Specific Meta -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- Stylesheets -->
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" />
	
	<!-- Pingbacks -->
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

	<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->

	<!-- Favicon and Apple Icons -->
	
	
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

	<?php $options = get_option('gotas_custom_settings'); ?>

	<!-- Header -->
	<header class="mainHeader">

		<div class="container mainHeader__content">

			<!-- Logo -->
			<h1 class="logo">
				<a href="<?= site_url() ?>">
					<?php if( !empty($options['logo']) ) : ?>
						<img src="<?= $options['logo'] ?>" alt="logo-damol" class="img-responsive center-block" />
					<?php else: ?>
						<img src="<?= IMAGES ?>/logo.png" alt="logo-damol" class="img-responsive center-block" />
					<?php endif; ?>
				</a>
			</h1><!-- /logo -->	
			
			<!-- Seccion Absolute redes sociales y donal -->
			<section class="extra-info-header">
				<!-- redes sociales -->
				<ul class="social-links social-links--header">
					<!-- fb -->
					<?php $facebook = $options['red_social_fb']; if( !empty($facebook) ) : ?>
						<li><a target="_blank" href="<?= $facebook ?>"><img src="<?= IMAGES ?>/redes-sociales/facebook.png" alt="" class="img-responsive"></a></li>
					<?php endif; ?>				
					<!-- twitter -->
					<?php $twitter = $options['red_social_twitter']; if( !empty($twitter) ) : ?>
						<li><a target="_blank" href="<?= $twitter ?>"><img src="<?= IMAGES ?>/redes-sociales/twitter.png" alt="" class="img-responsive"></a></li>
					<?php endif; ?>
					<!-- youtube -->
					<?php $youtube = $options['red_social_ytube']; if( !empty($youtube) ) : ?>
						<li><a target="_blank" href="<?= $youtube ?>"><img src="<?= IMAGES ?>/redes-sociales/youtube.png" alt="facebook" class="img-responsive"></a></li>
					<?php endif; ?>
				</ul><!-- /.social-links -->

				<!-- Boton Donar ahora -->	
				<a href="" class="btn__green text-uppercase item-flex item-align-center"><?php _e( 'dona ahora', 'gotas-framework' );  ?></a>
			</section><!-- /.extra-info-header -->
			
		</div> <!-- /.mainHeader__content -->

	</header> <!-- /mainHeader -->

	<!-- Navegacion principal -->
	<nav class="mainNav">
		<?php wp_nav_menu(
			array(
				'menu_class'     => 'list-inline text-center',
				'theme_location' => 'main-menu'
			));
		?>			
	</nav><!-- /.mainNav -->