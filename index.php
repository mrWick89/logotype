<?php


get_header(); ?>

<?php
$design_link = get_category_link(3);
$rezka_link = get_category_link(4);
$kompani_link = get_category_link(2);

$post = get_post(67);
$content = apply_filters('the_content', $post->post_content);
$options = get_option( 'wpuniq_theme_options' );
?>

<div class="wrapper">
	<div class="promo">
		<p class="promo__text"> <?= $options[slogan] ?> </p>
	</div>
	<div class="wrapper__main">

		<a class="wrapper__main-part" href="<?= $design_link?>"> Дизайн и полиграфия </a>
		<a class="wrapper__main-part  wrapper__main-part--logo" href="<?= $kompani_link?>">
			<i class="wrapper__logo  wrapper__logo--w"></i>
		</a>
		<a class="wrapper__main-part" href="<?= $rezka_link?>"> 3D резка пенополистирола </a>
	</div>
	<div class="wrapper__banner">
		<?php echo $content; ?>
	</div>
</div>


<?php get_footer(); ?>
