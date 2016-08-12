<?php
/*
Template Name: Service
*/ ?>
<?php get_header(); ?>

<div class="contact_page nosidebar">
  <section class="subpage-banner aboutus-banner">
    <div class="container">
      <div class="row header-group">
        <div class="col-sm-12 col-sm-12">
          <h1>Services</h1>
        </div>
      </div>
    </div>
  </section>
  <div class="container">
    <p>
  
      <?php global $redux_demo;
						$services_content = $redux_demo ['services-content'] ; 
					?>
      <?php echo $services_content ;?> </p>
    <?php 
					$noah_services_page = new WP_Query (array(
						'post_type' => 'noah_services_page'
					));
				?>
    <?php while($noah_services_page->have_posts()) : $noah_services_page->the_post(); ?>
    <div class="row">
      <div class="col-sm-6">
        <div class="services-title" style="padding-bottom:7px;">
          <h3>
            <?php the_title(); ?>
          </h3>
        </div>
        <div class="services-des">
          <div class="col-md-12" style="padding:0px;">
            <?php the_content(); ?>
          </div>
        </div>
      </div>
      <div class="col-sm-6">
        <?php the_post_thumbnail( array(530,300) );?>
      </div>
    </div>
    <br>
    <br>
    <?php endwhile; ?>
  </div>
</div>
<section class="map-image-area" data-type="background" data-speed="3">
  <div class="map" style="height: 156px;">
    <div class="map-info hidden-xs">
      <div class="container">
        <div class="row">
          <div class="col col-sm-4">
            <div class="icon-container"> <i class="icon-location-3"></i> </div>
            <address class="address">
            <?php global $redux_demo;
											$footer_address = $redux_demo ['footer-address'] ; 
										?>
            <?php echo $footer_address ;?>
            </address>
          </div>
          <div class="col col-sm-4">
            <div class="icon-container"> <i class="icon-phone"></i> </div>
            <div class="phone">
              <?php global $redux_demo;
											$footer_phone = $redux_demo ['footer-phone'] ; 
										?>
              <?php echo $footer_phone ;?> </div>
          </div>
          <div class="col col-sm-4">
            <div class="icon-container"> <i class="icon-mail-1"></i> </div>
            <div class="email"> <a>
              <?php global $redux_demo;
												$footer_email = $redux_demo ['footer-email'] ; 
											?>
              <?php echo $footer_email ;?> </a> </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Bottom Section -->

<?php get_footer(); ?>
