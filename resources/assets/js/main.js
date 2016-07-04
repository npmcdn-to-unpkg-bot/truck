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
    map.panTo(new google.maps.LatLng(9.180471, 7.916594));
     map.setZoom(6);
  });
}

//setTruckData() - turn the data into markers
//truck[] - this contains all the truck data neede to make markers
//map[] - the google map class
function setTruckData(truck,data,map){

    for (let i = 0; i < data.length; i++) {
        for (let j = 0; j < truck.length; j++) {
            if(truck[j]["plate"] == data[i]["truck-plate"]){
                console.log("same");
                
                truck[j]["marker"].setPosition(new google.maps.LatLng(data[i]["truck-lat"], data[i]["truck-lng"]));
                truck[j]["marker"].setIcon((function(){
                    if(data[i]["truck-active"] == 'true'){
                        return "/images/marker-green.png";
                    }else{
                        return "/images/marker-red.png";
                    }
                })());
                truck[j]["infowindow"].setContent(data[i]["name"]);
                data.splice(i, 1);
            }
        }
    }

    for (let i = 0; i < data.length; i++) {
        let len = truck.push({
            "marker":new google.maps.Marker({
                position: new google.maps.LatLng(data[i]["truck-lat"], data[i]["truck-lng"]),
                icon:(function(){
                    if(data[i]["truck-active"] == 'true'){
                        return "/images/marker-green.png";
                    }else{
                        return "/images/marker-red.png";
                    }
                })()
            }),
            "infowindow" : new google.maps.InfoWindow({
                content: data[i]["name"]
            }),
            "plate":data[i]["truck-plate"],
            "active":data[i]["truck-active"]
        });

        truck[len - 1]["marker"].setMap(map);
        google.maps.event.addListener(truck[len - 1]["marker"], 'click', function() {
            truck[len - 1]["infowindow"].open(map, truck[len - 1]["marker"]);
            map.panTo(truck[len - 1]["marker"].getPosition());
            map.setZoom(7);
        });

    }
}

function initialize() {
    var mapProp = {
        center: new google.maps.LatLng(9.180471, 7.916594),
        zoom: 6,
        mapTypeId: google.maps.MapTypeId.HYBRID
    };

    var map = new google.maps.Map(document.getElementById("googleMap"), mapProp);

    // Create a DIV to hold the control and call Control()
    var ControlDiv = document.createElement('div');
    var homeControl = new Control(ControlDiv, map);
    ControlDiv.index = 1;

    map.controls[google.maps.ControlPosition.TOP_RIGHT].push(ControlDiv);

    var data = [
        {
            "name" : "Oluseye T Odeleye",
            "tel" : "12049307308",
            "email" : "odeleye.emmanuel@gmail.com",
            "truck-type" : "red",
            "truck-model" : "civic",
            "truck-maker" : "honda",
            "truck-tons" : "1000",
            "truck-plate" : "d3d5g5",
            "truck-number" : "0001",
            "truck-speed" : "50",
            "truck-lat" : "7.441208",
            "truck-lng" : " 4.273389",
            "truck-active" : "false"
        }
    ];

    var new_data = [
        {
            "name" : "Oluseye T Odeleye",
            "tel" : "12049307308",
            "email" : "odeleye.emmanuel@gmail.com",
            "truck-type" : "red",
            "truck-model" : "civic",
            "truck-maker" : "honda",
            "truck-tons" : "1000",
            "truck-plate" : "d3d5g5",
            "truck-number" : "0001",
            "truck-speed" : "50",
            "truck-lat" : "6.536902",
            "truck-lng" : "3.367143",
            "truck-active" : "true"
        }
    ];

    var truck = [];

    setTruckData(truck,data,map);
    function cool(){
        setTruckData(truck,new_data,map); 
    }
    window.setTimeout(cool, 5000);
      


}

// run the initialize() when the browser finishes loading
google.maps.event.addDomListener(window, 'load', initialize);