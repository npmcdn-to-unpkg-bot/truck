
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
        var dataLen =  data[i]['data'].length
        if( dataLen > 0){

            let len = truck.push({
                "marker":new google.maps.Marker({
                    position: new google.maps.LatLng(data[i]['data'][dataLen - 1]["truck-lat"], data[i]['data'][dataLen - 1]["truck-lng"]),
                    icon:(function(){
                        if(data[i]['data'][dataLen - 1]["truck-active"].toString() == 'true'){
                            return "/images/marker-green.png";
                        }else{
                            return "/images/marker-red.png";
                        }
                    })()
                }),
                "infowindow" : new google.maps.InfoWindow({
                    content: JSON.stringify(data[i])
                }),
                "number":data[i]["truck-number"],
                "active":data[i]['data'][dataLen - 1]["truck-active"],
                "lat":data[i]['data'][dataLen - 1]["truck-lat"],
                "lng":data[i]['data'][dataLen - 1]["truck-lng"]
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

            if(truck[j]["number"] == data[i]["truck-number"]){

                console.log("same");
                if(!((data[i]['data'][dataLen - 1]["truck-lat"] == truck[j]["lat"]) && (data[i]['data'][dataLen - 1]["truck-lng"] == truck[j]["lng"]))){

                    truck[j]["marker"].setPosition(new google.maps.LatLng(data[i]['data'][dataLen - 1]["truck-lat"], data[i]['data'][dataLen - 1]["truck-lng"]));
                    truck[j]["marker"].setIcon((function(){
                        if(data[i]['data'][dataLen - 1]["truck-active"].toString() == 'true'){
                            return "/images/marker-green.png";
                        }else{
                            return "/images/marker-red.png";
                        }
                    })());
                    truck[j]["infowindow"].setContent(JSON.stringify(data[i]));

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

        var cool = jqxhr.done(function(_data){
            //setTruckData(truck,data,map);
            setTruckInitData(truck,_data,map);
            console.dir(_data);
        });

        jqxhr.fail(function(jqxhr,e) {
            console.dir(e);
        });


        console.dir(jqxhr);
        return jqxhr;

    }


    var data;
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

    var truck = [];
    
    loadInitData();
    

   /* function cool(){
        console.log("cool");
        for (let i = 0; i < data.length; i++) {
            data[i]["truck-lat"] = Math.random() * (13 - 6) + 6;
            data[i]["truck-lng"] = Math.random() * (12 - 3) + 3;
            data[i]["truck-active"] =  Math.random() >= 0.5;
            console.log("changed");
        }
        setTruckData(truck,data,map); 
    }
    window.setInterval(cool, 1000);*/
      


}

// run the initialize() when the browser finishes loading
google.maps.event.addDomListener(window, 'load', initialize);