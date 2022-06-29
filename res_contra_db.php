<?php include ("db.php");

if (isset($_POST["enviar"])) { $correo = $_POST["correo"];$contra = $_POST["contra"]; $sql = "UPDATE admin SET contra='$contra' WHERE correo='$correo' ";$r = mysqli_query($conn,$sql);if (!$r) { header("Location:res_contra.php?error=No se pudo restablecer la contraseña"); }else{header("Location:admin.php");}}

?>