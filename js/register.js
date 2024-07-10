$(document).ready(function () {
  //  action="registro.php" method="POST"
  var register = document.getElementById("register");

  $("#mensaje-registro").hide();
  register.addEventListener("submit", (e) => {
    e.preventDefault();

    var data = new FormData(register);
    fetch("registro.php", {
      method: "POST",
      body: data,
    });
    $("#register")[0].reset();
    $("#mensaje-registro").show();
  });
});
