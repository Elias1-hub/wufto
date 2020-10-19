<?php
$host = 'localhost';
$user = 'root';
$pass = '';
$db   = 'wufto';


$conn = new mysqli($host,$user,$pass,$db);

if ($conn->connect_error) {
	die("Conexion fallida:". $conn->connect_error);
}

session_start();
if (isset($_SESSION['usuario'])) 

?>