<?php 

/**
 * Metaboxes para el home page
 */

add_action( 'cmb2_admin_init', 'edc_campos_home_page' );
/**
 * Hook in and add a metabox that only appears on the 'About' page
 */
function edc_campos_home_page() {

    $prefix = 'edc_homepage_';
    $id_home = get_option('page_on_front');
	/**
	 * Metabox to be displayed on a single page ID
	 */
	$edc_campos_homepage = new_cmb2_box( array(
		'id'           => $prefix . 'homepage',
		'title'        => esc_html__( 'Campos Homepage', 'cmb2' ),
		'object_types' => array( 'page' ), // Post type
		'context'      => 'normal',
		'priority'     => 'high',
		'show_names'   => true, // Show field names on the left
		'show_on'      => array(
			'id' => array( $id_home ),
		), 
	) );

    $edc_campos_homepage->add_field( array(
		'name'    => esc_html__( 'Texto Superior 1', 'cmb2' ),
		'desc'    => esc_html__( 'Texto para la parte superior del sitio web', 'cmb2' ),
		'id'      => $prefix.'texto_superior_1',
		'type'    => 'wysiwyg',
		'options' => array(
			'textarea_rows' => 5,
		),
	) );

    $edc_campos_homepage->add_field( array(
		'name' => esc_html__( 'Imagen Hero 1', 'cmb2' ),
		'desc' => esc_html__( 'Primera imagen para la parte superior', 'cmb2' ),
		'id'   => $prefix.'imagen_superior_1',
		'type' => 'file',
	) );

    $edc_campos_homepage->add_field( array(
		'name'    => esc_html__( 'Texto Superior 2', 'cmb2' ),
		'desc'    => esc_html__( 'Texto para la parte superior del sitio web', 'cmb2' ),
		'id'      => $prefix.'texto_superior_2',
		'type'    => 'wysiwyg',
		'options' => array(
			'textarea_rows' => 5,
		),
	) );

    $edc_campos_homepage->add_field( array(
		'name' => esc_html__( 'Imagen Hero 2', 'cmb2' ),
		'desc' => esc_html__( 'Primera imagen para la parte superior', 'cmb2' ),
		'id'   => $prefix.'imagen_superior_2',
		'type' => 'file',
	) );

    //Banner licenciatura 
    // Pie de pagina home

    $edc_campos_homepage->add_field( array(
		'name'    => esc_html__( 'Texto Banner inferior', 'cmb2' ),
		'desc'    => esc_html__( 'Texto para la parte inferior del sitio web', 'cmb2' ),
		'id'      => $prefix.'texto_banner_inferior',
		'type'    => 'wysiwyg',
		'options' => array(
			'textarea_rows' => 5,
		),
	) );

    $edc_campos_homepage->add_field( array(
		'name' => esc_html__( 'Imagen Banner Inferior', 'cmb2' ),
		'desc' => esc_html__( 'Imagen de fondo para banner inferior', 'cmb2' ),
		'id'   => $prefix.'imagen_banner_inferior',
		'type' => 'file',
	) );

}


add_action( 'cmb2_admin_init', 'edc_seccion_nosotros' );
/**
 * Hook in and add a metabox to demonstrate repeatable grouped fields
 */
function edc_seccion_nosotros() {
	$prefix = 'edc_group_';
	/**
	 * Repeatable Field Groups
	 */
	$edc_iconos = new_cmb2_box( array(
		'id'           => $prefix.'metabox',
		'title'        => esc_html__( 'Iconos con descripci??n', 'cmb2' ),
		'object_types' => array( 'page' ),
		'context' => 'normal',
		'priority' => 'high',
		'show_names' => true,
		'show_on' => array(
			'key' => 'page-template',
			'value' => 'page-iconos.php'
		)
	) );

	$edc_iconos->add_field( array(
		'name' => esc_html__( 'Titulo secci??n', 'cmb2' ),
		'desc' => esc_html__( 'A??ada un titulo para la secci??n', 'cmb2' ),
		'id'   => $prefix.'titulo_iconos',
		'type' => 'text',
	) );

	// $group_field_id is the field id string, so in this case: 'yourprefix_group_demo'
	$group_field_id = $edc_iconos->add_field( array(
		'id'          => $prefix.'nosotros',
		'type'        => 'group',
		'description' => esc_html__( 'Agregue opciones seg??n sea necesario', 'cmb2' ),
		'options'     => array(
			'group_title'    => esc_html__( 'Caracter??stica {#}', 'cmb2' ), // {#} gets replaced by row number
			'add_button'     => esc_html__( 'Agregar otro grupo', 'cmb2' ),
			'remove_button'  => esc_html__( 'Eliminar', 'cmb2' ),
			'sortable'       => true,
			'closed'      => true, // true to have the groups closed by default
			// 'remove_confirm' => esc_html__( 'Are you sure you want to remove?', 'cmb2' ), // Performs confirmation before removing group.
		),
	) );

	
	$edc_iconos->add_group_field( $group_field_id, array(
		'name'       => esc_html__( 'Titulo', 'cmb2' ),
		'id'         => 'title_icono',
		'type'       => 'text',
	) );

	$edc_iconos->add_group_field( $group_field_id, array(
		'name'        => esc_html__( 'Descripci??n', 'cmb2' ),
		'description' => esc_html__( 'Agregue una descripci??n a esta caracter??stica', 'cmb2' ),
		'id'          => 'desc_icono',
		'type'        => 'textarea_small',
	) );

	$edc_iconos->add_group_field( $group_field_id, array(
		'name' => esc_html__( 'Icono', 'cmb2' ),
		'id'   => 'image_icono',
		'type' => 'file',
	) );

}

/**
 Blog
 */
add_action( 'cmb2_admin_init', 'edc_campos_blog' );

function edc_campos_blog() {
	$prefix = 'edc_blog_';
    $id_blog = get_option('page_for_posts');
	/**
	 * Metabox to be displayed on a single page ID
	 */
	$edc_campos_homepage = new_cmb2_box( array(
		'id'           => $prefix . 'blog',
		'title'        => esc_html__( 'Campos Blog', 'cmb2' ),
		'object_types' => array( 'page' ), // Post type
		'context'      => 'normal',
		'priority'     => 'high',
		'show_names'   => true, // Show field names on the left
		'show_on'      => array(
			'id' => array( $id_blog ),
		), 
	) );

	$edc_campos_homepage->add_field( array(
		'name' => esc_html__( 'Slogan blog', 'cmb2' ),
		'desc' => esc_html__( 'A??ada una descripci??n a la p??gina web', 'cmb2' ),
		'id'   => $prefix.'slogan_blog',
		'type' => 'text',
	) );
}


/**
 * A??ade campos al post type de clases
 */

add_action( 'cmb2_admin_init', 'edc_campos_clases' );
/**
 * Hook in and add a metabox to demonstrate repeatable grouped fields
 */
function edc_campos_clases() {
	$prefix = 'edc_cursos_';
	/**
	 * Repeatable Field Groups
	 */
	$edc_campos_cursos = new_cmb2_box( array(
		'id'           => $prefix.'metabox',
		'title'        => esc_html__( 'Informaci??n de clases y cursos', 'cmb2' ),
		'object_types' => array( 'clases_cocina' ),
		'context' => 'normal',
		'priority' => 'high',
		'show_names' => true,
	) );

	$edc_campos_cursos->add_field( array(
		'id'   => $prefix.'subtitulo',
		'name' => esc_html__( 'Subtitulo del curso', 'cmb2' ),
		'desc' => esc_html__( 'A??ada un subtitulo para el curso', 'cmb2' ),
		'type' => 'text',
	) );

	$edc_campos_cursos->add_field( array(
		'id'   => $prefix.'info',
		'name' => esc_html__( 'Informaci??n sobre la fecha y horarios del curso', 'cmb2' ),
		'desc' => esc_html__( 'A??ada informaci??n relacionada a fechas, d??as y horas del curso', 'cmb2' ),
		'type' => 'title',
	) );

	$edc_campos_cursos->add_field( array(
		'id'   => $prefix.'indicaciones',
		'name' => esc_html__( 'Indicaciones para los d??as', 'cmb2' ),
		'desc' => esc_html__( 'A??ada las indicaciones de los d??as (ej: todos los lunes)', 'cmb2' ),
		'type' => 'text',
	) );

	$edc_campos_cursos->add_field( array(
		'name' => esc_html__( 'Fecha de inicio de curso', 'cmb2' ),
		'desc' => esc_html__( 'A??ada la fecha de inicio de curso', 'cmb2' ),
		'id'   => $prefix.'fecha_inicio_curso',
		'type' => 'text_date',
		'date_format' => 'd-m-Y',
		'column' => true
	) );


	$edc_campos_cursos->add_field( array(
		'name' => esc_html__( 'Fecha de fin de curso', 'cmb2' ),
		'desc' => esc_html__( 'A??ada la fecha de fin de curso', 'cmb2' ),
		'id'   => $prefix.'fecha_fin_curso',
		'type' => 'text_date',
		'date_format' => 'd-m-Y',
		'column' => true
	) );


	$edc_campos_cursos->add_field( array(
		'name' => esc_html__( 'Hora de inicio de clase', 'cmb2' ),
		'desc' => esc_html__( 'A??ada la hora de inicio de clase', 'cmb2' ),
		'id'   => $prefix.'hora_inicio_clase',
		'type' => 'text_time',
		'time_format' => 'H:i', // Set to 24hr format
		'column' => true
	) );

	$edc_campos_cursos->add_field( array(
		'name' => esc_html__( 'Hora de fin de clase', 'cmb2' ),
		'desc' => esc_html__( 'A??ada la hora de fin de clase', 'cmb2' ),
		'id'   => $prefix.'hora_fin_clase',
		'type' => 'text_time',
		'time_format' => 'H:i', // Set to 24hr format
		
	) );

	// Se a??ade informaci??n sobre cupos, precio, etc

	$edc_campos_cursos->add_field( array(
		'id'   => $prefix.'info_extra',
		'name' => esc_html__( 'Informaci??n Extra del curso', 'cmb2' ),
		'desc' => esc_html__( 'A??ada informaci??n relacionada a precio y cupo del curso', 'cmb2' ),
		'type' => 'title',
	) );

	$edc_campos_cursos->add_field( array(
		'name' => esc_html__( 'Precio del curso', 'cmb2' ),
		'desc' => esc_html__( 'A??ada el precio del curso', 'cmb2' ),
		'id'   => $prefix.'precio_curso',
		'type' => 'text_money',
		// 'before_field' => '??', // override '$' symbol if needed
		// 'repeatable' => true,
		'column' => true
	) );

	$edc_campos_cursos->add_field( array(
		'id'   => $prefix.'cupo',
		'name' => esc_html__( 'Cupo', 'cmb2' ),
		'desc' => esc_html__( 'A??ada el cupo para el curso', 'cmb2' ),
		'type' => 'text',
		'column' => true
	) );


	$edc_campos_cursos->add_field( array(
		'id'   => $prefix.'incluye',
		'name' => esc_html__( 'Que incluye el curso', 'cmb2' ),
		'desc' => esc_html__( 'A??ada lo que incluye el curso', 'cmb2' ),
		'type' => 'text',
		'repeatable' => true,
	) );



	// Add new field
/* 	$edc_campos_cursos->add_field( array(
		'name'        => esc_html__( 'Chef Instructor del Curso', "cmb2" ),
		'id'          => $prefix.'chef',
		'type'        => 'post_search_text', // This field type
		'post_type'   => 'chefs',
		//'select_type' => 'radio',
		'select_behavior' => 'add',
		'show_names'   => true,
	) ); */

	$edc_campos_cursos->add_field( array(
		'name'    => esc_html__( 'Chef Instructor del Curso', 'cmb2' ),
		'desc'    => esc_html__( 'Selecciona los chefs que impartiran el curso.', 'cmb2' ),
		'id'      => $prefix.'chefs',
		'type'    => 'custom_attached_posts',
		'column'  => false, // Output in the admin post-listing as a custom column. https://github.com/CMB2/CMB2/wiki/Field-Parameters#column
		'options' => array(
			'show_thumbnails' => true, // Show thumbnails on the left
			'filter_boxes'    => true, // Show a text box for filtering the results
			'query_args'      => array(
				'posts_per_page' => 10,
				'post_type'      => 'chefs',
			), // override the get_posts args
		),
	) );
}