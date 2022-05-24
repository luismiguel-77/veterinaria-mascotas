<?php
if(isset($_POST['submit'])) {
include ("conexion.php");
//mandamos a llamar el name del formulario 

$nombre = $_POST['nombre'];
$sql = "INSERT INTO vacuna VALUES (0,'$nombre')";
	if (mysqli_query($con,$sql)=== TRUE) {
	header("location:listVacuna.php");
}else {
   echo "Error: " . $sql . "<br>" . $con->error;
	}
}
?>