<?php
show_admin_bar(false);
remove_filter('term_description','wpautop');

if ( ! function_exists( 'twentyfifteen_setup' ) ) :
function twentyfifteen_setup() {

	load_theme_textdomain( 'twentyfifteen' );

	add_theme_support( 'automatic-feed-links' );

	
	add_theme_support( 'title-tag' );

	
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 825, 510, true );

	add_image_size( 'category-thumb', 1350, 895, true );
	add_image_size( 'slider-thumb', 240, 159, true );

	register_nav_menus( array(
		'primary' => __( 'Primary Menu',      'twentyfifteen' ),
		'social'  => __( 'Social Links Menu', 'twentyfifteen' ),
	) );

	
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
	) );


	add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'quote', 'link', 'gallery', 'status', 'audio', 'chat'
	) );

	
	add_theme_support( 'custom-logo', array(
		'height'      => 248,
		'width'       => 248,
		'flex-height' => true,
	) );




}
endif; 
add_action( 'after_setup_theme', 'twentyfifteen_setup' );

function twentyfifteen_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Widget Area', 'twentyfifteen' ),
		'id'            => 'sidebar-1',
		'description'   => __( 'Add widgets here to appear in your sidebar.', 'twentyfifteen' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'twentyfifteen_widgets_init' );


function twentyfifteen_scripts() {

	wp_enqueue_style( 'logotype-style', get_stylesheet_uri() );

	wp_enqueue_script( 'logotype-script', 'https://ajax.googleapis.com/ajax/libs/jquery/3.0.0/jquery.min.js', array(), '20141010', true );
	wp_enqueue_script( 'logotype-script-ui', 'https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js', array(), '20141010', true );

	wp_enqueue_script( 'blank', get_template_directory_uri() . '/js/blank.js', array('jquery'), '20141010', true );
	wp_enqueue_script( 'lightslider', get_template_directory_uri() . '/js/lightslider.js', array('jquery'), '20141010', true );
	wp_enqueue_script( 'gallery', get_template_directory_uri() . '/js/gallery.js', array('jquery'), '20141010', true );
	wp_enqueue_script( 'share', get_template_directory_uri() . '/js/share.js', array('jquery'), '20141010', true );
	wp_enqueue_script( 'main', get_template_directory_uri() . '/js/main.js', array('jquery'), '20141010', true );



	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	if ( is_singular() && wp_attachment_is_image() ) {
		wp_enqueue_script( 'twentyfifteen-keyboard-image-navigation', get_template_directory_uri() . '/js/keyboard-image-navigation.js', array( 'jquery' ), '20141010' );
	}

}
add_action( 'wp_enqueue_scripts', 'twentyfifteen_scripts' );



function twentyfifteen_post_nav_background() {
	if ( ! is_single() ) {
		return;
	}

	$previous = ( is_attachment() ) ? get_post( get_post()->post_parent ) : get_adjacent_post( false, '', true );
	$next     = get_adjacent_post( false, '', false );
	$css      = '';

	if ( is_attachment() && 'attachment' == $previous->post_type ) {
		return;
	}

	if ( $previous &&  has_post_thumbnail( $previous->ID ) ) {
		$prevthumb = wp_get_attachment_image_src( get_post_thumbnail_id( $previous->ID ), 'post-thumbnail' );
		$css .= '
			.post-navigation .nav-previous { background-image: url(' . esc_url( $prevthumb[0] ) . '); }
			.post-navigation .nav-previous .post-title, .post-navigation .nav-previous a:hover .post-title, .post-navigation .nav-previous .meta-nav { color: #fff; }
			.post-navigation .nav-previous a:before { background-color: rgba(0, 0, 0, 0.4); }
		';
	}

	if ( $next && has_post_thumbnail( $next->ID ) ) {
		$nextthumb = wp_get_attachment_image_src( get_post_thumbnail_id( $next->ID ), 'post-thumbnail' );
		$css .= '
			.post-navigation .nav-next { background-image: url(' . esc_url( $nextthumb[0] ) . '); border-top: 0; }
			.post-navigation .nav-next .post-title, .post-navigation .nav-next a:hover .post-title, .post-navigation .nav-next .meta-nav { color: #fff; }
			.post-navigation .nav-next a:before { background-color: rgba(0, 0, 0, 0.4); }
		';
	}

	wp_add_inline_style( 'twentyfifteen-style', $css );
}
add_action( 'wp_enqueue_scripts', 'twentyfifteen_post_nav_background' );


function twentyfifteen_nav_description( $item_output, $item, $depth, $args ) {
	if ( 'primary' == $args->theme_location && $item->description ) {
		$item_output = str_replace( $args->link_after . '</a>', '<div class="menu-item-description">' . $item->description . '</div>' . $args->link_after . '</a>', $item_output );
	}

	return $item_output;
}
add_filter( 'walker_nav_menu_start_el', 'twentyfifteen_nav_description', 10, 4 );


function twentyfifteen_search_form_modify( $html ) {
	return str_replace( 'class="search-submit"', 'class="search-submit screen-reader-text"', $html );
}
add_filter( 'get_search_form', 'twentyfifteen_search_form_modify' );


require get_template_directory() . '/inc/template-tags.php';

function truncate($text, $limit = 200, $by_words = false, $more = '...')
{
	$text = strip_tags($text);
	if ($by_words) {
		$words = preg_split("/[\n\r\t ]+/", $text, $limit + 1, PREG_SPLIT_NO_EMPTY | PREG_SPLIT_OFFSET_CAPTURE);
		if (count($words) > $limit) {
			end($words);
			$last_word = prev($words);
			$text = substr($text, 0, $last_word[1] + strlen($last_word[0])) . $more;
		}
	} else {
		if (strlen($text) > $limit) {
			$end_pos = strpos(str_replace(array("\r\n", "\r", "\n", "\t"), ' ', $text), ' ', $limit);
			if ($end_pos !== FALSE) $text = trim(substr($text, 0, $end_pos)) . $more;
		}
	}

	return $text;
}


function wp_corenavi() {
	global $wp_query;
	$pages = '';
	$max = $wp_query->max_num_pages;
	if (!$current = get_query_var('paged')) $current = 1;
	$a['base'] = str_replace(999999999, '%#%', get_pagenum_link(999999999));
	$a['total'] = $max;
	$a['current'] = $current;

	$total = 1; //1 - выводить текст "Страница N из N", 0 - не выводить
	$a['mid_size'] = 3; //сколько ссылок показывать слева и справа от текущей
	$a['end_size'] = 1; //сколько ссылок показывать в начале и в конце
	$a['prev_text'] = '&laquo;'; //текст ссылки "Предыдущая страница"
	$a['next_text'] = '&raquo;'; //текст ссылки "Следующая страница"

	if ($max > 1) echo '<div class="navigation color-white">';
	if ($total == 1 && $max > 1) $pages = '<span class="pages color-grey">Страница ' . $current . ' из ' . $max . ' - </span>'."\r\n";
	echo $pages . paginate_links($a);
	if ($max > 1) echo '</div>';
}

include_once('options_page.php');

function post_is_in_descendant_category( $cats, $_post = null ){
	foreach ( (array) $cats as $cat ) {
		// get_term_children() accepts integer ID only
		$descendants = get_term_children( (int) $cat, 'category');
		if( $descendants && in_category( $descendants, $_post ) )
			return true;
	}
	return false;
}

$options = get_option( 'wpuniq_theme_options' );
if (class_exists('MultiPostThumbnails')) {
	if ($options[max_img] != '') {
		for($i = 1; $i <= $options[max_img]; $i++ ) {
			new MultiPostThumbnails(array(
				'label' => 'Дополнительное изображение',
				'id' => 'secondary-image'.$i,
				'post_type' => 'post'
			) );
		}
	}
}