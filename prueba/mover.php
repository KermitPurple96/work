<?php
        
    require_once 'conexion.php';

    $src_dir = "presubida/";
    $dst_dir = "imgfinal/";


    $titulo = $_POST['titulo'];
    $entrada = $_POST['entrada'];
    $texto = $_POST['texto'];
    $username = $_SESSION['username'];
    $date = date("Y/m/d");
    $timestamp = date("Ymdhis");


    $sql = "INSERT INTO viaje (TITULO, ENTRADA, TEXTO, AUTOR, FECHA) 
    values ('$titulo','$entrada', '$texto', '$username','$date');";

    $guardar = mysqli_query($con, $sql);

    if ($handle = opendir($src_dir)) {
        while (false !== ($entry = readdir($handle))) {
            if ($entry != "." && $entry != "..") {
                $new_name = $entry . "_" . $timestamp;
                $src_path = $src_dir . $entry;
                $dst_path = $dst_dir . $new_name;
                if (rename($src_path, $dst_path)) {


                    // $sql = "INSERT INTO img(cod_viaje, ruta)
                    // VALUES (LAST_INSERT_ID(), '$dst_path');";

                    // $con->query("INSERT INTO img(cod_viaje, ruta) VALUES (LAST_INSERT_ID(), '$dst_path');");

                    $sql2 = "INSERT INTO img(cod_viaje, ruta) VALUES (LAST_INSERT_ID(), '$dst_path');";

                    mysqli_query($con, $sql2);

                } 
            }
        }
        closedir($handle);
    }

    // Cerrar la conexión con la base de datos
    mysqli_close($con);
    header( "Location: http://localhost/prueba/index.php?archivos=success");
    exit();

?>
