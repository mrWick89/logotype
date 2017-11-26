<?php
add_action( 'admin_init', 'theme_options_init' );
add_action( 'admin_menu', 'theme_options_add_page' );

function theme_options_init(){
	register_setting( 'wpuniq_options', 'wpuniq_theme_options');
}

function theme_options_add_page() {
	add_theme_page( __( 'Настройки Темы', 'WP-Unique' ), __( 'Настройки Темы', 'WP-Unique' ), 'edit_theme_options', 'theme_options', 'theme_options_do_page' );
}
function theme_options_do_page() { global $select_options; if ( ! isset( $_REQUEST['settings-updated'] ) ) $_REQUEST['settings-updated'] = false;
	?>

	<div class="wrap">
		<?php screen_icon(); echo "<h2>". __( 'Настройки Темы', 'WP-Unique' ) . "</h2>"; ?>
		<?php if ( false !== $_REQUEST['settings-updated'] ) : ?>
			<div id="message" class="updated">
				<p><strong><?php _e( 'Настройки сохранены', 'WP-Unique' ); ?></strong></p>
			</div>
		<?php endif; ?>
	</div>

	<form method="post" action="options.php">
		<?php settings_fields( 'wpuniq_options' ); ?>
		<?php $options = get_option( 'wpuniq_theme_options' ); ?>

			<table class="wp-list-table widefat ">
				<tbody>
					<tr>
						<td style="border-bottom: 4px solid #00a0d2;">
							<label class="menu-name-label"><b>Основные настройки:</b></label>
						</td>
						<td class="column-description desc">
						</td>
					</tr>
					<tr>
						<td class="plugin-title column-primary">
							<label class="menu-name-label">Слоган на сайте:</label>
						</td>
						<td class="column-description desc">
							<input  class="menu-name regular-text menu-item-textbox" type="text" name="wpuniq_theme_options[slogan]" id="wpuniq_theme_options[slogan]" value="<?php echo $options[slogan];?>" />
						</td>
					</tr>
					<tr>
						<td class="plugin-title column-primary">
							<label class="menu-name-label">Телефон фирмы (городской):</label>
						</td>
						<td class="column-description desc">
							<input  class="menu-name regular-text menu-item-textbox" type="text" name="wpuniq_theme_options[phone]" id="wpuniq_theme_options[phone]" value="<?php echo $options[phone];?>" />
						</td>
					</tr>
					<tr>
						<td class="plugin-title column-primary">
							<label class="menu-name-label">Телефон фирмы (мобильный):</label>
						</td>
						<td class="column-description desc">
							<input class="menu-name regular-text menu-item-textbox" type="text" name="wpuniq_theme_options[phone_mobile]" id="wpuniq_theme_options[phone_mobile]" value="<?php echo $options[phone_mobile];?>" />
						</td>
					</tr>
					<tr>
						<td class="plugin-title column-primary">
							<label class="menu-name-label">Страна:</label>
						</td>
						<td class="column-description desc">
							<textarea style="width: 25em;" name="wpuniq_theme_options[country]" id="wpuniq_theme_options[country]"><?php echo $options[country];?></textarea>
						</td>
					</tr>
					<tr>
						<td class="plugin-title column-primary">
							<label class="menu-name-label">Адресс фирмы:</label>
						</td>
						<td class="column-description desc">
							<textarea style="width: 25em;" name="wpuniq_theme_options[adres]" id="wpuniq_theme_options[adres]"><?php echo $options[adres];?></textarea>
						</td>
					</tr>
					<tr>
						<td class="plugin-title column-primary">
							<label class="menu-name-label">Email collection:</label>
						</td>
						<td class="column-description desc">
							<input class="menu-name regular-text menu-item-textbox" type="text" name="wpuniq_theme_options[email]" id="wpuniq_theme_options[email]" value="<?php echo $options[email];?>" />
						</td>
					</tr>
					<tr>
						<td class="plugin-title column-primary">
							<label class="menu-name-label">Email rezka:</label>
						</td>
						<td class="column-description desc">
							<input class="menu-name regular-text menu-item-textbox" type="text" name="wpuniq_theme_options[email_rezka]" id="wpuniq_theme_options[email_rezka]" value="<?php echo $options[email_rezka];?>" />
						</td>
					</tr>
					<tr>
						<td style="border-bottom: 4px solid #00a0d2;">
							<label class="menu-name-label"><b>Для записей:</b></label>
						</td>
						<td class="column-description desc">
						</td>
					</tr>
					<tr>
						<td class="plugin-title column-primary">
							<label class="menu-name-label">Максимальное кол-во изображений на страницу:</label>
						</td>
						<td class="column-description desc">
							<input class="menu-name regular-text menu-item-textbox" type="text" name="wpuniq_theme_options[max_img]" id="wpuniq_theme_options[max_img]" value="<?php echo $options[max_img];?>" />
						</td>
					</tr>
					<tr>
						<td style="border-bottom: 4px solid #00a0d2;">
							<label class="menu-name-label"><b>Блок с сообщением:</b></label>
						</td>
						<td class="column-description desc">
						</td>
					</tr>
					<tr>
						<td class="plugin-title column-primary">
							<label class="menu-name-label">Показать блок:</label>
						</td>
						<td class="column-description desc">
							<input type="checkbox" name="wpuniq_theme_options[show_popup]" id="wpuniq_theme_options[show_popup]" value="1"<?php if($options[show_popup]=='1') echo ' checked="checked"';?> />
						</td>
					</tr>
					<tr>
						<td class="plugin-title column-primary">
							<label class="menu-name-label">Ссылка на изображение в блоке:</label>
						</td>
						<td class="column-description desc">
							<input class="menu-name regular-text menu-item-textbox" type="text" name="wpuniq_theme_options[img_popup]" id="wpuniq_theme_options[img_popup]" value="<?php echo $options[img_popup];?>" />
						</td>
					</tr>
					<tr>
						<td class="plugin-title column-primary">
							<label class="menu-name-label">Текс в блоке:</label>
						</td>
						<td class="column-description desc">
							<textarea style="width: 25em;" name="wpuniq_theme_options[text_popup]" id="wpuniq_theme_options[text_popup]"><?php echo $options[text_popup];?></textarea>
						</td>
					</tr>
					<tr>
						<td class="plugin-title column-primary">
							<input type="submit" value="Применить" />
						</td>
						<td class="column-description desc">
						</td>
					</tr>
				</tbody>
			</table>






	</form>
	<?php
}
?>