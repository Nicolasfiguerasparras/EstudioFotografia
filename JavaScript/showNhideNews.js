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
        
        $("#texto2").hide();
        $("#showNhide2").text("Mostrar")
    }else{
        $("#texto1").hide(0);
        $("#showNhide1").text("Mostrar")
        
        $("#texto2").show(300);
        $("#showNhide2").text("Ocultar")
    }
}

function Control_2() {
    let texto = $("#showNhide2").text();
    if(texto == "Mostrar"){
        $("#texto2").show(300);
        $("#showNhide2").text("Ocultar")
        
        $("#texto1").hide();
        $("#showNhide1").text("Mostrar")
    }else{
        $("#texto2").hide();
        $("#showNhide2").text("Mostrar")
        
        $("#texto1").show(300);
        $("#showNhide1").text("Ocultar")
    }
}

function Control_3() {
    let texto = $("#showNhide3").text();
    if(texto == "Mostrar"){
        $("#texto3").show(300);
        $("#showNhide3").text("Ocultar")
        
        $("#texto4").hide();
        $("#showNhide4").text("Mostrar")
    }else{
        $("#texto3").hide();
        $("#showNhide3").text("Mostrar")
        
        $("#texto4").show(300);
        $("#showNhide4").text("Ocultar")
    }
}

function Control_4() {
    let texto = $("#showNhide4").text();
    if(texto == "Mostrar"){
        $("#texto4").show(300);
        $("#showNhide4").text("Ocultar")
        
        $("#texto3").hide();
        $("#showNhide3").text("Mostrar")
    }else{
        $("#texto4").hide();
        $("#showNhide4").text("Mostrar")
        
        $("#texto3").show(300);
        $("#showNhide3").text("Ocultar")
    }
}