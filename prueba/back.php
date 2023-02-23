<?php
    require_once 'conexion.php';
    require_once 'validate_session.php'

    // conexion con la database
?>
<!DOCTYPE html>
<html lang="en">
<head>              <!-- formulario para subir posts  -->
    <meta charset="UTF-8">          
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
    <title>Back</title>
</head>
<body>    <!-- titulo -->
    <header style="width:100%;text-align:center;margin-top:2%;">
        <h1>Publica tu post</h1>
    </header>
    <div class="container"><!-- contenedor de todo -->
        <div class="row"><!-- contenedor de la unica fila -->
            <div style="width:30%;"> <!-- contenedor de columna izq -->
                                     <!-- muestra nombre de usuario conectado -->
                <div style='width:40%;background-color:rgba(16, 189, 0, 0.432);text-align:center;margin-left:-1vw;margin-top:8vh;border-radius:5px;
                    padding-top:5px;padding-bottom:1px;border:solid;border-width:2px;border-color:green;'>
                    <p style='margin-bottom:1px;'>Sesión iniciada:</p>
                    <b><p style='font-size:larger;mrgin-bottom:1px;'><?php
                        if(!empty($_SESSION['username'])){ echo $_SESSION['username'];}
                    ?></p></b>
                </div>            <!-- boton a mi cuenta -->

                             <!--boton para el formulario -->
                <button onclick="location.href='http://localhost/prueba/index.php'" style='width:30%;margin-right:4vw;margin-top:4vh;font-size:larger;'
                    class="btn btn-primary btn-lg">Posts
                </button>
                                <!-- boton a mi cuenta -->
                <button onclick="location.href='http://localhost/prueba/micuenta.php'" style='width:30%;margin-right:4vw;margin-top:4vh;font-size:larger;'
                    class="btn btn-secondary">Mi cuenta
                </button>
                <button onclick="location.href='http://localhost/prueba/galeria.php'" style=width:30%;margin-right:4vw;margin-top:4vh;font-size:larger;'
                    class="btn btn-success">Galeria
                </button>

                            <!-- alerta si nos dejamos algun campo vacio -->
                <div style="width:100%;margin-left:-50%;margin-top:38%;"><?php
                    $URL = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

                    if(strpos($URL, "formulario=empty") == true){
                    echo "<div style='width:50%;margin-inline:35%;'>
                    <p style='width:fit-content;padding-inline:5%;padding-top:2%;padding-bottom:2%;
                    border-radius:10px;border:solid;border-color:rgba(112, 0, 0, 0.822);text-align:center
                    ;margin-top:30%;background-color:rgba(228, 83, 83, 0.692);'>
                    No has completado el formulario </p></div>";}
                ?></div>
            </div>
                                <!-- columna del medio -->
            <div style="width:40%;background-color:rgba(128, 128, 128, 0.678);border-radius:10px;margin-top:5vh;padding:4%;"> 
                                <!-- formulario con las imagenes que queremos subir -->

                <form action="mover.php" method="POST" enctype="multipart/form-data">
                    
                    <div class="mb-3" style="margin-top:4%;">
                        <p style="width:100%;text-align:left;margin-left:5%;font-size:larger;">Título del Post</p>
                        <input type="text" name="titulo" class="form-control">
                    </div>
                    <div class="mb-3">
                        <p style="width:100%;text-align:left;margin-left:5%;font-size:larger;">Resumen</p>
                        <input type="text" name="entrada" class="form-control" id="formGroupExampleInput">
                    </div>

                    <div class="input-group">
                        <p style="width:100%;text-align:left;margin-left:5%;font-size:larger;">Texto</p>
                        <textarea type="text" name="texto" class="form-control" aria-label="With textarea" style="height: 150px;"></textarea>
                    </div>

                    <input type="reset" name="borrar" value="Quitar Imagenes" class="btn btn-danger" style="width:40%;margin-top:4%;margin-inline:4%;margin-bottom:10px;margin-bottom:10%;"
                            onclick="location.href='http://localhost/prueba/borrar.php'">
                    <button type="submit" name="subir" class="btn btn-success" style="width:40%;margin-top:20px;margin-inline:4%;margin-bottom:10px;margin-bottom:10%;">Subir</button>
                </form>
                <div class="image_upload_div" style="margin-top:2%;">
                        <form action="subirarchivo.php" class="dropzone"></form>
                    </div>
            </div>
            
            <div style="width:30%;"><!-- contenedor de columna drcha -->

            </div>
             
        </div>
        <div style="width:100%;margin-top:5%;">
            <?php

                require_once 'conexion.php';
                $src_dir = "img/";

                if ($handle = opendir($src_dir)) {
                    while (false !== ($entry = readdir($handle))) {
                        if ($entry != "." && $entry != "..") {
                        
                            $img = $entry;
                            echo"
                            <img src='$src_dir$img'; style='width:250px;height:150px;margin-inline: 1%;margin-bottom:2%;'>
                            ";
                        
                        }
                    }
                    closedir($handle);
                }
                mysqli_close($con);
            
            ?>
        </div>
    </div>
</body>
</html>

<!-- <div style='width:20vw;display:inline'>  </div>-->