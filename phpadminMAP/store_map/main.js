// The function to load a given google font file
loadGoogleFont = function(font_name) {
    "use strict";
    var cssLink = $("<link rel='stylesheet' type='text/css' href='https://fonts.googleapis.com/css?family=" + font_name + "'>");
    cssLink.appendTo($('head'));
};

// The function to load a given css file
loadCSS = function(href) {
    "use strict";
    var cssLink = $("<link rel='stylesheet' type='text/css' href='" + href + "'>");
    cssLink.appendTo($('head'));
};

String.prototype.compose = (function (){
        var re = /\{{(.+?)\}}/g;
        return function (o){
                return this.replace(re, function (_, k){
                    return typeof o[k] != 'undefined' ? o[k] : '';
                });
            }
    }());

var store_item =  '<li class="shop-item" id="{{id}}">'+
        '<h4 class="mappr-name">{{store_name}}</h4>'+
        '<p class="mappr-location">{{store_address}}</p>'+
        '<p class="mappr-phone"><a href="tel:{{store_phone}}">{{store_phone}}</a></p>'+
        '<p class="mappr-hours">Monday-Friday 9AM-6PM</p>'+
        '<span class="mappr-distance">5.6 mi</span>'+
      '</li>';

$(document).ready(function(){
	
	var start_zoomlevel = 8;
    var map;
    var shop_markers = [];
    var infowindow;

    $.post('http://localhost/store_mapper/mapapi/mapsetting/32',function(result){
    	var res = result[0];
    	var map_layout = res.map_layout;
    	console.log(result[0]);
    	var starting_zoomlevel = parseInt(res.starting_zoomlevel);
        //loading google font
        var fontFamily = res.google_fonts;
        loadGoogleFont(res.google_fonts);
        fontFamily = fontFamily.replace("+"," ");
        $('body').css({'font-family': fontFamily + ", sans-serif"});

        // load external CSS file
        if(res.external_csslink != ""){
            loadCSS(res.external_csslink);
        }

        if(res.start_zoomlevel != null){
            start_zoomlevel = res.start_zoomlevel;
        }

        var mapOptions = {
            center: new google.maps.LatLng(0,0), //assign Seprately
            zoom: start_zoomlevel
        };

        map = new google.maps.Map(document.getElementById("map-canvas"), mapOptions);
        infowindow = new google.maps.InfoWindow();

        var input = document.getElementById('mappr-address');
        var autocomplete = new google.maps.places.Autocomplete(input);
        autocomplete.bindTo('bounds', map);

        autocomplete.addListener('place_changed', function() {
            var place = autocomplete.getPlace();
            if (!place.geometry) {
                // User entered the name of a Place that was not suggested and
                // pressed the Enter key, or the Place Details request failed.
                window.alert("No details available for input: '" + place.name + "'");
                return;
            }

            // If the place has a geometry, then present it on a map.
            if (place.geometry.viewport) {
                map.fitBounds(place.geometry.viewport);
            } else {
                map.setCenter(place.geometry.location);
                map.setZoom(17);  // Why 17? Because it looks good.
            }
        });

        if(res.search_radius_filter == 0) {
            $('.mappr-filter-button').hide();
        }
		
    	if(map_layout == 1){
    		$('#map-canvas').removeClass('mappr-left').addClass('mappr-right');
    		$('#results').removeClass('result-right').addClass('result-left');
    	}
    	if(map_layout == 2){
    		$('#map-canvas').removeClass('mappr-right').addClass('mappr-left');
    		$('#results').removeClass('result-left').addClass('result-right');
    	}

    	if((res.ask_user_location == 1) && navigator.geolocation) {
	        navigator.geolocation.getCurrentPosition(showPosition);
	    } else {
	        alert("Geolocation is not supported by this browser.");
	    }
	
		function showPosition(position) {
		    var latLng = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);
    		map.setCenter(latLng);
    		map.setZoom(starting_zoomlevel);

    		showStores();
		}

    });

    function createStoreMarker(latlng, html) {
        var marker = new google.maps.Marker({
            position: latlng,
            map: map
        });

        google.maps.event.addListener(marker, 'click', function() {
            infowindow.setContent(html);
            infowindow.open(map, marker);
        });
        return marker;
    }


	function showStores(){
		$.post('http://localhost/store_mapper/mapapi/stores/32',function(result){
    		var res = result;
    		res.forEach((ele,key) => {
    			var store_latlng = new google.maps.LatLng(ele.store_lat, ele.store_lng);
				
				/*var marker = new google.maps.Marker({
				    position: store_latlng,
				    title: ele.store_name,
                    map: map
				});

                google.maps.event.addListener(marker, 'click', function() {
                    infowindow.setContent(html);
                    infowindow.open(map, marker);
                });*/

                shop_markers[key] = createStoreMarker(store_latlng, ele.store_name);
        
				$('.mappr-results').append(
					store_item.compose({
                        'id' : key,
						'store_name' : ele.store_name,
						'store_address' : ele.store_address,
						'store_phone' : ele.store_phone,
					})
				);
    		});

            $('.shop-item').click(function(e){
                var dom_id = e.currentTarget.getAttribute('id');
                dom_id = parseInt(dom_id);
                google.maps.event.trigger(shop_markers[dom_id],'click');
            });
    	});
	}
});