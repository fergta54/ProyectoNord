function toggleButton() {
  var x = document.getElementsByClassName("ElementosEliminados");
  var y = document.getElementById("tituloEliminado");
  var button = document.getElementById("botonMostrar");
  for (var i = 0; i < x.length; i++) {
    if (x[i].style.display === "none") {
      x[i].style.display = "table-row";
      y.style.display = "table-row";
      y.colspan = 6;
      button.innerHTML = "Ocultar inhabilitados";
      var color = window
        .getComputedStyle(button, null)
        .getPropertyValue("background-color");
      button.style.backgroundColor = "#F5A21B ";
    } else {
      x[i].style.display = "none";
      y.style.display = "none";
      button.innerHTML = "Mostrar inhabilitados";
      var color = window
        .getComputedStyle(button, null)
        .getPropertyValue("background-color");
      button.style.backgroundColor = "#D9CEA2";
    }
  }
}
