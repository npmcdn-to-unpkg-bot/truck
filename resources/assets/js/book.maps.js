import $ from './libs/jquery';
window.jQuery = $;
window.$ = $;

class App {

    constructor() {
        console.log("app");
    }

   loadData() {

       console.log("cool");
    }

    data(data) {
        console.dir(data);
    }


}



// Add a control that returns the user to center
function Control(controlDiv, map) {
  controlDiv.style.padding = '5px';
  var controlUI = document.createElement('div');
  controlUI.style.backgroundColor = '#708090';
  controlUI.style.color = '#fff';
  controlUI.style.border='1px solid';
  controlUI.style.cursor = 'pointer';
  controlUI.style.textAlign = 'center';
  controlUI.title = 'see all trucks';
  controlDiv.appendChild(controlUI);
  var controlText = document.createElement('div');
  controlText.style.fontFamily='roboto,sans-serif';
  controlText.style.fontSize='12px';
  controlText.style.fontWeight='400';
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
                    position: new google.maps.LatLng(data[i]['data'][dataLen - 1]["lat"], data[i]['data'][dataLen - 1]["lng"]),
                    icon:(function(){
                        if(!(data[i]['data'][dataLen - 1]["active"].toString() == '1')){
                            return "/images/marker-green.png";
                        }else{
                            return "/images/marker-red.png";
                        }
                    })(),
                    title:data[i]['tons'].toString()
                }),
                "infowindow" : new google.maps.InfoWindow({
                    content: `
                        <h3 class="black m0" style="color:#333;">Truck Weigth</h3>  <i class="h5 bold green">${data[i]['tons']} tons</i> <br>
                        <a href="/truck/book/${data[i]['id']}" class="btn btn-primary bg-black not-rounded">book now </a>
                        <!--<form action="/truck/book" method="post">

                            <input type="hidden" name="_token" value="${$("input[name='_token']").val()}" id="_token">
                            <input type="hidden" name="id" value=" ${data[i]['id']}">
                            <div class="form-group">
                                <input type="submit" value="book now" class="btn btn-primary bg-black not-rounded">
                            </div>
                        </form> -->

                     `
                }),
                "id":data[i]["id"],
                "active":data[i]['data'][dataLen - 1]["active"],
                "lat":data[i]['data'][dataLen - 1]["lat"],
                "lng":data[i]['data'][dataLen - 1]["lng"]
            });

            truck[len - 1]["marker"].setMap(map);
            google.maps.event.addListener(truck[len - 1]["marker"], 'click', function() {
                truck[len - 1]["infowindow"].open(map, truck[len - 1]["marker"]);
                map.panTo(truck[len - 1]["marker"].getPosition());
                map.setZoom(12);
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
                if(!((data[i]['data'][dataLen - 1]["lat"] == truck[j]["lat"]) && (data[i]['data'][dataLen - 1]["lng"] == truck[j]["lng"]))){
                    console.log("data change");
                    truck[j]["marker"].setPosition(new google.maps.LatLng(data[i]['data'][dataLen - 1]["lat"], data[i]['data'][dataLen - 1]["lng"]));
                    truck[j]["marker"].setIcon((function(){
                        if(data[i]['data'][dataLen - 1]["active"].toString() == '1'){
                            return "/images/marker-green.png";
                        }else{
                            return "/images/marker-red.png";
                        }
                    })());
                    //truck[j]["infowindow"].setContent("");

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
            _token: $("input[name='_token']").val()
        };

        var jqxhr = $.ajax({
            url: "/book/maps",
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
            _token: $("input[name='_token']").val()
        };

        var jqxhr = $.ajax({
            url: "/book/maps",
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
        mapTypeId: google.maps.MapTypeId.TERRAIN,
        scrollwheel:false
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
