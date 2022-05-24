<?php
if(isset($_POST['submit'])) {
include ("conexion.php");
//mandamos a llamar el name del formulario 
$id = $_POST['id'];
$nombre = $_POST['nombre'];
$direccion = $_POST['direccion'];
$telefono = $_POST['telefono'];

$sql = "UPDATE cliente SET nombre='$nombre',direccion='$direccion',telefono='$telefono' WHERE id='$id'";
	if (mysqli_query($con,$sql)=== TRUE) {
	header("location:listCliente.php");
}else {
   echo "Error: " . $sql . "<br>" . $con->error;
	}
}
?>