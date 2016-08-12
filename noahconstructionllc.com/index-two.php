<?php
/*
Template Name: Project Gallery
*/
?>
<?php get_header(); ?>
<script>
jQuery(document).ready(function($) {
      jQuery('img').addClass('img-thumbnail'); 
});
</script>
<style>
.hovereffect img{ transform:none !important; width: 100% !important;}
</style>
<section class="subpage-banner portfolio-4-col-banner">
  <div class="container">
    <div class="row header-group">
      <div class="col-sm-12 col-sm-12">
        <h1>Project Gallery</h1>
      </div>
    </div>
  </div>
</section>
<section class="portfolio">
  <div class="container">
    <div class="row">
      <div id="primary">
        <div id="content" role="main">
          <div class="row" >
            <?php
									 $terms = get_terms("tagportfolio");
									 $count = count($terms);
									 echo '<ul id="portfolio-filter">';
									 echo '<li><a href="#all" title="">All Project</a></li>';
									 if ( $count > 0 ){
										 
											foreach ( $terms as $term ) {
												 
												$termname = strtolower($term->name);
												$termname = str_replace(' ', '-', $termname);
												echo '<li><a href="#'.$termname.'" title="" rel="'.$termname.'">'.$term->name.'</a></li>';
											}
									 }
									 echo "</ul>";
								?>
          </div>
          <?php 
								$loop = new WP_Query(array('post_type' => 'project', 'posts_per_page' => -1));
								$count =0;
							?>
          <div id="portfolio-wrapper">
            <div class="col-md-12" id="portfolio-list" style="padding:0px;">
              <?php if ( $loop ) : 
										  
										while ( $loop->have_posts() ) : $loop->the_post(); ?>
              <?php
											$terms = get_the_terms( $post->ID, 'tagportfolio' );
													 
											if ( $terms && ! is_wp_error( $terms ) ) : 
												$links = array();
					 
												foreach ( $terms as $term ) 
												{
													$links[] = $term->name;
												}
												$links = str_replace(' ', '-', $links); 
												$tax = join( " ", $links );     
											else :  
												$tax = '';  
											endif;
										?>
              <?php $infos = get_post_custom_values('_url'); ?>
              <div class="col-md-6 portfolio-item <?php echo strtolower($tax); ?> all">
                <div class="hovereffect">
                  <?php the_post_thumbnail( array(600, 300) ); ?>
                  <div class="overlay">
                    <h2>
                      <?php the_title(); ?>
                    </h2>
                    <p> <a href="<?php the_permalink() ?>">LINK HERE</a> </p>
                  </div>
                </div>
              </div>
              <?php endwhile; else: ?>
              <div class="error-not-found">Sorry, no portfolio entries for while.</div>
              <?php endif; ?>
            </div>
            <div class="clearboth"></div>
          </div>
          <!-- end #portfolio-wrapper--> 
          
          <script>
								jQuery(document).ready(function() { 
									jQuery("#portfolio-list").filterable();
								});
							</script> 
        </div>
        <!-- #content --> 
      </div>
      <!-- #primary --> 
      
    </div>
  </div>
</section>
<section class="map-image-area" data-type="background" data-speed="3">
  <div class="map" style="height: 156px;">
    <div class="map-info hidden-xs">
      <div class="container">
        <div class="row">
          <div class="col col-sm-4">
            <div class="icon-container"> <i class="icon-location-3"></i> </div>
            <address class="address">
            Noah Construction LLC <br>
            5163  Astoria, NY 11105
            </address>
          </div>
          <div class="col col-sm-4">
            <div class="icon-container"> <i class="icon-phone"></i> </div>
            <div class="phone"> +1-646-599-4871 || +1-347-239-9235 </div>
          </div>
          <div class="col col-sm-4">
            <div class="icon-container"> <i class="icon-mail-1"></i> </div>
            <div class="email"> <a href="mailto:noahconstructionllc@gmail.com">noahconstructionllc@gmail.com</a> </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Bottom Section -->

<?php get_footer(); ?>
