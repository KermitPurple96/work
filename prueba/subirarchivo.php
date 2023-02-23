<?php

    if(!empty($_FILES)){
        require_once 'conexion.php';
        // $con = new mysqli('localhost:3306','root','root','prueba') or die('Error de conexión!!');
        
        $directorio = "presubida/";
        $fichero = $_FILES['file']['name'];
        $ruta = $directorio.$fichero;

        move_uploaded_file($_FILES['file']['tmp_name'],$ruta);


    };

?>












