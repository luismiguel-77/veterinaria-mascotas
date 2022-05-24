<?php 
//ESTE CODIGO SIRVE VALIDAR SI HA INICIADO SECION O NO 
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
  <section class="container">       
  <div class="form-busqueda">
      <h4><center>REGISTRAR NUEVO CLIENTE</center></h4> 
        <form  action="insertcliente.php" method="POST">
          <label>NOMBRE</label>
            <input  type="text" class="form-control" id="usr" name="nombre" autocomplete="off" placeholder="INGRESE TU NOMBRE" pattern="[a-zA-ZñÑáéíóÁÉÍÓÚ ']{2,45}" required>
          <br><br>
          <label>DIRRECCION</label>
            <input type="text"  class="form-control" id="usr" name="direccion" autocomplete="off" placeholder="INGRESE TU DIRRECCIÒN"  required>
          <br><br>
          <label>TELEFONO</label>
            <input type="text"  class="form-control" id="usr" name="telefono" autocomplete="off"  placeholder="INGRESE TU TELEFONO" pattern="[0-9]{10}" required>
          <br>
            <div class="btn-GN">
             <button  type="submit" name="submit" class="btn btn-info" >GUARDAR</button>
            </div>
        </form>
  </section>
  </div> 
</body>
</html>