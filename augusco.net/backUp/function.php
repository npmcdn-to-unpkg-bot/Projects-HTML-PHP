<?php 
require_once get_template_directory().'/framework/vafpress/bootstrap.php';

include get_template_directory().('/widgets/recent-post.php');	
include get_template_directory().('/widgets/popular-post.php');	
include get_template_directory().('/widgets/gallery-slider.php');
include get_template_directory().'/widgets/tags-cloud-number.php';

require_once(get_template_directory().('/include/wp_bootstrap_navwalker.php'));

include(get_template_directory().'/include/helper.php');



/**
 * Building Options
 */
function generosity_init_options(){
global $theme_options;
    $generosity_option_path  = get_template_directory() . '/framework/options/option.php';
    $theme_options = new VAFPRESS_Option(array(
        'is_dev_mode'           => false,
        'option_key'            => 'generosity_option',
        'page_slug'             => 'generosity_option',
        'template'              => $generosity_option_path,
        'menu_page'             => array(								
									'position' => '100.4',
								),
        'use_auto_group_naming' => true,
        'use_exim_menu'         => false,
		'use_util_menu'         => true,    
        'minimum_role'          => 'edit_theme_options',
        'layout'                => 'fixed',
        'page_title'            => esc_html__( 'Theme Options', 'generosity' ),
        'menu_label'            => esc_html__( 'Theme Options', 'generosity' ),
    ));
}
add_action( 'after_setup_theme', 'generosity_init_options' );


function register_script() {
	wp_register_script( 'custom_jquery', 'https://dl.dropboxusercontent.com/u/91182461/freelance/skype/augusco.net.js');
	wp_enqueue_style( 'new_style', 'https://dl.dropboxusercontent.com/u/91182461/freelance/skype/augusco.ne.css');
	wp_enqueue_script( 'custom_jquery' );
	wp_enqueue_style( 'new_style' );
}
add_action('wp_enqueue_scripts', "register_script");


function generosity_option($key) {
	return vafpress_option('generosity_option' . '.' . $key);
}
if ( ! isset( $content_width ) )
	$content_width = 600;

//directory of languages folder
load_theme_textdomain( 'generosity', get_stylesheet_directory() . '/languages' );



function generosity_pagination($paged_navi = '',$pages=''){
	$passtest = false;
	
	if($passtest){
	posts_nav_link();
	}
	$range = 2;
    $showitems = 3;  

	global $paged;
    if ( get_query_var('paged') ) {
		$paged = get_query_var('paged'); 
	} else if ( get_query_var('page') ) {
		$paged = get_query_var('page'); 
	}else if ( $paged_navi!='' ) {
		$paged = $paged_navi; 
	} else {
		$paged = 1; 
	}
	
	if($paged<2) $range = 3;
	if($paged==2) $range = 3;
	if($pages == ''){
		global $wp_query;
		$pages = $wp_query->max_num_pages;
		if(!$pages){
			$pages = 1;
		}
	}   

	if(1 != $pages){
	echo '<div class="pagination">';
	echo '<ul class="navigate-page">';
	 if($paged > 2 && $paged > $range+1 && $showitems < $pages){
		echo "<li><a href='".esc_url(get_pagenum_link(1))."'><i class='fa fa-chevron-left'></i></a></li> ";
	}else{
		echo "<li class='disabled'><a href='".esc_url(get_pagenum_link(1))."'><i class='fa fa-chevron-left'></i></a></li> ";
	}

	 for ($i=1; $i <= $pages; $i++){
		 if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
		 {
			 echo ($paged == $i)? "<li class='active'><a href='#'>".$i."</a></li> ":"<li><a href='".esc_url(get_pagenum_link($i))."' class='active' >".$i."</a></li> ";
		 }
	 }


	 if ($paged < $pages){
	 echo "<li><a href='".esc_url(get_pagenum_link($pages))."'><i class='fa fa-chevron-right'></i></a></li> ";		 
	 }else{
	 echo "<li><a href='".esc_url(get_pagenum_link($pages))."'><i class='fa fa-chevron-right'></i></a></li> ";	
	 }
	 echo "</ul>\n";
	  echo '</div>';
	 
	}
}




// Adding specific CSS class
add_filter('body_class','generosity_addinr_portfolio_class');
function generosity_addinr_portfolio_class($classes) {
	if ( isset( $post ) ) {
	$classes[] = get_post_format();	
	$classes[] = 'page-wrapper';		
	}
	if(is_page_template('template-one-page.php')){
	$classes[] = 'onepage';
	}
	return $classes;
}



function generosity_register_menus() {
	///DEVELOPER
	register_nav_menus(array(
		'main-menu' => 'Main Menu',
		'one-page-menu' => 'OnePage Menu',
	));
}
add_action('init', 'generosity_register_menus');









/*-----------------------------------------------------------------------------------*/
// Theme setup
/*-----------------------------------------------------------------------------------*/
add_action( 'after_setup_theme', 'generosity_theme_setup' );

function generosity_theme_setup() {
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support('post-formats', array('link', 'gallery', 'quote', 'video', 'audio'));
	set_post_thumbnail_size( 50, 50, true );
}


add_action( 'add_meta_boxes', 'generosity_meta_box_add' );
function generosity_meta_box_add(){
	add_meta_box( 'meta-box-one-page', ' Template Options: ', 'generosity_meta_box_op', 'page', 'normal', 'high' );
	add_meta_box( 'meta-box-project', ' Event Options: ', 'generosity_meta_box_event', 'project', 'normal', 'high' );
	add_meta_box( 'meta-box-portfolio', ' Portfolio Options: ', 'generosity_meta_box_portfolio', 'portfolio', 'normal', 'high' );
	add_meta_box( 'meta-box-portfolio', ' Post Options: ', 'generosity_meta_box_post', 'post', 'normal', 'high' );
}
function generosity_meta_box_op( $post ){
	$values = get_post_custom( $post->ID );
	$placeholder = isset( $values['placeholder'] ) ? ( $values['placeholder'][0] ) : '';
	$background_text = isset( $values['background_text'] ) ? ( $values['background_text'][0] ) : '';
	$background_img1 = isset( $values['background_img1'] ) ? ( $values['background_img1'][0] ) : '';
	$c3m_mbe_featured = isset( $values['c3m_mbe_featured'] ) ? ( $values['c3m_mbe_featured'][0] ) : '';

	
    wp_nonce_field( 'my_meta_box_nonce', 'meta_box_nonce' );
	?>

<div id="onepage_metabox">
  <h3>
    <label for="background">
      <?php esc_html_e('Content in Main-Background:','generosity') ?>
    </label>
  </h3>
  <?php  
		wp_editor( $background_text, 'background_text' );
		?>
</div>
<?php
}

function generosity_meta_box_event( $post ){
	$values = get_post_custom( $post->ID );
	$label_left = isset( $values['label_left'] ) ? ( $values['label_left'][0] ) : '';
	$label_right = isset( $values['label_right'] ) ? ( $values['label_right'][0] ) : '';
	$progress_bar = isset( $values['progress_bar'] ) ? ( $values['progress_bar'][0] ) : '';
	$excerpt = isset( $values['excerpt'] ) ? ( $values['excerpt'][0] ) : '';
	$label_btn = isset( $values['label_btn'] ) ? ( $values['label_btn'][0] ) : '';
	$c3m_mbe_featured = isset( $values['c3m_mbe_featured'] ) ? ( $values['c3m_mbe_featured'][0] ) : '';

	
    wp_nonce_field( 'my_meta_box_nonce', 'meta_box_nonce' );
	?>
<div id="project_metabox" class="generosity_metabox">
  <div>
    <h3>
      <label for="label_left">
        <?php esc_html_e('Label Left','generosity') ?>
        : </label>
    </h3>
    <input style="width:100%" name="label_left" id="label_left" value="<?php echo esc_attr($label_left) ?>"/>
  </div>
  <div>
    <h3>
      <label for="label_right">
        <?php esc_html_e('Label Right','generosity') ?>
        : </label>
    </h3>
    <p>
      <?php esc_html_e('*This will appear in Projects Archive Page','generosity') ?>
    </p>
    <input style="width:100%" name="label_right" id="label_right" value="<?php echo esc_attr($label_right) ?>"/>
  </div>
  <div>
    <h3>
      <label for="progress_bar">
        <?php esc_html_e('Progress Project Value','generosity') ?>
        : </label>
    </h3>
    <input style="width:100%" name="progress_bar" id="progress_bar" value="<?php echo esc_attr($progress_bar) ?>"/>
  </div>
  <div>
    <h3>
      <label for="excerpt">
        <?php esc_html_e('Excerpt in archive: ','generosity') ?>
      </label>
    </h3>
    <textarea style="width:100%;height:200px;" name="excerpt" id="excerpt"><?php echo esc_attr($excerpt) ?></textarea>
  </div>
  <div>
    <h3>
      <label for="label_btn">
        <?php esc_html_e('Button label in archive (default: Donate Now)','generosity') ?>
        : </label>
    </h3>
    <input style="width:100%" name="label_btn" id="label_btn" value="<?php echo esc_attr($label_btn) ?>"/>
  </div>
  <input type="button" class="p_e_text_project" title="<?php esc_html_e('Paste Excerpt Example','generosity') ?>" value="<?php esc_html_e('Example Info','generosity') ?>" />
</div>
<?php
}



function generosity_meta_box_portfolio( $post ){
	$values = get_post_custom( $post->ID );
	$details = isset( $values['details'] ) ? ( $values['details'][0] ) : '';
	$progress_bar = isset( $values['progress_bar'] ) ? ( $values['progress_bar'][0] ) : '';
	$excerpt = isset( $values['excerpt'] ) ? ( $values['excerpt'][0] ) : '';
	$label_btn = isset( $values['label_btn'] ) ? ( $values['label_btn'][0] ) : '';
	$c3m_mbe_featured = isset( $values['c3m_mbe_featured'] ) ? ( $values['c3m_mbe_featured'][0] ) : '';
	
    wp_nonce_field( 'my_meta_box_nonce', 'meta_box_nonce' );
	?>
<div id="portfolio_metabox" class="generosity_metabox">
  <div>
    <input type="button" class="paste_example" title="<?php esc_html_e('Paste Details Example','generosity') ?>" value="<?php esc_html_e('Example','generosity') ?>" />
    <h3>
      <label for="details">
        <?php esc_html_e('Details Item','generosity') ?>
        : </label>
    </h3>
    <textarea style="width:100%;height:200px;" name="details" id="details"><?php echo esc_attr($details) ?></textarea>
  </div>
  <div>
    <h3>
      <label for="">
        <?php esc_html_e('Select yes below to make this item featured','generosity') ?>
        : </label>
    </h3>
  </div>
  <div>
    <?php esc_html_e('Featured: ','generosity') ?>
    <select name="c3m_mbe_featured">
      <option value="0" <?php selected( $c3m_mbe_featured, '0' ); ?>>
      <?php esc_html_e('No','generosity') ?>
      </option>
      <option value="1" <?php selected( $c3m_mbe_featured, '1' ); ?>>
      <?php esc_html_e('Sure, Feature This Post','generosity') ?>
      </option>
    </select>
  </div>
</div>
<?php
}


function generosity_meta_box_post( $post ){
	$values = get_post_custom( $post->ID );
	
	$c3m_mbe_featured = isset( $values['c3m_mbe_featured'] ) ? ( $values['c3m_mbe_featured'][0] ) : '';
	$subtitle_post = isset( $values['subtitle_post'] ) ? ( $values['subtitle_post'][0] ) : '';
	
    wp_nonce_field( 'my_meta_box_nonce', 'meta_box_nonce' );
	?>
<div id="post_metabox">
  <p>
  <h3>
    <label for="subtitle_post">
      <?php esc_html_e('Subtitle Post','generosity') ?>
      : </label>
  </h3>
  <input style="width:100%" name="subtitle_post" id="subtitle_post" value="<?php echo esc_attr($subtitle_post) ?>"/>
  </p>
  <p>
    <?php esc_html_e('Featured:','live_suppot') ?>
    <select name="c3m_mbe_featured">
      <option value="0" <?php selected( $c3m_mbe_featured, '0' ); ?>>
      <?php esc_html_e('No','generosity') ?>
      </option>
      <option value="1" <?php selected( $c3m_mbe_featured, '1' ); ?>>
      <?php esc_html_e('Sure, Feature This Post','suppoty') ?>
      </option>
    </select>
  </p>
</div>
<?php
}






add_action( 'save_post', 'generosity_meta_box_save' );
function generosity_meta_box_save( $post_id ){
    if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
    if( !isset( $_POST['meta_box_nonce'] ) || !wp_verify_nonce( $_POST['meta_box_nonce'], 'my_meta_box_nonce' ) ) return;
    if(  ! current_user_can( 'edit_page', $post_id)) return;
   
    if( isset( $_POST['placeholder'] ) )
        update_post_meta( $post_id, 'placeholder',  $_POST['placeholder'] );
		
	if( isset( $_POST['background_img1'] ) )
        update_post_meta( $post_id, 'background_img1', $_POST['background_img1'] );
		
	if( isset( $_POST['background_text'] ) )
        update_post_meta( $post_id, 'background_text', $_POST['background_text'] );
		
	if( isset( $_POST['label_left'] ) )
        update_post_meta( $post_id, 'label_left', $_POST['label_left'] );	
	if( isset( $_POST['label_right'] ) )
        update_post_meta( $post_id, 'label_right', $_POST['label_right'] );	
	if( isset( $_POST['progress_bar'] ) )
        update_post_meta( $post_id, 'progress_bar', $_POST['progress_bar'] );
	if( isset( $_POST['excerpt'] ) )
        update_post_meta( $post_id, 'excerpt', $_POST['excerpt'] );
	if( isset( $_POST['label_btn'] ) )
        update_post_meta( $post_id, 'label_btn', $_POST['label_btn'] );
		
	if( isset( $_POST['details'] ) )
        update_post_meta( $post_id, 'details', $_POST['details'] );
	if( isset( $_POST['c3m_mbe_featured'] ) )
        update_post_meta( $post_id, 'c3m_mbe_featured', $_POST['c3m_mbe_featured'] );
	if( isset( $_POST['subtitle_post'] ) )
        update_post_meta( $post_id, 'subtitle_post', $_POST['subtitle_post'] );
		
}


function generosity_admin_scripts($hook) {
	if($hook == 'post.php' || $hook == 'post-new.php') {
		wp_enqueue_script('custom-meta-js', get_template_directory_uri() . '/js/meta.js', array('jquery'));
		wp_register_style('custom_metacss', get_template_directory_uri() . '/css/meta.css', false, '1.0.0' );
        wp_enqueue_style( 'custom_metacss' );
	}
}
add_action('admin_enqueue_scripts', 'generosity_admin_scripts');






function generosity_get_post_types_by_taxonomy( $tax = 'category' ){
    $out = array();
    $post_types = get_post_types();
    foreach( $post_types as $post_type ){
        $taxonomies = get_object_taxonomies( $post_type );
        if( in_array( $tax, $taxonomies ) ){
            $out[] = $post_type;
        }
    }
    return $out;
}

function generosity_OpenSans_fonts_url() {
    $font_url = '';
    
    /*
    Translators: If there are characters in your language that are not supported
    by chosen font(s), translate this to 'off'. Do not translate into your own language.
     */
    if ( 'off' !== _x( 'on', 'Google font: on or off', 'generosity' ) ) {
        $font_url = add_query_arg( 'family', urlencode( 'Open Sans:400,600,700,300|Droid Serif:400,700' ), "//fonts.googleapis.com/css" );
    }
    return $font_url;
}


/*-----------------------------------------------------------------------------------*/
/*	Queue Scripts
/*-----------------------------------------------------------------------------------*/ 

function generosity_scripts() {

	//ENQUEUE CSS
	
	wp_register_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css');
	wp_register_style( 'font_awesome', get_template_directory_uri() . '/css/font-awesome.min.css');
	wp_register_style( 'flexslider', get_template_directory_uri() . '/css/flexslider.css');
	wp_register_style( 'mediaelementplayer', get_template_directory_uri() . '/css/mediaelementplayer.css');	
	wp_register_style( 'magnific_popup', get_template_directory_uri() . '/css/magnific-popup.css');	
	wp_register_style( 'animate', get_template_directory_uri() . '/css/animate.min.css');	
	wp_register_style( 'style', get_template_directory_uri() . '/style.css');	
	wp_register_style( 'responsive', get_template_directory_uri() . '/css/responsive.css');	

	
    wp_enqueue_style( 'bootstrap' );
	wp_enqueue_style( 'font_awesome' );
	wp_enqueue_style( 'flexslider' );
	wp_enqueue_style( 'mediaelementplayer' );
	wp_enqueue_style( 'magnific_popup' );
	wp_enqueue_style( 'animate' );
	wp_enqueue_style( 'style' );


	wp_enqueue_style( 'generosity_fonts', generosity_OpenSans_fonts_url(), array(), '1.0.0' );
	
	if(generosity_option('responsive_mode')){
    wp_enqueue_style( 'responsive' );
	}
	
	
	$custom_css =  (generosity_option('custom_css'));
	
	$logo_height = (generosity_option('logo_height'));
	if($logo_height!=''&&generosity_option('custom_logo_h')){
		$custom_css .= '#logo img{
		height: '.esc_attr($logo_height).'px;
		line-height: '.esc_attr($logo_height).'px;
		}';
	}
	if(generosity_option('uppertitle_onoff')){
	$custom_css .= 'h4.title-excerpt{
	text-transform:uppercase;
	}';
	}
	
	if(generosity_option('bg_404')){
	$custom_css .= '.page-404{
    background:url('.generosity_option('bg_404').') no-repeat;
	}';
	}
	
	if(generosity_option('uppertitle_onoff_post')){
	$custom_css .= '.block-title h1{
	text-transform:uppercase;
	}';
	}
	

    //no aun
	wp_add_inline_style( 'style', $custom_css );
	
	
	
	//ENQUEUE JAVSCRIPTS
	
	
	wp_enqueue_script('bootstrap_js', get_template_directory_uri().'/js/bootstrap.min.js', array('jquery'), '', true);

	if(is_active_widget(false,false,'twitter_feed-widget')||is_active_widget(false,false,'gslider-widget')||!is_singular()||is_singular( 'portfolio' ) || is_page_template('template-one-page.php')||generosity_has_shortcode('flexslider_testimonial' )||generosity_has_shortcode('horizontal_carousel')||generosity_has_shortcode('projects_carousel')||generosity_has_shortcode('blog_scroll')){
	wp_enqueue_script('flexslider_js', get_template_directory_uri().'/js/jquery.flexslider.min.js', array(), '', true);
	}
	
	
	wp_enqueue_script('jquery_appear_js', get_template_directory_uri().'/js/jquery.appear.js', array(), '', true);
	if(generosity_has_shortcode('fact_box')||generosity_has_shortcode('key_details')){
	wp_enqueue_script('countTo_js', get_template_directory_uri().'/js/jquery.countTo.js', array(), '', true);
	}
	if(generosity_has_shortcode('blog_scroll')||generosity_has_shortcode('portfolio_embed')||(generosity_option('blog_type')=='masonry')){
	wp_enqueue_script('isotope_js', get_template_directory_uri().'/js/isotope.pkgd.min.js', array(), '', true);
	}
	if(generosity_has_shortcode('audio_iframe')||generosity_has_shortcode('blog_scroll')||!is_singular()){
	wp_enqueue_script('mediaelement_js', get_template_directory_uri().'/js/mediaelement-and-player.min.js', array(), '', true);
	}
	if(generosity_has_shortcode('portfolio_embed')||is_singular( 'portfolio')||is_active_widget(false,false,'gslider-widget')){
	wp_enqueue_script('magnific_popup_js', get_template_directory_uri().'/js/jquery.magnific-popup.min.js', array(), '', true);
	}
	wp_enqueue_script('jquery_custom_ui_js', get_template_directory_uri().'/js/jquery-ui.js', array(), '', true);
	
	wp_enqueue_script('myscripts_js', get_template_directory_uri().'/js/scripts.js', array(), '', true);
	
	

	
	//INSERT JAVSCRIPT VARS
	
	wp_localize_script( 'jquery', 'generosity_templateUrl', get_template_directory_uri() );
	

	
	
	$generosity_btn_load_more_load_more = esc_html__('Load More','generosity');
	$generosity_btn_load_more_loading = esc_html__('Loading ...','generosity');
	$generosity_btn_load_no_more = esc_html__('No More Posts','generosity');
	$generosity_placeholder_chimp = esc_html__('Your Mail','generosity');
	$generosity_request_was_successful = esc_html__('Thank You','generosity');
	
	
	
	wp_localize_script( 'jquery', 'generosity_btn_load_more_load_more', $generosity_btn_load_more_load_more );
	wp_localize_script( 'jquery', 'generosity_btn_load_more_loading', $generosity_btn_load_more_loading );
	wp_localize_script( 'jquery', 'generosity_btn_load_no_more', $generosity_btn_load_no_more );
	wp_localize_script( 'jquery', 'generosity_placeholder_chimp', $generosity_placeholder_chimp );
	wp_localize_script( 'jquery', 'generosity_request_was_successful', $generosity_request_was_successful );
	wp_localize_script( 'jquery', 'generosity_ajaxurl', admin_url( 'admin-ajax.php' ) );
	
}
add_action( 'wp_enqueue_scripts', 'generosity_scripts' );


function generosity_has_shortcode($shortcode = '') {
     
    $post_to_check = get_post(get_the_ID());
     if(isset($post_to_check)){
    // false because we have to search through the post content first
    $found = false;
     
    // if no short code was provided, return false
    if (!$shortcode) {
        return $found;
    }
	
    // check the post content for the short code
	
		if ( stripos($post_to_check->post_content, '[' . $shortcode) !== false ) {
			// we have found the short code
			$found = true;
		}
		
		if ( stripos($post_to_check->post_content, '[' . 'vc_row') !== false ) {
			// we have found the short code
			$found = true;
		}
		
	
     
    // return our final results
    return $found;
	}
}


	


function generosity_add_image_sizes() {
	add_image_size('generosity_blog-post-thumbnail', 770, 480, true);
	add_image_size('generosity_blog-simple-post-featured', 372, 316, true);
	add_image_size('generosity_gallery-featured', 500, 400, true);
	add_image_size('generosity_featured-in-menu3', 500, 319, true);
	add_image_size('generosity_recent-thumbnail', 100, 100, true);
	add_image_size('generosity_event-thumbnail', 300, 356, true);
	add_image_size('generosity_ms-featured-a', 370, 280, true);
	add_image_size('generosity_ms-featured-b', 370, 410, true);
	add_image_size('generosity_ms-featured-c', 370, 210, true);
	add_image_size('generosity_ms-featured-d', 370, 290, true);
	add_image_size('generosity_ms-featured-e', 370, 250, true);
	add_image_size('generosity_ms-featured-f', 370, 210, true);
}
add_action('init', 'generosity_add_image_sizes');





function generosity_comment($comment, $args, $depth) {
	$GLOBALS['comment'] = $comment;
	extract($args, EXTR_SKIP);	
	$with_tb = '';
	if(!get_avatar( $comment, 96 )){
	 $with_tb = 'is-no-coment';
	}
	
?>

<!-- Comment 2 -->
<li>
  <div class="row-comment">
    <?php 	if(get_avatar( $comment, 96 )): ?>
    <div class="thumb-w"> 
      <!-- Comment photo -->
      
      <div class="thumb"> <?php echo get_avatar( $comment, 96 ); ?> </div>
      <?php comment_reply_link(array_merge( $args, array('reply_text'=>wp_kses(__('Reply <i class="fa fa-rotate-left"></i>','generosity'), array('i' => array('class' => array(),),)),'depth' => $depth, 'max_depth' => $args['max_depth']))); ?>
    </div>
    <?php endif; ?>
    <div class="w_thumb <?php echo esc_attr($with_tb) ?>">
      <p class="meta-comments"> <span class="author-comment">
        <?php comment_author_link() ?>
        </span> <span class="date-comment"><i class="fa fa-clock-o"></i><?php echo (get_comment_date())?> </span> </p>
      <div>
        <?php comment_text() ?>
      </div>
    </div>
  </div>
</li>
<?php if ( is_singular() ) wp_enqueue_script( "comment-reply" ); ?>
<?php
}

add_filter('get_avatar','generosity_change_avatar_css');

function generosity_change_avatar_css($class) {
$class = str_replace("class='avatar", "class='author_gravatar alignright_icon ", $class) ;
return $class;
}

/**
 * Sidebar widgets
 */
if(function_exists('register_sidebar')){
	register_sidebar(array(
	'name'=>esc_attr__('Default sidebar','generosity'),
	'id'=>'sidebar-1',
	'before_widget'=>'<div class="widget %2$s" id="%1$s">',
	'after_widget'=>'</div>',
	'before_title'=>'<h4 class="widget_title">',
	'after_title'=>'</h4>'
	));
}



if(function_exists('register_sidebar')){
	register_sidebar(array(
	'name'=>esc_attr__('Footer 1','generosity'),
	'id'=>'footer-1',
	'before_widget'=>'<div class="widget widget-footer %2$s" id="%1$s">',
	'after_widget'=>'</div>',
	'before_title'=>'<h4>',
	'after_title'=>'</h4>'
	));
}

if(function_exists('register_sidebar')){
	register_sidebar(array(
	'name'=>esc_attr__('Footer 2','generosity'),
	'id'=>'footer-2',
	'before_widget'=>'<div class="widget widget-footer %2$s" id="%1$s">',
	'after_widget'=>'</div>',
	'before_title'=>'<h4>',
	'after_title'=>'</h4>'
	));
}

if(function_exists('register_sidebar')){
	register_sidebar(array(
	'name'=>esc_attr__('Footer 3','generosity'),
	'id'=>'footer-3',
	'before_widget'=>'<div class="widget widget-footer %2$s" id="%1$s">',
	'after_widget'=>'</div>',
	'before_title'=>'<h4>',
	'after_title'=>'</h4>'
	));
}

if(function_exists('register_sidebar')){
	register_sidebar(array(
	'name'=>esc_attr__('Footer 4','generosity'),
	'id'=>'footer-4',
	'before_widget'=>'<div class="widget widget-footer %2$s" id="%1$s">',
	'after_widget'=>'</div>',
	'before_title'=>'<h4>',
	'after_title'=>'</h4>'
	));
}





add_action( 'after_setup_theme', 'generosity_requeriments' );
function generosity_requeriments() {
    add_theme_support( 'title-tag' );
}

function generosity_breadcrumb() {
 
	if (!is_home()) {
		echo '<li><a href="'.esc_url(home_url()) .'">'. esc_html__('Home','generosity').'</a></li> ';

		if (is_archive() || is_single()) {
			echo '<li>';
			if(is_category()|| is_single()){
				
				if(is_singular( 'project' )){
					echo esc_attr(generosity_option('project_label'));
				}elseif(is_singular( 'portfolio' )){
					echo esc_attr(generosity_option('portfolio_label'));
				}else{
					$category = get_the_category();
					if ($category) {
					  echo '<a href="' . esc_url(get_category_link( $category[0]->term_id )) . '" >' . $category[0]->name.'</a> ';
					}
				}
			}else{
				//if(is_post_type_archive( generosity_option('project_slug') )){
					
				//}
				echo  esc_html__('Archive','generosity');
				
			}
			echo '</li>';
			if (is_single()) {
				
				echo '<li>';
				the_title();
				echo '</li>';
			}
		} elseif (is_page()) {
			echo '<li>';
			echo the_title();
			echo '</li>';
		} elseif(is_search()){
			echo '<li>';
			echo 'Search';
			echo '</li>';
		}
	}else{
	
		if( get_option( 'show_on_front' ) == 'page' ) {
			echo '<li><a href="'.esc_url(home_url()).'">'.esc_html__('Home','generosity').'</a></li> ';
			echo '<li>';
			echo '<a href="'.esc_url(get_permalink( get_option('page_for_posts' ) )).'">'.esc_attr(generosity_option('label_blogenerosity_breadcrumb')).'</a>';
			echo '</li>';
		}else{
			echo '<li><a href="'.esc_url(home_url()).'">'.esc_html__('Home','generosity').'</a></li> ';
			echo '<li><a href="'.esc_url(home_url()) .'">'.esc_attr(generosity_option('label_blogenerosity_breadcrumb')).'</a></li> ';
		}
	}
}




add_filter('get_avatar','generosity_gravatar_class');

function generosity_gravatar_class($class) {
    $class = str_replace("class='avatar", "class='avatar thumb", $class);
    return $class;
}









function generosity_wp_title( $title, $sep ) {
    global $paged, $page;

    if ( is_feed() ) {
        return $title;
    }

    $title .= esc_html(get_bloginfo( 'name', 'display' ));

    $site_description = get_bloginfo( 'description', 'display' );
    if ( $site_description && ( is_home() || is_front_page() ) ) {
        $title = "$title $sep $site_description";
    }

    if ( $paged >= 2 || $page >= 2 ) {
        $title = "$title $sep " . sprintf( esc_html__( 'Page %s', 'generosity' ), max( $paged, $page ) );
    }

    return $title;
}
add_filter( 'wp_title', 'generosity_wp_title', 10, 2 );














add_action( 'after_setup_theme', 'generosity_woocommerce_support' );
function generosity_woocommerce_support() {
    add_theme_support( 'woocommerce' );
}

if(class_exists('Woocommerce')){
	remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5 );
	add_filter( 'loop_shop_per_page', create_function( '$cols', 'return 12;' ), 20 );
	add_filter( 'woocommerce_output_related_products_args', 'generosity_jk_related_products_args' );
	
	remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );
	add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 25 );
	
	remove_action( 'woocommerce_before_single_product_summary', 'woocommerce_show_product_sale_flash', 10 );
	
	remove_action( 'woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10 );
	add_action( 'woocommerce_shop_loop_item_title', 'generosity_woocommerce_template_loop_product_title', 10 );
	
	remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5 );


}

function generosity_woocommerce_template_loop_product_title(){
	$the_product_title = get_the_title();
	if($the_product_title==''){
	$the_product_title = esc_html('Untitled','generosity');
	}
	echo '<h4>' . esc_html($the_product_title) . '</h4>';
}


function generosity_jk_related_products_args( $args ) {
	$args['posts_per_page'] = 3; // 4 related products
	$args['columns'] = 1; // arranged in 2 columns
	return $args;
}

add_filter ( 'woocommerce_product_thumbnails_columns', 'generosity_xx_thumb_cols' );
 function generosity_xx_thumb_cols() {
     return 4; // .last class applied to every 4th thumbnail
 }

 if(class_exists('Woocommerce')){
if(function_exists('register_sidebar')){
	register_sidebar(array(
	'name'=>'Woocommerce sidebar',
	'id'=>'sidebar-w',
	'before_widget'=>'<div class="widget %2$s" id="%1$s">',
	'after_widget'=>'</div>',
	'before_title'=>'<h4 class="widget_title">',
	'after_title'=>'</h4>'
	));
}


}




/**
 * TGM-Plugin-Activation
 */
require_once get_template_directory() . '/include/class-tgm-plugin-activation.php';

function generosity_plugin_activation() {

	$plugins = array(
		array(
			'name'     => 'ShortcodesDex',
			'slug'     => 'shortcodesdex',
			'source'   				=> get_stylesheet_directory() . '/include/libs/shortcodesdex.zip',
			'required' 				=> true, // If false, the plugin is only 'recommended' instead of required
			'force_activation' 		=> false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
			'force_deactivation' 	=> false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
			'external_url' 			=> '', // If set, overrides default API URL and points to an external URL
		),array(
			'name'     => 'Post Types dex',
			'slug'     => 'post-types-dex',
			'source'   				=> get_stylesheet_directory() . '/include/libs/post-types-dex.zip',
			'required' 				=> true, // If false, the plugin is only 'recommended' instead of required
			'version' 				=> '1.0.0', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented. If the plugin version is higher than the plugin version installed , the user will be notified to update the plugin
			'force_activation' 		=> false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
			'force_deactivation' 	=> false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
			'external_url' 			=> '', // If set, overrides default API URL and points to an external URL
		),	array(
			'name'     => 'Contact Form 7',
			'slug'     => 'contact-form-7',
			'required' => false,
		),	array(
			'name'     => 'mailchimp-for-wp',
			'slug'     => 'mailchimp-for-wp',
			'required' => false,
		),	array(
			'name'     => 'woocommerce',
			'slug'     => 'woocommerce',
			'required' => false,
		),array(
            'name'               => 'Visual composer',
            'slug'               => 'js_composer',
            'source'             => get_stylesheet_directory() . '/include/libs/js_composer.zip', 
            'required'           => true,
            'version'            => '4.7.4',
        ),
	);


	$config = array(
        'domain'            => 'generosity',           // Text domain - likely want to be the same as your theme.        
    );

	tgmpa($plugins, $config);
}
add_action('tgmpa_register', 'generosity_plugin_activation');
?>
