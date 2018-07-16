var varIntervalo=[];
var consultasAjax=[];
var xhrPool = [];
var usrActivo=undefined;

$(document).ready(function(){

	$('html').click(function(evt){    
		if(evt.target.id == "navbarPr")
          return;
       //For descendants of menu_content being clicked, remove this check if you do not want to put constraint on descendants.
       if($(evt.target).closest('#navbarPr').length)
          return;         
		if($("#navbar").is(":visible")){
			$('.navbar-toggle').click();
		}
	});

    $("#submit_suscribe").click(function(){
         lruDir('suscribe');
    }); 


	$.ajaxSetup({
		beforeSend: function(jqXHR) {
			xhrPool.push(jqXHR);
		},
		complete: function(jqXHR) {
			var index = xhrPool.indexOf(jqXHR);
			if (index > -1) {
				xhrPool.splice(index, 1);
			}
		}
	});
	//$("#navbarPr").load("controller/template.php",{opcion:"sesion"});
	//$("#container").load("controller/template.php",{opcion:"pagina"});
		cargaGeneral();
		/*setInterval(function(){
			cargaGeneral();
		}, 30000);*/
	$("html").mousemove(function(){
		if (usrActivo==undefined || usrActivo==null){
			usrActivo=$.post("controller/template.php",{opcion:"activo"},function(data){
				if(data!=true){
					//location.href = "index.html";
				}
			},"json").always(function(data){
				setTimeout(function(){usrActivo=null;},30000);
			});
		}
		
	});
});


function abortAll() {
	$(xhrPool).each(function(idx, jqXHR) {
		jqXHR.abort();
	});
	xhrPool = [];
	consultasAjax=[];
	$(varIntervalo).each(function() {
		clearInterval(this);
	});
	varIntervalo=[];
};

function cargaGeneral(){
	$.post("controller/template.php",{opcion:"load"},
		function(data, status){
			data.respuesta=true;
			if(!data.respuesta){
				$.post("controller/template.php",{opcion:"logout"});
				//location.href = "index.html";
			}
			var options = {timeZone: "America/Mexico_City", hour12:false,weekday: 'long', year: 'numeric', month: 'long', day: 'numeric',timeday:'long' };
			var fecha=new Date().toLocaleTimeString("es-MX", options);
			$("#fechaSistema").html(fecha.toUpperCase());
		},"json"
	);
}

function lruDir(opcion,vars=null){
	//$('#modalProcess').modal({backdrop: 'static', keyboard: false});
	//$("#modalProcess").modal("show");
	abortAll();
	/*if(opcion=='navbarLogOut'){
		$.post("controller/template.php",{opcion:"logout"},
		function(data, status){
			//location.href = "index.html";
			$('#modalProcess').modal({backdrop: false, keyboard: true});
			$('#modalProcess').modal("toggle");
		},"html");
	}*/
	//else {
	//	$('.navbar-collapse.in').collapse('hide');
		if(vars==null)
			$("#_content").load("controller/template.php",{opcion:"redireccion",redireccion:opcion},function(){
				//$('#modalProcess').modal({backdrop: false, keyboard: true});
				//$('#modalProcess').modal("toggle");
			});
		else
			$("#_content").load("controller/template.php",{opcion:"redireccion",redireccion:opcion,sessionVars:vars},function(){
				//$('#modalProcess').modal({backdrop: false, keyboard: true});
				//$('#modalProcess').modal("toggle");
			});
	//}
}

function intervalo(funcion,intervalo){
	return varIntervalo.push(setInterval(funcion, intervalo));
}

function controlador(nombre,superposicion=false,variables=new Array(),funcion=null){
	if(superposicion){
		try{consultasAjax[nombre].abort();}catch(err){}
	}
	else if (consultasAjax[nombre]!=undefined && consultasAjax[nombre]!=null){
		return consultasAjax[nombre];
	}
	var vars=new Array();
	if(!Array.isArray(variables)){
		$.each( variables, function( key, value ) {
			vars.push({name: key, value: value})
		});
	}
	else{
		vars=variables;
	}
	vars.push({name: 'opcion', value: nombre});
	var scripts = document.getElementsByTagName('script');
	var lastScript = scripts[scripts.length-1];
	var scriptName = lastScript.src;
	var controller=scriptName.substr(scriptName.lastIndexOf("/"),(scriptName.lastIndexOf('.')-scriptName.lastIndexOf("/")));
	if(funcion==null){
		consultasAjax[nombre]=$.post("controller"+controller+".php",vars).always(function(){consultasAjax[nombre]=null;});
	}else{
		consultasAjax[nombre]=$.post("controller"+controller+".php",vars,funcion,"json").always(function(){consultasAjax[nombre]=null;});
	}
	return consultasAjax[nombre];
}

function controladorLoad(nombre,variables=new Array(),funcion=null){
	try{consultasAjax[nombre].abort();}catch(err){}
	var vars=new Array();
	if(!Array.isArray(variables)){
		$.each( variables, function( key, value ) {
		vars.push({name: key, value: value})
		});
	}
	else{
		vars=variables;
	}
	vars.push({name: 'opcion', value: nombre});
	var scripts = document.getElementsByTagName('script');
	var lastScript = scripts[scripts.length-1];
	var scriptName = lastScript.src;
	var controller=scriptName.substr(scriptName.lastIndexOf("/"),(scriptName.lastIndexOf('.')-scriptName.lastIndexOf("/")));
	if(funcion==null){
		consultasAjax[nombre]=$("#"+nombre).load("controller"+controller+".php",vars);
	}
	else{
		consultasAjax[nombre]=$("#"+nombre).load("controller"+controller+".php",vars,funcion,"json");
	}
	return consultasAjax[nombre];
}

function mostrarMensaje(mensaje, tipo){
	$('html, body').animate({ scrollTop: 0 }, 'slow');
	$('#mensaje_texto').html(mensaje);
	$('#mensaje_servidor').removeClass('alert-danger').removeClass('alert-success').removeClass('alert-warning');
	$('#mensaje_servidor').addClass(tipo);
	$("#mensaje_servidor").fadeTo(4000, 500).slideUp(500, function(){
		$("#mensaje_servidor").slideUp(500);
	});
}

function borrarArchivo(nombre){
	$.post("controller/template.php",{opcion:"borrar_archivo",nombre:nombre});
}
