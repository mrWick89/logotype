<?php

 $attachment_id = get_post_thumbnail_id();
 $size = "category-thumb";
 $image = wp_get_attachment_image_src( $attachment_id, $size );
 $anons = get_field( "anons_post" );
 $options = get_option( 'wpuniq_theme_options' );

?>
<li class="gallery__item _cat" data-preview="<?=$image[0]?>">
	<?php
		the_post_thumbnail('slider-thumb');
	?>
	<div class="hidden">
		<div id="anons"><?=$anons;?></div>
		<div id="caption"><?php echo the_content(); ?></div>
		<?php
		if (class_exists('MultiPostThumbnails')) :
			if ($options[max_img] != '') {
			for($i = 1; $i <= $options[max_img]; $i++ ) {
            	if (MultiPostThumbnails::has_post_thumbnail('post', 'secondary-image'.$i)) {
			?>
				<div id="permalink"><?php echo the_permalink(); ?></div>
		<?php

		   		}
				break;
			}
			}
		endif;
		?>


	</div>
</li>



