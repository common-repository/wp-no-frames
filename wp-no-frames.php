<?php
/*
Plugin Name: WP No Frames
Plugin URI: http://marto.lazarov.org/plugins/wp-no-frames/
Description: Forces offpage frames to reload to the website framed page. This plugins fights agains web sites like Google Images
Author: Martin Lazarov
Version: 3.0.4
Author URI: http://marto.lazarov.org/plugins/wp-no-frames
*/

function wp_no_frames() {
	$home_url = strtolower(get_bloginfo('url'));
	?>
	<script type='text/javascript'>
	<!--
	try{
		var parent_location = parent.location.href.toLowerCase();
		if(parent){
			if ( top.location.href.toLowerCase() != document.location.href.toLowerCase()){
				if(parent_location.indexOf('{<?php echo $home_url; ?>}') != 0 ){
					top.location.href = document.location.href;
				}
			}
		}
	}
	catch ( err ){
		if(typeof window.console != "undefined"){
			console.log(err);
		}
		top.location.href = document.location.href;
	}

	if (parent.frames.length > 0) top.location.replace(document.location)
	//-->
	</script>
	<?php
}
add_action('wp_head', 'wp_no_frames');

?>
