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

<?php
          include("conexion.php");
          $c = mysqli_query($con,"SELECT  nombre,id_vacuna FROM vacuna");
       ?>
  <section class="container"> 
   <div class="form-b">
    <h4 class="title-table">LISTA DE MASCOTAS VACUNADAS</h4>
    <div><label>BUSCAR:</label>
      <input type="text" id="myInput" onkeyup="buscaFiltra()" placeholder="Busqueda por nombre mascota"> 
    </div><br>
     <form  action="listMascotaVacunada.php" id="combo" name="combo" autocomplete="off" method="POST">
        
          <div>
          <center><label >NOMBRE DE LA VACUNA: </label>
          <select style="width:250px"  name="cbx_vacuna"  required>
           <option value="" selected="selected">Seleccione vacuna</option>
           <?php while($row = mysqli_fetch_array($c))  { ?>
           <option value="<?php echo $row['id_vacuna']; ?>"><?php echo $row['nombre']; ?></option>
           <?php } ?>         
          </select>
        </center>
          </div>
           <button name="mostrar" id="mostrar" class="btn btn-info">Mostrar</button>
          <hr> 
          <?php 
          include ("conexion.php");
          if(isset($_POST['mostrar'])){
          $opcion=$_POST['cbx_vacuna'];
        
          $query=mysqli_query($con,"SELECT id_vacunacion,fechaDeDosisAplicadas,fechaDeDosisAAplicar,observaciones,(SELECT nombre from mascotas WHERE id_mascotas=id_mascotafk) AS NombreMascota,(SELECT nombre from vacuna WHERE id_vacuna=id_vacunafk) AS NombreVacuna FROM  mascotasvacunados WHERE id_vacunafk='$opcion'");

            
               
                
           ?>
      
  
         </form>
         <?php 
  
       $c=$_POST['cbx_vacuna'];
            $query5=mysqli_query($con,"SELECT DISTINCT vacuna.nombre from vacuna WHERE Id_vacuna=$c");
             while($row = mysqli_fetch_array($query5)) {
        $c = $row['nombre'];
       

    }
   mysqli_close($con);
?>


          
      
        <div> <h4><label>NOMBRE DEL VACUNA: </label> <?php echo $c ?></div></h4>

      <div class="table-responsive">
        <table width=100%  border=1 id="dynamic_field">
            <tr>
             <th>FECHA DOSIS APLICADAS</th>
             <th>FECHA DOSISI APLICAR</th>
             <th>OBSERVACIONES</th>
             <th>NOMBRE MASCOTA</th>
             <th>EDITAR</th>
             <th>ELIMINAR</th>
            </tr>
          </div>
       <?php
          while($row = mysqli_fetch_array($query)) {
            ?>
          <tr>
             <td><?php echo $row['fechaDeDosisAplicadas'] ?></td>
             <td><?php echo $row['fechaDeDosisAAplicar'] ?></td>
             <td><?php echo $row['observaciones'] ?></td>
             <td><?php echo $row['NombreMascota'] ?></td>
             <td><a class="btn btn btn-warning" rel="facebox" href="formEditMascoVacunada.php?id_vacunacion=<?php echo $row['id_vacunacion'] ?>">Editar</a></td>
             <td><a class="btn btn btn-danger" rel="facebox" href="deleteMascotaVacunacion.php?id_vacunacion=<?php echo $row['id_vacunacion'] ?>">Eliminar</a></td>
          </tr>
          <?php 
           }
         }
      ?>
     
    </table>
  <br>
<br>
  <div class="btn-GN">
    <a class="btn btn-info" href="formAddMascoVacunada.php" >NUEVO</a>
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
    td = tr[i].getElementsByTagName("td")[3];
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