<?php
    require_once 'conexion.php';
    require_once 'validate_session.php'

    // conexion con la database
?>
<!DOCTYPE html>
<html lang="es" style="scroll-behavior: smooth;">
    <head>                  <!-- Posts de los usuarios -->
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="normalize.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <title>Galeria</title>
    </head>
    <body>
        <h1 style="width:100%;text-align:center;margin-top:2%;">Galería</h1>
        <div class="contenedor"style="width:100%;display:flex;"> <!-- contenedor de todo -->
                <div style="width:20%;"><!-- contenedor de columna izq -->
                                <!--boton para el formulario -->
                    <div style='width:50%;background-color:rgba(16, 189, 0, 0.432);text-align:center;margin-left:8vw;border-radius:5px;
                        border:solid;border-width:2px;border-color:green;margin-top:3%;'>
                        <p style='margin-top:4px;margin-bottom:0px;'>Sesión iniciada:</p>
                        <b><p style='font-size:larger;margin-bottom:4px;'>
                        <?php if(!empty($_SESSION['username'])){ echo $_SESSION['username'];}?></p></b>
                    </div>
                    <button onclick="location.href='http://localhost/prueba/back.php'" style='width:30%;margin-left:10vw;margin-top:10vh;font-size:larger;'
                        class="btn btn-info">Publicar post
                    </button>
                                    <!-- boton a mi cuenta -->
                    <button onclick="location.href='http://localhost/prueba/micuenta.php'" style='width:30%;margin-left:10vw;margin-top:4vh;font-size:larger;'
                        class="btn btn-secondary">Mi cuenta
                    </button>
                    <button onclick="location.href='http://localhost/prueba/index.php'" style='width:30%;margin-left:10vw;margin-top:4vh;font-size:larger;'
                        class="btn btn-primary btn-lg">Posts
                    </button>
                </div>
                <div style="width:48%;border-radius:10px;margin-top:5vh;padding:2%;background-color: grey;border-radius:10px;
                        margin-left:auto;margin-right:auto;display:flex; flex-wrap: wrap;">


                    <?php

                        require_once 'conexion.php';
                        $src_dir = "img/";

                        if ($handle = opendir($src_dir)) {
                            while (false !== ($entry = readdir($handle))) {
                                if ($entry != "." && $entry != "..") {
                                
                                    $img = $entry;
                                    echo"
                                    <div style='margin-inline: 1%;margin-bottom:2%;'>
                                        <img src='$src_dir$img'; style='width:250px;height:150px;'>
                                        <p>$img</p>
                                    </div>
                                    ";
                                
                                }
                            }
                            closedir($handle);
                        }
                        mysqli_close($con);

                    // require_once 'conexion.php';

                    // $src_dir = "img/";
                                        
                    // $sql = "select count(*) from img;";
                    // $result = mysqli_query($con, $sql);

                    // $row = mysqli_fetch_array($result);
                    // $count = $row[0];

                    // for ($i = 1; $i <= $count; $i++) {

                    //     echo "<div style=' padding-top:5%;'>";

                    //     $sql3="select * from img where cod_viaje = '$i'";

                    //         if ($result2=mysqli_query($con,$sql3)){
                    //             while($reg2=mysqli_fetch_row($result2)){
                    //                 $img = $reg2[1];
                    //                 echo
                    //                 "<div style='width:20%; margin-inline:5%;'> 
                    //                     <img src='./$img'; style='width:250px;height:150px;margin-inline: 10%;margin-bottom:5%;'>
                    //                     <p style='margin-inline: 10%;width:20%;'>$img</p>
                    //                 </div>";
                                    
                    //             };
                    //         };
                    //         echo"</div>";
                    // };


                    ?>
                </div>
                <div style='width:20%;margin-top:5%;'>
                </div>
        </div>
    </body>
</html>