$(document).ready(function(){
	
	$("#claveelector").keyup(function(){
		$("#claveelector").removeClass('faltaDato');
		$("#mesaje_electro").addClass('nover');
		$("#mesaje_duplicado").addClass('nover');
	});

	$("#nombre").keyup(function(){
		$("#mesaje_sinData").addClass('nover');
			$("#nombre").removeClass('faltaDato');
	});

	$("#apellidopaterno").keyup(function(){
		$("#mesaje_sinData").addClass('nover');
			$("#apellidopaterno").removeClass('faltaDato');
	});

	$("#apellidomaterno").keyup(function(){
		$("#mesaje_sinData").addClass('nover');
			$("#apellidomaterno").removeClass('faltaDato');
	});

	$("#telefono").keyup(function(){
		$("#mesaje_sinData").addClass('nover');
			$("#telefono").removeClass('faltaDato');
	});

	$("#seccion").keyup(function(){
		$("#mesaje_sinData").addClass('nover');
			$("#seccion").removeClass('faltaDato');
	});

	$("#registerAfil").on('click',function(){
		var data = {};
		
		$("#mesaje_electro").addClass('nover');
		$("#mesaje_duplicado").addClass('nover');
		$("#mesaje_sinData").addClass('nover');
		
		data.clave_lector = $("#claveelector").val();
		data.nombre = $("#nombre").val();
		data.apaterno = $("#apellidopaterno").val();
		data.amaterno = $("#apellidomaterno").val();
		data.telefono = $("#telefono").val();
		data.calle = $("#calle").val();
		data.num_ext = $("#numext").val();
		data.num_int = $("#numint").val();
		data.cp = $("#codigopostal").val();
		data.colonia = $("#colonia").val();
		
		if($("#estado").is(':checked')==true){
			data.activo = 1;
		}else { data.activo =0;}

		data.seccion = $("#seccion").val();

		if(data.clave_lector == null || data.clave_lector == ""){
			$("#mesaje_electro").removeClass('nover');
			$("#claveelector").addClass('faltaDato');
			$("html, body").animate({ scrollTop: 0 }, "fast");
			bootbox.alert("Por favor escriba una clave de elector...");
			return;
		}

		if(data.nombre == null || data.nombre == ""){
			$("#mesaje_sinData").removeClass('nover');
			$("#nombre").addClass('faltaDato');
			$("html, body").animate({ scrollTop: 0 }, "fast");
			return;
		}

		if(data.apaterno == null || data.apaterno == ""){
			$("#mesaje_sinData").removeClass('nover');
			$("#apellidopaterno").addClass('faltaDato');
			$("html, body").animate({ scrollTop: 0 }, "fast");
			return;
		}

		if(data.amaterno == null || data.amaterno == ""){
			$("#mesaje_sinData").removeClass('nover');
			$("#apellidomaterno").addClass('faltaDato');
			$("html, body").animate({ scrollTop: 0 }, "fast");
			return;
		}

		if(data.telefono == null || data.telefono == ""){
			$("#mesaje_sinData").removeClass('nover');
			$("#telefono").addClass('faltaDato');
			$("html, body").animate({ scrollTop: 0 }, "fast");
			return;
		}

		if(data.seccion == null || data.seccion == ""){
			$("#mesaje_sinData").removeClass('nover');
			$("#seccion").addClass('faltaDato');
			$("html, body").animate({ scrollTop: 0 }, "fast");
			return;
		}

		$.post("Views/Alumno/actionesAfil.php",{'action':1,'clave':data.clave_lector},function(response){
			if(response==true){
				$("#mesaje_duplicado").removeClass('nover');
				$("#claveelector").addClass('faltaDato');
				$("html, body").animate({ scrollTop: 0 }, "fast");
				return;
			}else{
				bootbox.confirm({
			    		message: "¿Registrar Afiliado?",
			    		buttons: {
			        		cancel: {
			            		label: '<i class="fa fa-times"></i> Cancelar'
			        		},
			        		confirm: {
			            		label: '<i class="fa fa-check"></i> Confirmar'
			        		}
		    			},
		    			callback: function (result) {
		    				if(result == true){
		    					$.post("Views/Alumno/actionesAfil.php",{'action':2,'data':data},function(response){
		    						alert(response);
									if(response==true){
										bootbox.alert("Afilidado registrado...");
										window.location.href="padron.php";
									}
								});
		    				}
		    			}
				});
			}
		});
		
	});
});