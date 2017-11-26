<?php

$attachment_id = get_post_thumbnail_id();
$size = "category-thumb";
$image = wp_get_attachment_image_src( $attachment_id, $size );
$anons = get_field( "anons_post" );
$options = get_option( 'wpuniq_theme_options' );

?>

<?php
if (class_exists('MultiPostThumbnails')) :
	if ($options[max_img] != '') {
		for($i = 1; $i <= $options[max_img]; $i++ ) {
			if (MultiPostThumbnails::has_post_thumbnail('post', 'secondary-image'.$i)) {
				$url = MultiPostThumbnails::get_post_thumbnail_url( get_post_type(),'secondary-image'.$i );
				?>
				<li class="gallery__item">
					<?php

					MultiPostThumbnails::the_post_thumbnail(get_post_type(), 'secondary-image'.$i, NULL,  'slider-thumb');
					?>
				</li>

		<?php
			}
		}
	}
endif;
?>

