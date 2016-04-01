<?php
/***********************************************************************************************/
/* Add a menu option to link to the customizer */
/***********************************************************************************************/
add_action('admin_menu', 'display_custom_options_link');
function display_custom_options_link() {
	add_theme_page('Gotas Options', 'Gotas Options', 'edit_theme_options', 'customize.php');
}

/***********************************************************************************************/
/* Add options in the theme customizer page */
/***********************************************************************************************/
add_action('customize_register', 'gotas_customize_register');
function gotas_customize_register($wp_customize) {
	// Logo 
	$wp_customize->add_section('gotas_logo', array(
		'title' => __('Logo', 'gotas-framework'),
		'description' => __('Permite subir tu logo personalizado.', 'gotas-framework'),
		'priority' => 35
	));
	
	$wp_customize->add_setting('gotas_custom_settings[logo]', array(
		'default' => IMAGES . '/logo.png',
		'type' => 'option'
	));
	
	$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'logo', array(
		'label' => __('Carga tu Logo', 'gotas-framework'),
		'section' => 'gotas_logo',
		'settings' => 'gotas_custom_settings[logo]'
	)));

	####>>>>>>>>>>>> REDES SOCIALES >>>>>>>>>>>>>>>>>>
	$wp_customize->add_section('gotas_redes_sociales', array(
		'title' => __('Redes Sociales', 'gotas-framework'),
		'description' => __('Sección Redes Sociales', 'gotas-framework'),
		'priority' => 41
	));	
	//facebook
	$wp_customize->add_setting('gotas_custom_settings[red_social_fb]', array(
		'default' => '',
		'type' => 'option'
	));
	$wp_customize->add_control('gotas_custom_settings[red_social_fb]', array(
		'label'    => __('Coloca el link de facebook de la empresa', 'gotas-framework'),
		'section'  => 'gotas_redes_sociales',
		'settings' => 'gotas_custom_settings[red_social_fb]',
		'type'     => 'text'
	));
	//youtube
	$wp_customize->add_setting('gotas_custom_settings[red_social_ytube]', array(
		'default' => '',
		'type' => 'option'
	));
	$wp_customize->add_control('gotas_custom_settings[red_social_ytube]', array(
		'label'    => __('Coloca el link de youtube de la empresa', 'gotas-framework'),
		'section'  => 'gotas_redes_sociales',
		'settings' => 'gotas_custom_settings[red_social_ytube]',
		'type'     => 'text'
	));
	//twitter
	$wp_customize->add_setting('gotas_custom_settings[red_social_twitter]', array(
		'default' => '',
		'type' => 'option'
	));
	$wp_customize->add_control('gotas_custom_settings[red_social_twitter]', array(
		'label'    => __('Coloca el link de twitter de la empresa', 'gotas-framework'),
		'section'  => 'gotas_redes_sociales',
		'settings' => 'gotas_custom_settings[red_social_twitter]',
		'type'     => 'text'
	));

	
	// Contact Email
	$wp_customize->add_section('gotas_contact_email', array(
		'title' => __('Correo Contacto de Formulario', 'gotas-framework'),
		'description' => __('Escribe el Correo Contacto de Formulario', 'gotas-framework'),
		'priority' => 37
	));
	
	$wp_customize->add_setting('gotas_custom_settings[contact_email]', array(
		'default' => '',
		'type' => 'option'
	));
	
	$wp_customize->add_control('gotas_custom_settings[contact_email]', array(
		'label'    => __('Dirección Contacto de Formulario', 'gotas-framework'),
		'section'  => 'gotas_contact_email',
		'settings' => 'gotas_custom_settings[contact_email]',
		'type'     => 'text'
	));

	//Customizar celular
	$wp_customize->add_section('gotas_contact_cel', array(
		'title' => __('Celular de Contacto', 'gotas-framework'),
		'description' => __('Celular de Contacto', 'gotas-framework'),
		'priority' => 39
	));
	
	$wp_customize->add_setting('gotas_custom_settings[contact_cel]', array(
		'default' => '',
		'type' => 'option'
	));
	
	$wp_customize->add_control('gotas_custom_settings[contact_cel]', array(
		'label'    => __('Escribe el o los números de celular del contacto separados por comas', 'gotas-framework'),
		'section'  => 'gotas_contact_cel',
		'settings' => 'gotas_custom_settings[contact_cel]',
		'type'     => 'text'
	));

	//Customizar telefono
	$wp_customize->add_section('gotas_contact_tel', array(
		'title' => __('Telefono de Contacto', 'gotas-framework'),
		'description' => __('Telefono de Contacto', 'gotas-framework'),
		'priority' => 39
	));
	
	$wp_customize->add_setting('gotas_custom_settings[contact_tel]', array(
		'default' => '',
		'type' => 'option'
	));
	
	$wp_customize->add_control('gotas_custom_settings[contact_tel]', array(
		'label'    => __('Escribe el numero de teléfono', 'gotas-framework'),
		'section'  => 'gotas_contact_tel',
		'settings' => 'gotas_custom_settings[contact_tel]',
		'type'     => 'text'
	));

	//Customizar Direccion
	$wp_customize->add_section('gotas_contact_address', array(
		'title' => __('Direccion de Contacto', 'gotas-framework'),
		'description' => __('Direccion de Contacto', 'gotas-framework'),
		'priority' => 40
	));
	
	$wp_customize->add_setting('gotas_custom_settings[contact_address]', array(
		'default' => '',
		'type' => 'option'
	));
	
	$wp_customize->add_control('gotas_custom_settings[contact_address]', array(
		'label'    => __('Escribe la Direccion del contacto ', 'gotas-framework'),
		'section'  => 'gotas_contact_address',
		'settings' => 'gotas_custom_settings[contact_address]',
		'type'     => 'text'
	));

	//Customizar MAPA
	$wp_customize->add_section('gotas_contact_mapa', array(
		'title' => __('Mapa de Contacto', 'gotas-framework'),
		'description' => __('Mapa de Contacto', 'gotas-framework'),
		'priority' => 41
	));
	
	$wp_customize->add_setting('gotas_custom_settings[contact_mapa]', array(
		'default' => '',
		'type' => 'option'
	));
	
	$wp_customize->add_control('gotas_custom_settings[contact_mapa]', array(
		'label'    => __('Escribe latitud y longitud de mapa sepador por coma', 'gotas-framework'),
		'section'  => 'gotas_contact_mapa',
		'settings' => 'gotas_custom_settings[contact_mapa]',
		'type'     => 'text'
	));

	//Customizar WIDGET Bienvenidos
	$wp_customize->add_section('gotas_widget_welcome', array(
		'title' => __('Información Bienvenida', 'gotas-framework'),
		'description' => __('Información Bienvenida', 'gotas-framework'),
		'priority' => 40
	));
	
	//textarea
	$wp_customize->add_setting('gotas_custom_settings[widget_welcome]', array(
		'default' => '',
		'type' => 'option'
	));
	
	$wp_customize->add_control('gotas_custom_settings[widget_welcome]', array(
		'label'    => __('Contenido Bienvenidos Portada', 'gotas-framework'),
		'section'  => 'gotas_widget_welcome',
		'settings' => 'gotas_custom_settings[widget_welcome]',
		'type'     => 'textarea'
	));
	//imagen
	$wp_customize->add_setting('gotas_custom_settings[image_welcome]',array(
		'default' => '',
		'type'    => 'option'
	));

	$wp_customize->add_control(new WP_Customize_Upload_Control($wp_customize,'widget_welcome',array(
		'label'    => __('Imagen welcome', 'gotas-framework'),
		'section'  => 'gotas_widget_welcome',
		'settings' => 'gotas_custom_settings[image_welcome]',
	)));

	//Customizar WIDGET Bienvenidos
	$wp_customize->add_section('gotas_widget_footer', array(
		'title' => __('Información Footer', 'gotas-framework'),
		'description' => __('Información Footer', 'gotas-framework'),
		'priority' => 40
	));
	
	//textarea
	$wp_customize->add_setting('gotas_custom_settings[widget_info_footer]', array(
		'default' => '',
		'type' => 'option'
	));
	
	$wp_customize->add_control('gotas_custom_settings[widget_info_footer]', array(
		'label'    => __('Contenido Informacion Footer', 'gotas-framework'),
		'section'  => 'gotas_widget_footer',
		'settings' => 'gotas_custom_settings[widget_info_footer]',
		'type'     => 'textarea'
	));
	//imagen
	$wp_customize->add_setting('gotas_custom_settings[widget_img_footer]',array(
		'default' => '',
		'type'    => 'option'
	));

	$wp_customize->add_control(new WP_Customize_Upload_Control($wp_customize,'widget_welcome',array(
		'label'    => __('Imagen welcome', 'gotas-framework'),
		'section'  => 'gotas_widget_footer',
		'settings' => 'gotas_custom_settings[widget_img_footer]',
	)));
	
}	
?>