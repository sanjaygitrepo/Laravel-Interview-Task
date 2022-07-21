        var geocoder;
        var map;
        var marker;
        function initMap() {
        var infowindow = new google.maps.InfoWindow({size: new google.maps.Size(150,50)});
        geocoder = new google.maps.Geocoder();
        var latlng = new google.maps.LatLng(26.201000, 50.606998);
        var mapOptions = {
        zoom:6,
        mapTypeId: "roadmap",        
        center: latlng,
        }

        map = new google.maps.Map(document.getElementById('map'), mapOptions);
        var input = document.getElementById('pac-input');
        var autocomplete = new google.maps.places.Autocomplete(input);
        
        autocomplete.bindTo('bounds', map);

        var address = document.getElementById('address').value;

        geocoder.geocode( { 'address': address}, function(results, status) {
        if (status == google.maps.GeocoderStatus.OK) {
        map.setCenter(results[0].geometry.location);
        if (marker) {
        marker.setMap(null);
        if (infowindow) infowindow.close();
        }
        marker = new google.maps.Marker({
        map: map,
        draggable: true,
        position: results[0].geometry.location
        });
        google.maps.event.addListenerOnce(map, 'idle', function () {

        google.maps.event.trigger(map, 'resize');

        });
        google.maps.event.addListener(marker, 'dragend', function() {
        geocodePosition(marker.getPosition());
        });
        google.maps.event.trigger(marker, 'click');
        } else {
        alert('Geocode was not successful for the following reason: ' + status);
        }
        });
        autocomplete.addListener('place_changed', function() {
        marker.setVisible(false);
        var place = autocomplete.getPlace();
        if (!place.geometry) {
        window.alert("No details available for input: '" + place.name + "'");
        return;
        }
        $('#lat').val(place.geometry.location.lat());
          $('#long').val(place.geometry.location.lng());

        if (place.geometry.viewport) {
        map.fitBounds(place.geometry.viewport);
        } else {
        map.setCenter(place.geometry.location);
        map.setZoom(17); // Why 17? Because it looks good.
        }
        marker.setPosition(place.geometry.location);
        marker.setVisible(true);
    });
 }

 function geocodePosition(pos) {
    geocoder.geocode({
    latLng: pos
    }, function(responses) {
    if (responses && responses.length > 0) {
    marker.formatted_address = responses[0].formatted_address;
    } else {
    marker.formatted_address = 'Cannot determine address at this location.';
    }

    $("#pac-input").val(marker.formatted_address);
    $("#lat").val(responses[0].geometry.location.lat());
    $("#long").val(responses[0].geometry.location.lng());
    });

 }

