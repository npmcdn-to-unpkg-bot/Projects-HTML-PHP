// Load is used to ensure all images have been loaded, impossible with document

jQuery(window).load(function () {



	// Takes the gutter width from the bottom margin of .post

	var gutter = parseInt(jQuery('.post').css('marginBottom'));
	var container = jQuery('#posts');



	// Creates an instance of Masonry on #posts

	container.masonry({
		gutter: gutter,
		itemSelector: '.post',
		columnWidth: '.post'
	});
	
	
	
	// This code fires every time a user resizes the screen and only affects .post elements
	// whose parent class isn't .container. Triggers resize first so nothing looks weird.
	
	jQuery(window).bind('resize', function () {
		if (!jQuery('#posts').parent().hasClass('container')) {
			
			
			
			// Resets all widths to 'auto' to sterilize calculations
			
			post_width = jQuery('.post').width() + gutter;
			jQuery('#posts, body > #grid').css('width', 'auto');
			
			
			
			// Calculates how many .post elements will actually fit per row. Could this code be cleaner?
			
			posts_per_row = jQuery('#posts').innerWidth() / post_width;
			floor_posts_width = (Math.floor(posts_per_row) * post_width) - gutter;
			ceil_posts_width = (Math.ceil(posts_per_row) * post_width) - gutter;
			posts_width = (ceil_posts_width > jQuery('#posts').innerWidth()) ? floor_posts_width : ceil_posts_width;
			if (posts_width == jQuery('.post').width()) {
				posts_width = '100%';
			}
			
			
			
			// Ensures that all top-level elements have equal width and stay centered
			
			jQuery('#posts, #grid').css('width', posts_width);
			jQuery('#grid').css({'margin': '0 auto'});
        		
		
		
		}
	}).trigger('resize');
	


});




$(document).ready(function(){
    $('.sponsorFlip').bind("click",function(){
            var elem = $(this);
    var wall = new Masonry( document.getElementById('container'), {
                    gutterWidth:5,
                    isFitWidth: true
                  });

    if(elem.data('flipped'))
    {
        elem.revertFlip();
        elem.data('flipped',false);
                    wall.reload();  
    }
    else
    {
        elem.flip({
            direction:'lr',
            speed: 350,
            onBefore: function(){
                elem.html(elem.siblings('.sponsorData').html());
            }
        });
        elem.data('flipped',true);
        wall.reload();
    }
});

});


/*js for flip*/
$('.flip').mouseover(function(e) {
$(this).find('.card').addClass('flipped').mouseleave(function(){
	$(this).removeClass('flipped');
});
return false;
});