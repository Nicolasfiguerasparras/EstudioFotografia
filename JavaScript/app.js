$(document).ready(Start);

function Start(){
    $(".contextMenu").hide();
    $(document).contextmenu(prevent_default).contextmenu(showContent).click(hideContent).contextmenu(pointerPosition);
    $(".wMap").hide();
    $("a.deleteButton").click(confirmDelete);
    $("a.up").click(goUp);
    $("a.down").click(goDown);
    $("button.showMap").click(showWebMap);
    $("button.hideMap").click(hideWebMap);
    
}

// Creamos una función que nos hace el seguimiento del puntero
function pointerPosition(event){
    let x = event.pageX;
    let y = event.pageY;
    let posicion = {};
    // Creamos un array para añadir las dos posiciones posibles (top y left)
    posicion["top"] = y;
    posicion["left"] = x; 
    $("div.contextMenu").offset(posicion);
    $("div.contextMenu").css("position","absolute");
}

// Creamos una función que previene el estado por defecto
function prevent_default(event){
    event.preventDefault();
}

// Creamos la función que muestra el menú
function showContent(){
    $("div.contextMenu").show();
}

// Creamos la función que oculta el menú
function hideContent(){
    $("div.contextMenu").hide();
}

// Creamos una función que nos pide confirmación en caso de eliminar un registro en la base de datos    
function confirmDelete(event){
    if(!confirm("¿Desea eliminar el registro?")){
        event.preventDefault();
    }
}
    

// Creo funciones para subir a la parte de arriba de la página y bajar hasta abajo
function goUp(event){
    event.preventDefault();
    $("html, body").animate({scrollTop: 0 }, "slow");
}
function goDown(){
    $('html, body').animate({scrollTop: $($(this).attr('href'))}, 'slow');
}

// Creo las funciones mostrar y ocultar el mapa web
function showWebMap(){
    $(".wMap").fadeIn("slow");
}
function hideWebMap(){
    $(".wMap").fadeOut("slow");
}