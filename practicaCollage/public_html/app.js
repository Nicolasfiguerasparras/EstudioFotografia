$(document).ready(Start);

function Start(){

    $('#generarPlantilla').click(crearTabla);

    $('#nuevaImagen').click(nuevaImagen);

    $('img.imagen_dibujo').click(seleccionarImagen);

    $('#tabla').click(modalTabla);

    $('#img').click(modalImagen);

    $('#limpiarCeldas').click(limpiarCeldas);


};

function crearTabla(){

	let numFilas = $('#filas').val();
	let numColumnas = $('#columnas').val();
	let tabla;
	let filas;
	let columnas;
	if(numFilas <= 10 && numFilas > 0 && numColumnas <= 10 && numColumnas > 0){

		tabla = $('<table></table>');

		$('#contenedor_tabla').text('');

		for(let i = 0 ; i < numFilas ; i++){

			filas = $('<tr></tr>');

			for(let j = 0 ; j < numColumnas ; j++){
				columnas = $('<td></td>');
				columnas.click(insertarImagen);
				columnas.click(contarCeldas);
				columnas.contextmenu(borrarImagen);
				columnas.contextmenu(contarCeldas);

				filas.append(columnas);
			}

			tabla.append(filas);
		}

		$('#contenedor_tabla').append(tabla);

	}
	else{

		alert('Debes introducir un numero entre 1 y 10, ambos incluidos');
	}
}

function nuevaImagen(){
	alert("Estoy en nuevaImagen");
	let url = $('#url').val();
	let img;
	let divCol;
	let divRow;
	let ultimaImagen= $('img').last();
	let countImg = $('img').length;
	let countRowImg = $('.contenedor-img .row').length;
	
	if(countImg % 5 == 0){
		alert("Añado una fila");
		img = $('<img>');
		img.addClass('imagen_dibujo');
		img.attr('src', ''+url+'');

		divCol = $('<div></div>');
		divCol.addClass('col-12 col-sm-6 col-md-4 col-lg-2 p-0');
		divRow = $('<div></div>');
		divRow.addClass('row');
		divRow.attr('id', 'countRowImg'+(countRowImg +1)+'');

		divCol.append(img);

		divRow.append(divCol);

		$('#contenedor-img').append(divRow);

	}
	else{
		alert("no añado una fila");
		img = $('<img>');
		img.addClass('imagen_dibujo');
		img.attr('src', ''+url+'');

		divCol = $('<div></div>');
		divCol.addClass('col-12 col-sm-6 col-md-4 col-lg-2 p-0');

		divCol.append(img);

		$('.contenedor-img .row').last().append(divRow);
	}
}

function insertarImagen(){

	let url = $('img.imagen_seleccionada').attr('src');

	let img = $('<img>');
	img.attr('src', ''+url+'');
	img.addClass('imgCuadrilla');
	$(this).append(img);
}

function borrarImagen(event){
	event.preventDefault();
	$(this).html('');
}

function seleccionarImagen(){

	$('img.imagen_seleccionada').removeClass('imagen_seleccionada');
	$(this).addClass('imagen_seleccionada');
}

function modalTabla(event){
	event.preventDefault();
	$('#modalTabla').modal('show');
}

function modalImagen(event){
	event.preventDefault();
	$('#modalImagen').modal('show');
}

function contarCeldas(){
	let numCeldas = $('img.imgCuadrilla').length;
	$('.numCeldas p').text(numCeldas);
}

function limpiarCeldas(){

	$('#contenedor_tabla').text('');
}

$( function() {
    $( "#dialog-confirm" ).dialog({
      resizable: false,
      height: "auto",
      width: 400,
      modal: true,
      buttons: {
        "Borrar todo": function() {
        $('#contenedor_tabla td').text('');
        alert("Borraste todo");
        },
        "Cancelar": function() {
          alert("No se borro nada");
        }
      }
    });
  } );