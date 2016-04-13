$(document).ready(function () {
    var numero = 150;
    $("#contador").text(numero);
    $("#comentario").keyup(function () {
        numero = 150 - $("#comentario").val().length;
        $("#contador").text(numero);
        $("#contador").css("color", "black");
        if (numero < 0) {
            $("#contador").css("color", "red");
        } 
    });
});