<html>
<head>
<title> SISTEMA VETERINARIA</title>
<link rel="stylesheet"  href="css/estiloLogin.css">
<link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
	<div class="login-box"> 
		<img src="imagen/avatar.jpg" class="avatar">
			<h1> Veterinario </h1>
			<form action="index.php" method="POST" autocomplete="off">
				<p class="etiq-ini"> USUARIO</p>
				<input type="text" name="user" placeholder="introduce tu Nombre" required>
				<p class="etiq-ini"> CONTRASE&Ntilde;A</p> 
				<input type="password"  name="pwd" placeholder="introduce la contrase&ntilde;a" required>
				<button type="submit" name="enviar" class="btn btn-lgn btn-block" >INGRESAR AL SISTEMA
				</button>
			</form>
	</div>
</body>
<?php
//codigo para inicial la validacion del usuario
//asigno las variables enviadas del formulario a variables de php
	if(isset($_POST['enviar'])) {
			$user=$_POST['user'];
			$pass=$_POST['pwd'];
			include("conexion.php");
			session_start();//variable que inicializa la session del usuario
			$valido_user=mysqli_query($con,"select * from usuario where user='$user' and password='$pass'");
			$datos_consulta=mysqli_fetch_row($valido_user);
			if(!$datos_consulta[0])
				{
					//si no existe los datos pasa a este apartado
					echo "<div class='text-center alert alert-warning'>El usuario no existe o es incorrecto</div>";
				}else{
							$_SESSION['user']=$datos_consulta[0];
							$_SESSION['password']=$datos_consulta[1];
							header("location:inicio.php");
				}
				}else{
					//aqui solo se valida si ya se le dio un clic al boton enviar y si no aparecera algo en este apartado
				}

     ?>
</html>