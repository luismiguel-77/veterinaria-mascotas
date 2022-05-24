<?php
if(isset($_POST['submit'])) {
include ("conexion.php");
//mandamos a llamar el name del formulario 
$id_vacuna = $_POST['id_vacuna'];
$nombre = $_POST['nombre'];

$sql = "UPDATE vacuna SET nombre='$nombre' WHERE id_vacuna='$id_vacuna'";
	if (mysqli_query($con,$sql)=== TRUE) {
	header("location:listVacuna.php");
}else {
   echo "Error: " . $sql . "<br>" . $con->error;
	}
}
?>