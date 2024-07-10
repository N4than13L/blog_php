$(document).ready(function () {
  var actualizar_usuario = document.getElementById("actualizar_usuario");
  $("#mensaje-actualizado").hide();

  actualizar_usuario.addEventListener("submit", (e) => {
    e.preventDefault();
    var data = new FormData(actualizar_usuario);
    fetch("actualizar_usuario.php", {
      method: "POST",
      body: data,
    });
    $("#mensaje-actualizado").show();
  });
});
