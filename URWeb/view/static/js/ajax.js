
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      myFunction(this);
    }
  };
  xhttp.open("GET", "types_of_locations.xml", true);
  xhttp.send();


function myFunction(xml) {
  var i;
  var xmlDoc = xml.responseXML;
  var x = xmlDoc.getElementsByTagName("types");
  for (i = 0; i <x.length; i++) { 
    var li = document.createElement('li');
    var input = document.createElement('input');
    input.innerHTML = x[i].getElementsByTagName("type")[0].childNodes[0].nodeValue;
    input.attributeType = "radio";
    input.attributeName = "locatie";
    input.attributeValue = x[i].getElementsByTagName("type")[0].childNodes[0].nodeValue;
    li.appendChild(input);
    
    document.getElementById("types").appendChild(input);
  }
}