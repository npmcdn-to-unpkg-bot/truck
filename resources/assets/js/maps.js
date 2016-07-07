
var App = (function() {

    function App() {
        console.log("app");
    }

    App.prototype.loadData = function() {

        var options = {
            _token: $("#_token").val()
        };

        var jqxhr = $.ajax({
            url: "/truck/maps/data",
            method: "POST",
            data: options,
            dataType: "json"
        });

        jqxhr.done(this.Data);

        jqxhr.fail(function(jqxhr,e) {
            console.dir(e);
        });
    }

    App.prototype.Data = function(data) {
        console.dir(data);
        this._data = data.slice(0);
        return  this._data;
    }
    

    return App;

})();



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



function setTruckInitData(truck,_data,map){
    var data =  _data.slice(0);
    for (let i = 0; i < data.length; i++) {
        var dataLen =  data[i]['data'].length;
        if( dataLen > 0){

            let len = truck.push({
                "marker":new google.maps.Marker({
                    position: new google.maps.LatLng(data[i]['data'][dataLen - 1]["truck_lat"], data[i]['data'][dataLen - 1]["truck_lng"]),
                    icon:(function(){
                        if(data[i]['data'][dataLen - 1]["truck_active"].toString() == '1'){
                            return "/images/marker-green.png";
                        }else{
                            return "/images/marker-red.png";
                        }
                    })(),
                    title:data[i]['surname'] + " " + data[i]['middle_name'] + " " + data[i]['first_name']
                }),
                "infowindow" : new google.maps.InfoWindow({
                    content: "<b>Driver's Name: </b>" + data[i]['surname'] + " " + data[i]['middle_name'] + " " + data[i]['first_name'] + " <br/> " + "<b>Truck's Number: </b>" + data[i]['id'] + " <br/> " + "<b>Truck's Speed: </b>" + data[i]['data'][dataLen - 1]["truck_speed"] + " <br/> " + "<b>Driver's Email: </b>" + data[i]['email'] + " <br/> " + "<b>Truck's Plate: </b>" + data[i]['truck_plate'] + " <br/> "
                }),
                "id":data[i]["id"],
                "active":data[i]['data'][dataLen - 1]["truck_active"],
                "lat":data[i]['data'][dataLen - 1]["truck_lat"],
                "lng":data[i]['data'][dataLen - 1]["truck_lng"]
            });

            truck[len - 1]["marker"].setMap(map);
            google.maps.event.addListener(truck[len - 1]["marker"], 'click', function() {
                truck[len - 1]["infowindow"].open(map, truck[len - 1]["marker"]);
                map.panTo(truck[len - 1]["marker"].getPosition());
                map.setZoom(9);
            });

        }

        

    }
}



//setTruckData() - turn the data into markers
//truck[] - this contains all the truck data neede to make markers
//map[] - the google map class
function setTruckData(truck,_data,map){

    var data =  _data.slice(0);
    var len;

    for (let i = 0; i < data.length; i++) {
        var dataLen =  data[i]['data'].length;
        for (let j = 0; j < truck.length; j++) {

            if(truck[j]["id"] == data[i]["id"]){

                console.log("same");
                if(!((data[i]['data'][dataLen - 1]["truck_lat"] == truck[j]["lat"]) && (data[i]['data'][dataLen - 1]["truck_lng"] == truck[j]["lng"]))){
                    console.log("data change");
                    truck[j]["marker"].setPosition(new google.maps.LatLng(data[i]['data'][dataLen - 1]["truck_lat"], data[i]['data'][dataLen - 1]["truck_lng"]));
                    truck[j]["marker"].setIcon((function(){
                        if(data[i]['data'][dataLen - 1]["truck_active"].toString() == '1'){
                            return "/images/marker-green.png";
                        }else{
                            return "/images/marker-red.png";
                        }
                    })());
                    truck[j]["infowindow"].setContent("<b>Driver's Name: </b>" + data[i]['surname'] + " " + data[i]['middle_name'] + " " + data[i]['first_name'] + " <br/> " + "<b>Truck's Number: </b>" + data[i]['id'] + " <br/> " + "<b>Truck's Speed: </b>" + data[i]['data'][dataLen - 1]["truck_speed"] + " <br/> " + "<b>Driver's Email: </b>" + data[i]['email'] + " <br/> " + "<b>Truck's Plate: </b>" + data[i]['truck_plate'] + " <br/> ");

                }else{
                    console.log("no data change");
                }
                
            }

        }

    }

}



function initialize() {

    function loadInitData() {

        var options = {
            _token: $("#_token").val()
        };

        var jqxhr = $.ajax({
            url: "/truck/maps/data",
            method: "POST",
            data: options,
            dataType: "json"
        });

        jqxhr.done(function(_data){
            console.dir(_data);
            setTruckInitData(truck,_data,map);
        });

        jqxhr.fail(function(jqxhr,e) {
            console.dir(e);
        });


    }

    function loadData(){
        var options = {
            _token: $("#_token").val()
        };

        var jqxhr = $.ajax({
            url: "/truck/maps/data",
            method: "POST",
            data: options,
            dataType: "json"
        });

        jqxhr.done(function(_data){
            setTruckData(truck,_data,map);
        });

        jqxhr.fail(function(jqxhr,e) {
            console.dir(e);
        });
    }

    function newData(){
            console.log("loading new data");
            loadData();
    }

    var mapProp = {
        center: new google.maps.LatLng(9.180471, 7.916594),
        zoom: 6,
        mapTypeId: google.maps.MapTypeId.HYBRID
    };

    var map = new google.maps.Map(document.getElementById("googleMap"), mapProp);
    var truck = [];

    // Create a DIV to hold the control and call Control()
    var ControlDiv = document.createElement('div');
    var homeControl = new Control(ControlDiv, map);
    ControlDiv.index = 1;

    map.controls[google.maps.ControlPosition.TOP_RIGHT].push(ControlDiv);

    
    
    loadInitData();
    

    window.setInterval(newData, 30000);
      


}

// run the initialize() when the browser finishes loading
google.maps.event.addDomListener(window, 'load', initialize);