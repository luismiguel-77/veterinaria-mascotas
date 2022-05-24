<?php 
if(session_status() == PHP_SESSION_NONE)
{
  session_start();//start session if session not start
}

if(!isset($_SESSION['user'])){
  die('Acceso denegado!');
}//end isset
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<link href= "css/bootstrap.min.css" rel="stylesheet">
<link href= "css/estilos-d.css" rel="stylesheet">
</head>
<body class="body-prin"> 
<header>
  <nav>
    <ul>     
       <li><img src="imagen/LOGO.png"  class="img-menu"></li>
      <li><a href="inicio.php">INICIO</a></li>
      <li><a href="listCliente.php">CLIENTES</a></li>
      <li><a href="listVacuna.php">VACUNAS</a></li>
      <li><a href="listEspecie.php">ESPECIE</a></li>
      <li><a href="listMascota.php">MASCOTA</a></li>
      <li><a href="listMascotaVacunada.php">MASCOTAS VACUNADAS</a></li>
        <li><a href="formEditUsuario.php">USUARIOS</a></li>
      <li><a href="logout.php">CERRAR SESIÓN</a></li>
    </ul>
  </nav>
</header>
<?php
    include ("conexion.php");
    $id_vacuna = $_GET['id_vacuna'];
    $sql = mysqli_query($con,"SELECT * FROM vacuna Where id_vacuna = '$id_vacuna'");
    while($row = mysqli_fetch_array($sql)) {
        $id_vacuna = $row['id_vacuna'];
        $Nombre = $row['nombre'];
    }
   mysqli_close($con);
?>
<section class="container">        
  <div class="form-busqueda">
   <h4 class="title-table">ACTUALIZAR DATOS DEL VACUNA</h4>
    <form  action="updateVacu.php" method="POST">
        <input type="hidden" class="form-control name_list"  name="id_vacuna"  value="<?php echo "$id_vacuna";?>" readonly>
      <label>NOMBRE</label>
        <input  type="text" class="form-control"  name="nombre" autocomplete="off"  value="<?php echo "$Nombre";?>" pattern="[a-zA-ZñÑáéíóÁÉÍÓÚ ']{2,45}" required>
      <br>
  <div class="btn-GN" >
      <button  type="submit" name="submit" class="btn btn-info" >GUARDAR</button> 
  </div>
    </form>
</section>
  </div> 
</body>
</html>