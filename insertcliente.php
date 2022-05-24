<?php
if(isset($_POST['submit'])) {
include ("conexion.php");
//mandamos a llamar el name del formulario POST MANDA A LLAMAR EN ADDclinete 
$id = $_POST['id'];
$nombre = $_POST['nombre'];
$direccion = $_POST['direccion'];
$telefono = $_POST['telefono'];

$sql = "INSERT INTO cliente VALUES (0,'$nombre','$direccion','$telefono')";
	if (mysqli_query($con,$sql)=== TRUE) {
	header("location:listCliente.php");
}else {
   echo "Error: " . $sql . "<br>" . $con->error;
	}
}
?>