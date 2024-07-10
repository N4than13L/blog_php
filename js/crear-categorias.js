$(document).ready(function () {
  //  action="guardar_categoria.php" method="POST"
  var crear_categoria = document.getElementById("crear_categoria");

  $("#mensaje-categoria").hide();
  crear_categoria.addEventListener("submit", (e) => {
    e.preventDefault();

    var data = new FormData(crear_categoria);
    fetch("guardar_categoria.php", {
      method: "POST",
      body: data,
    });
    $("#crear_categoria")[0].reset();
    $("#mensaje-categoria").show();
  });
});
