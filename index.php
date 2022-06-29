<?php include("header.php");include("db.php");?>

<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="../web_de_peliculas/styles/index_css.css">
</head>
<body>
	<div id="titulo_bienvenida">
		<h1>Bienvenidos a esta web de películas<h1>
	</div>
	<div id="img_inicio">
		<img id="img_inicio_butacas" class="img-fluid" src="../web_de_peliculas/imagenes/istock.jpg" alt="img_inicio">
	</div>
	<div id="contenido_inicio">
		<div class="container-fluid" id="contenedor_inicio">
			<p id="msj_inicio">En esta página, podrás encontrar información, acerca de tus películas favoritas, como su director, el año de estreno, protagonistas y más. </p>
			<img src="../web_de_peliculas/imagenes/cabritas.jpg" class="img-fluid" alt="cabritas" id="img_bienvenida">
		</div>
		<div id="titulo_peli_ingresada">
			<h3>Mira tu película favorita</h3>
		</div>
		<div id="listado_peliculas">
			<?php $sql = "SELECT * FROM pelicula";$r = mysqli_query($conn,$sql);
			if (mysqli_num_rows($r)<1) {
				echo "<p id='msj_sin_pelicula'>No hay ninguna película que mostrar<p>";
			}else{
			echo "<div class='row row-cols-1 row-cols-lg-2 g-3'>";
				while ($row=mysqli_fetch_array($r)) { $prota=explode('*',$row['ns_prota']); $i=0;
					echo "
					<div class='col'>
						<div class='card mb-3' id='card' style='width: 562px;'>
							<div id='video'>
							".$row['video']."
							</div>
							<div class='row g-0'>
								<div class='col-md-4'>
								<img id='img_peli' src=../web_de_peliculas/imagenes/".$row['img']." class='img-fluid' alt='img_pelicula'>      
							</div>
								<div class='col-md-8'>
									<div class='card-body'>
										<h5 class='card-title'>".$row['nombre']."</h5>
										<p class='card-text'>".$row['descrip']."</p>
									</div>
										<ul class='list-group list-group-flush'>
										<li class='list-group-item'>".$row['director']."</li>
										<li class='list-group-item'>".$row['anio']."</li>
										<li class='list-group-item'>";while($i<sizeof($prota)-1){echo $prota[$i]."<br>"; $i++;} echo"</li>
									</ul>
								</div>
							</div>
						</div>
				   </div>";	
				}
			echo "</div>";
			}			
			?>		
		</div>
	</div>
</body>
</html>