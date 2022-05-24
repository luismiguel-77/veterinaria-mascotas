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
        <li><a href="listUsuario.php">USUARIOS</a></li>
      <li><a href="logout.php">CERRAR SESIÓN</a></li>
    </ul>
  </nav>
</header>
<?php
    include ("conexion.php");
    $id_mascotas = $_GET['id_mascotas'];
    
    //EJECUTA CONSULTAS
    $sql = mysqli_query($con,"SELECT id_mascotas,id_especiefk,tipo,mascotas.nombre,genero,(SELECT nombre from especie WHERE id_especie=id_especieFK) AS NombreEspecie,(SELECT nombre from cliente WHERE id=id_clienteFK) AS NombreCliente FROM  mascotas WHERE id_mascotas='$id_mascotas'");
    while($row = mysqli_fetch_array($sql)) {
        $id_mascotas = $row['id_mascotas'];
        $tipo = $row['tipo'];
        $nombre = $row['nombre'];
        $genero = $row['genero'];
        $cbx_especie = $row['id_especiefk'];
     
        $NombreEspecie = $row['NombreEspecie'];

    }
   mysqli_close($con);//CIERRA LA CONEXION
?>


 <?php
       
          include("conexion.php");
          $querytipo = mysqli_query($con,"SELECT  DISTINCT especie.nombre,id_especiefk FROM especie,mascotas WHERE id_especie=id_especiefk");
         
       ?>  
<section class="container">        
  <div class="form-busqueda">
   <h4><center>ACTUALIZAR DATOS DEL MASCOTA</center></h4>
    <form  action="updateMasco.php" method="POST">
        <input type="hidden" class="form-control name_list" id="usr" name="id_mascotas"  value="<?php echo "$id_mascotas";?>" readonly>
      <label>TIPO</label>
        <input  type="text" class="form-control" id="usr" name="tipo" autocomplete="off"  value="<?php echo "$tipo";?>" pattern="[a-zA-ZñÑáéíóÁÉÍÓÚ ']{2,45}" required>
      <br>
      <label>NOMBRE</label>
        <input type="text"  class="form-control" id="usr" name="nombre" autocomplete="off" value="<?php echo "$nombre";?>" pattern="[a-zA-ZñÑáéíóÁÉÍÓÚ ']{2,45}"  required>
      <br>
      <label>GENERO</label>
        <input type="text"  class="form-control" id="usr" name="genero" autocomplete="off" value="<?php echo "$genero";?>" pattern="[a-zA-ZñÑáéíóÁÉÍÓÚ ']{2,45}" required>
        <br>
      <label for="tipo">NOMBRE ESPECIE: </label>
           <select name="id_especiefk"  class="form-control" required="required">
                     <?php while($row = mysqli_fetch_array($querytipo))  { ?>   
            <option value="<?php echo $row['id_especiefk']; ?>"><?php echo $row['nombre']; ?></option>    
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