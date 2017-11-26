<?php


get_header(); ?>

	<div class="wrapper  wrapper--gallery">

		<div class="gallery">

			<?php
				$anons = get_field( "anons", 'category_'. $cat .'' );
				$attachment = get_field('category_img', 'category_'. $cat .'' );
				$size = "category-thumb";
				$image = wp_get_attachment_image_src( $attachment['id'], $size );
				$cat_slide_img = wp_get_attachment_image_src( $attachment['id'], 'slider-thumb' );
				if (empty($image)) {
					$src = get_template_directory_uri()."/img/1.jpg";
				} else {
					$src = $image[0];
				}
				if (empty($cat_slide_img)) {
					$src_cat = get_template_directory_uri()."/img/1.jpg";
				} else {
					$src_cat = $cat_slide_img[0];
				}
			?>

			<div class="gallery__preview">
				<img id="preview" class="image-class" alt="" src="<?php echo $src; ?>" />
			</div>



		<?php if ( have_posts() ) : ?>
			<div class="gallery__slider">
				<!-- Slide Carousel -->
				<ul id="lightSlider" class="gallery__list">
					<li class="gallery__item _cat" data-preview="<?=$src?>">
						<img alt="image01" src="<?php echo $src_cat; ?>" />
						<div class="hidden">
							<div id="anons"><?= $anons;?></div>
							<div id="caption"><p><?php echo category_description(); ?></p></div>
						</div>
					</li>
			<?php

			while ( have_posts() ) : the_post();

				get_template_part( 'content-archive', get_post_format() );

			// End the loop.
			endwhile; ?>

			</ul>
				<!-- End Carousel -->
			</div>
			<?php

		// If no content, include the "No posts found" template.
		else : ?>
			<div class="gallery__slider">

			</div>
		<?php
		endif;
		?>

			<!-- description block -->
			<div class="panel">
				<div class="panel__inner">
					<div class="accordion" id="accordion">
						<p class="panel__content-show">
							<?= $anons;?>
						</p>
						<p class="panel__content">
							<?php echo category_description(); ?>
						</p>
					</div>
				</div>
			</div>

		</div>
	</div>

<?php get_footer(); ?>
