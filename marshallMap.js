function initMap() {
    var map =  new google.maps.Map(document.getElementById('map'), {
        zoom: 5, 
        center: {lat: 56, lng: 1.5}
    });
    var labels = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ'
    // 55.95, -3.19
    var markers = locations.map(function(location, i) {
        return new google.maps.Marker({
            position: location, //[location, {lat: 55.95, lng: -3.19}],
            label: labels[i % labels.length]
        });
    }); 
    var markerCluster = new MarkerClusterer(map, markers, {imagePath: 'https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/m'});
}
var locations = [
    {lat: 57.14, lng: -2.10},
    {lat: 55.95, lng: -3.19},
    {lat: 56.42, lng: -5.47},
    {lat: 55.86, lng: -4.24},
    {lat: 60.39, lng: 5.33},
    {lat: 54.46, lng: -3.09},
]
