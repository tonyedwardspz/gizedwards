<?php
// create custom plugin settings menu
add_action('admin_menu', 'path_create_menu');

function path_create_menu(){

	// create new sub-menu
	add_submenu_page(
		'themes.php', 
		'Custom Theme Options',
		'Custom Options',
		'administrator',
		'theme-options.php',
		'path_settings_page'
	);

	// call register setting function
	add_action('admin_init', 'path_register_settings');
}

function path_register_settings(){
	// register social media setting
	register_setting('path-settings-group', 'path_twitter');
	register_setting('path-settings-group', 'path_facebook');
	register_setting('path-settings-group', 'path_youtube');
	register_setting('path-settings-group', 'path_google_plus');

	// register logo settings
	register_setting('path-settings-group', 'path_logo');

	// register analytics
	register_setting('path-settings-group', 'path_analytics');
}


function path_settings_page(){

?>



<div class="wrap">
	<h2>Portfolio Theme Settings</h2>

	<form id="landingOptions" method="post" action="options.php">
	<?php settings_fields( 'path-settings-group' ); ?>		
	<table class="form-table">
		<tr valign="top">
		<th scope="row">Logo:</th>
		<td>
			<input type="text" name="path_logo" value="<?php print get_option('path_logo'); ?>" />
			<br/>
			*upload using the Media Uploader and paste the URL here.
		</td>
		</tr>

		<tr valign="top">
		<th scope="row">Twitter Link:</th>
		<td>
			<input type="text" name="path_twitter" value="<?php print get_option('path_twitter'); ?>" />
			<br/>
		</td>
		</tr>

		<tr valign="top">
		<th scope="row">Facebook Link:</th>
		<td>
			<input type="text" name="path_facebook" value="<?php print get_option('path_facebook'); ?>" />
			<br/>
		</td>
		</tr>

		<tr valign="top">
		<th scope="row">YouTube Link:</th>
		<td>
			<input type="text" name="path_youtube" value="<?php print get_option('path_youtube'); ?>" />
			<br/>
		</td>
		</tr>

		<tr valign="top">
		<th scope="row">Google Plus Link:</th>
		<td>
			<input type="text" name="path_google_plus" value="<?php print get_option('path_google_plus'); ?>" />
			<br/>
		</td>
		</tr>

		<tr valign="top">
		<th scope="row">Analytics Code:</th>
		<td>
			<textarea name="path_analytics" class="analytics-textarea"><?php print get_option('path_analytics'); ?></textarea>
		</td>
		</tr>

		<p class="submit">
			<input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" />
		</p>

	</form>
</div>


<?php 

}

?>