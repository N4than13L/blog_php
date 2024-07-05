$(document).ready(function () {
  $("#texto-muestra").hide();

  $("#ayuda").on("click", function () {
    $("#texto-muestra").show();
  });

  $("#cerrar-msj").on("click", function () {
    $("#texto-muestra").hide();
  });
});
