$(document).ready(Start);

function Start() {
    $("#showNhide0").click(Control_0);
    $("#showNhide1").click(Control_1);
    $("#showNhide2").click(Control_2);
    $("#showNhide3").click(Control_3);
    $("#showNhide4").click(Control_4);
}

function Control_0() {
    let texto = $("#showNhide0").text();
    if(texto == "Mostrar"){
        $("#texto0").show(500);
        $("#showNhide0").text("Ocultar")
    }else{
        $("#texto0").hide(500);
        $("#showNhide0").text("Mostrar")
    }
}

function Control_1() {
    let texto = $("#showNhide1").text();
    if(texto == "Mostrar"){
        $("#texto1").show(400);
        $("#showNhide1").text("Ocultar")
    }else{
        $("#texto1").hide(500);
        $("#showNhide1").text("Mostrar")

    }
}

function Control_2() {
    let texto = $("#showNhide2").text();
    if(texto == "Mostrar"){
        $("#texto2").show(500);
        $("#showNhide2").text("Ocultar")
    }else{
        $("#texto2").hide(500);
        $("#showNhide2").text("Mostrar")
    }
}

function Control_3() {
    let texto = $("#showNhide3").text();
    if(texto == "Mostrar"){
        $("#texto3").show(500);
        $("#showNhide3").text("Ocultar")
    }else{
        $("#texto3").hide(500);
        $("#showNhide3").text("Mostrar")
    }
}

function Control_4() {
    let texto = $("#showNhide4").text();
    if(texto == "Mostrar"){
        $("#texto4").show(500);
        $("#showNhide4").text("Ocultar")
    }else{
        $("#texto4").hide(500);
        $("#showNhide4").text("Mostrar")
    }
}