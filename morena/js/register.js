$(document).ready(function(){

	$("#elector").keyup(function(){
		$("#obligatoprio").addClass('nover');
		$("#elector").removeClass('faltaDato');
	});

	$("#nombre").keyup(function(){
		$("#obligatoprio").addClass('nover');
		$("#nombre").removeClass('faltaDato');
	});

	$("#rol").change(function(){
		$("#obligatoprio").addClass('nover');
		$("#rol").removeClass('faltaDato');
	});

	$("#email").keyup(function(){
		$("#obligatoprio").addClass('nover');
		$("#email").removeClass('faltaDato');
	});

	$("#passwd").keyup(function(){
		$("#obligatoprio").addClass('nover');
		$("#passwd").removeClass('faltaDato');
	});

	$("#submit_btn").on('click',function(){
		$("#obligatoprio").addClass('nover');
		var datos = {};
		datos.elector = $("#elector").val();
		datos.nombre = $("#nombre").val();
		datos.apaterno = $("#apaterno").val();
		datos.amaterno = $("#amaterno").val();
		datos.rol = $("#rol").val();
		datos.email = $("#email").val();
		datos.passwd = $("#passwd").val();

		if(datos.elector === "" || datos.elector === null){
			$("#elector").addClass('faltaDato');
			$("#obligatoprio").removeClass('nover');
			$("html, body").animate({ scrollTop: 0 }, "fast");
			return; 
		}

		if(datos.nombre === "" || datos.nombre === null){
			$("#nombre").addClass('faltaDato');
			$("#obligatoprio").removeClass('nover');
			$("html, body").animate({ scrollTop: 0 }, "fast");
			return; 
		} 

		if(datos.rol === "" || datos.rol === null){
			$("#rol").addClass('faltaDato');
			$("#obligatoprio").removeClass('nover');
			$("html, body").animate({ scrollTop: 0 }, "fast");
			return; 
		} 

		if(datos.email === "" || datos.email === null){
			$("#email").addClass('faltaDato');
			$("#obligatoprio").removeClass('nover');
			$("html, body").animate({ scrollTop: 0 }, "fast");
			return; 
		} 

		if(datos.passwd === "" || datos.passwd === null){
			$("#passwd").addClass('faltaDato');
			$("#obligatoprio").removeClass('nover');
			$("html, body").animate({ scrollTop: 0 }, "fast");
			return; 
		} 

		$.post('Controllers/usuarioController.php',{'data':datos,'accion':2},function(response){
			if(response == false){
				bootbox.confirm({
			    		message: "¿Registrar al usuario "+datos.nombre+"?",
			    		buttons: {
			        		cancel: {
			            		label: '<i class="fa fa-times"></i> Cancelar'
			        		},
			        		confirm: {
			            		label: '<i class="fa fa-check"></i> Registrar'
			        		}
		    			},
		    			callback: function (result) {
		    				if(result == true){
		    				$.post('Controllers/usuarioController.php',{'data':datos,'accion':1},function(response){
								if(response==true){
									bootbox.alert("Usuario registrado...");
									window.location.href="userReady.php";
								}
							});
		    			}
		    		}
				});
			}else{
				bootbox.alert("La clave ya existe...");
			$("#elector").addClass('faltaDato');
			$("#obligatoprio").removeClass('nover');
			$("html, body").animate({ scrollTop: 0 }, "fast");
			}
		});

		
	});
	
});