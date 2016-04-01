<?php /*Template Name: Page Programas Plantilla*/ ?>

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
			<!-- Traer todos los programas -->
			<?php  
				//args 
				$args = array(
					'order'          => 'ASC',
					'orderby'        => 'menu_order',
					'post_type'      => 'programas',
					'posts_per_page' => -1,
				);

				//query
				$query = new WP_Query( $args );

				$i = 0;

				if( $query->have_posts() ) : while( $query->have_posts() ) : $query->the_post();
			?>

				<article class="sectionPrograma__article">
					
					<!-- Imagen -->
					<?php if( has_post_thumbnail() ) : ?>
						<figure class="<?= ($i%2) == 0 ? 'pull-left' : 'pull-right' ?>"><?php the_post_thumbnail('full', array('class'=>'img-responsive') ); ?></figure>
					<?php endif; ?>

					<!-- Contenido -->
					<div class="sectionPrograma__article__info">
						<h3><?= ucfirst( get_the_title() ); ?></h3>
						<p class="excerpt"><?= get_the_excerpt(); ?></p>
						<p><?= get_the_content(); ?></p>
					</div><!-- /.sectionPrograma__article__info -->

					<div class="clearfix"></div>

				</article><!-- /.sectionPrograma__article -->


			<?php $i++; endwhile; endif; wp_reset_postdata(); ?>
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