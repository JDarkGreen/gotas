<?php /*Template Name: Page Blog Plantilla*/ ?>

<!-- Header -->
<?php get_header(); 
	global $post; #var_dump($post);
	$options = get_option('gotas_custom_settings'); 
?>

<!-- Banner Superior de la pagina -->
<section class="sectionBannerSup position-relative">
<?php  
	$url_banner = get_post_meta( $post->ID , "input_img_banner_page_".$post->ID , true );
	if( !empty($url_banner)) :
?>
	<figure>
		<img src="<?= $url_banner ?>" alt="banner-imagen-pagina-<?= $post->post_title ?>" class="img-responsive" />
	</figure><!-- /figure -->

	<!-- Titulo -->
	<h2 class="sectionBannerSup__tittle text-uppercase"><?= $post->post_title; ?>
		<span class="line-green"></span>
	</h2><!-- /title -->

<?php endif; ?>
</section>
	


<!-- CONTENIDO PRINCIPAL -->
<main class="mainWrapper">

	<!-- Contenedor de Informacion  -->
	<section class="mainWrapper__content">
		
		<!-- Contenido de la Página -->
		<section class="sectionPage__content">
			<div class="row">
			<?php  
				//Traer todos los posts 
				$args = array(
					'post_type'      => 'post',
					'posts_per_page' => -1,
				);

				$query = new WP_Query( $args ); var_dump($query);


				if( $query->have_posts() ) : while( $query->have_posts() ) : $query->the_post();
			?>
				<article class="sectionBlog__article col-xs-12 col-md-4">
					<!-- Imagen -->
					<?php if( has_post_thumbnail() ) : ?>
						<?php the_post_thumbnail('full',array('class'=>'img-responsive')); ?>
					<?php endif; ?>

					<!-- Titulo -->
					<h3><?= get_the_title(); ?></h3>
					<!-- Fecha y autor -->
					<p class="paragraph-info-article">
						<span class="text-left">On: <?= get_the_date('l');  ?></span>
					</p>
					<!-- Contenido -->

				</article><!-- /.sectionBlog__article -->

			<?php endwhile; endif; wp_reset_postdata(); ?>

			</div> <!-- /<div class="row"></div> -->
		</section><!-- /. sectionPage__content -->

		<!-- Separador  -->
		<span class="line-separator"></span>

		<!-- SECCION DE BOTONERAS -->
		<?php 
			//parcial de botoneras para los enlaces
			include(locate_template('partials/botoneras.php')); 
		?>

	</section><!-- /-.mainWrapper__content -->

</main> <!-- /.mainWrapper -->

<!-- Footer -->
<?php get_footer(); ?>