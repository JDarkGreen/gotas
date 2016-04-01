<?php /*Template Name: Page Nosotros Plantilla*/ ?>

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
</main> <!-- /.mainWrapper -->

<!-- Footer -->
<?php get_footer(); ?>