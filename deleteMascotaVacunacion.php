<?php
	
include ("conexion.php");
	$id_vacunacion = $_GET['id_vacunacion'];
	  $sql="DELETE FROM mascotasvacunados WHERE id_vacunacion=$id_vacunacion";
		if (mysqli_query($con,$sql)== true) {
			header("location:listMascotaVacunada.php");
			echo($sql);
			}else {
   		 echo "Error: " . $sql. "<br>" . $con->error;
   	
		}
?>