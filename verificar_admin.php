<?php include("db.php");

//Se identifica el usuario, verificando su correo y contraseña en la base de datos. Si estos existen, puede ingresar al sistema, para añadir o ver la películas que se enuentran ingresada, de lo contrario, se informa que el usuario no existe.
if (isset($_POST["ingresar"])) { $correo = $_POST["correo"]; $contra = $_POST["contra"];echo "$correo $contra<br>"; $sql = "SELECT n_usuario FROM admin WHERE correo='$correo' and contra='$contra'"; $r = mysqli_query($conn,$sql);if (mysqli_num_rows($r)<1) { header("Location:admin.php?error=El usuario no existe");}else{while($row=mysqli_fetch_array($r)){ header("Location:ingreso_peli.php?usu=".$row['n_usuario']);} }}
?>