function mostrar_contra(){ var x = document.getElementById("contra"); var y = document.getElementById("c_contra"); var i = document.getElementById("btn_contra"); if (x.type === "password") {x.type = "text"; y.type = "text"; i.className="bi bi-eye-slash-fill";}else {x.type = "password"; y.type = "password"; i.className="bi bi-eye-fill"; }}

function verif_contra(){ var contra = document.getElementById("contra").value; var c_contra = document.getElementById("c_contra").value; if (contra!==c_contra) { alert("Las contraseñas son distintas"); return false; }else{return true;}}

function regresar(){ window.history.back(); }