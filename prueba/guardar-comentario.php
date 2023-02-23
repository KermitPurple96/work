<?php

	require_once 'conexion.php';

    $comentario = $_POST['comentario'];
	$codp = $_POST['codp'];
    $username = $_SESSION['username'];
    
    $sql = "INSERT INTO COMENTARIOS (codp,comentario, usuario) VALUES('$codp','$comentario','$username');";
    mysqli_query($con, $sql);
    mysqli_close($con);
    header("Location: http://localhost/prueba/index.php");



?>