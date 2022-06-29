<?php include("header.php"); if (isset($_GET['error'])) {echo "<script>alert('$_GET[error]')</script>";}?>

<!DOCTYPE html>
<html>
<head>
	<title>Admin</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
	<link rel="stylesheet" type="text/css" href="../web_de_peliculas/styles/admin_css.css">
	<script src="../web_de_peliculas/js/admin_js.js"></script>
</head>
<body>
<div id="formulario_admin">
	<div class="container-fluid" id="contenedor_admin">
		<div class="card">
			<div class="card-body">
				<h5 class="card-title">Ingrese datos de administrador</h5>
				<form id="formulario" method="post" action="verificar_admin.php">

					<!--Ingreso correo-->
					<div class="mb-3">
						<label for="correo" class="form-label">Ingrese su correo</label>
					   	<input type="email" class="form-control" name="correo" id="correo" aria-describedby="ayudaCorreo" pattern="^[a-z0-9]+(\.[_a-z0-9]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,15})$" placeholder="example@example.com" required>
				    	<div id="ayudaCorreo" class="form-text">Ingrese un correo válido</div>
				    </div> 

				    <!--Ingreso contraseña-->
					<label for="contra" class="form-group-text">Ingrese su contraseña</label>
				    <div class="input-group mb-3">				    	
					   	<input type="password" id="contra" class="form-control" name="contra" aria-describedby="ayudaContra" placeholder="User4321.">
						<span class="input-group-text" id="span_contra"><i id="btn_contra" onclick="mostrar_contra();" class="bi bi-eye-fill"></i></span>
						<div id="ayudaContra" class="form-text">Debe incluir mayúsculas, minúsculas y un carácter especial(''¿?!¡-_.,), además, un mínimo de 8 caracteres.</div>
				    </div>

				    <!--Botón de ingreso-->
					<div id="btn">
						<button class="btn btn-danger" type="submit" name="ingresar">Ingresar</button>		    	
					</div>	
				</form>			    	
		    </div>				    
			<p>Ha olvidado su contraseña, ingrese <a class="link" href="res_contra.php">aquí</a></p>
	  		<p>Para cambiar administrador, ingrese <a class="link" href="n_admin.php">aquí</a></p>
		</div>				
	</div>
</div>			
</body>
</html>