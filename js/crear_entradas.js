$(document).ready(function () {
  // action="guardar_entradas.php"
  var guardar_entradas = document.getElementById("guardar_entradas");

  $("#mensaje-entrada").hide();
  guardar_entradas.addEventListener("submit", (e) => {
    e.preventDefault();

    var data = new FormData(guardar_entradas);
    fetch("guardar_entradas.php", {
      method: "POST",
      body: data,
    });
    $("#guardar_entradas")[0].reset();
    $("#mensaje-entrada").show();
  });
});
