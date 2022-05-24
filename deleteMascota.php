<?php
	
include ("conexion.php");
	$id_mascotas = $_GET['id_mascotas'];
	  $sql="DELETE FROM mascotas WHERE id_mascotas=$id_mascotas";
		if (mysqli_query($con,$sql)== true) {
			header("location:listMascota.php");
			echo($sql);
			}else {
   		 echo "Error: " . $sql. "<br>" . $con->error;
   	
		}
?>