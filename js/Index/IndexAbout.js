//Google地圖
var map;
var myLatLng = {
	lat: 24.306933,
	lng: 120.712130
};

var map = new google.maps.Map(document.getElementById('map'), {
	zoom: 17,
	center: myLatLng
});

var marker = new google.maps.Marker({
	position: myLatLng,
	map: map,
	title: 'Google Map!'
});