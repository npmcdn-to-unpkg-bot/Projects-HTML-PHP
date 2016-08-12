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
.hovereffect{border-radius: 4px;}
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
					<div class="col-md-12" style="padding:0px;">
					
						<?php 
							$projectss = new WP_Query (array(
								'post_type' => 'project'
							));
						?>
						<?php while($projectss->have_posts()) : $projectss->the_post(); ?>
						<div class="col-md-6 portfolio-item">
							<div class="hovereffect">
								<?php the_post_thumbnail( array(600, 300) ); ?>
								<div class="overlay">
									<h2><?php the_title(); ?></h2>
									
	
									<p> 
										<a href="<?php the_permalink() ?>">LINK HERE</a>
									</p> 
								</div>
							</div>
						</div>
								 
						<?php endwhile; wp_reset_query(); ?>
						
					</div> 
				</div>
			</div>
		</section>
		

		<section class="map-image-area" data-type="background" data-speed="3">
			<div class="map" style="height: 156px;">
				<div class="map-info hidden-xs">
						<div class="container">
							<div class="row">
								<div class="col col-sm-4">
									<div class="icon-container">
										<i class="icon-location-3"></i>
									</div>
									<address class="address">
										Noah Construction LLC
											<br>
										5163  Astoria, NY 11105
									</address>
								</div>
								<div class="col col-sm-4">
									<div class="icon-container">
										<i class="icon-phone"></i>
									</div>
									<div class="phone">
										+1-646-599-4871 || +1-347-239-9235
									</div>						
								</div>
								<div class="col col-sm-4">
									<div class="icon-container">
										<i class="icon-mail-1"></i>
									</div>							
									<div class="email">
										<a href="mailto:noahconstructionllc@gmail.com">noahconstructionllc@gmail.com</a>
									</div>								
								</div>
							</div>
						</div>
				</div>
			</div>	
		</section>	<!-- Bottom Section -->
		
		
		<?php get_footer(); ?>