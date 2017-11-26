<?php


get_header();
?>

<div class="wrapper  wrapper--gallery">

	<div class="gallery">
		<div class="gallery__preview">
			<?php
			$bigimgUrl = get_the_post_thumbnail_url(null, 'category-thumb');
			$anons = get_field( "anons_post" );
			?>

			<img id="preview" class="image-class" alt="" src="<?php echo $bigimgUrl; ?>" />
		</div>
		<div class="gallery__slider">
			<!-- Slide Carousel -->
			<ul id="lightSlider" class="gallery__list">

		<?php
		// Start the loop.
		while ( have_posts() ) : the_post();

			if (get_the_ID() == 10 ) {
				get_template_part( 'content-10', get_post_format() );
			} else
			get_template_part( 'content', get_post_format() );

		endwhile;
		?>
			</ul>
			<!-- End Carousel -->
		</div>

		<!-- description block -->
		<div class="panel">
			<div class="panel__inner">
				<div class="accordion" id="">
					<p class="panel__content-show _post">
						<?= $anons;?>
					</p>
						<div class="panel__content"><?php echo the_content(); ?></div>
				</div>
			</div>
		</div>


	</div>
</div>
<?php get_footer(); ?>
