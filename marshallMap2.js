function initMap() {
    var infowindow = new google.maps.InfoWindow();
    var map =  new google.maps.Map(document.getElementById('map'), {
        zoom: 5.5, 
        center: {lat: 55, lng: -4}
    });

    google.maps.event.addListener(map, "click", function(event) {
        infowindow.close();
    });

    var markers = [];
    function placeMarker(loc) {
        var marker = new google.maps.Marker({
            position: {lat: loc[1], lng:loc[2]},
            map: map
        });
        markers.push(marker);       //make array of markers for marker clusterer

        google.maps.event.addListener(marker, 'click', function(){
            infowindow.close();
            infowindow.setContent(
                "<div class = 'map-info-window'>" +
                "<h3>" + loc[0] + "</h3>" + loc[3] +
                "</div>")
            infowindow.open(map, marker);   
        });
    }

    
    for (var i=0; i < locations.length; i++) {
        placeMarker(locations[i]);
        
    }

    var markerCluster = new MarkerClusterer(map, markers,
        {imagePath: 'https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/m'});
}

var aberdeenContent = "<p> </p> <img src='images/Home.jpg'></img>";
//
var drimninContent = "<p>We travelled all the way to Drimnin and stayed in the coolest Airbnb ever, the <a href='https://www.airbnb.co.uk/rooms/plus/19997279' target='_blank'>Airship 002</a>. I had a blast in the airship and best of all it is doggy friendly.</p><img src='images/MarshallAirship.jpg'>";

var airlieContent = "<img src='images/Airlie.jpg'>";

var lakeDistrictContent = "<img src='images/LakeDistrict.jpg'>";
var lochLomondContent = "<img src='images/LochLomond.jpg'>";
var durnessContent = "";
var johnoGroatsContent ="<img src='images/JohnoGroats.jpg'>";
var glenFinnanContent ="<img src='images/GlenFinnan.jpg'>";
var isleofSkyeContent ="<img src='images/IsleofSkye.jpg'>";
var shieldaigContent ="<img src='images/Marshall1.jpg'>";
var chatsworthHouseContent = "<img src='images/ChatsworthHouse.jpg'>";
var staffaContent = "";
var bowFiddleRockContent = "<img src='images/BowFiddle.jpg'>";

var locations = [
    ["Aberdeen", 57.14, -2.10, aberdeenContent],
    ["Drimnin", 56.61, -5.98, drimninContent],
    ["Airlie Monument", 56.74, -3.02, airlieContent],
    ["Lake District", 54.47, -3.07, lakeDistrictContent],
    ["Loch Lomond", 56.14, -4.63, lochLomondContent],
    ["Durness", 58.57, -4.75, durnessContent],
    ["John o' Groats", 58.64, -3.07, johnoGroatsContent],
    ["Glen Finnan", 56.88, -5.43, glenFinnanContent],
    ["Isle of Skye", 57.41, -6.2, isleofSkyeContent],
    ["Shieldaig", 57.54, -5.65, shieldaigContent],
    ["Chatsworth House", 53.22, -1.61, chatsworthHouseContent],
    ["Staffa", 56.43, -6.34, staffaContent],
    ["Bow Fiddle Rock", 57.71, -2.85, bowFiddleRockContent]
  ];

