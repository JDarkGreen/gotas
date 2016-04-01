
var j = jQuery.noConflict();

(function($){

	j(document).on('ready',function(){

		//CLICK BOTON SUBIR BANNER PAGE
		j('body').on('click', '#btn_add_banner_page' ,function(e){
			e.preventDefault();

			var boton_add = j(this);

			var mediaUploader;
			var post_id = j(this).attr('data-id-post');

			if (mediaUploader) { mediaUploader.open(); return; }

			mediaUploader = wp.media.frames.file_frame = wp.media({
				title: 'Escoge Image',
				button: {
					text: 'Escoge Image'
				}, multiple: false 
			}); 

			mediaUploader.on('select', function() {
          		attachment = mediaUploader.state().get('selection').first().toJSON();

          		var campo_field = j("#input_img_banner_page_"+post_id);
          		//setea el campo
          		campo_field.val(attachment.url);

          		//mostrar imagen temporal

          		j('.container-btn').html("");
          		j('.container-btn').append("<a id='btn_add_banner_page' data-id-post='"+post_id+"' class='js-link_banner' href='#' style='display: block'> <img src='"+attachment.url+"' alt='banner-page' style='width: 200px; height: 100px; margin: 0 auto;' /> </a> <a style='display:block;' id='delete_banner_page' class='delete_banner_page' data-id-post='"+post_id+"' href='#'>Quitar Banner</a>");

          		//agregar boton eliminar

			});
        	
        	// Open the uploader dialog
        	mediaUploader.open();

		});

		//ELIMINAR
		j('body').on('click', '#delete_banner_page' ,function(e){
			e.preventDefault();

			var button_delete = j(this);

			var post_id = button_delete.attr('data-id-post');

          	var campo_field = j("#input_img_banner_page_"+post_id);
          	//setea el campo
          	campo_field.val("-1");
          	//ocultar imagen
          	j('.js-link_banner').slideUp();

          	j('.container-btn').html("");
          	j('.container-btn').append("<a id='btn_add_banner_page' data-id-post='"+post_id+"' class='js-link_banner' href='#' style='display: block'>Insertar Banner</a>");


		});


	});

})(jQuery);