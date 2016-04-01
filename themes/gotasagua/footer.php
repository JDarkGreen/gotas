
<?php $options = get_option('gotas_custom_settings'); 
	#var_dump($options);
?>

	<footer class="mainFooter">

		<!-- Seccion de Informacion del footer -->
		<section class="mainFooter__content text-center">
			<div class="row">
				<!-- Información -->
				<article class="mainFooter__article col-xs-5 text-left">
					<h3 class="text-uppercase"><?php _e( 'gotas de agua viva', 'gotas-framework' ); ?></h3>
					
					<!-- Image -->
					<?php $info_img_footer = $options['widget_img_footer']; if(!empty($info_img_footer)) : ?>
						<figure class="image-info-footer pull-right">
							<img src="<?=  $info_img_footer ?>" alt="" class="img-responsive" />
						</figure> <!-- /.image-info-footer pull-right -->
					<?php endif; ?>

					<!-- Parrafo -->
					<?php $info_footer = $options['widget_info_footer']; if(!empty($info_footer)) : ?>
						<p class="info"><?=  $info_footer ?></p>
					<?php endif; ?>
				</article><!-- /.mainFooter__article -->
				<!-- Redes Sociales -->
				<article class="mainFooter__article col-xs-2 item-flex item-align-center">
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
				</article><!-- /.mainFooter__article -->
				<!-- Oficinas -->
				<article class="mainFooter__article col-xs-5 text-right">
					<!-- Obtener las oficinas -->
					<?php  
						$args = array(
							'order'          => 'ASC',
							'orderby'        => 'menu_order',
							'post_type'      => 'oficina',
							'posts_per_page' => -1,
						);

						$oficinas = get_posts( $args ); //var_dump($oficinas);

						foreach( $oficinas as $ofi ) :
					?>
						<h3 class="title--skyblue text-uppercase"><?= "Oficina en " . $ofi->post_title; ?></h3>
						<?php $address = get_post_meta( $ofi->ID , 'mb_gotas_address_text' , true ); 
							if( !empty($address) ) : ?>
							<p> <?= $address; ?> </p>
						<?php endif; ?>
						<!-- Telefonos -->
						<?php $tel = get_post_meta( $ofi->ID , 'mb_gotas_tel_text' , true ); 
							if( !empty($tel) ) : ?>
							<p> <?= $tel; ?> </p>
						<?php endif; ?>

						<!-- span --> <span></span>
					<?php endforeach; ?>
				</article><!-- /.mainFooter__article -->
			</div><!-- /.row -->
		</section><!-- /.mainFooter__content -->

		<!-- Imagenes al final de footer -->
		<section class="mainFooter__bg">
			<img src="<?= IMAGES; ?>/bg-footer.png" alt="" class="img-responsive pull-left" />
			<img src="<?= IMAGES; ?>/bg-footer.png" alt="" class="img-responsive pull-left rotateY" />
			<div class="clearfix"></div>
		</section><!-- /.mainFooter__bg -->
		
	</footer>

	<?php wp_footer(); ?>

</body>
</html>