<?php
	/*CONECTA A LA BASE DE DATOS*/
include ("conexion.php");
	$id = $_GET['id'];/*VARIABLE $*/
	  $sql="DELETE FROM cliente WHERE id=$id";
		if (mysqli_query($con,$sql)== true) {
			header("location:listCliente.php");
			echo($sql);
			}else {
   		 echo "Error: " . $sql. "<br>" . $con->error;
   	
		}
?>