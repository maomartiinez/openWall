$(document).ready(function () {
    cargarTodo();

    $("#btnenviar").click(function () {
        insertarComentario();
    });

});

function cargarTodo() {
    $('#muro').children().remove();
    $.ajax({
        type: "POST",
        url: "bo/ListarPubBO.php",
        success: function (data) {
            obj = JSON.parse(data);
            var html = "";
            for (i = 0; i < obj.length; i++) {
                html += "<div>" + obj[i].text_content + "</div>";
            }
            $('#muro').append(html);
        },
    });
    return false;
}


function insertarComentario() {
    var comentario = $("#comentario").val();
    if (comentario != "" && comentario != null) {
        $.ajax({
            type: "POST",
            url: "bo/insertarPubBO.php",
            data: {comentario: comentario},
            success: function (data) {
                if (data) {
                    cargarTodo();
                    $("#comentario").val("");
                } else {
                    alert("Error!");
                }
            },
        });
        return false;
    } else {
        alert("Pilas");
    }
}