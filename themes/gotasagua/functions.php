<?php

/******************************************************************************************/
/* 	Define Constants */
/******************************************************************************************/
define('THEMEROOT', get_stylesheet_directory_uri());
define('IMAGES', THEMEROOT.'/images');

/*******************************************************************************************/
/* Customizar Logo Login de WORDPRESS ADMIN PANEL */
/*******************************************************************************************/

function login_logo(){ ?>	
	<style type="text/css">
		body.login #login h1 a{
			background-image: url( "<?= IMAGES ?>/custom-login-logo.jpg" );
		}
	</style>
<?php }

add_action('login_enqueue_scripts','login_logo');

function login_logo_url(){ return get_bloginfo('url'); }

add_action('login_headerurl','login_logo_url');


/***********************************************************************************************/
/* Load JS Files */
/***********************************************************************************************/
function load_custom_scripts() {
	//bxslider
	wp_enqueue_script('bxslider', THEMEROOT . '/js/jquery.bxslider.min.js', array('jquery'), '4.1.2', true);
	//fancybox
	wp_enqueue_script('fancybox', THEMEROOT . '/js/jquery.fancybox.pack.js', array('jquery'), '2.1.5', true);
	//google maps
	wp_enqueue_script('google-maps', 'https://maps.googleapis.com/maps/api/js?key=AIzaSyCNMUy9phyQwIbQgX3VujkkoV26-LxjbG0');
  	wp_enqueue_script('google-jsapi','https://www.google.com/jsapi'); 
  	//script
	wp_enqueue_script('custom_script', THEMEROOT . '/js/script.js', array('jquery'), false, true);
}

add_action('wp_enqueue_scripts', 'load_custom_scripts');

/***********************************************************************************************/
/* Cargar  JS Files en el administrador */
/***********************************************************************************************/

/* Add the media uploader script */
function load_admin_custom_enqueue() {
    wp_enqueue_media();
    //upload banner  
	wp_enqueue_script('upload-banner-page', THEMEROOT . '/js/media-lib-page.js', array('jquery'), '', true);
	//upload gallery en paginas
	wp_enqueue_script('upload-gallery-page', THEMEROOT . '/js/metabox-gallery.js', array('jquery'), '', true);
	
}

add_action('admin_enqueue_scripts', 'load_admin_custom_enqueue');


/***********************************************************************************************/
/* Add Theme Support for Post Formats, Post Thumbnails and Automatic Feed Links */
/***********************************************************************************************/
	add_theme_support('post-formats', array('link', 'quote', 'gallery', 'video'));
	add_theme_support('post-thumbnails', array('post','page','banner','galeria-images','programas'));
	set_post_thumbnail_size(210, 210, true);
	add_image_size('custom-blog-image', 784, 350);
	add_theme_support('automatic-feed-links');

/***********************************************************************************************/
/* Registrar categorías para paginas y etiquetas en el tema */
/***********************************************************************************************/
function add_taxonomies_to_pages() {
	register_taxonomy_for_object_type( 'post_tag', 'page' );
 	register_taxonomy_for_object_type( 'category', 'page' );
}

add_action( 'init', 'add_taxonomies_to_pages' );

/***********************************************************************************************/
/* Registrar Menus */
/***********************************************************************************************/
function register_my_menus(){
	register_nav_menus(
		array(
			'main-menu' => __('Main Menu', 'gotas-framework'),
		)
	);
}
add_action('init', 'register_my_menus');

/***********************************************************************************************/
/* Agregando nuevos tipos de post  */
/***********************************************************************************************/	


function gotas_create_post_type(){

	/*|>>>>>>>>>>>>>>>>>>>> BANNERS  <<<<<<<<<<<<<<<<<<<<|*/
	
	$labels = array(
		'name'               => __('Banners'),
		'singular_name'      => __('Banner'),
		'add_new'            => __('Nuevo Banner'),
		'add_new_item'       => __('Agregar nuevo Banner'),
		'edit_item'          => __('Editar Banner'),
		'view_item'          => __('Ver Banner'),
		'search_items'       => __('Buscar Banners'),
		'not_found'          => __('Banner no encontrado'),
		'not_found_in_trash' => __('Banner no encontrado en la papelera'),
	);

	$args = array(
		'labels'      => $labels,
		'has_archive' => true,
		'public'      => true,
		'hierachical' => false,
		'supports'    => array('title','editor','excerpt','custom-fields','thumbnail','page-attributes'),
		'taxonomies'  => array('post-tag','banner_category'),
		'menu_icon'   => 'dashicons-exerpt-view',
	);


	/*|>>>>>>>>>>>>>>>>>>>> OFICINAS  <<<<<<<<<<<<<<<<<<<<|*/
	
	$labels2 = array(
		'name'               => __('Oficinas'),
		'singular_name'      => __('Oficina'),
		'add_new'            => __('Nuevo Oficina'),
		'add_new_item'       => __('Agregar nuevo Oficina'),
		'edit_item'          => __('Editar Oficina'),
		'view_item'          => __('Ver Oficina'),
		'search_items'       => __('Buscar Oficina'),
		'not_found'          => __('Oficina no encontrado'),
		'not_found_in_trash' => __('Oficina no encontrado en la papelera'),
	);

	$args2 = array(
		'labels'      => $labels2,
		'has_archive' => true,
		'public'      => true,
		'hierachical' => false,
		'supports'    => array('title','editor','excerpt','custom-fields','thumbnail','page-attributes'),
		'taxonomies'  => array('post-tag'),
		'menu_icon'   => 'dashicons-building',
	);

	/*|>>>>>>>>>>>>>>>>>>>> Galería Imágenes <<<<<<<<<<<<<<<<<<<<|*/

	$labels3 = array(
		'name'               => __('Galería Imagen'),
		'singular_name'      => __('Imagen'),
		'add_new'            => __('Nueva Imagen'),
		'add_new_item'       => __('Agregar nueva Imagen'),
		'edit_item'          => __('Editar Imagen'),
		'view_item'          => __('Ver Imagen'),
		'search_items'       => __('Buscar Imagen'),
		'not_found'          => __('Imagen no encontrado'),
		'not_found_in_trash' => __('Imagen no encontrado en la papelera'),
	);

	$args3 = array(
		'labels'      => $labels3,
		'has_archive' => true,
		'public'      => true,
		'hierachical' => false,
		'supports'    => array('title','editor','excerpt','custom-fields','thumbnail','page-attributes'),
		'taxonomies'  => array('post-tag'),
		'menu_icon'   => 'dashicons-format-gallery'
	);

	/*|>>>>>>>>>>>>>>>>>>>> Galería Videos <<<<<<<<<<<<<<<<<<<<|*/
	$labels4 = array(
		'name'               => __('Galería Videos'),
		'singular_name'      => __('Video'),
		'add_new'            => __('Nuevo Video'),
		'add_new_item'       => __('Agregar nuevo Video'),
		'edit_item'          => __('Editar Video'),
		'view_item'          => __('Ver Video'),
		'search_items'       => __('Buscar Video'),
		'not_found'          => __('Video no encontrado'),
		'not_found_in_trash' => __('Video no encontrado en la papelera'),
	);

	$args4 = array(
		'labels'      => $labels4,
		'has_archive' => true,
		'public'      => true,
		'hierachical' => false,
		'supports'    => array('title','editor','excerpt','custom-fields','thumbnail','page-attributes'),
		'taxonomies'  => array('post-tag'),
		'menu_icon'   => 'dashicons-video-alt3'
	);

	/*|>>>>>>>>>>>>>>>>>>>> PROGRAMAS <<<<<<<<<<<<<<<<<<<<|*/
	$labels5 = array(
		'name'               => __('Programas'),
		'singular_name'      => __('Programa'),
		'add_new'            => __('Nuevo Programa'),
		'add_new_item'       => __('Agregar nuevo Programa'),
		'edit_item'          => __('Editar Programa'),
		'view_item'          => __('Ver Programa'),
		'search_items'       => __('Buscar Programa'),
		'not_found'          => __('Programa no encontrado'),
		'not_found_in_trash' => __('Programa no encontrado en la papelera'),
	);

	$args5 = array(
		'labels'      => $labels5,
		'has_archive' => true,
		'public'      => true,
		'hierachical' => false,
		'supports'    => array('title','editor','excerpt','custom-fields','thumbnail','page-attributes'),
		'taxonomies'  => array('post-tag'),
		'menu_icon'   => 'dashicons-admin-multisite'
	);
	
	/*|>>>>>>>>>>>>>>>>>>>> REGISTRAR  <<<<<<<<<<<<<<<<<<<<|*/
	register_post_type('banner',$args);
	register_post_type('oficina',$args2);
	register_post_type('galeria-images',$args3);
	register_post_type('galeria-videos',$args4);
	register_post_type('programas',$args5);
	
	flush_rewrite_rules();
}

add_action( 'init', 'gotas_create_post_type' );

/***********************************************************************************************/
/* Registrar nueva taxomomia para  nuevos tipos de post  */
/***********************************************************************************************/	

//create a custom taxonomy
add_action( 'init', 'create_damol_category_taxonomy', 0 );

function create_damol_category_taxonomy() {

	/* categorias banner */
	$labels = array(
	    'name'             => __( 'Categoría Banner'),
	    'singular_name'    => __( 'Categoría Banner'),
	    'search_items'     => __( 'Buscar Categoría Banner'),
	    'all_items'        => __( 'Todas Categorías del Banner' ),
	    'parent_item'      => __( 'Categoría padre del banner' ),
	    'parent_item_colon'=> __( 'Categoría padre:' ),
	    'edit_item'        => __( 'Editar categoría de banner' ), 
	    'update_item'      => __( 'Actualizar categoría de banner' ),
	    'add_new_item'     => __( 'Agregar nueva categoría de banner' ),
	    'new_item_name'    => __( 'Nuevo nombre categoría de banner' ),
	    'menu_name'        => __( 'Categoria Banner' ),
  	); 

	// Now register the taxonomy
  	register_taxonomy('banner_category',array('banner'), array(
	    'hierarchical'     => true,
	    'labels'           => $labels,
	    'show_ui'          => true,
	    'show_admin_column'=> true,
	    'query_var'        => true,
	    'rewrite'          => array( 'slug' => 'banner-category' ),
  	));
}


/***********************************************************************************************/
/* Agregar METABOX url galeria de videos */
/***********************************************************************************************/

//>>>>>>>>> META BOX URL VIDEO  <<<<<<<<<<<<<<<


add_action( 'add_meta_boxes', 'cd_meta_box_gotas_url_video_add' );

//llamar funcion 
function cd_meta_box_gotas_url_video_add()
{	
	$arr_postype_video = array('galeria-videos');

	//
	add_meta_box( 'mb-video-gotas-url', 'Link - Url del Video', 'cd_meta_box_gotas_url_video_cb', $arr_postype_video , 'normal', 'high' );
}
//customizar box
function cd_meta_box_gotas_url_video_cb( $post )
{
	// $post is already set, and contains an object: the WordPress post
    global $post;

	$values = get_post_custom( $post->ID );
	$text   = isset( $values['mb_gotas_url_video_text'] ) ? $values['mb_gotas_url_video_text'][0] : '';

	// We'll use this nonce field later on when saving.
    wp_nonce_field( 'my_meta_box_nonce', 'meta_box_nonce' );

    ?>
    <p>
        <label for="mb_gotas_url_video_text">Escribe la url del video : </label>
        <input size="45" type="text" name="mb_gotas_url_video_text" id="mb_gotas_url_video_text" value="<?php echo $text; ?>" />
    </p>
    <?php    
}
//guardar la data
add_action( 'save_post', 'cd_meta_box_gotas_url_video_save' );

function cd_meta_box_gotas_url_video_save( $post_id )
{
    // Bail if we're doing an auto save
    if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
     
    // if our nonce isn't there, or we can't verify it, bail
    if( !isset( $_POST['meta_box_nonce'] ) || !wp_verify_nonce( $_POST['meta_box_nonce'], 'my_meta_box_nonce' ) ) return;
     
    // if our current user can't edit this post, bail
    if( !current_user_can( 'edit_post' ) ) return;
     
    // now we can actually save the data
    $allowed = array( 
        'a' => array( // on allow a tags
            'href' => array() // and those anchors can only have href attribute
        )
    );
     
    // Make sure your data is set before trying to save it
    if( isset( $_POST['mb_gotas_url_video_text'] ) )
        update_post_meta( $post_id, 'mb_gotas_url_video_text', wp_kses( $_POST['mb_gotas_url_video_text'], $allowed ) );
}


/***********************************************************************************************/
/* Agregar METABOX para paginas galería  */
/***********************************************************************************************/

add_action( 'add_meta_boxes', 'attached_images_meta' );

function attached_images_meta() {
    $screens = array( 'post', 'page' ); //add more in here as you see fit

    foreach ($screens as $screen) {
        add_meta_box(
            'attached_images_meta_box', //this is the id of the box
            'Galería de Imagenes', //this is the title
            'attached_images_meta_box', //the callback
            $screen, //the post type
            'normal' //the placement
        );
    }
}
function attached_images_meta_box($post){
	
	$input_ids_img = -1;

	$input_ids_img = get_post_meta($post->ID, 'imageurls_'.$post->ID , true);
	
	$array_images  = explode(',', $input_ids_img );
	
	$args  = array(
		'post_type' => 'attachment',
		'post__in'  => $array_images,
	);
	$attachment = get_posts($args);

	//var_dump($attachment);

	foreach ($attachment as $atta ) : ?>

		<figure style="width: 150px;height: 90px; margin: 0 5px; display: inline-block; vertical-align: top; position: relative;">
			<a href="#" class="js-delete-image" data-id-post="<?= $post->ID; ?>" data-id-img="<?= $atta->ID ?>" style="border-radius: 50%; width: 20px;height: 20px; border: 2px solid red; color: red; position: absolute; top: -10px; right: -8px; text-decoration: none; text-align: center; background: black; font-weight: 700;">X</a>

			<img src="<?= $atta->guid; ?>" alt="<?= $atta->post_title; ?>" class="img-responsive" style="max-width: 100%; height: 100%; margin: 0 auto;" />
		</figure>

	<?php 

	endforeach;

	/*----------------------------------------------------------------------------------------------*/
	echo "<div style='display:block; margin: 0 0 10px;'></div>";
	/*----------------------------------------------------------------------------------------------*/
	echo '<input id="imageurls_'.$post->ID.'" type="hidden" name="imageurls_'.$post->ID.'" value="'.$input_ids_img. '" />';

    echo '<a id="add_image_btn" data-id-post="'.$post->ID.'" href="#" class="button button-primary button-large" data-editor="content">Agregar Imagen</a>';
    echo "<p class='description'>Después de Agregar/Eliminar elemento dar click en actualizar<p>";
}

function attached_images_save_postdata($post_id){
	if ( !empty($_POST['imageurls_'.$post_id]) ){
		$data = htmlspecialchars( $_POST['imageurls_'.$post_id] );
 		update_post_meta($post_id, 'imageurls_'.$post_id , $data);
 	}
}
add_action('save_post', 'attached_images_save_postdata');


/***********************************************************************************************/
/* METABOX PARA PAGINAS AGREGAR BANNER */
/***********************************************************************************************/

add_action( 'add_meta_boxes', 'add_banner_pages' );

function add_banner_pages() {
    $screens = array( 'page' ); //add more in here as you see fit

	foreach ($screens as $screen) {
        add_meta_box(
            'attachment_banner_pages', //this is the id of the box
            'Imagen Banner Página', //this is the title
            'add_banner_pages_meta_box', //the callback
            $screen, //the post type
            'side' //the placement
        );
    }
}
function add_banner_pages_meta_box($post){ 

	$input_banner_page = get_post_meta($post->ID, 'input_img_banner_page_'.$post->ID , true);
?>
	
	<!-- Input guarda valor de metabox -->
	<input type="hidden" id="input_img_banner_page_<?= $post->ID ?>" name="input_img_banner_page_<?= $post->ID ?>" value="<?= $input_banner_page ?>" />
	
	<!-- Boton Agregar eliminar banner -->
	<?php if( empty($input_banner_page) || $input_banner_page == -1 ) : ?>
		<a id="btn_add_banner_page" data-id-post="<?= $post->ID; ?>" class="js-link_banner" href="#" style="display: block">
			Insertar Banner
		</a>
	<?php elseif ( $input_banner_page != -1 ) : ?>
		<a id="btn_add_banner_page" data-id-post="<?= $post->ID; ?>" class="js-link_banner" href="#" style="display: block">
			<img src="<?= $input_banner_page; ?>" alt="banner-pages" style="width: 200px; height: 100px; margin: 0 auto;" />
		</a>
		<div class="container-btn">
			<a id="delete_banner_page" class="delete_banner_page" data-id-post="<?= $post->ID; ?>" href="#">Quitar Banner</a>		
		</div>
	<?php endif; ?>

	<p class="description">Al agregar/eliminar elemento dar clic en actualizar</p>

<?php 
}

/* Guardamos la Data */
function add_banner_pages_save_postdata($post_id){
	if ( !empty($_POST['input_img_banner_page_'.$post_id]) ){
		$data = htmlspecialchars( $_POST['input_img_banner_page_'.$post_id] );
 		update_post_meta($post_id, 'input_img_banner_page_'.$post_id , $data);
 	}
}
add_action('save_post', 'add_banner_pages_save_postdata');

/***********************************************************************************************/
/* METABOX PARA TIPO DE CONTENIDO OFICINA */
/***********************************************************************************************/

add_action( 'add_meta_boxes', 'gotas_metabox_add' );

//agregar
function gotas_metabox_add() {
    add_meta_box( 'mb-gotas-id', 'Metabox Oficinas', 'gotas_metabox_cb', 'oficina', 'normal', 'high' );
}
//function callback
function gotas_metabox_cb() {  

    global $post;
	$values       = get_post_custom( $post->ID );
	$text_address = isset( $values['mb_gotas_address_text'] ) ? $values['mb_gotas_address_text'][0] : '';
	$text_tel     = isset( $values['mb_gotas_tel_text'] ) ? $values['mb_gotas_tel_text'][0] : '';

    // We'll use this nonce field later on when saving.
    wp_nonce_field( 'my_meta_box_nonce', 'meta_box_nonce' );

?>
    <!-- Direccion -->
    <label for="mb_gotas_address_text">Direccion Oficina: </label>
    <input type="text" name="mb_gotas_address_text" id="mb_gotas_address_text" style="width: 100%;" value="<?= $text_address ?>" />
    <br>
    <!-- Numeros -->
	<label for="mb_gotas_tel_text">Información Teléfonos: </label>
    <input type="text" name="mb_gotas_tel_text" id="mb_gotas_tel_text" style="width: 100%;" value="<?= $text_tel ?>" />
    <?php    
}

//guardar la data
add_action( 'save_post', 'cd_meta_box_save' );


function cd_meta_box_save( $post_id ) {
    // Bail if we're doing an auto save
    if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
     
    // if our nonce isn't there, or we can't verify it, bail
    if( !isset( $_POST['meta_box_nonce'] ) || !wp_verify_nonce( $_POST['meta_box_nonce'], 'my_meta_box_nonce' ) ) return;
     
    // if our current user can't edit this post, bail
    if( !current_user_can( 'edit_post' ) ) return;
     
    // now we can actually save the data
    $allowed = array( 
        'a' => array( // on allow a tags
            'href' => array() // and those anchors can only have href attribute
        )
    );
     
    // Make sure your data is set before trying to save it
    if( isset( $_POST['mb_gotas_address_text'] ) )
        update_post_meta( $post_id, 'mb_gotas_address_text', wp_kses( $_POST['mb_gotas_address_text'], $allowed ) );

	if( isset( $_POST['mb_gotas_tel_text'] ) )
        update_post_meta( $post_id, 'mb_gotas_tel_text', wp_kses( $_POST['mb_gotas_tel_text'], $allowed ) );
}


/***********************************************************************************************/
/* Localization Support */
/***********************************************************************************************/
function custom_theme_localization() {
	$lang_dir = THEMEROOT . '/lang';
	
	load_theme_textdomain('gotas-framework', $lang_dir);
}

add_action('after_theme_setup', 'custom_theme_localization');

/***********************************************************************************************/
/* Agregar nuevas columnas en el panel de administracion   */
/***********************************************************************************************/

function gotas_add_thumbnail_columns( $columns ) {
    $columns = array(
		'cb'             => '<input type="checkbox" />',
		'featured_thumb' => 'Thumbnail',
		'title'          => 'Title',
		'author'         => 'Author',
		'categories'     => 'Categories',
		'tags'           => 'Tags',
		'comments'       => '<span class="vers"><div title="Comments" class="comment-grey-bubble"></div></span>',
		'date'           => 'Date'
    );
    return $columns;
}

function gotas_add_thumbnail_columns_data( $column, $post_id ) {
    switch ( $column ) {
    case 'featured_thumb':
        echo '<a href="' . get_edit_post_link() . '">';
        echo the_post_thumbnail( 'thumbnail' );
        echo '</a>';
        break;
    }
}

if ( function_exists( 'add_theme_support' ) ) {
    add_filter( 'manage_posts_columns' , 'gotas_add_thumbnail_columns' );
    add_action( 'manage_posts_custom_column' , 'gotas_add_thumbnail_columns_data', 10, 2 );
    add_filter( 'manage_pages_columns' , 'gotas_add_thumbnail_columns' );
    add_action( 'manage_pages_custom_column' , 'gotas_add_thumbnail_columns_data', 10, 2 );
}

/***********************************************************************************************/
/* Cargas opciones de la página y customizar widgets  */
/***********************************************************************************************/
require_once('functions/gotas-theme-customizer.php');