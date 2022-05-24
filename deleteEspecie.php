<?php
	
include ("conexion.php");
	$id_especie = $_GET['id_especie'];
	  $sql="DELETE FROM especie WHERE id_especie=$id_especie";
		if (mysqli_query($con,$sql)== true) {
			header("location:listEspecie.php");
			echo($sql);
			}else {
   		 echo "Error: " . $sql. "<br>" . $con->error;
   	
		}
?>