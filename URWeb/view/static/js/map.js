// Note: This example requires that you consent to location sharing when
// prompted by your browser. If you see the error "The Geolocation service
// failed.", it means you probably did not give permission for the browser to
// locate you.
function reqListener () {
  console.log(this.responseText);
}

var mrks=new Array();


function initMap() {

    var myLatLng = {lat: 45.943161, lng:24.96676}; //Romania

    var map = new google.maps.Map(document.getElementById('map'), {
        center:myLatLng,
        zoom: 6,
    });



    // Try HTML5 geolocation.
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(function (position) {
            var pos = {
                lat: position.coords.latitude,
                lng: position.coords.longitude
            };


            mrks.push(pos);
            map.setCenter(mrks[mrks.length-1]);

            for(i=0;i<mrks.length;i++){
              //pinul rosu ( marker)
              map.setZoom(12);
              var marker = new google.maps.Marker({
                  position: mrks[i],
                  map: map,
                  title: 'My location'
              });
            }



        }, function () {
            handleLocationError(true, map.getCenter());
        });
    } else {
        // Browser doesn't support Geolocation
        handleLocationError(false, map.getCenter());
    }
}

function handleLocationError(browserHasGeolocation, infoWindow, pos) {
    infoWindow.setPosition(pos);
    infoWindow.setContent(browserHasGeolocation ?
        'Error: The Geolocation service failed.' :
        'Error: Your browser doesn\'t support geolocation.');
}
