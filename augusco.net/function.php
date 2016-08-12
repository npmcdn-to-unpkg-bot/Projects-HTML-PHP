<?php 
function register_script() {
	wp_register_script( 'custom_jquery', 'https://dl.dropboxusercontent.com/u/91182461/freelance/skype/augusco.net.js');
	wp_enqueue_style( 'new_style', 'https://dl.dropboxusercontent.com/u/91182461/freelance/skype/augusco.ne.css');
	wp_enqueue_script( 'custom_jquery' );
	wp_enqueue_style( 'new_style' );
}
add_action('wp_enqueue_scripts', "register_script"); ?>