<?php
include("header.php");include("db.php");error_reporting(0); if (isset($_GET["usu"])) {$usu = $_GET["usu"];} $old_image="";

if (isset($_GET['id_pelicula'])) {

	// A través de 'id_pelicula', se identifica la película que se quiere modificar.
	$id_peli = $_GET['id_pelicula']; $sql = "SELECT * FROM pelicula WHERE id_pelicula=$id_peli"; $r = mysqli_query($conn,$sql);

    //Cuando la película es encontrada, se solicita la información de esta, a la base de datos.
	while($row=mysqli_fetch_array($r)){ $nombre = $row["nombre"]; $director = $row["director"]; $anio = $row["anio"]; $ns_prota = $row["ns_prota"]; $descrip = $row["descrip"];	$video = $row["video"];}

	//Cuando se presione el botón guardar, se envian los datos modificados de la película, en el caso de que uno de estos, haya sido modificado.
	if (isset($_POST["guardar"])) { $n_nombre = $_POST["n_peli"]; $n_direct = $_POST["n_direct"]; $n_anio = $_POST["anio"]; $n_ns_prota = $_POST["ns_prota"]; $n_descrip = $_POST["descrip"]; $n_video = $_POST["video"];

		if ($n_nombre=="") {$n_nombre = "Sin datos";}
		if ($n_direct=="") {$n_direct = "Sin datos";}
		if ($n_anio=="") {$n_anio = 0;}
		if ($n_ns_prota=="") {$n_ns_prota = "Sin datos";}
		if ($n_descrip=="") {$n_descrip= "Sin datos";}
		if ($n_video=="") {$n_video = "Sin datos";}
		if ($n_nombre=="") {$n_nombre = "Sin datos";}

		if ($nombre!==$n_nombre || $director!==$n_direct || $anio!==$n_anio || $ns_prota!==$n_ns_prota || $descrip!==$n_descrip || $video!==$n_video) {
			$update="UPDATE pelicula SET nombre='$n_nombre',director='$n_direct',anio='$n_anio',ns_prota='$n_ns_prota',descrip='$n_descrip',video='$n_video' WHERE id_pelicula=$id_peli";$result = mysqli_query($conn,$update);
			if (!$result){echo "<script>alert('No se ha podido actualizar la información')</script>";}else{ echo "<script>window.location='ingreso_peli.php?usu=".$usu."&msg_edit=El cambio fue realizado con éxito'</script>"; }}

		if (empty($_FILES['image']['name'])) {echo "<script>window.location='ingreso_peli.php?usu=".$usu."'</script>";}else{if (isset($_FILES['image']['name']) && ($_FILES['image']['name']!="" )) {$size=$_FILES['image']['size'];$temp=$_FILES['image']['tmp_name'];$type=$_FILES['image']['type'];
			   $name=$_FILES['image']['name'];unlink("imagenes/$old_image");move_uploaded_file($temp, "imagenes/$name");}else{$name = $old_image;}
			$update_img = "UPDATE pelicula SET img='$name' WHERE id_pelicula=$id_peli";$result = mysqli_query($conn,$update_img);
			if (!$result) { echo "<script>alert('Error al modificar imagen')</script>";}else{echo "<script>window.location='ingreso_peli.php?usu=".$usu."&msg_edit=El cambio fue realizado con éxito'</script>";}}}
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Edite la película</title>
	<script src="../web_de_peliculas/js/editar_js.js"></script>
 	<link rel="stylesheet" type="text/css" href="../web_de_peliculas/styles/editar_css.css">
</head>
<body>
<div id="editar_peli">
	<div class="container-fluid" id="contenedor_editar_peli">
		<div class="card">
			<div class="card-body">
				<h5 class="card-title">Cambie la información que necesite</h5>
					<form id="formulario" method="post"enctype="multipart/form-data" >
						<!--Ingreso nombre de película-->
						 <div class="mb-3">
			            	<input type="hidden" name="n_usu" value="<?php echo $usu;?>">
			           		<label for="n_peli" class="form-label">Ingrese nombre de película</label> 
			            	<input type="text" name="n_peli" class="form-control" placeholder="Ej: Rápido y furioso 1" value="<?php echo $nombre ;?>"  required>
			         	</div>

			         	<!--Ingreso nombre de director-->
			         	<div class="mb-3">
			         		<label for="n_direct" class="form-label">Ingrese nombre de director</label>
			         		<input type="text" name="n_direct" class="form-control" placeholder="Ej: Steven Spielberg" value="<?php echo $director ;?>" onkeydown="preventNumberInput(event)" onkeyup="preventNumberInput(event)" required>	         		
			         	</div>

			         	<!--Ingreso año de estreno-->
			         	<div class="mb-3">
				            <label for="anio" class="form-label">Ingrese año de estreno</label>
				            <input type="text" name="anio" class="form-control" placeholder="Ej: 1995" value="<?php echo $anio ;?>" onkeypress="return onlyNumberKey(event)" required>
				        </div>

				        <!--Ingreso nombre de protagonistas-->
				        <div class="mb-3">
				            <label for="ns_prota" class="form-label">Ingrese nombre de protagonistas</label>
				            <textarea name="ns_prota" id="ns_prota" aria-describedby="ayudaNs_prota" class="form-control" onkeydown="preventNumberInput(event)" placeholder="Ej: Matías Fernández* &#10; &nbsp; &nbsp; Valetina Rodríguez*" required><?php echo $ns_prota ?></textarea>
				            <div id="ayudaNs_prota" class="form-text">Separe los nombes con *. Si el nombre de algún protagonista, contiene apóstrofes (Ej: O'Higgins), ingresar doble comilla simple (Ej: O''Higgins)</div>
				       </div>	

				       <!--Ingreso resumen de película-->
				       <div class="mb-3">
				            <label for="descrip" class="form-label">Ingrese breve resumen</label>
				            <textarea name="descrip" placeholder="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis luctus, nibh ac sollicitudin sodales, felis risus vehicula lacus, eu vulputate nisi sapien ut nulla." class="form-control"><?php echo $descrip?></textarea>
			           </div>

			           <!--Ingreso código tráiler-->
			           <div class="mb-3">
			            	<label for="video" class="form-label">Ingrese código de video de tráiler</label> 
			           	    <textarea name="video" class="form-control" placeholder="Ingrese etiqueta Iframe" aria-describedby="ayudaVideo"><?php echo $video ?></textarea>
			           		<div id="ayudaVideo" class="form-text"> Ej: < iframe width="560" height="315" src="https://www.youtube.com/embed/jNQXAC9IVRw" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></ iframe></div>           
			          </div>

			          <!--Ingreso poster de película-->
			          <div class="mb-3">
				            <label for="image" class="form-label">Ingrese poster de película</label>
				            <input type="file" class="custom-file-input" id="customFile" name="image">
			          </div>

			          <!--Botones de acción-->
			          <div id="btn">
				            <button class="btn btn-danger" type="submit" name="guardar">Guardar</button>
				            <button class="btn btn-danger" type="button" name="" onclick="regresar();">Cancelar</button> 
			          </div>
				 </form>
			</div>
		</div>
	</div>
</div>
</body>
</html>