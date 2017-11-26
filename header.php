<?php

?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,300,700&subset=cyrillic,latin">
	<!--[if lt IE 9]>
	<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/html5.js"></script>
	<![endif]-->
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php $options = get_option( 'wpuniq_theme_options' ); ?>

<div class="page-wrapper">
	<header class="header">
		<!-- main menu -->
		<nav class="header__menu-row">
			<?php
			echo  str_replace('sub-menu', 'header__sub-menu', wp_nav_menu( array(
					'container' => '',
					'echo' => false,
					'menu' => 'top_menu',
					'items_wrap' => '<ul class="header__menu-list">%3$s</ul>'
				) )
			);
			?>
		</nav>
		<!-- logo wrap -->
		<div class="header__main-row">
			<div class="header__main-wrap">
				<h1 class="logo__wrap">
					<a href="/" class="logo__link">
						<img class="logo" src="<?= get_template_directory_uri() ?>/img/logo.png" alt="logotype">
					</a>
					<?php
						if (!is_home()) { ?>
						<p class="promo__text  promo__text--logo"> <?= $options[slogan] ?> </p>
					<?php } ?>
				</h1>
				<div class="header__main-inner">
					<div class="header__main-repeat">
						<!-- repeat menu -->
						<?php
						if ((is_category(3) || post_is_in_descendant_category(3)) && !is_home() ) {
							echo  wp_nav_menu( array(
									'container' => '',
									'echo' => false,
									'menu' => 'design',
									'items_wrap' => '<ul class="header__sub-menu  header__sub-menu--repeat">%3$s</ul>'
								)
							);
						} elseif ((is_category(4) || post_is_in_descendant_category(4) || is_page([58 , 56, 60])) && !is_home()) {
							echo  wp_nav_menu( array(
									'container' => '',
									'echo' => false,
									'menu' => 'rezka_topmenu',
									'items_wrap' => '<ul class="header__sub-menu  header__sub-menu--repeat">%3$s</ul>'
								)
							);
						} elseif ((is_category(2) || post_is_in_descendant_category(2)) && !is_home()) {
							echo  wp_nav_menu( array(
									'container' => '',
									'echo' => false,
									'menu' => 'o_kompanii',
									'items_wrap' => '<ul class="header__sub-menu  header__sub-menu--repeat">%3$s</ul>'
								)
							);
						} elseif (is_single('10') && !is_home()) { ?>
							<ul class="header__sub-menu  header__sub-menu--repeat">
								<li id="menu-item-38" class="menu-item menu-item-type-post_type menu-item-object-post menu-item-38"><a href="http://logotype.loc/sobytiya/">События</a></li>
							</ul>
						<?php } elseif (is_single('8') && !is_home()) { ?>
							<ul class="header__sub-menu  header__sub-menu--repeat">
								<li id="menu-item-38" class="menu-item menu-item-type-post_type menu-item-object-post menu-item-38"><a href="http://logotype.loc/druzya/">Друзья</a></li>
							</ul>
						<?php }
						?>
					</div>
					<?php
						if ((is_category(3) || post_is_in_descendant_category(3)) && !is_home()) { ?>
							<div class="contacts contacts--design">
								<p>
									<a href="mailto:<?php echo $options[email]; ?> ">  <?php echo $options[email]; ?>  </a>
									<a href="tel:<?php echo $options[phone_mobile]; ?>"> <?php echo $options[phone_mobile]; ?> </a>
								</p>
							</div>
							<!-- navigation block -->
							<div class="navbar ">
								<ul class="navbar__list">
									<li class="navbar__item _project hidden">
										<a class="navbar__link navbar__link-permalink" href="#"> О проекте</a>
									</li>
								</ul>
							</div>
					<?php
						} elseif ((is_category(4) || post_is_in_descendant_category(4) || is_page([58 , 56, 60])) && !is_home()) { ?>
							<div class="contacts contacts--3d">
								<p>
									<a href="mailto:<?php echo $options[email_rezka]; ?> ">  <?php echo $options[email_rezka]; ?>  </a>
									<a href="tel:<?php echo $options[phone_mobile]; ?>"> <?php echo $options[phone_mobile]; ?> </a>
								</p>
							</div>

							<div class="navbar">
								<div class="hidden" id="post_id"><?php echo the_ID();?></div>
								<ul class="navbar__list">
									<li class="navbar__item _project hidden">
										<a class="navbar__link navbar__link-permalink" href="#"> О проекте</a>
									</li>
									<li class="navbar__item">
										<a class="navbar__link" id="post_56" href="/svoystva-penopolistirola/"> Свойства пенополистирола </a>
									</li>
									<li class="navbar__item">
										<a class="navbar__link" id="post_58" href="/trebovaniya-k-faylam/"> Требования к файлам </a>
									</li>
									<li class="navbar__item">
										<a class="navbar__link" id="post_60" href="/blank-zakaza/"> Бланк заказа </a>
									</li>
								</ul>
							</div>
						<?php
						} else { ?>
							<div class="contacts">
								<p> <?php echo $options[adres].", ".$options[country]; ?>,
									<a href="tel:<?php echo $options[phone]; ?>"> <?php echo $options[phone]; ?>, </a>
									<a href="tel:<?php echo $options[phone_mobile]; ?>"> <?php echo $options[phone_mobile]; ?>, </a>
									<a href="mailto:<?php echo $options[email]; ?> ">  <?php echo $options[email]; ?>  </a>
								</p>
							</div>
					<?php
						}
					?>


				</div>
			</div>
		</div>
	</header>
