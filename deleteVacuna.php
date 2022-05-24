<?php
	
include ("conexion.php");
	$id = $_GET['id_vacuna'];
	  $sql="DELETE FROM vacuna WHERE id_vacuna=$id";
		if (mysqli_query($con,$sql)== true) {
			header("location:listVacuna.php");
			echo($sql);
			}else {
   		 echo "Error: " . $sql. "<br>" . $con->error;
   	
		}
?>