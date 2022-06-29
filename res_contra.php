<?php include("header.php");?>

<!DOCTYPE html>
<html>
  <head>
    <title>Restablecer contraseña</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    <link rel="stylesheet" type="text/css" href="../web_de_peliculas/styles/res_contra_css.css">
    <script src="../web_de_peliculas/js/res_contra_js.js"></script>
  </head>
<body>
  <div id="form_res_contra">
    <div class="container-fluid" id="contenedor_res_contra">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Restablezca su contraseña</h5>
          <form id="formulario" method="post" action="res_contra_db.php" onsubmit="return verif_contra();">  

           <!--Ingreso correo administrador-->    
            <div class="mb-3">
              <label for="correo" class="form-label">Ingrese su correo</label>
              <input type="email" class="form-control" name="correo" id="correo" aria-describedby="ayudaCorreo" pattern="^[a-z0-9]+(\.[_a-z0-9]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,15})$" placeholder="example@example.com" required>
                <div id="ayudaCorreo" class="form-text">Ingrese un correo válido</div>
            </div>

             <!--Ingreso contraseña administrador-->
            <label for="contra" class="form-group-text">Ingrese su contraseña y confirme</label>
              <div class="input-group mb-3">
                <input type="password" id="contra" class="form-control" name="contra" aria-describedby="ayudaContra" placeholder="User4321.">
                <input type="password" id="c_contra" class="form-control" name="c_contra" aria-describedby="ayudaContra" placeholder="User4321.">
                <span class="input-group-text" id="span_contra"><i id="btn_contra" onclick="mostrar_contra();" class="bi bi-eye-fill"></i></span>
                 <div id="ayudaContra" class="form-text">Debe incluir mayúsculas, minúsculas y un carácter especial(''¿?!¡-_.,), además, un mínimo de 8 caracteres.</div>
              </div>
              
              <!--Botones de acción-->
            <div id="btn">
              <button class="btn btn-danger" type="submit" name="ingresar">Enviar</button>
              <button class="btn btn-danger" type="button" name="cancelar" onclick="regresar();">Cancelar</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</body>
</html>