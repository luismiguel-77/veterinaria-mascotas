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
          $queryvacuna= mysqli_query($con,"SELECT nombre,Id_vacuna FROM vacuna");
          $querymascota= mysqli_query($con,"SELECT nombre,id_mascotas FROM mascotas");
       ?>
</header>
  <section class="container">       
  <div class="form-busqueda">
      <h4><center>REGISTRAR NUEVO MASCOTA A VACUNAR</center></h4> 
        <form  action="insertMascotaVacunada.php" method="POST">
          <label>FECHA DOSIS</label>
            <input  type="date" class="form-control"  name="fd" autocomplete="off" placeholder="ELIGE LA FECHA DOSIS" required>
          <br>
          <label>FECHA DOSIS A APLICAR</label>
            <input type="date"  class="form-control"  name="fa" autocomplete="off" placeholder="ELIGE LA FECHA DE DOSISI A APLICAR" required>
          <br>
          <label>OBSERVACIÒN</label>
            <input type="text"  class="form-control"  name="ob" autocomplete="off" placeholder="INGRESE LA OBSERVACION" required>
            <br>
            <label for="tipo">NOMBRE MASCOTA: </label>
           <select class="form-control" name="cbx_mascota"  required>
           <option value="" selected="selected">Seleccione nombre</option>
           <?php while($row = mysqli_fetch_array($querymascota))  { ?>
           <option value="<?php echo $row['id_mascotas']; ?>"><?php echo $row['nombre']; ?></option>
           <?php } ?>
           </select>
           <br>
           <label for="tipo">NOMBRE VACUNA: </label>
           <select class="form-control" name="cbx_vacuna" required>
           <option value="" selected="selected">Seleccione nombre</option>
           <?php while($row = mysqli_fetch_array($queryvacuna))  { ?>
           <option value="<?php echo $row['Id_vacuna']; ?>"><?php echo $row['nombre']; ?></option>
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