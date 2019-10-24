$(document).ready(function(){
// Aqui cuento si ya se subieron los 3 titulos del proyecto de grado
contartitulo();
	// Aqui pongo el gif cuando se hace una peticion AJAX
	const loader = $('#loader3');
	loader.html('<i class="fa fa-spinner fa-pulse fa-5x fa-fw"></i><h2>Espera un momento...</h2>');
	todo = $("#todo").hide();
	setTimeout(() => {
		loader.html('');
		todo.show(); 
		todo.removeClass('d-none');
		loader.addClass('fadeOut');
	}, 2500);





	$("#tablausuariotutor").dataTable({
		"iDisplayLength": 5, //Paginacion
		language: {
			"decimal": "",
			"sProcessing":     "Procesando...",
			"sLengthMenu":     "Mostrar _MENU_ registros",
			"sZeroRecords":    "No se encontraron resultados",
			"sEmptyTable":     "Ningún dato disponible en esta tabla",
			"sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
			"sInfoEmpty":      "",
			"sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
			"sInfoPostFix":    "",
			"sSearch":         "Buscar:",
			"sUrl":            "",
			"sInfoThousands":  ",",
			"sLoadingRecords": "Cargando...",
			"oPaginate": {
				"sFirst":    "Primero",
				"sLast":     "Último",
				"sNext":     "Siguiente",
				"sPrevious": "Anterior"
			},
			"oAria": {
				"sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
				"sSortDescending": ": Activar para ordenar la columna de manera descendente"
			}
		},
		"order": [
		[0, "desc"]
		]
	}).dataTable();

	$("#tablausuariogeneral").dataTable({
		"iDisplayLength": 5, //Paginacion
		language: {
			"decimal": "",
			"sProcessing":     "Procesando...",
			"sLengthMenu":     "Mostrar _MENU_ registros",
			"sZeroRecords":    "No se encontraron resultados",
			"sEmptyTable":     "Ningún dato disponible en esta tabla",
			"sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
			"sInfoEmpty":      "",
			"sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
			"sInfoPostFix":    "",
			"sSearch":         "Buscar:",
			"sUrl":            "",
			"sInfoThousands":  ",",
			"sLoadingRecords": "Cargando...",
			"oPaginate": {
				"sFirst":    "Primero",
				"sLast":     "Último",
				"sNext":     "Siguiente",
				"sPrevious": "Anterior"
			},
			"oAria": {
				"sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
				"sSortDescending": ": Activar para ordenar la columna de manera descendente"
			}
		},
		"order": [
		[0, "desc"]
		]
	}).dataTable();

	$("#tablausuarioestuadiante").dataTable({
		"iDisplayLength": 5, //Paginacion
		language: {
			"decimal": "",
			"sProcessing":     "Procesando...",
			"sLengthMenu":     "Mostrar _MENU_ registros",
			"sZeroRecords":    "No se encontraron resultados",
			"sEmptyTable":     "Ningún dato disponible en esta tabla",
			"sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
			"sInfoEmpty":      "",
			"sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
			"sInfoPostFix":    "",
			"sSearch":         "Buscar:",
			"sUrl":            "",
			"sInfoThousands":  ",",
			"sLoadingRecords": "Cargando...",
			"oPaginate": {
				"sFirst":    "Primero",
				"sLast":     "Último",
				"sNext":     "Siguiente",
				"sPrevious": "Anterior"
			},
			"oAria": {
				"sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
				"sSortDescending": ": Activar para ordenar la columna de manera descendente"
			}
		},
		"order": [
		[0, "desc"]
		]
	}).dataTable();




});

// Aqui muestra el swall alert del tipo error
function alertaError(valorestado, valormsg) {
	swal({
		type: valorestado,
		title: 'Error',
		text: valormsg,
		showConfirmButton: false,
		timer: 3000
	});
}
// Aqui muestra el swall alert del tipo success
function alertaSuccess(valorestado, valormsg) {
	swal({
		type: valorestado,
		title: 'Exito',
		text: valormsg,
		showConfirmButton: false,
		timer: 3000
	});
}

function recargarPagina(direccion) {
	if (direccion.length > 0) {
		setTimeout(function () {
			window.location.replace(direccion);
		}, 2000);
	} else {
		setTimeout(function () {
			window.location.reload(true);
		}, 2000);
	}
}
//Funcion slider index
var owl = $('.owl-carousel');
owl.owlCarousel({
	loop: true,
	margin: 25,
	autoplay: true,
	autoplayTimeout: 6000,
	autoplayHoverPause: false,
	responsive: {
		0: {
			items: 1,
			nav: true
		},
		600: {
			items: 2,
			nav: true
		},
		760: {
			items: 3,
			nav: true,
		},
		1000: {
			items: 4,
			nav: true,
		}
	}
});

// Este codigo borra todo cuando se cierra el modal
$('#vertitulos').on('hidden.bs.modal', function () {
	$("#modaltitulosusuario").html('');
});

$("#cerrar").on('click',function(e){
	e.preventDefault();
	$.post("src/Controlador/usuario.php?op=cerrar", {}, function () {
	}).done(function(){
		// console.log(data);
		window.location.reload(true);
	}).fail(function(data){
		console.log(data.responseText);
	});
});

$("#entrar").on('click',function(e){
	e.preventDefault();
	usuario = $("#usuario").val();
	contrasena = $("#password").val(); 

	$.post("src/Controlador/usuario.php?op=entrar", {'usuario':usuario,'contrasena':contrasena}, function () {
	}).done(function(data){
		// Revisar aqui
		datos = JSON.parse(data);
		valorestado = datos.estado.type;
		valormsg =  datos.estado.msg;

		if (valorestado == 'error') {
			alertaError(valorestado, valormsg);
		}else if (valorestado == 'success') {
			alertaSuccess(valorestado, valormsg);
			direccion = '';
			recargarPagina(direccion);
		}
	}).fail(function(data){
		console.log(data.responseText);
	});
});

// Revisar esto aqui
$("#registrartitulo").on('click', function(event) {
	event.preventDefault();
	titulo = $("#titulo").val();
	// descripcion = $("#descripcion").val();
	descripcion = '';
	sugerirtutor = $("#sugerirtutor").val();

	titulo1 = $("#titulo1").val();
	// descripcion1 = $("#descripcion1").val();
	descripcion1 = '';
	sugerirtutor1 = $("#sugerirtutor1").val();

	titulo2 = $("#titulo2").val();
	// descripcion2 = $("#descripcion2").val();
	descripcion2 = '';
	sugerirtutor2 = $("#sugerirtutor2").val();

	$.post("src/Controlador/trabajo.php?op=registrartitulo", {'titulo':titulo,'descripcion':descripcion,'sugerirtutor':sugerirtutor,
		'titulo1':titulo1,'descripcion1':descripcion1,'sugerirtutor1':sugerirtutor1,
		'titulo2':titulo2,'descripcion2':descripcion2,'sugerirtutor2':sugerirtutor2}, function () {
		}).done(function(data){
			// console.log(data);
			datos = JSON.parse(data);
			valorestado = datos.estado.type;
			valormsg =  datos.estado.msg;

			if (valorestado == 'error') {
				alertaError(valorestado, valormsg);
			}else if (valorestado == 'success') {
				alertaSuccess(valorestado, valormsg);
				direccion = '';
				recargarPagina(direccion);
			}

		}).fail(function(data){
			console.log(data.responseText);
		});

	});

function mostrartutor(){
	$.post("src/Controlador/trabajo.php?op=sugerirtutor", function () {
	}).done(function(data){
		$("#sugerirtutor").html(data);
		$("#sugerirtutor1").html(data);
		$("#sugerirtutor2").html(data);
	}).fail(function(data){
		console.log(data.responseText);
	});
}
mostrartutor();

function mostrarjurado(){
	$.post("src/Controlador/trabajo.php?op=sugerirtutor", function () {
	}).done(function(data){
		$("#sugerirjurado").html(data);
		$("#sugerirjurado1").html(data);
		$("#sugerirjurado2").html(data);
	}).fail(function(data){
		console.log(data.responseText);
	});
}
mostrarjurado();

$("#subirnotaform").on('submit',function(e){
	e.preventDefault();
	valorform = $("#subirnotaform").serialize();
	console.log(valorform);
	$.post("src/Controlador/trabajo.php?op=subirnotatrabajo",valorform, function () {
	}).done(function(data){
		console.log(data);
		datos = JSON.parse(data);
		valorestado = datos.estado.type;
		valormsg =  datos.estado.msg;
		if (valorestado == 'error') {
			alertaError(valorestado, valormsg);
		}else if (valorestado == 'success') {
			alertaSuccess(valorestado, valormsg);
		}
	}).fail(function(data){
		console.log(data.responseText);
	});
});


function contartitulo(){
	$.post("src/Controlador/trabajo.php?op=contartitulo", function () {
	}).done(function(data){
		datos = JSON.parse(data);
		valorcantidad = datos.datos;

		if (valorcantidad=='0') {
			$("#iniciartitulo").removeClass('d-none');
		}else{
			$("#iniciartitulo").html('');
		}

	}).fail(function(data){
		console.log(data.responseText);
	});
}



function trabajosdetutoriados(){
	tabla0 = $("#trabajosdetutoriados").dataTable({
		"iDisplayLength": 5, //Paginacion
		language: {
			"decimal": "",
			"sProcessing":     "Procesando...",
			"sLengthMenu":     "Mostrar _MENU_ registros",
			"sZeroRecords":    "No se encontraron resultados",
			"sEmptyTable":     "Ningún dato disponible en esta tabla",
			"sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
			"sInfoEmpty":      "",
			"sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
			"sInfoPostFix":    "",
			"sSearch":         "Buscar:",
			"sUrl":            "",
			"sInfoThousands":  ",",
			"sLoadingRecords": "Cargando...",
			"oPaginate": {
				"sFirst":    "Primero",
				"sLast":     "Último",
				"sNext":     "Siguiente",
				"sPrevious": "Anterior"
			},
			"oAria": {
				"sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
				"sSortDescending": ": Activar para ordenar la columna de manera descendente"
			}
		},
		"bDestroy": true,
		"bProcessing": true,
		"bServerSide": true,
		"bPaginate": true,
		"ajax": {
			url: 'src/Controlador/trabajo.php?op=trabajosdetutoriados',
			type: "post",
			dataType: "json",
			beforeSend: function () {
				$(".cuerpo").css('filter', 'blur(2px)');
			},
			error: function (e) {
				console.log(e.responseText);
			},
			complete: function () {
				$(".cuerpo").css('filter', 'blur(0px)');
			}
		},
		"order": [
		[0, "desc"]
		]
	}).dataTable();
}

trabajosdetutoriados();

function trabajosparatutores() {
	tabla0 = $("#trabajosparatutores").dataTable({
		"iDisplayLength": 5, //Paginacion
		language: {
			"decimal": "",
			"sProcessing":     "Procesando...",
			"sLengthMenu":     "Mostrar _MENU_ registros",
			"sZeroRecords":    "No se encontraron resultados",
			"sEmptyTable":     "Ningún dato disponible en esta tabla",
			"sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
			"sInfoEmpty":      "",
			"sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
			"sInfoPostFix":    "",
			"sSearch":         "Buscar:",
			"sUrl":            "",
			"sInfoThousands":  ",",
			"sLoadingRecords": "Cargando...",
			"oPaginate": {
				"sFirst":    "Primero",
				"sLast":     "Último",
				"sNext":     "Siguiente",
				"sPrevious": "Anterior"
			},
			"oAria": {
				"sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
				"sSortDescending": ": Activar para ordenar la columna de manera descendente"
			}
		},
		"bDestroy": true,
		"bProcessing": true,
		"bServerSide": true,
		"bPaginate": true,
		"ajax": {
			url: 'src/Controlador/trabajo.php?op=trabajosparatutores',
			type: "post",
			dataType: "json",
			beforeSend: function () {
				$(".cuerpo").css('filter', 'blur(2px)');
			},
			error: function (e) {
				console.log(e.responseText);
			},
			complete: function () {
				$(".cuerpo").css('filter', 'blur(0px)');
			}
		},
		"order": [
		[0, "desc"]
		]
	}).dataTable();
}
trabajosparatutores();

function vertitulos(id){
	console.log(id);
	$.post("src/Controlador/trabajo.php?op=mostrartitulosusuario", {'id':id}, function () {
	}).done(function(data){
		$("#modaltitulosusuario").html(data);
	}).fail(function(data){
		console.log(data.responseText);
	});
}
function vertutores(id){
	$('#vertitulos').modal('hide');
	$.post("src/Controlador/trabajo.php?op=mostrarinfotitulo", {'id':id}, function () {
	}).done(function(data){
		$("#modaltutorestitulo").html(data);
	}).fail(function(data){
		console.log(data.responseText);
	});
}

function registrartutortitulo(idtitulo,idusuario){
	$.post("src/Controlador/trabajo.php?op=registrartutortitulo", {'idtitulo':idtitulo,'idusuario':idusuario}, function () {
	}).done(function(data){
		$('#vertutores').modal('hide');
		datos = JSON.parse(data);
		valorestado = datos.estado.type;
		valormsg =  datos.estado.msg;

		if (valorestado == 'error') {
			alertaError(valorestado, valormsg);
		}else if (valorestado == 'success') {
			alertaSuccess(valorestado, valormsg);
		}
	}).fail(function(data){
		console.log(data.responseText);
	});
}

function verdetallesdeltrabajo(id){
	console.log(id);
	$.post("src/Controlador/trabajo.php?op=mostrarcapitulosestudiante", {'idusuario':id}, function () {
	}).done(function(data){
		$("#modaltrabajousuario").html(data);
	}).fail(function(data){
		console.log(data.responseText);
	});
}

function verInformacionTrabajo(id){
	console.log(id);
}

function mostrartituloen1(){
	$.post("src/Controlador/trabajo.php?op=mostrartituloen1", {}, function () {
	}).done(function(data){
		// console.log(data);
		$("#mostrartituloen1").html(data);
	}).fail(function(data){
		console.log(data.responseText);
	});
}
mostrartituloen1();

function vertrabajousuario(){
	$.post("src/Controlador/trabajo.php?op=vertrabajousuario", {}, function () {
	}).done(function(data){

		datos = JSON.parse(data);
		valorcantidad = datos.datos;

		if (valorcantidad=='') {
			$("#form_subir_capitulo").html('');
		}else{
			$("#idtrabajo").val(valorcantidad);
		}
	}).fail(function(data){
		console.log(data.responseText);
	});	
}
vertrabajousuario();

$("#form_subir_capitulo").on('submit',function(e){
	e.preventDefault();
	var formdatanuevo = new FormData(document.getElementById('form_subir_capitulo'));
	$.ajax({
		type: "POST",
		url: "src/Controlador/trabajo.php?op=subircapitulos",
		data: formdatanuevo,
		cache: false,
		contentType: false,
		processData: false,
		success: function(data) {
			datos = JSON.parse(data);
			valorestado = datos.estado.type;
			valormsg =  datos.estado.msg;

			if (valorestado == 'error') {
				alertaError(valorestado, valormsg);
			}else if (valorestado == 'success') {
				alertaSuccess(valorestado, valormsg);
			}
			revisarloscapitulosensistema();
			contarcapitulosusuario();
			$('#botonsubircapitulo').attr('disabled', true);
		},
		error: function(xhr,msg,excep) { console.log('Error: ' + msg + '/ ' + excep); }
	});
});

const toast = swal.mixin({
	toast: true,
	position: 'top-end',
	showConfirmButton: false,
	timer: 3000
});

function revisarloscapitulosensistema(){
	$.post("src/Controlador/trabajo.php?op=revisarloscapitulosensistema", {}, function () {
	}).done(function(data){
		$("#revisarloscapitulosensistema").html(data);
	}).fail(function(data){
		console.log(data.responseText);
	});	
}
revisarloscapitulosensistema();


function contarcapitulosusuario(){
	$.post("src/Controlador/trabajo.php?op=contarcapitulosusuario", {}, function () {
	}).done(function(data){
		$("#contarcapitulosusuario").html(data);
		if (data=='6') {
			$("#form_subir_capitulo").html("<div class='alert alert-info' role='alert'><h5>Se subio todos los capitulos con <strong>exito</strong></h5></div>");
		}
	}).fail(function(data){
		console.log(data.responseText);
	});	

}
contarcapitulosusuario();


$('input#capitulo[type="file"]').change(function () {
	var ext = this.value.match(/\.(.+)$/)[1];

	$.post("src/Controlador/trabajo.php?op=verificarestadocapitulo", {}, function () {
	}).done(function(data){
		datos = JSON.parse(data);
		// console.log(datos);
		valoridcapitulo = datos.datos.idcapitulo;
		valornumerocapitulo = datos.datos.numero_capitulo;
		valorestado = datos.datos.estado;

// console.log("valornumerocapitulo: "+valornumerocapitulo);

switch (valornumerocapitulo) {
	case '0':
	if (valorestado == '0') {
// Aqui puedo subir el capitulo
switch (ext) {
// Subir los capitulos
case 'docx':
$('#botonsubircapitulo').attr('disabled', false);
break;
case 'doc':
$('#botonsubircapitulo').attr('disabled', false);
break;
case 'pdf':
$('#botonsubircapitulo').attr('disabled', false);
break;
default:
console.log('Formato de archivo no permitido');
$('#botonsubircapitulo').attr('disabled', true);
this.value = '';
break;
}
}
break;
case '1':
switch (valorestado) {
	case '0':
	$('#botonsubircapitulo').attr('disabled', true);
	break;
	case '1':

	switch (ext) {
// Subir los capitulos
case 'docx':
$('#botonsubircapitulo').attr('disabled', false);
break;
case 'doc':
$('#botonsubircapitulo').attr('disabled', false);
break;
case 'pdf':
$('#botonsubircapitulo').attr('disabled', false);
break;
default:
console.log('Formato de archivo no permitido');
$('#botonsubircapitulo').attr('disabled', true);
this.value = '';
break;
}
break;
default:
break;
}
break;
case '2':
switch (valorestado) {
	case '0':
	$('#botonsubircapitulo').attr('disabled', true);
	break;
	case '1':
	switch (ext) {
// Subir los capitulos
case 'docx':
$('#botonsubircapitulo').attr('disabled', false);
break;
case 'doc':
$('#botonsubircapitulo').attr('disabled', false);
break;
case 'pdf':
$('#botonsubircapitulo').attr('disabled', false);
break;
default:
console.log('Formato de archivo no permitido');
$('#botonsubircapitulo').attr('disabled', true);
this.value = '';
break;
}
break;
default:
break;
}
break;
case '3':
switch (valorestado) {
	case '0':
	$('#botonsubircapitulo').attr('disabled', true);
	break;
	case '1':
	switch (ext) {
// Subir los capitulos
case 'docx':
$('#botonsubircapitulo').attr('disabled', false);
break;
case 'doc':
$('#botonsubircapitulo').attr('disabled', false);
break;
case 'pdf':
$('#botonsubircapitulo').attr('disabled', false);
break;
default:
console.log('Formato de archivo no permitido');
$('#botonsubircapitulo').attr('disabled', true);
this.value = '';
break;
}
break;
default:
break;
}
break;
case '4':
switch (valorestado) {
	case '0':
	$('#botonsubircapitulo').attr('disabled', true);
	break;
	case '1':
	switch (ext) {
// Subir los capitulos
case 'docx':
$('#botonsubircapitulo').attr('disabled', false);
break;
case 'doc':
$('#botonsubircapitulo').attr('disabled', false);
break;
case 'pdf':
$('#botonsubircapitulo').attr('disabled', false);
break;
default:
console.log('Formato de archivo no permitido');
$('#botonsubircapitulo').attr('disabled', true);
this.value = '';
break;
}
break;
default:
break;
}
break;
case '5':
switch (valorestado) {
	case '0':
	$('#botonsubircapitulo').attr('disabled', true);
	break;
	case '1':
	switch (ext) {
// Subir los capitulos
case 'docx':
$('#botonsubircapitulo').attr('disabled', false);
break;
case 'doc':
$('#botonsubircapitulo').attr('disabled', false);
break;
case 'pdf':
$('#botonsubircapitulo').attr('disabled', false);
break;
default:
console.log('Formato de archivo no permitido');
$('#botonsubircapitulo').attr('disabled', true);
this.value = '';
break;
}
break;
default:
break;
}
break;
default:
break;
}

});
});

function aprobarcapitulo(id){
	console.log(id);
	$.post("src/Controlador/trabajo.php?op=aprobarcapitulo", {'idcapitulo':id}, function () {
	}).done(function(data){
		$('#verdetallesdeltrabajo').modal('hide');
		datos = JSON.parse(data);
		tipodevuelto = datos.estado.type;
		msgdevuelto =  datos.estado.msg;
		swal({
			position: 'top-end',
			type: tipodevuelto,
			title: msgdevuelto,
			showConfirmButton: false,
			timer: 2000
		});
	}).fail(function(data){
		console.log(data.responseText);
	});
} 
function desaprobarcapitulo(id){
	console.log(id);
	$.post("src/Controlador/trabajo.php?op=desaprobarcapitulo", {'idcapitulo':id}, function () {
	}).done(function(data){
		$('#verdetallesdeltrabajo').modal('hide');
		datos = JSON.parse(data);
		tipodevuelto = datos.estado.type;
		msgdevuelto =  datos.estado.msg;
		swal({
			position: 'top-end',
			type: tipodevuelto,
			title: msgdevuelto,
			showConfirmButton: false,
			timer: 2000
		});
	}).fail(function(data){
		console.log(data.responseText);
	});
}

function editarcapitulo(id){
	$("#idcapitulo").val(id);
}


$("#form_editar_capitulo").on('submit',function(e){
	e.preventDefault();

	var formdatanuevo = new FormData(document.getElementById('form_editar_capitulo'));
	$.ajax({
		type: "POST",
		url: "src/Controlador/trabajo.php?op=editarcapitulo",
		data: formdatanuevo,
		cache: false,
		contentType: false,
		processData: false,
		success: function(data) {
			$('#editarcapitulo').modal('hide');
			$('#botoneditarcapitulo').attr('disabled', true);
			revisarloscapitulosensistema();
			contarcapitulosusuario();
			datos = JSON.parse(data);
			tipodevuelto = datos.estado.type;
			msgdevuelto =  datos.estado.msg;
			swal({
				position: 'top-end',
				type: tipodevuelto,
				title: msgdevuelto,
				showConfirmButton: false,
				timer: 2000
			});
		},
		error: function(xhr,msg,excep) { console.log('Error: ' + msg + '/ ' + excep); }
	});
});



$('input#capituloeditar[type="file"]').change(function () {
	var ext = this.value.match(/\.(.+)$/)[1];
	switch (ext) {
// Subir los capitulos
case 'docx':
$('#botoneditarcapitulo').attr('disabled', false);
break;
case 'doc':
$('#botoneditarcapitulo').attr('disabled', false);
break;
case 'pdf':
$('#botoneditarcapitulo').attr('disabled', false);
break;
default:
// console.log('Formato de archivo no permitido');
alertaError('error', 'Formato de archivo no permitido');
$('#botoneditarcapitulo').attr('disabled', true);
this.value = '';
break;
}
});



$("#btn_buscar_index").on('click',function(e){
	e.preventDefault();
	buscar_tesis = $("#buscar_tesis").val();
	if (buscar_tesis.trim()=='') {
		$("#modaltrabajo").html('<div class="text-dark">Debes colocar algo en el buscador<div>');
	}else{

		$.post("src/Controlador/trabajo.php?op=buscartitulo", {'buscar_tesis':buscar_tesis}, function () {
		}).done(function(data){
		// console.log(data);
		$("#modaltrabajo").html(data);
	}).fail(function(data){
		console.log(data.responseText);
	});

}

});


$("#enviarcorreorestablecer").on('submit',function(e){
	e.preventDefault();
	correo = $("#enviarcorreorestablecer").serialize();

	$.post('src/Controlador/usuario.php?op=restablecercorreo',correo,function(){}).done(function(data){
		console.log(data);
		datos = JSON.parse(data);
		tipodevuelto = datos.estado.type;
		msgdevuelto =  datos.estado.msg;
		swal({
			position: 'top-end',
			type: tipodevuelto,
			title: msgdevuelto,
			showConfirmButton: false,
			timer: 2000
		});
	}).fail(function(data){
		console.log(data);
	});

});

$('#btnreiniciar').on('click', function (e) {
	e.preventDefault();
// http://localhost/HechoPorMi/Sistema%20Tesis/?menu=recuperar-clave&fp_code=3a315aedbbe4eef151657e001b938de3
password = $("#password").val();
confirm_password = $("#confirm_password").val();
fp_code = $("#fp_code").val();

$.post("src/Controlador/usuario.php?op=enviarContrasena", {
	"password": password,
	"confirm_password": confirm_password,
	"fp_code": fp_code
}, function () {}).done(function (data) {
	console.log(data);
	datos = JSON.parse(data);
	valorestado = datos.estado.type;
	valormsg = datos.estado.msg;

	switch (valorestado) {
		case 'success':
		$('body').html('');
		direccion = 'index.php';
		alertaSuccess(valorestado, valormsg);
		recargarPagina(direccion);
		break;
		case 'error':
				// $('#loader3').html('');
				alertaError(valorestado, valormsg);
				break;
				default:
				break;
			}


		}).fail(function () {
			valorestado = 'error';
			valormsg = 'Hubo un error al hacer la petición';
			alertaError(valorestado, valormsg);
		});
	});

$("#registrousuarionuevo").on('submit',function(e){
	e.preventDefault();
	datosform = $("#registrousuarionuevo").serialize();
	console.log(datosform);
	$.post('src/Controlador/usuario.php?op=registrarusuarioenadmin',datosform,function(){}).done(function(data){
		console.log(data);
		datos = JSON.parse(data);
		tipodevuelto = datos.estado.type;
		msgdevuelto =  datos.estado.msg;
		swal({
			position: 'top-end',
			type: tipodevuelto,
			title: msgdevuelto,
			showConfirmButton: false,
			timer: 2000
		});
	}).fail(function(data){
		console.log(data);
	});

});


$("#formregistrousuario").on('submit',function(e){
	e.preventDefault();
	datosform = $("#formregistrousuario").serialize();
	console.log(datosform);
	$.post('src/Controlador/usuario.php?op=registrousuariologin',datosform,function(){}).done(function(data){
		console.log(data);
		datos = JSON.parse(data);
		tipodevuelto = datos.estado.type;
		msgdevuelto =  datos.estado.msg;
if (tipodevuelto=='success') {
		swal({
			position: 'top-end',
			type: tipodevuelto,
			title: msgdevuelto,
			showConfirmButton: false,
			timer: 2000
		});
}else{
			swal({
			position: 'top-end',
			type: tipodevuelto,
			title: msgdevuelto,
			showConfirmButton: false,
			timer: 2000
		});
}

	}).fail(function(data){
		console.log(data);
	});

});

// var timeout = null
$('#cedula_user').on('keyup', function() {
	var cedula = this.value;

	$.post('src/Controlador/usuario.php?op=verificarcedula',{'cedula_up_usuario':cedula},function(){}).done(function(data) {
		console.log(data);
		datos = JSON.parse(data);
		tipodevuelto = datos.estado.type;
		msgdevuelto =  datos.estado.msg;
		if (tipodevuelto == 'success') {
			$("#alerterror").addClass('d-none'); 
			$("#alertsuccess").removeClass('d-none'); 
			$("#btnregistrarusu").attr('disabled',false);
		}else{
			$("#alertsuccess").addClass('d-none'); 
			$("#alerterror").removeClass('d-none');
			$("#btnregistrarusu").attr('disabled',true);
		}
	}).fail(function(data){
		console.log(data);
	});

});


$("#cerrarerror").on('click',function(e){
	e.preventDefault();
	$("#alerterror").addClass('d-none');
});
$("#cerrarsuccess").on('click',function(e){
	e.preventDefault();
	$("#alertsuccess").addClass('d-none');
});

$("#actualizarusuario").on('submit',function(e){
	e.preventDefault();

	var formdatanuevo = new FormData(document.getElementById('actualizarusuario'));
	$.ajax({
		type: "POST",
		url: "src/Controlador/usuario.php?op=actualizarusuario",
		data: formdatanuevo,
		cache: false,
		contentType: false,
		processData: false,
		success: function(data) {
			console.log(data);
			datos = JSON.parse(data);
			tipodevuelto = datos.estado.type;
			msgdevuelto =  datos.estado.msg;
			swal({
				position: 'top-end',
				type: tipodevuelto,
				title: msgdevuelto,
				showConfirmButton: false,
				timer: 2000
			});
			direccion='';
			recargarPagina(direccion);
		},
		error: function(xhr,msg,excep) { console.log('Error: ' + msg + '/ ' + excep); }
	});

});


function selectvicerrectorado(){
	$.post('src/Controlador/usuario.php?op=selectvicerrectorado',{},function(){}).done(function(data){
		console.log(data);
		$("#vice_user").html(data); 
	}).fail(function(data){
		console.log(data);
	});
}
selectvicerrectorado();

$("#vice_user").change(function() {
	vice_user = $("#vice_user").val();
	$.post('src/Controlador/usuario.php?op=selectprograma',{'vicerrectorado':vice_user},function(){}).done(function(data){
		console.log(data);
		$("#pro_user").html(data); 
	}).fail(function(data){
		console.log(data);
	});
}); 

$("#pro_user").change(function() {
	pro_user = $("#pro_user").val();
	$.post('src/Controlador/usuario.php?op=selectsubprograma',{'programa':pro_user},function(){}).done(function(data){
		console.log(data);
		$("#subp_user").html(data); 
	}).fail(function(data){
		console.log(data);
	});
});


function desaprobartitulos(idusuario){
	console.log(idusuario);
	$("#vertitulos").modal('hide');
	$("#idusuariomensaje").val(idusuario);
}

$("#mensajedesaprobartitulos").on('submit',function(e){
	e.preventDefault();
	mensajedesaprobartitulos = $("#mensajedesaprobartitulos").serialize();
	console.log(mensajedesaprobartitulos);
	$.post('src/Controlador/trabajo.php?op=desaprobartitulos',{mensajedesaprobartitulos},function(){}).done(function(data){
		console.log(data);
	}).fail(function(data){
		console.log(data);
	});

});


function subirnotas(idcapitulo){
// console.log(idcapitulo);
$("#capituloid").val(idcapitulo);
$("#cerrarModal").click();
}


function vernota(capituloid){
	console.log(capituloid);
	$.post('src/Controlador/trabajo.php?op=vernota', {'capituloid': capituloid}, function(){}).done(function(data){
		console.log(data);
		$('#vernotasusuario').html(data);
	});

	// vernotasusuario
}