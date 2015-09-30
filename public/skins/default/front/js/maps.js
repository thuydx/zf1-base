// Geolocation with HTML 5 and Google Maps API based on example from maxheapsize: http://maxheapsize.com/2009/04/11/getting-the-browsers-geolocation-with-html-5/
//
// This script is by Merge Database and Design, http://merged.ca/ -- if you use some, all, or any of this code, please offer a return link.

var map;
var mapCenter
var geocoder;
var fakeLatitude;
var fakeLongitude;

function initialize() 
{	
	
	if (navigator.geolocation) 
	{
		navigator.geolocation.getCurrentPosition( function (position) {  
			
			// Did we get the position correctly?
			// alert (position.coords.latitude);
			
			// To see everything available in the position.coords array:
			// for (key in position.coords) {alert(key)}

			mapServiceProvider(position.coords.latitude,position.coords.longitude);
 			
 		}, // next function is the error callback
 			function (error)
 			{
 				switch(error.code) 
 				{
       				case error.TIMEOUT:
 						alert ('Timeout');
 						break;
 					case error.POSITION_UNAVAILABLE:
 						alert ('Position unavailable');
 						break;
 					case error.PERMISSION_DENIED:
 						alert ('Permission denied');
 						break;
 					case error.UNKNOWN_ERROR:
 						alert ('Unknown error');
 						break;
 				}
 			}
 		);
 	} 
 	else 
 	{
	  alert("I'm sorry, but geolocation services are not supported by your browser or you do not have a GPS device in your computer. I will use a sample location to produce the map instead.");
	  
	  fakeLatitude = 49.273677;
	  fakeLongitude = -123.114420;
	  
	  //alert(fakeLatitude+', '+fakeLongitude);	  
	  mapServiceProvider(fakeLatitude,fakeLongitude);
	}  
}

function mapServiceProvider(latitude,longitude)
{
	if (window.location.querystring['serviceProvider']=='Yahoo')
	{
		mapThisYahoo(latitude,longitude);
	}
	else
	{
		mapThisGoogle(latitude,longitude);
	}
}

function mapThisYahoo(latitude,longitude)
{
	var map = new YMap(document.getElementById('map'));  
    map.addTypeControl();   
    map.setMapType(YAHOO_MAP_REG);  
    map.drawZoomAndCenter(latitude+','+longitude, 3);
    
    // add marker
    var currentGeoPoint = new YGeoPoint( latitude, longitude );  
    map.addMarker(currentGeoPoint);
    
    // Start up a new reverse geocoder for addresses?
    // YAHOO Ajax/JS/Rest API does not yet support reverse geocoding (though they do support it via Actionscript... lame)
    // So we'll have to use Google for the reverse geocoding anyway, though I've left this part of the script just in case Yahoo! does support it and I'm not aware of it yet
	geocoder = new GClientGeocoder();
	geocoder.getLocations(latitude+','+longitude, addAddressToMap);
}

function mapThisGoogle(latitude,longitude)
{
	var mapCenter = new GLatLng(latitude,longitude);
	map = new GMap2(document.getElementById("map"));
	map.setCenter(mapCenter, 15);
	map.addOverlay(new GMarker(mapCenter));
	
	// Start up a new reverse geocoder for addresses?
	geocoder = new GClientGeocoder();
	geocoder.getLocations(latitude+','+longitude, addAddressToMap);
}

function addAddressToMap(response)
{
	if (!response || response.Status.code != 200) {
		alert("Sorry, we were unable to geocode that address");
	} else {
		place = response.Placemark[0];
		$('#address').html('Your address: '+place.address);
	}
}

window.location.querystring = (function() {
 
    // by Chris O'Brien, prettycode.org
    var collection = {};
    var querystring = window.location.search;
    if (!querystring) {
        return { toString: function() { return ""; } };
    }
    querystring = decodeURI(querystring.substring(1));
 
    var pairs = querystring.split("&");
 
    for (var i = 0; i < pairs.length; i++) {
 
        if (!pairs[i]) {
            continue;
        }
        var seperatorPosition = pairs[i].indexOf("=");
 
        if (seperatorPosition == -1) {
            collection[pairs[i]] = "";
        }
        else {
            collection[pairs[i].substring(0, seperatorPosition)] 
                = pairs[i].substr(seperatorPosition + 1);
        }
    }

    collection.toString = function() {
        return "?" + querystring;
    };
 
    return collection;
})();