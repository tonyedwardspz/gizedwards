<?php
// define the custom post type
add_action('init', 'video_manager_register' );
function video_manager_register(){
	// arguments to create post type
	$args = array(
		'label' => __('Video Manager'),
		'singular_label' => __('Video'),
		'taxonomies' => array('category'), 
		'public' => true,
		'show_ui' => true,
		'capability_type' => 'post',
		'hierarchical' => true,
		'has_archive' => true,
		'supports' => array('title', 'editor', 'thumbnail', 'comments'),
		'rewrite' => array('slug' => 'videos', 'with_front' => false)
	);
	 // register type and custom taxonomy
	register_post_type('video', $args);
	register_taxonomy(
		'video-type', 
		array('videos'), 
		array(
			'hierarchical' => true, 
			'label' => 'Video types',
			'singular_label' => 'Video type',
			'rewrite' => true,
			'slug' => 'video-type'
		)
	);
}

if (function_exists('add_theme_support')){
	add_image_size('video-thumb', 700, 400, true);
}

// create the admin meta box
add_action('admin_init', 'video_manager_add_meta');
function video_manager_add_meta(){
	
	add_meta_box( 
		'video-meta', 'Video Options', 'video_manager_meta_options', 'video', 'normal', 'high');
}

// create admin area extra fields
function video_manager_meta_options(){
	global $post;
	if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return $post_id;

	$custom = get_post_custom($post -> ID);
	$video_embed_code = $custom["video_embed_code"][0];
	$video_id = $custom["video_id"][0];
?>
<style>
	.video-manager-extras div{
		margin: 10px;
	}
	.video-manager-extras label{
		width: 100px;
		float: left;
	}
	.video-manager-extras textarea{
		height: 100px;
		width: 400px;
	}
</style>
<div class="video-manager-extras">
	<div>
		<label for="video_embed_code">Embed Code: </label>
		<textarea name="video_embed_code" id="video_embed_code"><?php echo $video_embed_code; ?></textarea>
	</div>
	<div>
		<label for="video_id">Video ID: </label>
		<input name="video_id" id="video_id" value="<?php echo $video_id; ?>"/>
	</div>
</div>

<?php }

add_action('save_post', 'video_manager_save_extras');
function video_manager_save_extras(){
	global $post;
	if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE){
		return $post_id;
	}else{
		update_post_meta($post -> ID, 'video_embed_code', $_POST["video_embed_code"]);
		update_post_meta($post -> ID, 'video_id', $_POST["video_id"]);
	}
}


?>