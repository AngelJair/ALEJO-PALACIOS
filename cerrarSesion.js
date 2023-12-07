function Salir() {
    let text = "¿Desea cerrar sesión?";
    if (confirm(text) == true) {
        const a = document.getElementById("salir");
        a.click();
    } else {
        text = "You canceled!";
    }
}