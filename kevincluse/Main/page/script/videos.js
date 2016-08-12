
$('.fancybox-video-youtube').bind('click',function() 
{
    $.fancybox(
    {
        'padding'		: 0,
        'autoScale'		: false,
        'transitionIn'	: 'none',
        'transitionOut'	: 'none',
        'width'			: 680,
        'height'		: 495,
        'href'			: this.href.replace(new RegExp("watch\\?v=", "i"), 'v/'),
        'type':'swf',
        'swf':
        {
            'wmode'				: 'transparent',
            'allowfullscreen'	: 'true'
        }
    });

    return false;
});

$('.fancybox-video-vimeo').bind('click',function() 
{
	$.fancybox(
	{
		'padding'		: 0,
		'autoScale'		: false,
		'transitionIn'	: 'none',
		'transitionOut'	: 'none',
		'title'			: this.title,
		'width'			: 600,
		'height'		: 338,
		'href'			: this.href.replace(new RegExp("([0-9])","i"),'moogaloop.swf?clip_id=$1'),
		'type'			: 'swf',
        'swf':
        {
            'wmode'				: 'transparent',
            'allowfullscreen'	: 'true'
        }
	});
	
	return false;
});