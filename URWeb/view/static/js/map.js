
var key=0;
var map;
var mrks=new Array();
var markers_array=new Array();
var number_of_markers=0;
var markers_id_array=new Array();
var data;
var id;
var infoWindow;
var directionsDisplay;
 var directionsService;

function reqListener () {
  console.log(this.responseText);
}

function initMap() {

var len = localStorage.length;
var old_key=len-1;
key=old_key+1;
console.log(key);

//if(get(key)===null){}else{map=get(key);}







    infoWindow = new google.maps.InfoWindow();
    directionsDisplay=new google.maps.DirectionsRenderer();
    directionsService=new google.maps.DirectionsService();
    var myLatLng = {lat: 45.943161, lng:24.96676}; //Romania

    map = new google.maps.Map(document.getElementById('map'), {
        center:myLatLng,
        zoom: 6,
    });

  
    directionsDisplay.setMap(map);




    mrks=[];
    // Try HTML5 geolocation.
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(function (position) {
          // window.location.href = "board.php?lat=" + position.coords.latitude;
            var pos = {
                lat: position.coords.latitude,
                lng: position.coords.longitude
            };

            document.getElementById("lat").value = position.coords.latitude;
            document.getElementById("lng").value = position.coords.longitude;
            mrks.push(pos);
            map.setCenter(mrks[mrks.length-1]);
            // $.ajax({
            //     url: 'URWeb/controller/search.php',
            //     type: "POST",
            //     data: {
            //       'lat':position.coords.latitude,
            //       'lng':position.coords.longitude},
            //     success: function(data)
            //     {
            //       console.log(data);
            //     },
            //     error: function(request, status, error){
            //         console.log("Error:"+error);
            //     }
            // });

              //pinul rosu ( marker) locatia noasta
              map.setZoom(12);
              var marker= new google.maps.Marker({
                  id:number_of_markers,
                  record_id: number_of_markers,
                  position: mrks[0],
                  map: map,
                  title: 'Locatia mea'
              });
              markers_array[number_of_markers]=marker;
              number_of_markers++;
        
        populateMap();

        }, function () {
            handleLocationError(true, map.getCenter());
        });
    } else {
        // Browser doesn't support Geolocation
        handleLocationError(false, map.getCenter());
    }
  
  
  
  

}

function sendDataToPHP(origin_lat,origin_lng,destination_lat,destination_lng){
  var positions=new Array();
  positions.push(parseFloat(origin_lat).toString());
  positions.push(parseFloat(origin_lng).toString());
  positions.push(parseFloat(destination_lat).toString());
  positions.push(parseFloat(destination_lng).toString());
  put(key,map);
  console.log("TRIMIT");
  window.location.href = "board.php?positions="+ positions; 

}



function handleLocationError(browserHasGeolocation, infoWindow, pos) {
    infoWindow.setPosition(pos);
    infoWindow.setContent(browserHasGeolocation ?
        'Error: The Geolocation service failed.' :
        'Error: Your browser doesn\'t support geolocation.');
}


//adaugam celelate locatii daca sunt
function populateMap(){


            for(i=0;i<php_locations.length;i++){
              mrks.push(php_locations[i].loc);
              var marker= new google.maps.Marker({
                  id: number_of_markers,
                  record_id: number_of_markers,
                  position: mrks[i+1],
                  map: map,
                  title: php_locations[i].description
              });
              
              markers_array[number_of_markers]=marker;
              markers_id_array[i]=marker.id;
              switch (number_of_markers) {
                case 1:google.maps.event.addListener(markers_array[1], 'click', function(point) {calculateRoute(1)});
                  break;
                case 2:google.maps.event.addListener(markers_array[2], 'click', function(point) {calculateRoute(2)});
                  break;
                case 3:google.maps.event.addListener(markers_array[3], 'click', function(point) {calculateRoute(3)});
                  break;
                case 4:google.maps.event.addListener(markers_array[4], 'click', function(point) {calculateRoute(4)});
                  break;
                case 5:google.maps.event.addListener(markers_array[5], 'click', function(point) {calculateRoute(5)});
                  break;
                case 6:google.maps.event.addListener(markers_array[6], 'click', function(point) {calculateRoute(6)});
                  break;
                case 7:google.maps.event.addListener(markers_array[7], 'click', function(point) {calculateRoute(7)});
                  break;
                case 8:google.maps.event.addListener(markers_array[8], 'click', function(point) {calculateRoute(8)});
                  break;
        case 9:google.maps.event.addListener(markers_array[9], 'click', function(point) {calculateRoute(9)});
                  break;
                case 10:google.maps.event.addListener(markers_array[10], 'click', function(point) {calculateRoute(10)});
                  break;
                case 11:google.maps.event.addListener(markers_array[11], 'click', function(point) {calculateRoute(11)});
                  break;
                case  12:google.maps.event.addListener(markers_array[12], 'click', function(point) {calculateRoute(12)});
                  break;
                case 13:google.maps.event.addListener(markers_array[13], 'click', function(point) {calculateRoute(13)});
                  break;
                case 14:google.maps.event.addListener(markers_array[14], 'click', function(point) {calculateRoute(14)});
                  break;
                case 15:google.maps.event.addListener(markers_array[15], 'click', function(point) {calculateRoute(15)});
                  break;
                case 16:google.maps.event.addListener(markers_array[16], 'click', function(point) {calculateRoute(16)});
                  break;
        case 17:google.maps.event.addListener(markers_array[17], 'click', function(point) {calculateRoute(17)});
                  break;
              case 18:google.maps.event.addListener(markers_array[18], 'click', function(point) {calculateRoute(18)});
                  break;
        case 19:google.maps.event.addListener(markers_array[19], 'click', function(point) {calculateRoute(19)});
                  break;
        case 20:google.maps.event.addListener(markers_array[20], 'click', function(point) {calculateRoute(20)});
                  break;
        case 21:google.maps.event.addListener(markers_array[21], 'click', function(point) {calculateRoute(21)});
                  break;
                case 22:google.maps.event.addListener(markers_array[22], 'click', function(point) {calculateRoute(22)});
                  break;
                case 23:google.maps.event.addListener(markers_array[23], 'click', function(point) {calculateRoute(23)});
                  break;
                case 24:google.maps.event.addListener(markers_array[24], 'click', function(point) {calculateRoute(24)});
                  break;
                case 25:google.maps.event.addListener(markers_array[25], 'click', function(point) {calculateRoute(25)});
                  break;
                case 26:google.maps.event.addListener(markers_array[26], 'click', function(point) {calculateRoute(26)});
                  break;
                case 27:google.maps.event.addListener(markers_array[27], 'click', function(point) {calculateRoute(27)});
                  break;
                case 28:google.maps.event.addListener(markers_array[28], 'click', function(point) {calculateRoute(28)});
                  break;
        case 29:google.maps.event.addListener(markers_array[29], 'click', function(point) {calculateRoute(29)});
                  break;
        case 30:google.maps.event.addListener(markers_array[30], 'click', function(point) {calculateRoute(30)});
                  break;
        case 31:google.maps.event.addListener(markers_array[31], 'click', function(point) {calculateRoute(31)});
                  break;
                case 32:google.maps.event.addListener(markers_array[32], 'click', function(point) {calculateRoute(32)});
                  break;
                case 33:google.maps.event.addListener(markers_array[33], 'click', function(point) {calculateRoute(33)});
                  break;
                case 34:google.maps.event.addListener(markers_array[34], 'click', function(point) {calculateRoute(34)});
                  break;
                case 35:google.maps.event.addListener(markers_array[35], 'click', function(point) {calculateRoute(35)});
                  break;
                case 36:google.maps.event.addListener(markers_array[36], 'click', function(point) {calculateRoute(36)});
                  break;
                case 37:google.maps.event.addListener(markers_array[37], 'click', function(point) {calculateRoute(37)});
                  break;
                case 38:google.maps.event.addListener(markers_array[38], 'click', function(point) {calculateRoute(38)});
                  break;
        case 39:google.maps.event.addListener(markers_array[39], 'click', function(point) {calculateRoute(39)});
          break;
        case 40:google.maps.event.addListener(markers_array[40], 'click', function(point) {calculateRoute(40)});
                  break;
        case 41:google.maps.event.addListener(markers_array[41], 'click', function(point) {calculateRoute(41)});
                  break;
                case 42:google.maps.event.addListener(markers_array[42], 'click', function(point) {calculateRoute(42)});
                  break;
                case 43:google.maps.event.addListener(markers_array[43], 'click', function(point) {calculateRoute(43)});
                  break;
                case 44:google.maps.event.addListener(markers_array[44], 'click', function(point) {calculateRoute(44)});
                  break;
                case 45:google.maps.event.addListener(markers_array[45], 'click', function(point) {calculateRoute(45)});
                  break;
                case 46:google.maps.event.addListener(markers_array[46], 'click', function(point) {calculateRoute(46)});
                  break;
                case 47:google.maps.event.addListener(markers_array[47], 'click', function(point) {calculateRoute(47)});
                  break;
                case 48:google.maps.event.addListener(markers_array[48], 'click', function(point) {calculateRoute(48)});
                  break;
        case 49:google.maps.event.addListener(markers_array[49], 'click', function(point) {calculateRoute(49)});
          break;
        case 50:google.maps.event.addListener(markers_array[50], 'click', function(point) {calculateRoute(50)});
          break;
        case 51:google.maps.event.addListener(markers_array[51], 'click', function(point) {calculateRoute(51)});
                  break;
                case 52:google.maps.event.addListener(markers_array[52], 'click', function(point) {calculateRoute(52)});
                  break;
                case 53:google.maps.event.addListener(markers_array[53], 'click', function(point) {calculateRoute(53)});
                  break;
                case 54:google.maps.event.addListener(markers_array[54], 'click', function(point) {calculateRoute(54)});
                  break;
                case 55:google.maps.event.addListener(markers_array[55], 'click', function(point) {calculateRoute(55)});
                  break;
                case 56:google.maps.event.addListener(markers_array[56], 'click', function(point) {calculateRoute(56)});
                  break;
                case 57:google.maps.event.addListener(markers_array[57], 'click', function(point) {calculateRoute(57)});
                  break;
                case 58:google.maps.event.addListener(markers_array[58], 'click', function(point) {calculateRoute(58)});
                  break;
        case 59:google.maps.event.addListener(markers_array[59], 'click', function(point) {calculateRoute(59)});
                  break;
        case 60:google.maps.event.addListener(markers_array[60], 'click', function(point) {calculateRoute(60)});
                  break;
        case 61:google.maps.event.addListener(markers_array[61], 'click', function(point) {calculateRoute(61)});
                  break;
                case 62:google.maps.event.addListener(markers_array[62], 'click', function(point) {calculateRoute(62)});
                  break;
                case 63:google.maps.event.addListener(markers_array[63], 'click', function(point) {calculateRoute(63)});
                  break;
                case 64:google.maps.event.addListener(markers_array[64], 'click', function(point) {calculateRoute(64)});
                  break;
                case 65:google.maps.event.addListener(markers_array[65], 'click', function(point) {calculateRoute(65)});
                  break;
                case 66:google.maps.event.addListener(markers_array[66], 'click', function(point) {calculateRoute(66)});
                  break;
                case 67:google.maps.event.addListener(markers_array[67], 'click', function(point) {calculateRoute(67)});
                  break;
                case 68:google.maps.event.addListener(markers_array[68], 'click', function(point) {calculateRoute(68)});
                  break;
        case 69:google.maps.event.addListener(markers_array[69], 'click', function(point) {calculateRoute(69)});
                  break;
        case 70:google.maps.event.addListener(markers_array[70], 'click', function(point) {calculateRoute(70)});
                  break;
        case 71:google.maps.event.addListener(markers_array[71], 'click', function(point) {calculateRoute(71)});
                  break;
                case 72:google.maps.event.addListener(markers_array[72], 'click', function(point) {calculateRoute(72)});
                  break;
                case 73:google.maps.event.addListener(markers_array[73], 'click', function(point) {calculateRoute(73)});
                  break;
                case 74:google.maps.event.addListener(markers_array[74], 'click', function(point) {calculateRoute(74)});
                  break;
                case 75:google.maps.event.addListener(markers_array[75], 'click', function(point) {calculateRoute(75)});
                  break;
                case 76:google.maps.event.addListener(markers_array[76], 'click', function(point) {calculateRoute(76)});
                  break;
                case 77:google.maps.event.addListener(markers_array[77], 'click', function(point) {calculateRoute(77)});
                  break;
                case 78:google.maps.event.addListener(markers_array[78], 'click', function(point) {calculateRoute(78)});
                  break;
        case 79:google.maps.event.addListener(markers_array[79], 'click', function(point) {calculateRoute(79)});
                  break;
        case 80:google.maps.event.addListener(markers_array[80], 'click', function(point) {calculateRoute(80)});
                  break;
        case 81:google.maps.event.addListener(markers_array[81], 'click', function(point) {calculateRoute(81)});
                  break;
                case 82:google.maps.event.addListener(markers_array[82], 'click', function(point) {calculateRoute(82)});
                  break;
                case 83:google.maps.event.addListener(markers_array[83], 'click', function(point) {calculateRoute(83)});
                  break;
                case 84:google.maps.event.addListener(markers_array[84], 'click', function(point) {calculateRoute(84)});
                  break;
                case 85:google.maps.event.addListener(markers_array[85], 'click', function(point) {calculateRoute(85)});
                  break;
                case 86:google.maps.event.addListener(markers_array[86], 'click', function(point) {calculateRoute(86)});
                  break;
                case 87:google.maps.event.addListener(markers_array[87], 'click', function(point) {calculateRoute(87)});
                  break;
                case 88:google.maps.event.addListener(markers_array[88], 'click', function(point) {calculateRoute(88)});
                  break;
        case 89:google.maps.event.addListener(markers_array[89], 'click', function(point) {calculateRoute(89)});
                  break;

              }
        
              number_of_markers++;
            }
}


var get = function (key) {
  return window.localStorage ? window.localStorage[key] : null;
}

var put = function (key, value) {
  if (window.localStorage) {
    window.localStorage[key] = value;
  }
}

var calculateRoute=function(id){
              mrks[1]=mrks[id];
              document.getElementById("latlng").value = mrks[1].lat + ',' + mrks[1].lng;
              for(i=2;i<number_of_markers;i++){
                if(markers_array[i].id!=id){
                  markers_array[i].setMap(null);
                  mrks.splice(i, 1);
                }

              }

              markers_array[1].setMap(null);

              var request={
                origin: mrks[0],
                destination: mrks[1],
                travelMode: 'DRIVING'
              };
              console.log(mrks[1]);
              directionsService.route(request,function(result,status){
                if(status=="OK"){
                  directionsDisplay.setDirections(result);
                  
                  sendDataToPHP(mrks[0].lat,mrks[0].lng,mrks[1].lat,mrks[1].lng);

                for(i=0;i<php_locations.length;i++){
                  if(php_locations[i].loc==mrks[1]){
                    var id_loc = php_locations[i].id;
                    console.log(id_loc);
                    // $.ajax({
                    //     type: "POST",
                    //     url: 'board.php',
                    //     data: {"id_loc":id_loc},
                    //     dataType: 'text',
                    //     success: function(data)
                    //     {
                    //         console.log(data);
                    //     }
                    // });
                    // window.location.href = "board.php?id_loc=" + id_loc;

                    }
                  }
                }
              });
            }
