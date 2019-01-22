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
        $("#texto0").show(300);
        $("#showNhide0").text("Ocultar")
        
        $("#texto1").hide(300);
        $("#showNhide1").text("Mostrar")
        
        $("#texto2").hide(300);
        $("#showNhide2").text("Mostrar")
    }else{
        $("#texto0").hide(300);
        $("#showNhide0").text("Mostrar")
    }
}

function Control_1() {
    let texto = $("#showNhide1").text();
    if(texto == "Mostrar"){
        $("#texto1").show(300);
        $("#showNhide1").text("Ocultar")
        
        $("#texto0").hide(300);
        $("#showNhide0").text("Mostrar")
        
        $("#texto2").hide(300);
        $("#showNhide2").text("Mostrar")
    }else{
        $("#texto1").hide(300);
        $("#showNhide1").text("Mostrar")
    }
}

function Control_2() {
    let texto = $("#showNhide2").text();
    if(texto == "Mostrar"){
        $("#texto2").show(300);
        $("#showNhide2").text("Ocultar")
        
        $("#texto1").hide(300);
        $("#showNhide1").text("Mostrar")
        
        $("#texto0").hide(300);
        $("#showNhide0").text("Mostrar")
    }else{
        $("#texto2").hide(300);
        $("#showNhide2").text("Mostrar")
    }
}