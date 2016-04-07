$(document).ready(function () {
    cargarTodo();
});

function cargarTodo() {
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