
function reqListener () {
  console.log(this.responseText);
}

var mrks=new Array();
var markers_array=new Array();
var number_of_markers=0;
var markers_id_array=new Array();
var data;
var id;


function initMap() {


    var directionsDisplay=new google.maps.DirectionsRenderer();
    var directionsService=new google.maps.DirectionsService();
    var myLatLng = {lat: 45.943161, lng:24.96676}; //Romania

    var map = new google.maps.Map(document.getElementById('map'), {
        center:myLatLng,
        zoom: 6,
    });
    directionsDisplay.setMap(map);

    mrks=[];
    // Try HTML5 geolocation.
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(function (position) {
            var pos = {
                lat: position.coords.latitude,
                lng: position.coords.longitude
            };


            mrks.push(pos);
            map.setCenter(mrks[mrks.length-1]);
            $.ajax({
                type: "POST",
                url: 'search.php',
                data: "pos=" + pos,
                success: function(data)
                {
                    console.log(data);
                }
            });

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



            //adaugam celelate locatii daca sunt
            for(i=0;i<php_locations.length;i++){
              mrks.push(php_locations[i].loc);
              var marker= new google.maps.Marker({
                  id: number_of_markers,
                  record_id: number_of_markers,
                  position: mrks[i+1],
                  map: map,
                  title: php_locations[i].description
              });
              //marker.setVisible(true);
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
                case	12:google.maps.event.addListener(markers_array[12], 'click', function(point) {calculateRoute(12)});
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
            //marker.addListener('click',calculateRoute);

            }


            console.log(mrks);
            var calculateRoute=function(id){
              mrks[1]=mrks[id];
              for(i=2;i<number_of_markers;i++){
                if(markers_array[i].id!=id){
                  //markers_array[i].setVisible(false);
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
                for(i=0;i<php_locations.length;i++){
                  if(php_locations[i].loc==mrks[1]){
                    var id_loc = php_locations[i].id;
                    console.log(id_loc);
                    $.ajax({
                        type: "POST",
                        url: '../../../controller/introducere_cautari.php',
                        data: "id_loc=" + id_loc,
                        success: function(data)
                        {
                            console.log(data);
                        }
                    });
                    }
                  }
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
