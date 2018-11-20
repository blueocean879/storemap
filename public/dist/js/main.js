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

var store_item =  '<li id="shop_item_{{id}}">'+
        '<h4 class="mappr-name">{{store_name}}</h4>'+
        '<p class="mappr-location">{{store_address}}</p>'+
        '<p class="mappr-promo">{{store_promomessage}}</p>'+
        '<p class="mappr-phone"><a href="tel:{{store_phone}}">{{store_phone}}</a></p>'+
        '<p class="mappr-hours">{{store_hours}}</p>'+
        '<span class="mappr-links"><a href="{{store_url}}">Website</a><a href="https://www.google.com/maps/dir/{{lat}},{{lng}}/{{destination_coordinates}}/" target="_blank">Directions</a><a href="javascript:void(0)" class="shop-item" id="{{id}}">View on Map</a></span>' +
        '<span class="mappr-distance">{{distance}} mi</span>'+
      '</li>';


$(document).ready(function(){

    $("#mappr-filter-button").click(function(){
        $("#mappr-filter-content").slideToggle("slow");
    });

	var start_zoomlevel = 8;
	var map;
	var shop_markers = [];
	var infowindow;
    var custom_image_marker_url;
    var start_lat;
    var start_lng;
    var search_radius = 25;
    var stores = [];

	var user_id = $('#user_id').val();

    $.post('https://getmappr.com/mapapi/mapsetting/'+user_id,function(result){
    	var res = result[0];
        console.log(res);
    	var map_layout = res.map_layout;
    	var starting_zoomlevel = parseInt(res.starting_zoomlevel);
        custom_image_marker_url = res.custom_image_marker;
        //loading google font
        var fontFamily = res.google_fonts;
        loadGoogleFont(res.google_fonts);
        fontFamily = fontFamily.replace("+"," ");
        $('body').css({'font-family': fontFamily + ", sans-serif"});

        if(res.custom_css != ""){
            $('head').append('<style type="text/css">'+res.custom_css+'</style>');
        }

        // load external CSS file
        if(res.external_csslink != ""){
            loadCSS(res.external_csslink);
        }

        if(res.start_zoomlevel != null){
            start_zoomlevel = res.start_zoomlevel;
        }

        createFilters(res.custom_categories);

        start_lat = res.start_lat;
        start_lng = res.start_lng;

        if(start_lng == 0.0 && start_lat == 0.0){
            start_lat = 39.898111561546926;
            start_lng = -99.3321491656746; // center point of US continent.
            start_zoomlevel = 5;
        }

        var mapOptions = {
            center: new google.maps.LatLng(start_lat, start_lng), //assign Seprately
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
                window.alert("No details available for: '" + place.name + "'");
                return;
            }

            // If the place has a geometry, then present it on a map.
            if (place.geometry.viewport) {
                start_lat = place.geometry.location.lat();
                start_lng = place.geometry.location.lng();

                filterStores(search_radius);
                map.fitBounds(place.geometry.viewport);
            } else {
                start_lat = place.geometry.location.lat();
                start_lng = place.geometry.location.lng();

                filterStores(search_radius);
                map.setCenter(place.geometry.location);
                map.setZoom(17);  // Why 17? Because it looks good.
            }
        });

        if(parseInt(res.search_radius_filter) == 0) {
            $('#mappr-radius').hide();
        }

        if(map_layout == 0){
            $('#map-canvas').removeClass('mappr-left').addClass('mappr-bottom');
            $('#results').removeClass('result-right').addClass('result-top');
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
	        navigator.geolocation.getCurrentPosition(showPosition,error);
	    } else {
            showStores(user_id);
	    }

        function error() {
            showStores(user_id);
        }

		function showPosition(position) {
            start_lat = position.coords.latitude;
            start_lng = position.coords.longitude;

		    var latLng = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);
    		map.setCenter(latLng);
    		map.setZoom(starting_zoomlevel);

    		showStores(user_id);
		}


    });

    function createFilters(filter_string){
        $('#mappr-filter-content').empty();
        var filters = [];
        filters = filter_string.split(",");
        for(var i = 0; i < filters.length; i++){
            var filter_item = '<label><input type="checkbox" name="mappr_filter[]" class="custom_category" value="'+filters[i]+'">' + filters[i] + '</label>';
            $('#mappr-filter-content').append(filter_item);
        }

        $('.custom_category').click(function(){
            var filters = [];
            $('.custom_category:checked').each(function(){
                filters.push($(this).val());
            });
            console.log(filters.join());
            filterStoresByFilter(filters.join());

        });
    }

    function createStoreMarker(latlng, icon, detail) {

        var html = "<div><h1>"+detail.store_name+"</h1>"+
                    "<p><i class='fa fa-map-marker'></i>&nbsp;"+detail.store_address+"</p>"+
                    "<p><i class='fa fa-phone'></i>&nbsp;"+detail.store_phone+"</p>"+
                    "<p>"+detail.store_promomessage+"</p>"+
                    "<a href='https://www.google.com/maps/dir/" + detail.store_lat + "," + detail.store_lng + "/" + start_lat + "," + start_lng + "/' target='_blank'>Directions</a>"+
                    "</div>";

        if(icon != ""){
            var icon = {
                url: icon, // url
                scaledSize : new google.maps.Size(22, 32), // scaled size
                origin: new google.maps.Point(0,0), // origin
                anchor: new google.maps.Point(0, 0) // anchor
            };

            var marker = new google.maps.Marker({
                position: latlng,
                map: map,
                icon : icon,
                property : detail
            });
        }
        else{

            if(custom_image_marker_url != ""){

                var icon = {
                    url: custom_image_marker_url, // url
                    scaledSize : new google.maps.Size(22, 32), // scaled size
                    origin: new google.maps.Point(0,0), // origin
                    anchor: new google.maps.Point(0, 0) // anchor
                };

                var marker = new google.maps.Marker({
                    position: latlng,
                    map: map,
                    icon : icon,
                    property : detail
                });
            }
            else{
                var marker = new google.maps.Marker({
                    position: latlng,
                    map: map,
                    property : detail
                });
            }

        }

        google.maps.event.addListener(marker, 'click', function() {
            infowindow.setContent(html);
            infowindow.open(map, marker);
        });
        return marker;
    }

    function distance(lat1, lon1, lat2, lon2, unit) {
        var radlat1 = Math.PI * lat1/180;
        var radlat2 = Math.PI * lat2/180;
        var theta = lon1-lon2;
        var radtheta = Math.PI * theta/180;
        var dist = Math.sin(radlat1) * Math.sin(radlat2) + Math.cos(radlat1) * Math.cos(radlat2) * Math.cos(radtheta);
        if (dist > 1) {
            dist = 1;
        }
        dist = Math.acos(dist);
        dist = dist * 180/Math.PI;
        dist = dist * 60 * 1.1515;
        if (unit=="K") { dist = dist * 1.609344; }
        if (unit=="N") { dist = dist * 0.8684; }
        return dist;
    }

    $('#mappr-radius > select').on('change', function() {
        search_radius = this.value;
        filterStores(search_radius);
    });

    $('#mappr-search-button').click(function(e){
        var xmlHttp = new XMLHttpRequest();
        var xmlURL = "https://maps.google.com/maps/api/geocode/json?address=" + encodeURI($('#mappr-address').val()) + "&key=AIzaSyCWa6gbmERVfGBHVR09_Xx3rtgIWYNDWdw";
        xmlHttp.open("GET", xmlURL);
        xmlHttp.send();
        xmlHttp.addEventListener("load", function(){

            var jres = JSON.parse(this.responseText);
            var jresults = jres.results;
            if (jresults.length == 0){
                alert("There is no such address.");
                return;
            }

            start_lat = jresults[0].geometry.location.lat;
            start_lng = jresults[0].geometry.location.lng;

            filterStores(search_radius);
            map.setCenter({lat: start_lat, lng: start_lng});
            map.setZoom(13);  // Why 17? Because it looks good.

          }
        );
    });

    function filterStores(search_radius){
        $('#mappr-results').empty();
        shop_markers.forEach( (marker, key) => {
            var marker_lat = marker.getPosition().lat();
            var marker_lng = marker.getPosition().lng();

            var disBetween = distance(start_lat, start_lng, marker_lat, marker_lng);
            if(disBetween > search_radius){
                marker.setVisible(false);
            }
            else{
                marker.setVisible(true);
                $('#mappr-results').append(
                    store_item.compose({
                        'id' : key,
                        'store_name' : marker.property.store_name,
                        'store_address' : marker.property.store_address,
                        'store_phone' : marker.property.store_phone,
                        'store_url' : marker.property.store_url,
                        'store_promomessage' : marker.property.store_promomessage,
                        'store_hours' : marker.property.store_hours,
                        'distance' : disBetween.toFixed(2),
                        'destination_coordinates' : start_lat + "," + start_lng,
                        'lat' : marker_lat,
                        'lng' : marker_lng,
                    })
                );
            }

        });
    }

    function filterStoresByFilter(filter){
        $('#mappr-results').empty();
        shop_markers.forEach( (marker, key) => {
            var marker_lat = marker.getPosition().lat();
            var marker_lng = marker.getPosition().lng();

            var disBetween = distance(start_lat, start_lng, marker_lat, marker_lng);

            if(filter.includes(marker.property.store_category) || (marker.property.store_category).includes(filter)){
                marker.setVisible(true);
                $('#mappr-results').append(
                    store_item.compose({
                        'id' : key,
                        'store_name' : marker.property.store_name,
                        'store_address' : marker.property.store_address,
                        'store_phone' : marker.property.store_phone,
                        'store_url' : marker.property.store_url,
                        'store_promomessage' : marker.property.store_promomessage,
                        'distance' : disBetween.toFixed(2),
                        'destination_coordinates' : start_lat + "," + start_lng,
                        'lat' : marker_lat,
                        'lng' : marker_lng,
                    })
                );
            }
            else{
                marker.setVisible(false);
            }

        });
    }


	function showStores($user_id){
		$.post('https://getmappr.com/mapapi/stores/'+$user_id,function(result){
    		var res = result;
            stores = res;
            console.log(res);
    		res.forEach((ele,key) => {
    			var store_latlng = new google.maps.LatLng(ele.store_lat, ele.store_lng);

                shop_markers[key] = createStoreMarker(store_latlng, ele.store_custom_marker_image, ele);
                var dis = distance(start_lat, start_lng, ele.store_lat, ele.store_lng);

				$('#mappr-results').append(
					store_item.compose({
                        'id' : key,
						'store_name' : ele.store_name,
						'store_address' : ele.store_address,
						'store_phone' : ele.store_phone,
                        'store_url' : ele.store_url,
                        'store_promomessage' : ele.store_promomessage,
                        'store_hours' : ele.store_hours,
                        'distance' : dis.toFixed(2),
                        'destination_coordinates' : start_lat + "," + start_lng,
                        'lat' : ele.store_lat,
                        'lng' : ele.store_lng,
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
