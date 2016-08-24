<?php 
include("php-html-css-js-minifier.php"); 
$str = file_get_contents('aitul.css');
// echo
//echo minify_css($str); ?>



<?php echo minify_js(file_get_contents('script.js')); ?>
