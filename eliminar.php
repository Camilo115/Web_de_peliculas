<?php
include("db.php");

//Se recibe el nombre de usuario, para saber, que él se encuentra eliminando una película.
if (isset($_GET['usu'])) { $usu = $_GET['usu'];}

//Se identifica la película, y luego es eliminada de la base de datos, a través de su id (id_pelicula).
if (isset($_GET['id_pelicula'])) { 	$id_peli = $_GET['id_pelicula']; $sql = "DELETE FROM pelicula WHERE id_pelicula='$id_peli'"; $result = mysqli_query($conn,$sql);if (!$result) {	echo "<script>alert('Error en eliminar datos')</script>"; }else{echo "<script>alert('Eliminación de datos exitosa')</script>";}header("Location:ingreso_peli.php?usu=$usu");}

?>