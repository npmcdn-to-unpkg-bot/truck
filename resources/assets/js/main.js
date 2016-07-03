// Add a control that returns the user to center
function Control(controlDiv, map) {
  controlDiv.style.padding = '5px';
  var controlUI = document.createElement('div');
  controlUI.style.backgroundColor = '#111';
  controlUI.style.color = '#fff';
  controlUI.style.border='1px solid';
  controlUI.style.cursor = 'pointer';
  controlUI.style.textAlign = 'center';
  controlUI.title = 'see all trucks';
  controlDiv.appendChild(controlUI);
  var controlText = document.createElement('div');
  controlText.style.fontFamily='roboto,sans-serif';
  controlText.style.fontSize='12px';
  controlText.style.fontWeight='100';
  controlText.style.padding = '4px';
  controlText.innerHTML = 'See all trucks'
  controlUI.appendChild(controlText);

  // Setup click-event listener: simply set the map to center
  google.maps.event.addDomListener(controlUI, 'click', function() {
    map.panTo(new google.maps.LatLng(0, 0));
     map.setZoom(2);
  });
}
function initialize() {
    var mapProp = {
        center: new google.maps.LatLng(0, 0),
        zoom: 2,
        mapTypeId: google.maps.MapTypeId.HYBRID
    };

    var map = new google.maps.Map(document.getElementById("googleMap"), mapProp);
    // Create a DIV to hold the control and call Control()
    var ControlDiv = document.createElement('div');
    var homeControl = new Control(ControlDiv, map);
    ControlDiv.index = 1;

  map.controls[google.maps.ControlPosition.TOP_RIGHT].push(ControlDiv);
    var marker = [
        new google.maps.Marker({position: new google.maps.LatLng(0, 20),}),
        new google.maps.Marker({position: new google.maps.LatLng(0, 33),})
        ];

    var infowindow = [
            new google.maps.InfoWindow({content: "Testing"}),
            new google.maps.InfoWindow({content: "Testing 2"})
        ];

    for (let i = 0; i < marker.length; i++) {
        marker[i].setMap(map);
        google.maps.event.addListener(marker[i], 'click', function() {
            infowindow[i].open(map, marker[i]);
            map.panTo(marker[i].getPosition());
            map.setZoom(7);
        });
    }

}

google.maps.event.addDomListener(window, 'load', initialize);