<?php

    if(isset($_POST["login"])){ 
        // conexion con la database 

        require_once 'conexion.php';

        // recibimos de Login.php el username y el password
        $username = $_POST['username'];
        $password = $_POST['password'];
        // check no son campos vacios
        if((empty($username)) || (empty($password))){
            header("Location: http://localhost/prueba/LogIn.php?login=empty");
            exit();
        }
        // consulta SQL de todos los nombres, cotraseñas y el correo del usuario
        $sql = "select name from usuario;" or die('error de conexion con la database');
        $sql2 = "select password from usuario;" or die('error de conexion con la database');
        $sql3 = "select correo from usuario where name = '$username';" or die('error de conexion con la database');
        
        $resultado3 = mysqli_query($con,$sql3);
        $registro3 = mysqli_fetch_row($resultado3);
        // check si el nombre y contraseña coinciden
        if($resultado = mysqli_query($con,$sql)){
            while($registro = mysqli_fetch_row($resultado)){
                $max = count($registro);
                for($i=0; $i<=$max; $i++){
                    if($registro[$i] == $username){
                        if($resultado2 = mysqli_query($con,$sql2)){
                            while($registro2 = mysqli_fetch_row($resultado2)){
                                $max2 = count($registro2);
                                for($x=0; $x<=$max2; $x++){
                                    if($registro2[$x] == $password){
                                        // inciamos sesion y recogemos la contraseña del usuario de la database
                                        $resultado3 = mysqli_query($con,$sql3);
                                        $registro3 = mysqli_fetch_row($resultado3);
                                        
                                        session_start();
                                        $_SESSION["username"] = $username;
                                        $_SESSION["password"] = $password;
                                        $_SESSION["email"] = $registro3[0];
                                        header("Location: http://localhost/prueba/back.php?login=success");
                                        exit();
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }
        // si falla nos devuelve al login
        header("Location: http://localhost/prueba/LogIn.php?login=error");
        exit();
    }

?>