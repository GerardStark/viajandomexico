 $(document).ready(function(){

	$("#pais").change(function(){
		var pais= $("#pais").val();
		var result = '';
		if (pais != 0){
			$.ajax({
				type: 'GET',
				url: 'estados/filterbycountry/'+pais,
				success: function(data) {
					$.each(data, function(k, val){
						result += '<option value="'+val.id+'">'+val.nombre+'</option>';
					});
					$("#estado").fadeIn(1000).html(result);
				}
			});
		} else {
			$("#estado").fadeIn(1000).html('');
			$("#ciudad").fadeIn(1000).html('');
		}
	});
	 
	$("#estado").change(function(){
		var estado= $("#estado").val();
		var result = '';

		if(estado != 0){
		 	$.ajax({
				type: 'GET',
				url: 'ciudades/filterbystate/'+estado,
				success: function(data) {
					$.each(data, function(k, val){
						result += '<option value="'+val.id+'">'+val.nombre+'</option>';
					});
					$("#ciudad").fadeIn(1000).html(result);
				}
			});
		}
	});

});


function getCoords(marker){ 
    $("#latitud").val(marker.getPosition().lat()); 
    $("#longitud").val(marker.getPosition().lng());
}

function initialize(x, y) { 
    var myLatlng = new google.maps.LatLng(x, y);
    var myOptions = { 
        zoom: 13,
        center: myLatlng, 
        mapTypeId: google.maps.MapTypeId.ROADMAP,
    } 

    var map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);
   	marker = new google.maps.Marker({ 
          position: myLatlng, 
          draggable: true, 
          title:"Elije la Ubicación",
    }); 
    
    google.maps.event.addListener(marker, "dragend", function() { 
        getCoords(marker); 
    }); 

    marker.setMap(map); 
    getCoords(marker);  
}

function validar (){
	initialize($('#latitud').val(), $('#longitud').val())
}

function buscar (texto, buscar){
    var temp = 0;
    var long = texto.length;
    for (j=0; j<long; j++) {
        if (texto[j] == buscar) 
        {
            temp +=1;
        }
    }
    return temp;
}

function check (select){
	var can=0;
	$("."+select).each(function(){    
    	if ($(this).prop("checked")){
			can +=1;
		}
  	});
  	
  	return can;
}
 // VARIABLES GLOBALES JAVASCRIPT
 var geocoder;
 var marker;
 var latLng;
 var latLng2;
 var map;

 // INICiALIZACION DE MAPA
 function initialize() {
	 geocoder = new google.maps.Geocoder();
	 latLng = new google.maps.LatLng('20.6295586' , '-87.07388509999998');
	 map = new google.maps.Map(document.getElementById('mapCanvasHotel'), {
		 zoom:13,
		 center: latLng,
		 mapTypeId: google.maps.MapTypeId.ROADMAP
	 });
	 // CREACION DEL MARCADOR
	 marker = new google.maps.Marker({
		 position: latLng,
		 title: 'Da click en cualquier parte del mapa para reubicar el marcador',
		 map: map,
		 draggable: false
	 });
	 // Escucho el CLICK sobre el mapa y si se produce actualizo la posicion del marcador
	 google.maps.event.addListener(map, 'click', function(event) {
		 updateMarker(event.latLng);
	 });

	 // Inicializo los datos del marcador
	 //    updateMarkerPosition(latLng);
	 geocodePosition(latLng);

	 // Permito los eventos drag/drop sobre el marcador
	 google.maps.event.addListener(marker, 'dragstart', function() {
		 updateMarkerAddress('Arrastrando...');
	 });

	 google.maps.event.addListener(marker, 'drag', function() {
		 updateMarkerStatus('Arrastrando...');
		 updateMarkerPosition(marker.getPosition());
	 });

	 google.maps.event.addListener(marker, 'dragend', function() {
		 updateMarkerStatus('Arrastre finalizado');
		 geocodePosition(marker.getPosition());
	 });
 }


 // Permito la gesti�n de los eventos DOM
 //google.maps.event.addDomListener(window, 'load', initialize);
 /*function cargarmapa (){
  initialize()
  }*/
 function cargarmapahotel(){
	 initialize();
	 document.getElementById("cargarmapaHotel").removeAttribute("onclick");
 }
 function cargarmapatour(){
	 initialize();
	 document.getElementById("cargarmapaTour").removeAttribute("onclick");
 }
 /*$('#cargarmapa').click(function(){
  initialize();
  });*/

 // ESTA FUNCION OBTIENE LA DIRECCION A PARTIR DE LAS COORDENADAS POS
 function geocodePosition(pos) {
	 geocoder.geocode({
		 latLng: pos
	 }, function(responses) {
		 if (responses && responses.length > 0) {
			 updateMarkerAddress(responses[0].formatted_address);
		 } else {
			 updateMarkerAddress('No puedo encontrar esta direccion.');
		 }
	 });
 }

 // OBTIENE LA DIRECCION A PARTIR DEL LAT y LON DEL FORMULARIO
 function codeLatLon() {
	 /*str= document.form_mapa.longitud.value+" , "+document.form_mapa.latitud.value;*/
	 str= document.getElementById('longitud').value+" , "+document.getElementById('latitud').value;
	 latLng2 = new google.maps.LatLng(document.getElementById('latitud').value ,document.getElementById('longitud').value);
	 marker.setPosition(latLng2);
	 map.setCenter(latLng2);
	 geocodePosition (latLng2);
	 // document.form_mapa.direccion.value = str+" OK";
 }

 // OBTIENE LAS COORDENADAS DESDE lA DIRECCION EN LA CAJA DEL FORMULARIO
 function codeAddress() {
	 var address = document.getElementById('direccion').value;
	 geocoder.geocode( { 'address': address}, function(results, status) {
		 if (status == google.maps.GeocoderStatus.OK) {
			 updateMarkerPosition(results[0].geometry.location);
			 marker.setPosition(results[0].geometry.location);
			 map.setCenter(results[0].geometry.location);
		 }
		 else {
			 alert('ERROR : ' + status);
		 }
	 });
 }

 // OBTIENE LAS COORDENADAS DESDE lA DIRECCION EN LA CAJA DEL FORMULARIO
 function codeAddress2 (address) {
	 geocoder.geocode( { 'address': address}, function(results, status) {
		 if (status == google.maps.GeocoderStatus.OK) {
			 updateMarkerPosition(results[0].geometry.location);
			 marker.setPosition(results[0].geometry.location);
			 map.setCenter(results[0].geometry.location);
			 document.form_mapa.direccion.value = address;
		 } else {
			 alert('ERROR : ' + status);
		 }
	 });
 }

 function updateMarkerStatus(str) {
	 document.form_mapa.direccion.value = str;
 }

 // RECUPERO LOS DATOS LON LAT Y DIRECCION Y LOS PONGO EN EL FORMULARIO
 function updateMarkerPosition (latLng) {
	 document.getElementById('longitud').value =latLng.lng();
	 document.getElementById('latitud').value = latLng.lat();
 }

 function updateMarkerAddress(str) {
	 document.getElementById('direccion').value = str;
 }

 // ACTUALIZO LA POSICION DEL MARCADOR
 function updateMarker(location) {
	 marker.setPosition(location);
	 updateMarkerPosition(location);
	 geocodePosition(location);
 }
 function yesnoCheck() {
	 if (document.getElementById('yesCheck').checked) {
		 document.getElementById('ifYes').style.display = 'block';
		 document.getElementById('yes').name = 'otro_plan';
	 }
	 else document.getElementById('ifYes').style.display = 'none';
 }
 $(document).ready(function(){
	 $("#hotel-btn").click(function(){
		 $("#texto-tipa").empty();
		 $("#texto-tipa").append("<div class='col-md-9'> <h2>Crear Hotel</h2> "+
				 "<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad adipisci alias commodi culpa facilis fuga illo iusto labore molestiae necessitatibus numquam quam quis quos ratione, repellat similique voluptatem! Doloribus, nostrum.</p></div>");
	 });
	 $("#tour-btn").click(function(){
		 $("#texto-tipa").empty();
		 $("#texto-tipa").append("<div class='col-md-9'> <h2>Crear Tour</h2>"+
				 "<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid aspernatur autem beatae cumque dignissimos dolor dolorum esse molestiae nobis obcaecati odio, omnis placeat quia sed vero. Blanditiis iusto quis repudiandae!</p></div>");
	 });
	 $("#transport-btn").click(function(){
		 $("#texto-tipa").empty();
		 $("#texto-tipa").append("<div class='col-md-9'> <h2>Crear Transporte</h2>"+
				 "<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium magni molestiae ratione. Aliquam, aliquid autem ea esse inventore ipsum itaque laborum laudantium molestias mollitia, natus quasi qui sit soluta vitae?</p></div>");
	 });
	 $("#bar-btn").click(function(){
		 $("#texto-tipa").empty();
		 $("#texto-tipa").append("<div class='col-md-9'> <h2>Crear Bar</h2>"+
				 "<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci aperiam aut, consequatur cum debitis et eveniet facere, fuga ipsa laudantium maxime, natus non nostrum nulla porro ratione saepe tenetur vitae?</p></div>");
	 });
	 $("#restaurant-btn").click(function(){
		 $("#texto-tipa").empty();
		 $("#texto-tipa").append("<div class='col-md-9'> <h2>Crear Restaurante</h2>"+
				 "<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam eaque est excepturi placeat! Dignissimos, doloribus, possimus! Alias architecto beatae dolorem dolores, harum ipsa ipsum maxime placeat qui rerum sed unde.</p></div>");
	 });
	 $("#spa-btn").click(function(){
		 $("#texto-tipa").empty();
		 $("#texto-tipa").append("<div class='col-md-9'> <h2>Crear Spa</h2>"+
				 "<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam eaque est excepturi placeat! Dignissimos, doloribus, possimus! Alias architecto beatae dolorem dolores, harum ipsa ipsum maxime placeat qui rerum sed unde.</p></div>");
	 });
 });
