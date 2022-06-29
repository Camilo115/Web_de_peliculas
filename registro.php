<?php include("db.php");

if (isset($_POST["enviar"])) { 	$nom = $_POST["nombre"]; $ape = $_POST["apellido"]; $correo = $_POST["correo"]; $n_usu = $_POST["n_usu"];$contra = $_POST["contra"];

	$sql = "INSERT INTO admin(nombre,apellido,correo,n_usuario,contra) VALUES ('$nom','$ape','$correo','$n_usu','$contra')"; $r = mysqli_query($conn,$sql);

	if (!$r) { header("Location:n_admin.php?error=No se pudo registrar administrador");	}else{header("Location:admin.php");	} }
?>