<?php  
	// The Query
	$args = array(
		'post_type' => 'banner',
		'tax_query' => array(
			array(
				'taxonomy'         => 'banner_category',
				'field'            => 'slug',
				'terms'            =>  $terms,
				)
			),
		'orderby'          => 'menu_order',
		'order'            => 'ASC'
		);
	$the_query = new WP_Query( $args );

	// The Loop
	if ( $the_query->have_posts() ) :

?>

<!-- Seccion de Banners -->
<section id="carousel-banner-home" class="sectionBanner carousel slide">
	<!-- Wrapper for slides -->
  	<ul id="carousel-home-bxslider" class="carousel-home-bxslider">
		<?php 
			//variable 
			$i = 0;

			while ( $the_query->have_posts() ) : $the_query->the_post();	
		?>	
		<?php if( has_post_thumbnail() ) : ?>
	    	<li class="item <?= $i == 0 ? 'active' : '' ?>">
	      		<?php echo the_post_thumbnail( 'full', array( 'class' => 'img-responsive' ) ); ?>
				
				<div class="container">
		      		<!-- Contenedor absoluto  -->
					<section class="item-caption">
						<h2 class="text-uppercase"><?= get_the_title(); ?></h2>
						<p><?= ucfirst( get_the_content() ); ?></p>
					</section><!-- /.item-caption -->
					
				</div> <!-- /.container -->

	    	</li> <!-- /.item -->
    	<?php endif; ?>
		<?php $i++; endwhile; ?>
    </ul> <!-- /.carousel-inner -->

    <div class="clearfix"></div>

</section> <!-- /sectionBanner#carousel-banner-home -->

<?php endif; ?>



