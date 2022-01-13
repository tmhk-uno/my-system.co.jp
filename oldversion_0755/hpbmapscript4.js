//
// (C) 2012 株式会社ジャストシステム
//
// ***** DO NOT EDIT THIS FILE *****

var lat = new Array(1);
var lng = new Array(1);
var markerwindowinfo = new Array(1);
var markerwindowopen = new Array(1);
var markerevent = new Array(1);
var firstshown = new Array(1);
lat[0] = "35.742724";
lng[0] = "139.393374";
markerwindowinfo[0] = "";
markerwindowopen[0] = "1";
markerevent[0] = "click";
firstshown[0] = "1";

function createMarker(map, point, event, info, open) {
	var marker = new google.maps.Marker({position: point, map: map});
	if(open == 1){
	var info = new google.maps.InfoWindow({content: info});
		google.maps.event.addListener(marker, event, function() {
			info.open(map, marker);
		});
	}
	return marker;
}

function hpbmaponload() {
	var mapdiv = document.getElementById("HPBMAP_20180706002735");
	var myOptions = { 
	zoom: 15, 
	center: new google.maps.LatLng( 35.742724, 139.393374 ), 
	mapTypeId: google.maps.MapTypeId.ROADMAP
	}
	var map = new google.maps.Map(mapdiv, myOptions);
	for (var i = 0; i < 1; i++) {
	  if(firstshown[i] == 1){
		var point = new google.maps.LatLng(lat[i], lng[i]);
		createMarker(map, point, markerevent[i], markerwindowinfo[i], markerwindowopen[i]);
	  }
	}
	return map;
}