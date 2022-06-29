<?php include("header.php"); include("db.php"); $usu =""; $id_peli = 0; if (isset($_GET["usu"])) { 	$usu = $_GET["usu"]; } if (isset($_GET["error"])) { echo "<script>alert('$_GET[error]')</script>"; } if (isset($_GET["msg_edit"])) {echo "<script>alert('$_GET[msg_edit]')</script>";}?>

<!DOCTYPE html>
<html>
<head>
	<title>Ingreso de películas</title>
  <script src="../web_de_peliculas/js/ingreso_peli_js.js"></script>
  <link rel="stylesheet" type="text/css" href="../web_de_peliculas/styles/ingreso_peli_css.css">
</head>
<body>
<div id="ingreso_pelicula">
  <div class="container-fluid" id="contenedor_ingreso_peli">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Bienvenido <?php echo $usu; ?></h5>
        <h6 class="card-subtitle">Ingrese la infomación solicitada</h6>
        <form id="formulario" method="post" action="guardar_peli.php" enctype="multipart/form-data">
          
          <!--Ingreso nombre de película-->
          <div class="mb-3">
            <input type="hidden" name="n_usu" value="<?php echo $usu;?>">
            <label for="n_peli" class="form-label">Ingrese nombre de película</label> 
            <input type="text" name="n_peli" class="form-control" placeholder="Ej: Rápido y furioso 1" required>
          </div> 

          <!--Ingreso nombre de director-->
          <div class="mb-3">
            <label for="n_direct" class="form-label">Ingrese nombre de director</label>
            <input type="text" name="n_direct" class="form-control" placeholder="Ej: Steven Spielberg" onkeydown="preventNumberInput(event)" onkeyup="preventNumberInput(event)" required>
          </div>  

        <!--Ingreso año de estreno-->  
          <div class="mb-3">
            <label for="anio" class="form-label">Ingrese año de estreno</label>
            <input type="text" name="anio" class="form-control" placeholder="Ej: 1995" onkeypress="return onlyNumberKey(event)" required>
          </div>

        <!--Ingreso nombre de protagonistas-->
          <div class="mb-3">
            <label for="ns_prota" class="form-label">Ingrese nombre de protagonistas</label>
            <textarea name="ns_prota" id="ns_prota" aria-describedby="ayudaNs_prota" class="form-control" onkeydown="preventNumberInput(event)" placeholder="Ej: Matías Fernández* &#10; &nbsp; &nbsp; Valetina Rodríguez*" required></textarea>
              <div id="ayudaNs_prota" class="form-text">Separe los nombes con *. Si el nombre de algún protagonista, contiene apóstrofes (Ej: O'Higgins), ingresar doble comilla simple (Ej: O''Higgins)
              </div>
          </div>

         <!--Ingreso resumen de película-->
          <div class="mb-3">
            <label for="descrip" class="form-label">Ingrese breve resumen</label>
            <textarea name="descrip" placeholder="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis luctus, nibh ac sollicitudin sodales, felis risus vehicula lacus, eu vulputate nisi sapien ut nulla." class="form-control"></textarea>
          </div>

        <!--Ingreso código tráiler-->
          <div class="mb-3">
            <label for="video" class="form-label">Ingrese código de video de tráiler</label> 
            <textarea name="video" class="form-control" placeholder="Ingrese etiqueta Iframe" aria-describedby="ayudaVideo"></textarea>
              <div id="ayudaVideo" class="form-text"> Ej: < iframe width="560" height="315" src="https://www.youtube.com/embed/jNQXAC9IVRw" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></ iframe>              
              </div>
          </div>

        <!--Ingreso poster de película-->
          <div class="mb-3">
            <label for="image" class="form-label">Ingrese poster de película</label>
            <input type="file" class="custom-file-input" id="customFile" name="image">
          </div>

        <!--Botones de acción-->
          <div id="btn">
            <button class="btn btn-danger" type="submit" name="guardar">Guardar</button>          
          </div>       
        </form>
      </div>
    </div>
  </div>
  <div class="container-fluid" id="contenedor_peli_ingresada">
    <div id="titulo_peli_ingresada">
      <h6>Lista de películas ingresadas</h6>
    </div>
    <?php $sql = "SELECT * FROM pelicula";$r = mysqli_query($conn,$sql); if (!$r) { echo "<p>Error de conexión</p>"; }else{ if (mysqli_num_rows($r)<1) {
     echo "<h4>No hay ninguna pelicula ingresada</h4>";
       }else{?>
      <div class="table-responsive">
        <table class="table table-bordered border-dark">
          <thead>
            <tr>
              <th scope="col">Nombre</th>
              <th scope="col">Director</th>
              <th scope="col">Año de estreno</th>
              <th scope="col">Nombre de protagonistas</th>
              <th scope="col">Descripción</th>
              <th scope="col">Tráiler</th>
              <th scope="col">Portada</th>
              <th scope="col">Acciones</th>
            </tr>
          </thead>
        <tbody>
          <?php while($row=mysqli_fetch_array($r)){ $id_peli = $row['id_pelicula']; $prota = explode('*',$row['ns_prota']); $i=0;?>
            <tr>
              <td><?php echo $row['nombre']; ?></td>
              <td><?php echo $row['director']; ?></td>
              <td><?php echo $row['anio']; ?></td>
              <td><ul><?php while($i<sizeof($prota)-1){echo "<li id='p_prota'>".$prota[$i]."</li>";$i++;} ?></ul></td>
              <td id='p_descrip'><?php echo $row['descrip']; ?></td>
              <td id='p_trailer'><div id='p_video'><?php echo $row['video']; ?></div></td>
              <td><img id='p_portada' src=<?php echo "imagenes/".$row['img'] ?>></td>
              <td><a class="underline-hover-effect" href=<?php echo "../web_de_peliculas/editar.php?id_pelicula=$id_peli&usu=$usu"?>>Editar</a><br><a class="underline-hover-effect" href="javascript:eliminar_p();">Eliminar</a></td>
            </tr>      
          <?php } ?>
        </tbody>
        </table>
      </div>
    <br>
    <?php 
  } } ?>
  </div>
</div>
</body>
</html>

<?php $eliminar = "id_pelicula=$id_peli&usu=$usu"; ?>

<script type="text/javascript">

function eliminar_p(){ if (confirm("Esta seguro que desea eliminar la película, los datos eliminados no se podrán recuperar")){ eliminar();} }

function eliminar(){ document.location="eliminar.php?<?php echo $eliminar; ?>";}

</script>
