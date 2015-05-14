$(function(){
	var radius = {min: 10, max: 200};
	$('#radius_min').html(radius.min);
	$('#radius_max').html(radius.max);

	$('#radius_value').html($('#raio').val());
	$('#slider').slider({
		animate: 1000,
		step: 1,
		min: radius.min,
		max: radius.max,
		value: $('#raio').val(),
		slide: function(event, ui){
			$('#radius_value').html(ui.value);
			$('#raio').val(ui.value);
			
			var map = $(this).geocomplete('map');
			circle.setOptions({radius: ui.value});
		}
	});

	var populationOptions = {
		strokeColor: '#FF0000',
		strokeOpacity: 0.8,
		strokeWeight: 1,
		fillColor: '#FF0000',
		fillOpacity: 0.35,
		radius: parseInt($('#raio').val())
	};

	var circle = new google.maps.Circle(populationOptions);
	$('#address').geocomplete({
		map: '#map',
		location: [$('#lat').val(), $('#lng').val()],
		markerOptions: {
			draggable: true
		},
		mapOptions: {
			zoom: parseInt($('#map-zoom').val())
		},
		details: '#form-map'
	})
	.bind('geocode:result', function(event, result){
		alert('oi');
		var map = $(this).geocomplete('map');
		circle.setOptions({center: result.geometry.location});
		circle.setMap(map);
	})
	.bind('geocode:dragged', function(event, result){
		var map = $(this).geocomplete('map');
		circle.setOptions({center: result});
		circle.setMap(map);
		$('#lat').val(result.lat());
		$('#lng').val(result.lng());
	})
	.bind('geocode:zoom', function(event, result){
		$('#map-zoom').val(result);
	});

	var map = $('#address').geocomplete('map');
	circle.setOptions({center: new google.maps.LatLng(parseFloat($('#lat').val()), parseFloat($('#lng').val()))});
	circle.setMap(map);
});