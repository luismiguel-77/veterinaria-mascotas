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
//INCLUIMOS CONEXION,DEFINIMOS VARIABLE 
    include ("conexion.php");
    $id = $_GET['id'];
    $sql = mysqli_query($con,"SELECT * FROM Cliente Where id = '$id'");
    while($row = mysqli_fetch_array($sql)) {
        $id = $row['id'];
        $Nombre = $row['nombre'];
        $dirreccion = $row['direccion'];
        $telefono = $row['telefono'];
    }
   mysqli_close($con);
?>
<section class="container">        
  <div class="form-busqueda">
   <h4><center>ACTUALIZAR DATOS DEL CLIENTE</center></h4>
    <form  action="updateClient.php" method="POST">
        <input type="hidden" class="form-control name_list" id="usr" name="id"  value="<?php echo "$id";?>" readonly>
      <label>NOMBRE</label>
        <input  type="text" class="form-control" id="usr" name="nombre" autocomplete="off"  value="<?php echo "$Nombre";?>"  pattern="[a-zA-ZñÑáéíóÁÉÍÓÚ ']{2,45}" required>
      <br><br>
      <label>DIRRECCION</label>
        <input type="text"  class="form-control" id="usr" name="direccion" autocomplete="off" value="<?php echo "$dirreccion";?>" required>
      <br><br>
      <label>TELEFONO</label>
        <input type="text"  class="form-control" id="usr" name="telefono" autocomplete="off" value="<?php echo "$telefono";?>"   pattern="[0-9]{10}" required>
      <br>
  <div style="text-align: right;">
      <button  type="submit" name="submit" class="btn btn-info" >GUARDAR</button> 
  </div>
    </form>
</section>
  </div> 
</body>
</html>