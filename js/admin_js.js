
function mostrar_contra(){
  
  var x = document.getElementById("contra");var i = document.getElementById("btn_contra");

  if (x.type === "password") {x.type = "text";i.className="bi bi-eye-slash-fill";}else {x.type = "password"; i.className="bi bi-eye-fill";}
}