function main() {
    var showHelp = document.getElementById("help");
    var validar = document.getElementById("validar");

    showHelp.addEventListener('click', help);
    validar.addEventListener('click', validate);
}
function _delete(data) {
    var confirma = window.confirm("Borrar este elemento?");
    if (confirma == true) {
        window.location.href = 'index.php?action=delete&id=' + data.id;
    }

}
function validate() {
    var formulario = document.forms["pregunta"];
    var navegador = formulario.navegador.value ;
    var pregunta = formulario.pregunta.value ;
    var respuesta = formulario.respuesta.value ;
    
    if ((navegador == '') || (pregunta == '') || (respuesta == '')) {
        var confirma = window.confirm("Hay campos vacios. Desea continuar?");
        if(confirma == true){
            formulario.submit();
        }
    }
    formulario.submit();
}
function help() {
    alert("Tienes que rellenar todos los campos");

}
window.addEventListener('load', main());



