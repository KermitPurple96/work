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
    <title>Posts</title>
</head>
<body>
    <h1 style="width:100%;text-align:center;margin-top:2%;">Posts</h1>
    <div class="contenedor"style="width:100%;display:flex;"> <!-- contenedor de todo -->
            <div style="width:20%;"><!-- contenedor de columna izq -->
                <div style='width:50%;background-color:rgba(16, 189, 0, 0.432);text-align:center;margin-left:8vw;border-radius:5px;
                        border:solid;border-width:2px;border-color:green;margin-top:3%;'>
                        <p style='margin-top:4px;margin-bottom:0px;'>Sesión iniciada:</p>
                        <b><p style='font-size:larger;margin-bottom:4px;'>
                        <?php if(!empty($_SESSION['username'])){ echo $_SESSION['username'];}?></p></b>
                </div>
                             <!--boton para el formulario -->
                <button onclick="location.href='http://localhost/prueba/back.php'" style='width:30%;margin-left:10vw;margin-top:10vh;font-size:larger;'
                    class="btn btn-info">Publicar post
                </button>
                                <!-- boton a mi cuenta -->
                <button onclick="location.href='http://localhost/prueba/micuenta.php'" style='width:30%;margin-left:10vw;margin-top:4vh;font-size:larger;'
                    class="btn btn-secondary">Mi cuenta
                </button>
                <button onclick="location.href='http://localhost/prueba/galeria.php'" style='width:30%;margin-left:10vw;margin-top:4vh;font-size:larger;'
                    class="btn btn-success">Galeria
                </button>
            </div>
                        <!-- contenedor de columna media -->
            <div style="width:50%; border-radius:10px;margin-top:5vh;padding:2%;
                    margin-left:auto;margin-right:auto;display:flexbox;flex-wrap: wrap;"> 
                <?php
                    
                    require_once 'conexion.php';
                    
                    $sql = "select count(*) from viaje;";
                    $result = mysqli_query($con, $sql);

                    $row = mysqli_fetch_array($result);
                    $count = $row[0];

                    for ($i = 1; $i <= $count; $i++) {

                        echo "<div style='background-color: grey; margin-bottom: 50px;padding-bottom:10px;border-radius:10px;'>";
                        $sql2="select * from viaje where cod = '$i'";
                        $sql3="select * from img where cod_viaje = '$i'";


                        if ($result=mysqli_query($con,$sql2)){
                            while($reg=mysqli_fetch_row($result)){
                                $codp = $reg[0];
                                $titulo = $reg[1];
                                $entrada = $reg[2];
                                $texto = $reg[3];
                                $username = $reg[4];
                                $date = $reg[5];
                                echo
                                "<div style='padding:3%;' id='$titulo'> 
                                    <p style='font-size:x-large;background-color:#2e2e2e;color: white;text-align:center;padding:1%;border-radius:10px;' >$titulo</p>
                                    <p style='font-size:large;background-color:#DBDBDB;padding:1%;border-radius:10px;'>$entrada</p>
                                    <p style='font-size:large;background-color:#DBDBDB;padding:1%;border-radius:10px;'>$texto</p>
                                 </div>";
                                if ($result2=mysqli_query($con,$sql3)){
                                    while($reg2=mysqli_fetch_row($result2)){
                                        $img = $reg2[1];
                                        echo
                                        "<div style='width:20vw;display:inline;'> 
                                            <img src='./$img'; style='width:250px;height:150px;margin-inline: 10%;margin-bottom:5%;'>
                                        </div>";
                                        
                                    };
                                };
                                echo"
                                    <div>
                                        <p style='margin-left: 5%;'> Posted by $username on $date</p><hr>
                                    </div>
                                    <div style='margin-inline: 5%';>
                    
                                        <form action='guardar-comentario.php' method='POST' enctype='multipart/form-data'>
                                            <input type='hidden' name='codp' value='$codp'>
                                            <label style='width: 100%;'><h3>Comentarios</h3></label><br>
                                            <textarea name='comentario' rows='5' cols='100' style='margin: 0 auto;'></textarea>
                                            <input type='submit' value='Comentar' class='btn btn-light'>
                                        </form>
                                    </div>
                                ";

                                $sql4="select * from comentarios where codp = '$codp'";
                                if ($result4=mysqli_query($con,$sql4)){
                                    while($reg4=mysqli_fetch_row($result4)){
                                        $comentario = $reg4[2];
                                        $usuario = $reg4[3];
                                        echo "";
                                        echo "<br>
                                        <p style='margin-inline: 5%;background-color: white;border-radius:4px;width:fit-content;padding:4px;'>$usuario</p>
                                        <p style='margin-inline: 5%;margin-bottom:20px;background-color:#DBDBDB;padding:1%;border-radius:4px;'>$comentario</p>";


                                    };
                                };

                                echo"</div>";

                            };
                        };
                        

                    };

                    
                ?>

            </div>
            <!-- columna derecha de la interfaz -->
            <?php
                echo"
                    <div style='width:20%;margin-top:5%;text-align:center;'>
                ";
                for ($i = 1; $i <= $count; $i++) {
                    $sql2="select * from viaje where cod = '$i'";
                    if ($result=mysqli_query($con,$sql2)){
                        while($reg=mysqli_fetch_row($result)){
                            $titulo = $reg[1];
                        }
                    }
                    echo"
                    <a href='#$titulo' style='margin-inline:30%;text-decoration: none;'>$titulo</a><br>
                    ";
                }
            ?>
            

</body>
</html>

