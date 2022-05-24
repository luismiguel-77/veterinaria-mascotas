<?php
if(isset($_POST['submit'])) {
include ("conexion.php");
//mandamos a llamar el name del formulario 
$id_especie= $_POST['id_especie'];
$nombre = $_POST['nombre'];

$sql = "UPDATE especie SET nombre='$nombre' WHERE id_especie='$id_especie'";
	if (mysqli_query($con,$sql)=== TRUE) {
	header("location:listEspecie.php");
}else {
   echo "Error: " . $sql . "<br>" . $con->error;
	}
}
?>