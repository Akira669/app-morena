$(document).ready(function(){
	
	$("#claveelector").keyup(function(){
		$("#claveelector").removeClass('faltaDato');
	});

	$("#nombre").keyup(function(){
		this.value = this.value.toUpperCase();
		$("#mesaje_sinData").addClass('nover');
			$("#nombre").removeClass('faltaDato');
	});

	$("#apellidopaterno").keyup(function(){
		this.value = this.value.toUpperCase();
		$("#mesaje_sinData").addClass('nover');
			$("#apellidopaterno").removeClass('faltaDato');
	});

	$("#apellidomaterno").keyup(function(){
		this.value = this.value.toUpperCase();
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

	$("#vinculo").keyup(function(){
		$("#mesaje_sinData").addClass('nover');
			$("#vinculo").removeClass('faltaDato');
	});

	$("#cancelAfil").on('click',function(){
		window.location.href="padron.php";
	});

	$("#editAfil").on('click',function(){
		var data = {};

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
		data.userlogon = $("#userLogon").val();
		
		if($("#estado").is(':checked')==true){
			data.activo = 1;
		}else { data.activo =0;}

		data.seccion = $("#seccion").val();
		data.vinculo = $("#vinculo").val();

		if(data.clave_lector == null || data.clave_lector == ""){
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

		if(data.vinculo == null || data.vinculo == ""){
			$("#mesaje_sinData").removeClass('nover');
			$("#vinculo").addClass('faltaDato');
			$("html, body").animate({ scrollTop: 0 }, "fast");
			return;
		}
				bootbox.confirm({
			    		message: "¿Actulizar datos afiliado"+ data.nombre+"?",
			    		buttons: {
			        		cancel: {
			            		label: '<i class="fa fa-times"></i> Cancelar'
			        		},
			        		confirm: {
			            		label: '<i class="fa fa-check"></i> Aceptar'
			        		}
		    			},
		    			callback: function (result) {
		    				if(result == true){
		    					$.post("Views/Alumno/actionesAfil.php",{'action':3,'data':data},function(response){
									if(response==true){
										bootbox.alert("Actulizacion completa...");
										window.location.href="padron.php";
									}
								});
		    				}
		    			}
				});
		
	});
});