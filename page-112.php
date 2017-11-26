<?php

get_header(); ?>

<div class="wrapper  wrapper--row">

		<?php
		// Start the loop.
		while ( have_posts() ) : the_post();
			$bigimgUrl = get_the_post_thumbnail_url(null, 'category-thumb');
			$options = get_option( 'wpuniq_theme_options' );
			?>

			<div class="left-side  left-side--contacts" id="map"></div>

			<div class="adress">
				<ul class="adress__list">
					<li class="adress__item">
						<div class="adress__sub-title"> Адрес: </div>
						<div class="adress__content">
							<span> <?= $options[country]?> </span>
							<span> <?= $options[adres]?> </span>
						</div>
					</li>
					<li class="adress__item">
						<div class="adress__sub-title"> ГЕОГРАФИЧЕСКИЕ КООРДИНАТЫ /GPS: </div>
						<div class="adress__content">
							<span> N 53° 54' 996'' </span>
							<span> E  27° 31' 402'' </span>
						</div>
					</li>
					<li class="adress__item">
						<div class="adress__sub-title"> ТРАНСПОРТ: </div>
						<div class="adress__content">
							<span> Т 14, 58 ост. Игнатенко </span>
							<span> А 1, 29, 44 ост. Комсомольское озеро </span>
							<span> М ст. Молодежная, Фрунзенская </span>
						</div>
					</li>
					<li class="adress__item">
						<div class="adress__sub-title"> ТЕЛЕФОН/ФАКС: </div>
						<div class="adress__content">
							<a class="adress__sub-tel" href="tel:<?= $options[phone]?>"> <?= $options[phone]?> </a>
							<a class="adress__sub-tel" href="tel:<?= $options[phone_mobile]?>"> <?= $options[phone_mobile]?> </a>
						</div>
					</li>
					<li class="adress__item">
						<div class="adress__sub-title"> E-MAIL: </div>
						<div class="adress__content">
							<span class="adress__sub"> ПО ВОПРОСАМ ДИЗАЙНА </span>
							<a class="adress__sub-mail" href="mailto:<?= $options[email]?>"> <?= $options[email]?> </a>
							<!-- <span> Этот e-mail адрес защищен от спам-ботов, для его просмотра у Вас должен быть включен Javascript </span> -->
							<span class="adress__sub"> РЕЗКА И ДЕКОРИРОВАНИЕ ПЕНОПЛАСТА </span>
							<a class="adress__sub-mail" href="mailto:<?= $options[email_rezka]?>"> <?= $options[email_rezka]?> </a>
							<!-- <span> Этот e-mail адрес защищен от спам-ботов, для его просмотра у Вас должен быть включен Javascript </span> -->
						</div>
					</li>
					<li class="adress__item">
						<div class="adress__sub-title"> МЫ РАБОТАЕМ: </div>
						<div class="adress__content">
							<span> Пн. - Пт. </span>
							<span> с 9.15 до 18.00 </span>
							<span> обед с 13.00 до 14.00 </span>
						</div>
					</li>
				</ul>
			</div>


		<?php
		// End the loop.
		endwhile;
		?>


</div><!-- .content-area -->

<?php get_footer(); ?>
