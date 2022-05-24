<?php
if(isset($_POST['submit'])) {
include ("conexion.php");
//mandamos a llamar el name del formulario 
$id = $_POST['id_vacunacion'];
$fechaDeDosisAplicadas = $_POST['fechaDeDosisAplicadas'];
$fechaDeDosisAAplicar = $_POST['fechaDeDosisAAplicar'];
$observaciones = $_POST['observaciones'];
$id_mascotafk = $_POST['id_mascotafk'];

$sql = "UPDATE mascotasvacunados SET fechaDeDosisAplicadas='$fechaDeDosisAplicadas',fechaDeDosisAAplicar='$fechaDeDosisAAplicar',observaciones='$observaciones',id_mascotafk='$id_mascotafk' WHERE id_vacunacion='$id'";
	if (mysqli_query($con,$sql)=== TRUE) {
	header("location:listMascotaVacunada.php");
}else {
   echo "Error: " . $sql . "<br>" . $con->error;
	}
}
?>