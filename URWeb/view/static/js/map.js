
function reqListener () {
  console.log(this.responseText);
}

var mrks=new Array();
var markers_array=new Array();
var number_of_markers=0;


function initMap() {

    var directionsDisplay=new google.maps.DirectionsRenderer();
    var directionsService=new google.maps.DirectionsService();
    var myLatLng = {lat: 45.943161, lng:24.96676}; //Romania

    var map = new google.maps.Map(document.getElementById('map'), {
        center:myLatLng,
        zoom: 6,
    });
    directionsDisplay.setMap(map);


    // Try HTML5 geolocation.
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(function (position) {
            var pos = {
                lat: position.coords.latitude,
                lng: position.coords.longitude
            };


            mrks.push(pos);
            map.setCenter(mrks[mrks.length-1]);

              //pinul rosu ( marker) locatia noasta
              map.setZoom(12);
              var marker= new google.maps.Marker({
                  record_id: number_of_markers,
                  position: mrks[0],
                  map: map,
                  title: 'Locatia mea'
              });
              marker.addListener('click',calculateRoute);


            //adaugam celelate locatii daca sunt
            for(i=0;i<php_locations.length;i++){
              mrks.push(php_locations[i].loc);
              var marker= new google.maps.Marker({
                  record_id: number_of_markers,
                  position: mrks[i+1],
                  map: map,
                  title: php_locations[i].description
              });
              marker.addListener('click',calculateRoute);
            }

            function calculateRoute(){
              var request={
                origin: mrks[0],
                destination: mrks[1],
                travelMode: 'DRIVING'
              };
              directionsService.route(request,function(result,status){
                if(status=="OK"){
                  directionsDisplay.setDirections(result);
                }
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
