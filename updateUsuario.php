<?php
if(isset($_POST['submit'])) {
include ("conexion.php");
//mandamos a llamar el name del formulario 
$id_usuario = $_POST['id_usuario'];
$user = $_POST['user'];
$password = $_POST['password'];

$sql = "UPDATE usuario SET user='$user',password='$password'";
	if (mysqli_query($con,$sql)=== TRUE) {
	header("location:logout.php");
}else {
   echo "Error: " . $sql . "<br>" . $con->error;
	}
}
?>