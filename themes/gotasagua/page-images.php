<?php /* Template Name: Página Images Plantilla */ ?>


<!-- Header -->
<?php get_header(); ?>

<!-- CONTENIDO PRINCIPAL -->
<main class="mainWrapper">

	<!-- Contenedor de Informacion  -->
	<section class="mainWrapper__content">

		<h2 class="mainWrapper__title text-capitalize"><?php _e('Galería de Imágenes', 'garoe-frameworks' ); ?></h2> <br/>

		<!-- GALERPIA DE Imagenes -->
		<?php 
			//query
			$args = array(
				'order'          => 'ASC',
				'orderby'        => 'menu_order',
				'post_type'      => 'galeria-images',
				'posts_per_page' => -1
			);

			$the_query = new WP_Query($args);

			if( $the_query->have_posts() ) : 
		?>
		<section class="mainContent__gallery">
			<?php while( $the_query->have_posts() ) : $the_query->the_post(); ?>
				<article class="mainContent__gallery__article--images text-center">
					<!-- imagen utilizar fancybox -->
					<?php 
						if( has_post_thumbnail() ) :
						$thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );
						$url   = $thumb['0']; 
					?>
						<a class="section-wrapper__multimedia__article grouped_elements" rel="group1" href="<?= $url ?>">
							<?php the_post_thumbnail('full',array('class'=>'img-responsive')); ?>
						</a>
						<h3 class="text-capitalize">
							<?php  
								$title = get_the_title();
								echo $title;
							?>
						</h3>
					<?php endif; ?>
					<!-- titulo -->
					<!--h3> <?php the_title(); ?> </h3-->
				</article> <!-- /.mainContent__gallery__article--images -->
			<?php endwhile; ?>
		</section><!-- /.mainContent__gallery -->
		
		<?php endif; wp_reset_postdata(); ?>
	
	</section> <!-- /.mainContent__container -->

</main> <!-- /.mainContent -->


<!-- Footer -->
<?php get_footer(); ?>