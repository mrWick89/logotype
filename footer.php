<?php
?>
<?php $options = get_option( 'wpuniq_theme_options' ); ?>

</div>
<div class="footer">
	<?php if ((is_category(3) || post_is_in_descendant_category(3)) && !is_home()) {?>
	<div class="footer__inner">
		<div class="footer__sub-wrap">

			<?php
			echo  wp_nav_menu( array(
					'container' => '',
					'echo' => false,
					'menu' => 'design',
					'items_wrap' => '<ul class="header__sub-menu  header__sub-menu--repeat">%3$s</ul>'
				)
			);
			?>
		</div>
	</div>
	<?php } else if ((is_category(4) || post_is_in_descendant_category(4) || is_page([58 , 56, 60])) && !is_home()) { ?>
		<div class="footer__inner">
			<div class="footer__sub-wrap">

				<?php
				echo  wp_nav_menu( array(
						'container' => '',
						'echo' => false,
						'menu' => 'rezka_topmenu',
						'items_wrap' => '<ul class="header__sub-menu  header__sub-menu--repeat">%3$s</ul>'
					)
				);
				?>
			</div>
		</div>

	<?php } else if ((is_category(2) || post_is_in_descendant_category(2)) && !is_home()) { ?>
		<div class="footer__inner">
			<div class="footer__sub-wrap">

				<?php
				echo  wp_nav_menu( array(
						'container' => '',
						'echo' => false,
						'menu' => 'o_kompanii',
						'items_wrap' => '<ul class="header__sub-menu  header__sub-menu--repeat">%3$s</ul>'
					)
				);
				?>
			</div>
		</div>
	<?php
	} else if (is_single('10') && !is_home()) { ?>
		<div class="footer__inner">
			<div class="footer__sub-wrap">
				<ul class="header__sub-menu  header__sub-menu--repeat">
					<li id="menu-item-38" class="menu-item menu-item-type-post_type menu-item-object-post menu-item-38"><a href="http://logotype.loc/sobytiya/">События</a></li>
				</ul>
			</div>
		</div>
		<?php
	} else if (is_single('8') && !is_home()) { ?>
		<div class="footer__inner">
			<div class="footer__sub-wrap">
				<ul class="header__sub-menu  header__sub-menu--repeat">
					<li id="menu-item-38" class="menu-item menu-item-type-post_type menu-item-object-post menu-item-38"><a href="http://logotype.loc/druzya/">Друзья</a></li>
				</ul>
			</div>
		</div>
		<?php
	} else { ?>
	<div class="contacts">
		<p> <?php echo $options[adres].", ".$options[country]; ?>,
			<a href="tel:<?php echo $options[phone]; ?>"> <?php echo $options[phone]; ?>, </a>
			<a href="tel:<?php echo $options[phone_mobile]; ?>"> <?php echo $options[phone_mobile]; ?>, </a>
			<a href="mailto:<?php echo $options[email]; ?> "> <?php echo $options[email]; ?> </a>
		</p>
	</div>
	<?php } ?>
</div>

<footer class="main-footer">
	<div class="main-footer__top">
		<?php
		echo  wp_nav_menu( array(
				'container' => '',
				'echo' => false,
				'menu' => 'top_menu',
				'items_wrap' => '<ul class="header__menu-list">%3$s</ul>'
			)
		);
		?>
	</div>
	<ul class="main-footer__inner">
		<li class="main-footer__item">
			<ul class="main-footer__social" id="share">
				<li class="main-footer__soc-item " >
					<a data-id="vk" class="main-footer__soc-link  main-footer__soc-link--vk"  onclick="Share.vkontakte('<?= the_permalink(); ?>','<?= the_title(); ?>','<?= get_template_directory_uri() ?>/img/logo.png','<?= bloginfo( 'description' ); ?>')"></a>
				</li>
				<li class="main-footer__soc-item " >
					<a data-id="fb" class="main-footer__soc-link  main-footer__soc-link--fb" onclick="Share.facebook('<?= the_permalink(); ?>','<?= the_title(); ?>','<?= get_template_directory_uri() ?>/img/logo.png','<?= bloginfo( 'description' ); ?>')"></a>
				</li>
				<li class="main-footer__soc-item " >
					<a data-id="tw" class="main-footer__soc-link  main-footer__soc-link--tw" onclick="Share.twitter('<?= the_permalink(); ?>','<?= the_title(); ?>')"></a>
				</li>
				<li class="main-footer__soc-item " data-url="<?= the_permalink(); ?>" data-title="<?= the_title(); ?>">
					<a class="main-footer__soc-link  main-footer__soc-link--ok" onclick="Share.odnoklassniki('<?= the_permalink(); ?>','<?= bloginfo( 'description' ); ?>')"></a>
				</li>
			</ul>
			<div class="logo__wrap">
				<a href="/" class="logo__link">
					<img class="logo" src="<?= get_template_directory_uri() ?>/img/logo.png" alt="logotype">
					<p class="promo__text  promo__text--logo"> <?php echo $options[slogan]; ?>  </p>
				</a>
			</div>
		</li>
		<li class="main-footer__item">
			<?php
			echo  wp_nav_menu( array(
					'container' => '',
					'echo' => false,
					'menu' => 'o_kompanii',
					'items_wrap' => '<ul class="header__sub-menu  header__sub-menu--footer">%3$s</ul>'
				)
			);
			?>
		</li>
		<li class="main-footer__item">
			<?php
			echo  wp_nav_menu( array(
					'container' => '',
					'echo' => false,
					'menu' => 'design',
					'items_wrap' => '<ul class="header__sub-menu  header__sub-menu--footer">%3$s</ul>'
				)
			);
			?>
			<a class="main-footer__link" href="mailto:<?php echo $options[email]; ?> ">  <?php echo $options[email]; ?>  </a>
		</li>
		<li class="main-footer__item">
			<?php
			echo  wp_nav_menu( array(
					'container' => '',
					'echo' => false,
					'menu' => 'rezka',
					'items_wrap' => '<ul class="header__sub-menu  header__sub-menu--footer">%3$s</ul>'
				)
			);
			?>

			<a class="main-footer__link" href="mailto:<?php echo $options[email_rezka]; ?>"> <?php echo $options[email_rezka]; ?> </a>
		</li>
		<li class="main-footer__item">
			<ul class="header__sub-menu  header__sub-menu--footer">
				<li class="header__sub-item">
					<span> <?php echo $options[adres]; ?> </span>
				</li>
				<li class="header__sub-item">
					<span> <?php echo $options[country]; ?> </span>
				</li>
				<li class="header__sub-item">
					<a class="header__sub-link" href="tel:<?php echo $options[phone]; ?>"> <?php echo $options[phone]; ?> </a>
				</li>
				<li class="header__sub-item">
					<a class="header__sub-link" href="tel:<?php echo $options[phone_mobile]; ?>"> <?php echo $options[phone_mobile]; ?> </a>
				</li>
			</ul>
			<div id="f-map" class="main-footer__map"></div>
		</li>
		<li class="main-footer__item"></li>
	</ul>
</footer>

<!-- modal window -->
<?php
$addclass = '';
if ($options[show_popup] == true) {
	$addclass = 'popup--show';
}

if (!isset($_COOKIE["olole"])) {
?>
<div class="popup <?=$addclass?>" >
	<div class="popup__head">
		<button class="popup__close" title="Закрыть" onclick="confirm()"> X </button>
	</div>
	<div class="popup__img">
		<img src="<?= $options[img_popup] ?>" alt="image" width="210" height="137">
	</div>
	<p class="popup__text">
		<?= $options[text_popup]?>
	</p>
</div>
<?php } ?>
<script src="http://api-maps.yandex.ru/2.1/?lang=ru_RU"></script>
<?php
	if (is_page(112)) { ?>
	<script src="<?= get_template_directory_uri() ?>/js/yamap.js"></script>
<?php
	}
?>
<?php wp_footer(); ?>
<script type="text/javascript">
	function setCookie (name, value, seconds) {
		if (typeof(seconds) != 'undefined') {
			var date = new Date();
			date.setTime(date.getTime() + (seconds) * 1000);
			var expires = "; expires=" + date.toGMTString();
		}
		else {
			var expires = "";
		}

		document.cookie = name + "=" + value + expires + "; path=/";
	}

	function confirm() {
		setCookie("olole", "ololo", 3600*24* 10);
		document.getElementById("noob").style.display = "none";
	}
</script>


</body>
</html>
