    
    try
    {
        var coordinate=new google.maps.LatLng(48.944828,9.432836);

        var mapOptions= 
        {
            zoom:10,
            center:coordinate,
            mapTypeId:google.maps.MapTypeId.ROADMAP
        };

        var googleMap=new google.maps.Map(document.getElementById('map'),mapOptions);
    }
    catch(e) {}