<?php
if(isset($_POST['submit'])) {
include ("conexion.php");
//mandamos a llamar el name del formulario
$tipo = $_POST['tipo'];
$nombre = $_POST['nombre'];
$genero = $_POST['genero'];
$cbx_especie = $_POST['cbx_especie'];
$cbx_cliente = $_POST['cbx_cliente'];

$sql = "INSERT INTO mascotas VALUES (0,'$tipo','$nombre','$genero','$cbx_especie','$cbx_cliente')";
	if (mysqli_query($con,$sql)=== TRUE) {
	header("location:listMascota.php");
}else {
   echo "Error: " . $sql . "<br>" . $con->error;
	}
}
?>