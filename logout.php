<?php 
if(session_status() == PHP_SESSION_NONE)
{
	session_start();//start session if session not start
}

unset($_SESSION['user']);


if(!isset($_SESSION['user'])){
	header('location: index.php');
}//end isset