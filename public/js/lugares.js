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