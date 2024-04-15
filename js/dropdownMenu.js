// Función para alternar la visibilidad del menú desplegable
function toggleMenu() {
    var x = document.getElementById("myDropdown");
    if (x.style.display === "block") {
        x.style.display = "none";
    } else {
        x.style.display = "block";
    }
}
