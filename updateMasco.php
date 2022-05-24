<?php
if(isset($_POST['submit'])) {
include ("conexion.php");
//mandamos a llamar el name del formulario 
$id = $_POST['id_mascotas'];
$tipo = $_POST['tipo'];
$nombre = $_POST['nombre'];
$genero = $_POST['genero'];
$id_especiefk = $_POST['id_especiefk'];

$sql = "UPDATE mascotas SET tipo='$tipo',nombre='$nombre',genero='$genero',id_especiefk='$id_especiefk' WHERE id_mascotas='$id'";
	if (mysqli_query($con,$sql)=== TRUE) {
	header("location:listMascota.php");
}else {
   echo "Error: " . $sql . "<br>" . $con->error;
	}
}
?>