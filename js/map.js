// получение координат из php(см. header.php)
var position = {
    lat: parseFloat(glob_lat), 
    lng: parseFloat(glob_lng)
};

var mapOptions = {
    mapTypeControl: false,
	zoom: 11,
	zoomControl: true,
	scaleControl: true,
	streetViewControl: true,
	rotateControl: true,
	fullscreenControl: true,
    center: position,      	
    mapTypeId: google.maps.MapTypeId.ROADMAP,
    // styles from site snazzymaps.com
    styles: [{"featureType":"all","elementType":"labels.text.fill","stylers":[{"saturation":36},{"color":"#333333"},{"lightness":40}]},{"featureType":"all","elementType":"labels.text.stroke","stylers":[{"visibility":"on"},{"color":"#ffffff"},{"lightness":16}]},{"featureType":"all","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"administrative","elementType":"geometry.fill","stylers":[{"color":"#fefefe"},{"lightness":20}]},{"featureType":"administrative","elementType":"geometry.stroke","stylers":[{"color":"#fefefe"},{"lightness":17},{"weight":1.2}]},{"featureType":"landscape","elementType":"geometry","stylers":[{"color":"#f5f5f5"},{"lightness":20}]},{"featureType":"landscape","elementType":"geometry.fill","stylers":[{"color":"#d5d5d5"}]},{"featureType":"landscape.man_made","elementType":"geometry.fill","stylers":[{"color":"#7574c0"},{"saturation":"-37"},{"lightness":"75"}]},{"featureType":"poi","elementType":"geometry","stylers":[{"color":"#f5f5f5"},{"lightness":21}]},{"featureType":"poi.business","elementType":"geometry.fill","stylers":[{"color":"#7574c0"},{"saturation":"-2"},{"lightness":"53"}]},{"featureType":"poi.park","elementType":"geometry","stylers":[{"color":"#dedede"},{"lightness":21}]},{"featureType":"poi.park","elementType":"geometry.fill","stylers":[{"color":"#7574c0"},{"lightness":"69"}]},{"featureType":"road.highway","elementType":"geometry.fill","stylers":[{"color":"#7574c0"},{"lightness":"25"}]},{"featureType":"road.highway","elementType":"geometry.stroke","stylers":[{"color":"#ffffff"},{"lightness":29},{"weight":0.2}]},{"featureType":"road.highway","elementType":"labels.text.fill","stylers":[{"lightness":"38"},{"color":"#000000"}]},{"featureType":"road.arterial","elementType":"geometry","stylers":[{"color":"#ffffff"},{"lightness":18}]},{"featureType":"road.local","elementType":"geometry","stylers":[{"color":"#ffffff"},{"lightness":16}]},{"featureType":"transit","elementType":"geometry","stylers":[{"color":"#f2f2f2"},{"lightness":19}]},{"featureType":"water","elementType":"geometry","stylers":[{"color":"#e9e9e9"},{"lightness":17}]}]            
}

function initialize() {
    var map = new google.maps.Map(document.getElementById('map'), mapOptions);
    var contentString = '<div id="infowindowMap"><p>'+ glob_address+'</p></div>';

    var infowindow = new google.maps.InfoWindow({
      content: contentString
    });    
    var marker = new google.maps.Marker({
        map: map,
        position: position,
        draggable: true,
        title: "Syntelect",
        icon: {
            path: fontawesome.markers.MAP_MARKER,
            scale: 0.5,
            strokeWeight: 0.2,
            strokeColor: '#101ac3', 
            strokeOpacity: 1,
            fillColor: '#101ac3',
            fillOpacity: 1
        }                
    });
    marker.addListener('click', function() {
      infowindow.open(map, marker);
    });    
}

google.maps.event.addDomListener(window, 'load', initialize);