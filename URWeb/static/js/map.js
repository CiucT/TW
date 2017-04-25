// Note: This example requires that you consent to location sharing when
// prompted by your browser. If you see the error "The Geolocation service
// failed.", it means you probably did not give permission for the browser to
// locate you.

function initMap() {
    var myLatLng = {lat: 27.5329686, lng:47.1725517};
    var map = new google.maps.Map(document.getElementById('map'), {
        center:myLatLng,
        zoom: 6,
    });
    var infoWindow = new google.maps.InfoWindow({map: map});


    // Try HTML5 geolocation.
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(function (position) {
            var pos = {
                lat: position.coords.latitude,
                lng: position.coords.longitude
            };

            //infoWindow.setPosition(pos); setarea pinului cu chenarul alb cu chenarul alb
            //infoWindow.setContent('Location found.'); textul din chenarul alb
            map.setCenter(pos);

            //pinul rosu ( marker)
            var marker = new google.maps.Marker({
                position: pos,
                map: map,
                title: 'My location'
            });

        }, function () {
            handleLocationError(true, infoWindow, map.getCenter());
        });
    } else {
        // Browser doesn't support Geolocation
        handleLocationError(false, infoWindow, map.getCenter());
    }
}

function handleLocationError(browserHasGeolocation, infoWindow, pos) {
    infoWindow.setPosition(pos);
    infoWindow.setContent(browserHasGeolocation ?
        'Error: The Geolocation service failed.' :
        'Error: Your browser doesn\'t support geolocation.');
}