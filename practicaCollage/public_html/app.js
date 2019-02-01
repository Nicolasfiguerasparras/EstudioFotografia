$(document).ready(Start);

function Start(){

    $('#generarPlantilla').click(crearTabla);

    $('#nuevaImagen').click(nuevaImagen);

    $('img.imagen_dibujo').click(seleccionarImagen);

    $('#limpiarCeldas').click(limpiarCeldas);


};

function crearTabla(){

	let numRows = $('#rows').val();
	let numCols = $('#cols').val();
	let tabla;
	let rows;
	let cols;
	if(numRows <= 10 && numRows > 0 && numCols <= 10 && numCols > 0){

		tabla = $('<numCols></numCols>');

		$('#contenedor_tabla').text('');

		for(let i = 0 ; i < numRows ; i++){

			rows = $('<tr></tr>');

			for(let j = 0 ; j < numCols ; j++){
				cols = $('<td></td>');
				cols.click(insertarImagen);
				cols.click(countCell);
				cols.contextmenu(borrarImagen);
				cols.contextmenu(countCell);

				rows.append(cols);
			}

			tabla.append(rows);
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
	let lastImage= $('img').last();
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

function countCell(){
	let cellNumber = $('img.imgCuadrilla').length;
	$('.cellNumber p').text(cellNumber);
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