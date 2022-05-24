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
          $c = mysqli_query($con,"SELECT  nombre,id FROM cliente");
       ?>
  <section class="container"> 
   <div class="form-b">
    <h4 class="title-table">LISTA DE MASCOTA</h4>
    <div><label>BUSCAR:</label>
      <input type="text" id="myInput" onkeyup="buscaFiltra()" placeholder="Busqueda por tipo"> 
    </div><br>
     <form  action="listMascota.php" id="combo" name="combo" autocomplete="off" method="POST">
        
          <div>
          <center><label >NOMBRE CLIENTE: </label>
          <select style="width:250px"  name="cbx_cliente"  required>
           <option value="" selected="selected">Seleccione Cliente</option>
           <?php while($row = mysqli_fetch_array($c))  { ?>
           <option value="<?php echo $row['id']; ?>"><?php echo $row['nombre']; ?></option>
           <?php } ?>         
          </select>
        </center>
          </div>
           <button name="mostrar" id="mostrar" class="btn btn-info">Mostrar</button>
          <hr> 
          <?php 
          include ("conexion.php");
          if(isset($_POST['mostrar'])){
          $opcion=$_POST['cbx_cliente'];
        
          $query=mysqli_query($con,"SELECT id_mascotas,tipo,mascotas.nombre,genero,(SELECT nombre from especie WHERE id_especie=id_especieFK) AS NombreEspecie,(SELECT nombre from cliente WHERE id=id_clienteFK) AS NombreCliente FROM  mascotas WHERE id_clientefk='$opcion'");

                    
           ?>
      
  
         </form>
         <?php 
  
       $c=$_POST['cbx_cliente'];
            $query5=mysqli_query($con,"SELECT DISTINCT nombre from cliente WHERE ID=$c");
             while($row = mysqli_fetch_array($query5)) {
        $c = $row['nombre'];
       

    }
   mysqli_close($con);
?>


          
      
        <div> <h4><label>NOMBRE DEL CLIENTE: </label> <?php echo $c ?></div></h4>
     
      <div class="table-responsive">
        <table width=100%  border=1 id="dynamic_field">
            <tr>
             <th>TIPO</th>
             <th>NOMBRE</th>
             <th>GENERO</th>
             <th>NOMBRE ESPECIE</th>
             <th>EDITAR</th>
             <th>ELIMINAR</th>
            </tr>
          </div>
       <?php
          while($row = mysqli_fetch_array($query)) {

              //  $opcion=$_POST['cbx_cliente'];
//
              
        
            ?>

          <tr>
             <td><?php echo $row['tipo'] ?></td>
             <td><?php echo $row['nombre'] ?></td>
             <td><?php echo $row['genero'] ?></td>
             <td><?php echo $row['NombreEspecie'] ?></td>
             <td><a class="btn btn btn-success" rel="facebox" href="formEditMasco.php?id_mascotas=<?php echo $row['id_mascotas'] ?>">Editar</a></td>
             <td><a class="btn btn btn-danger" rel="facebox" href="deleteMascota.php?id_mascotas=<?php echo $row['id_mascotas'] ?>">Eliminar</a></td>
          </tr>
          <?php 

           }
           echo '<a class="btn btn btn-success"  rel="facebox" href="pdf/pdfespecie.php?id_mascotas='.$opcion.'">VER REPORTE</a>';
           
         }
      ?>
    </table>
  <br>
<br>
  <div class="btn-GN">
    <a class="btn btn-info" href="formAddMasco.php" >NUEVO</a>
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