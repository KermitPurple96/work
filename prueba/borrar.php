<!DOCTYPE html>
<html lang="en">
<head>      <!-- boton del formulario para quitar las imagenes escogidas de
                la carpeta temporal -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
    
</body>
</html>

<?php

require_once 'conexion.php';
$username = $_SESSION['username'];


$carpeta = "presubida/";
if ($handle = opendir($carpeta)) {
    while (false !== ($entry = readdir($handle))) {
        if ($entry != "." && $entry != "..") {
                
            $img = $entry;
            unlink($carpeta . $img);


        } 
    }
    closedir($handle);
}


// Cerrar la conexión con la base de datos
mysqli_close($con);
echo 
"<div class='alert alert-danger' role='alert' 
style='width:30%;margin-left:auto;margin-right:auto;text-align:center;margin-top:20%;'>
Imagen/es borrada/s con éxito!
</div>";

header( "Refresh:2; url=back.php");
exit();

?>