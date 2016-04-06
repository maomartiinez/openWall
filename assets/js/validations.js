$(document).ready(function(){

});
function validarCampo (elemento){
    var text = $(elemento).text();
        if (text !== "" && text.length<=140){
            return true;
        }else{
            return false;
        }
}