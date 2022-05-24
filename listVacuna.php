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
<link rel="stylesheet" href= "css/estilos-d.css">
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

  <section class="container"> 
   <div class="form-busqueda">
    <h4 class="title-table">LISTA DE VACUNAS</h4>
    <div><label>BUSCAR:</label>
      <input type="text" id="myInput" onkeyup="buscaFiltra()" placeholder="Busqueda por nombre"> 
    </div>
 <br> 
<div class="table-responsive"> 
    <table width=100%  border=1 id="dynamic_field">
       <tr>
           
            <th>NOMBRE</th>
            <th>EDITAR</th>
            <th>ELIMINAR</th>
        <tr>
    <?php
    include ("conexion.php");
    $query =mysqli_query($con,"SELECT id_vacuna,nombre FROM vacuna");
    while($row = mysqli_fetch_array($query)){
    ?>
  <tr>
    
      <td><?php echo $row['nombre'] ?></td>
      <td><a class="btn btn-success" href="formEditVacu.php?id_vacuna=<?php echo $row['id_vacuna'] ?>">Editar</a></td>
      <td><a class="btn btn-danger" href="deleteVacuna.php?id_vacuna=<?php echo $row['id_vacuna'] ?>">Eliminar</a></td>
  </tr>
<?php
   }  
   mysqli_close($con);
?>
</table>
</div>
<br>
  <div class="btn-GN">
     <a class="btn btn-info" href="pdf/pdfvacuna.php"> VER REPORTE</a>
    <a class="btn btn-success" href="formAddVacu.php" >NUEVO</a>
  </div>
</div>
</section>
</body>
</html>
<script>
function buscaFiltra() {
  // declaraaciones de variable 
  var input, filter, table, tr, td, i;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("dynamic_field");
  tr = table.getElementsByTagName("tr");
//hace el ciclo de busqueda inciaando en la posicio cero de la columna de la tabla

  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    } 
  }
}
</script>