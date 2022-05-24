<?php
if(isset($_POST['submit'])) {
include ("conexion.php");
//mandamos a llamar el name del formulario 

$user = $_POST['user'];
$password = $_POST['password'];
$sql = "INSERT INTO USUARIO VALUES (0,'$user','$password')";
	if (mysqli_query($con,$sql)=== TRUE) {
	header("location:listUsuario.php");
}else {
   echo "Error: " . $sql . "<br>" . $con->error;
	}
}
?>