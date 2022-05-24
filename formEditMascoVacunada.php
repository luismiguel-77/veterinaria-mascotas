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
    $id_vacunacion = $_GET['id_vacunacion'];
    
    $sql = mysqli_query($con,"SELECT id_vacunacion,fechaDeDosisAplicadas,fechaDeDosisAAplicar,observaciones,(SELECT nombre from mascotas WHERE id_mascotas=id_mascotafk) AS NombreMascota,(SELECT nombre from vacuna WHERE id_vacuna=id_vacunafk) AS NombreVacuna FROM  mascotasvacunados WHERE id_vacunacion='$id_vacunacion'");
    while($row = mysqli_fetch_array($sql)) {
        $id_vacunacion = $row['id_vacunacion'];
        $fechaDeDosisAplicadas = $row['fechaDeDosisAplicadas'];
        $fechaDeDosisAAplicar = $row['fechaDeDosisAAplicar'];
        $observaciones = $row['observaciones'];
        $id_mascotafk = $row['id_mascotafk'];
     
        $NombreVacuna = $row['NombreVacuna'];

    }
   mysqli_close($con);
?>


 <?php
       
          include("conexion.php");
          $queryvacuna = mysqli_query($con,"SELECT  DISTINCT nombre,id_mascotas FROM mascotas");
         
       ?>  
<section class="container">        
  <div class="form-busqueda">
   <h4><center>ACTUALIZAR DATOS DEL MASCOTA VACUNADA</center></h4>
    <form  action="updateMascoVacunada.php" method="POST">
        <input type="hidden" class="form-control name_list" id="usr" name="id_vacunacion"  value="<?php echo "$id_vacunacion";?>" readonly>
      <label>FECHA DOSIS APLICADA</label>
        <input  type="date" class="form-control" id="usr" name="fechaDeDosisAplicadas" autocomplete="off"  value="<?php echo "$fechaDeDosisAplicadas";?>" required>
      <br>
      <label>FECHA DOSIS A APLICAR</label>
        <input type="date"  class="form-control" id="usr" name="fechaDeDosisAAplicar" autocomplete="off" value="<?php echo "$fechaDeDosisAAplicar";?>" required>
      <br>
      <label>OBSERVACIONES</label>
        <input type="text"  class="form-control" id="usr" name="observaciones" autocomplete="off" value="<?php echo "$observaciones";?>" required>
        <br>
      <label for="tipo">NOMBRE MASCOTA: </label>
           <select name="id_mascotafk"  class="form-control" required="required">
                     <?php while($row = mysqli_fetch_array($queryvacuna))  { ?>   
            <option value="<?php echo $row['id_mascotas']; ?>"><?php echo $row['nombre']; ?></option>    
            <?php } ?>
            </select>
      <br>
  <div style="text-align: right;">
      <button  type="submit" name="submit" class="btn btn-info" >GUARDAR</button> 
  </div>
    </form>
</section>
  </div> 
</body>
</html>