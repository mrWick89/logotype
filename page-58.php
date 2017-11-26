<?php


get_header(); ?>

<div class="wrapper  wrapper--row">

		<?php
		// Start the loop.
		while ( have_posts() ) : the_post();
			$bigimgUrl = get_the_post_thumbnail_url(null, 'category-thumb');
			?>

			<div class="left-side">
				<img class="left-side__bg" src="<?=$bigimgUrl?>" alt="image">
			</div>



			<div class="blank">
				<?php the_content(); ?>
			</div>


		<?php
		// End the loop.
		endwhile;
		?>


</div><!-- .content-area -->

<?php get_footer(); ?>
