<?php
// Conexión
$dbhost = "localhost:3306";
$dbusername = "root";
$dbpassword = "root";
$dbname = "viajes";

$con = mysqli_connect($dbhost,$dbusername,$dbpassword,$dbname) or die ('error de conexion con la database');

mysqli_query($con, "SET NAMES 'utf8'");

// Iniciar la sesión
if(!isset($_SESSION)){
	session_start();
}