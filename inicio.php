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
<html >
<head>
<link href= "css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet"  href="css/estilos-d.css">
</head>
<body> 
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
	<div class="slider">
		<ul> 
			<li><img src="imagen/pedrito.jpg"></li>
			<li><img src="imagen/pit.jpg"></li>
			<li><img src="imagen/shower.jpg"></li>
			<li><img src="imagen/mas2.jpg"></li>
		</ul>
		<div class="row" style="background: green;">
	<div class ="col-md-4" style="text-align: left;" > 
			<p><b>Contáctanos al los teléfonos:</b>
			<br>
			<strong>055 9191195540 </strong>
			<br>
			<strong>055 9191424532 </strong>
			<br>
			<strong>055 91915324 </strong>
			<strong>Siéguenos en:</strong>
			<br>
			<strong>Facebook:Veterinaria Omar</strong>
	</div>
	<div class ="col-md-4" style="text-align: left;"> 
			<p><b>Correo electrónico:</b>
			<br>
			<strong>ClinicaOmar@clínica.com.mx </strong>
			<br>
			<strong>Av.Gustavo Madero </strong>
			<br>
			<strong>N°.10local 30</strong>
			<br>
			<strong>Barrio.  Linda Vista, Ocosingo Chiapas</strong>
	</div>
	<div class ="col-md-4" style="text-align: left;"> 
			<p><b>HORARIO DE CONSULTA:</b>
			<br>
			<strong>Lunes a Viernes 10am a 8pm</strong>
			<br>
			<strong>Sábados 10am a 6pm</strong>
			<br>
			<strong>Domingos y días festivos 10:30 am a 1pm</strong>
			<br>
			<strong>Emergencias y a domicilio: (04455) 9672 4900</strong>
	</div>
</div>
</body>
</html>


