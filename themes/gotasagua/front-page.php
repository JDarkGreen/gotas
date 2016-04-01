<?php  

/* 
	Pagina de Inicio Home
*/
?>

<!-- Header -->
<?php get_header(); ?>

<!-- Incluir seccion de banner -->
<?php  
	$terms = ""; //el termino a pasar

	if( is_front_page() ){  
		$terms = 'portada';
	}

	//template
	include(locate_template('content-banner.php'));

	# Incluir opciones de tema
	$options = get_option('gotas_custom_settings'); 

	//var_dump($options);
?>

<!-- CONTENIDO PRINCIPAL -->
<main class="mainWrapper">
	
	<!-- Contenedor de Informacion  -->
	<section class="mainWrapper__content">
		<div class="row">
			<!-- Seccion bienvenida y articulos -->
			<section class="col-xs-12 col-md-8">
				<!-- Articulo bienvenida -->
				<article class="sectionHome__welcome">
					<!-- Titulo -->
					<h2 class="mainWrapper__title text-capitalize">bienvenidos</h2>

					<!-- Gotitas -->
					<p class="sub-title"><strong>Gotitas</strong></p>

					<!-- Imagen -->
					<?php $img_welcome = $options['image_welcome']; if(!empty($img_welcome)) : ?>
					<figure>
						<img src="<?= $img_welcome ?>" alt="banner_welcome_gotas" class="img-responsive" />	
					</figure>
					<?php endif; ?>

					<!-- Parrafo -->
					<?php $text_welcome = $options['widget_welcome']; if(!empty($text_welcome)) : ?>
						<p><?= strtolower( htmlentities( $text_welcome ) ); ?>

							<!-- Enlace	 -->
							<a href="#" class="btn__green item-flex item-align-center text-uppercase pull-right">leer más</a>

						</p>
					<?php endif; ?>

					<div class="clearfix"></div>

				</article><!-- /.sectionHome__welcome -->
			</section><!-- /.col-xs-12 col-md-8 -->

			<!-- Seccion aside redes sociales y voluntarios -->
			<aside class="col-xs-12 col-md-4">
				<!-- Contenedor facebook -->
				<section class="sectionHome__facebook">
					<!-- Conseguir enlace facebook -->
					<?php  $url_fb = $options['red_social_fb']; 
							if( empty($url_fb) ){
								$url_fb = "https://www.facebook.com/facebook";
							}
					?>

					<div id="fb-root"></div>

						<!-- Script -->
						<script>(function(d, s, id) {
						  var js, fjs = d.getElementsByTagName(s)[0];
						  if (d.getElementById(id)) return;
						  js = d.createElement(s); js.id = id;
						  js.src = "//connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v2.5";
						  fjs.parentNode.insertBefore(js, fjs);
						}(document, 'script', 'facebook-jssdk'));</script>

						<div class="fb-page" data-href="<?= $url_fb ?>" data-tabs="timeline" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true">
							<div class="fb-xfbml-parse-ignore">
								<blockquote cite="<?= $url_fb ?>">
									<a href="<?= $url_fb ?>"><?php bloginfo('name'); ?></a>
								</blockquote>
							</div>
						</div>

				</section><!-- / -->
			</aside><!-- /.col-xs-12 col-md-8 -->
		</div><!-- /.row -->

		<!-- Separador  -->
		<span class="line-separator"></span>

		<!-- seccion botonera -->
		<section class="sectionBotoneras text-center">
			<div class="row">
				<!-- Botonera -->
				<article class="itemBotonera__link col-xs-12 col-md-4">
					<a href="#">
						<img src="<?= IMAGES; ?>/botoneras/botonera_programas.png" alt="" class="img-responsive" />
					</a>
				</article>
				<!-- Botonera -->
				<article class="itemBotonera__link col-xs-12 col-md-4">
					<a href="#">
						<img src="<?= IMAGES; ?>/botoneras/botonera_videos.png" alt="" class="img-responsive" />
					</a>
				</article>
				<!-- Botonera -->
				<article class="itemBotonera__link col-xs-12 col-md-4">
					<a href="#">
						<img src="<?= IMAGES; ?>/botoneras/botonera_imagenes.png" alt="" class="img-responsive" />
					</a>
				</article>	
			</div><!-- /.row -->
		</section> <!-- /.sectionBotoneras -->

	</section> <!-- /.mainWrapper__content -->

</main> <!-- /.mainWrapper -->

<!-- Footer -->
<?php get_footer(); ?>