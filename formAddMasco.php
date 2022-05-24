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
  <?php
          //consulta de llena combo
          include("conexion.php");
          $queryEspecie= mysqli_query($con,"SELECT nombre,id_especie FROM especie");
          $queryCliente= mysqli_query($con,"SELECT nombre,id FROM cliente");
       ?>
</header>
  <section class="container">       
  <div class="form-busqueda">
      <h4><center>REGISTRAR NUEVO MASCOTA</center></h4> 
        <form  action="insertMascota.php" method="POST">
          <label>TIPO</label>
            <input  type="text" class="form-control" id="usr" name="tipo" autocomplete="off" placeholder="INGRESE EL TIPO" pattern="[a-zA-ZñÑáéíóÁÉÍÓÚ ']{2,45}" required>
          <br>
          <label>NOMBRE</label>
            <input type="text"  class="form-control" id="usr" name="nombre" autocomplete="off" placeholder="INGRESE EL NOMBRE"  pattern="[a-zA-ZñÑáéíóÁÉÍÓÚ ']{2,45}" required>
          <br>
          <label>GENERO</label>
            <input type="text"  class="form-control" id="usr" name="genero" autocomplete="off" placeholder="INGRESE EL GENERO"  pattern="[a-zA-ZñÑáéíóÁÉÍÓÚ ']{2,45}" required>
            <br>
           <label for="tipo">NOMBRE ESPECIE: </label>
           <select class="form-control" name="cbx_especie" id="cbx_especie" required>
           <option value="" selected="selected">Seleccione nombre</option>
           <?php while($row = mysqli_fetch_array($queryEspecie))  { ?>
           <option value="<?php echo $row['id_especie']; ?>"><?php echo $row['nombre']; ?></option>
           <?php } ?>
           </select>
           <br>
            <label for="tipo">NOMBRE CLIENTE: </label>
           <select class="form-control" name="cbx_cliente" id="cbx_cliente" required>
           <option value="" selected="selected">Seleccione nombre</option>
           <?php while($row = mysqli_fetch_array($queryCliente))  { ?>
           <option value="<?php echo $row['id']; ?>"><?php echo $row['nombre']; ?></option>
           <?php } ?>
           </select>
          <br>
            <div class="btn-GN">
             <button  type="submit" name="submit" class="btn btn-info" >GUARDAR</button>
            </div>
        </form>
  </section>
  </div> 
</body>
</html>