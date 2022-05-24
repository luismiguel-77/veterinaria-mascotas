<?php
if(isset($_POST['submit'])) {
include ("conexion.php");
//mandamos a llamar el name del formulario
$fechad = $_POST['fd'];
$fechaA= $_POST['fa'];
$observacion = $_POST['ob'];
$cbx_mascota = $_POST['cbx_mascota'];
$cbx_vacuna = $_POST['cbx_vacuna'];


$sql = "INSERT INTO mascotasvacunados VALUES (0,'$fechad','$fechaA','$observacion','$cbx_mascota','$cbx_vacuna')";
	if (mysqli_query($con,$sql)=== TRUE) {
	header("location:listMascotaVacunada.php");
}else {
   echo "Error: " . $sql . "<br>" . $con->error;
	}
}
?>