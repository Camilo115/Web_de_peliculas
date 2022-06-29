<?php include("header.php"); if (isset($_GET['error'])) { echo "<script>alert('$_GET[error]')</script>"; } ?>

<!DOCTYPE html>
<html>
  <head>
    <title>Registro de administrador</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    <link rel="stylesheet" type="text/css" href="../web_de_peliculas/styles/n_admin_css.css">
    <script src="../web_de_peliculas/js/n_admin_js.js"></script>
  </head>
<body>
  <div id="form_admin">
    <div class="container-fluid" id="contenedor_nuevo_admin">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Ingrese datos de nuevo administrador</h5>
          <form id="formulario" method="post" action="registro.php" onsubmit="return verif_contra();">
            
            <!--Ingreso nombre administrador-->
            <div class="mb-3">
              <label for="nombre" class="form-label">Ingrese su nombre</label>
              <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Juan" onkeydown="preventNumberInput(event)" onkeyup="preventNumberInput(event)" required>
            </div>

             <!--Ingreso apellido administrador-->
            <div class="mb-3">
              <label for="apellido" class="form-label">Ingrese su apellido</label>
              <input type="text" class="form-control" name="apellido" id="apellido" placeholder="Pérez" onkeydown="preventNumberInput(event)" onkeyup="preventNumberInput(event)" required>
            </div>

            <!--Ingreso nombre de usuario-->
            <div class="mb-3">
              <label for="n_usu" class="form-label">Ingrese su nombre de usuario</label>
              <input type="text" class="form-control" name="n_usu" id="n_usu" aria-describedby="ayudaUsu" placeholder="usuario12345" maxlength="20" pattern="(?=^.{3,20}$)^[a-zA-Z][a-zA-Z0-9]*[._-]?[a-zA-Z0-9]+$" required>
                <div id="ayudaUsu" class="form-text">El nombre de usuario, solo debe contener letras y números</div>
            </div>

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