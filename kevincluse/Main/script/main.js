
    $(document).ready(function() 
    {
        var page=
        {
            'start'         :   {html:'start.html',js:''},
            'about'     	:   {html:'about.html',js:'images.js'},
            'klassen'     	:   {html:'klassen.html',js:''},
            'seminare'      :   {html:'seminare.html',js:''},
            'mobil'         :   {html:'mobilitat.html',js:''},
            'termine'       :   {html:'termine.html',js:'images.js'}, 
            'bilder'        :   {html:'bilder.html',js:'images.js'},
            'videos'        :   {html:'videos.html',js:'videos.js'},
            'links'      	:   {html:'links.html',js:''},
            'preise'        :   {html:'preise.html',js:'images.js'},
            'news'          :   {html:'news.html',js:'images.js'},
            'kontakt'       :   {html:'contact.html',js:'contact.js'},
            'impressum'     :   {html:'impressum.html',js:''}
        };
               
        $('#geneva').geneva(page);
        
        $.getJSON('http://twitter.com/statuses/user_timeline.json?screen_name=kevincluse&count=5&callback=?', function(data) 
        {
            if(data.length)
            {
                var list=$('<ul>');
                $(data).each(function(index,value)
                {
                    list.append($('<li>').append($('<p>').html(linkify(value.text))));
                });

                $('#latest-tweets').append(list);
                $('#latest-tweets a').attr('target','_blank');

                list.bxSlider(
                {
                    auto:true,
                    pause:5000,
                    nextText:null,
                    prevText:null,
                    mode:'vertical',
                    displaySlideQty:1
                });  
            }
        });
    });