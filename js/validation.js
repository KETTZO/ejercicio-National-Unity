function validarTitulo() {
    var titulo = document.getElementById("title").value;
    var pattern = /^[A-Za-z\sáéíóúñÁÉÍÓÚ]+$/; // Expresión regular para aceptar solo letras y espacios
    if (!pattern.test(titulo)) {
        document.getElementById("errorTitulo").style.display = "block";
        return false; // Evita que se envíe el formulario
    }
    return true; // Permite enviar el formulario
}