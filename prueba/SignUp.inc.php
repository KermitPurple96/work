<?php

    if(isset($_POST["signin"])){
        // conexion con la database
        require_once 'conexion.php';
      
        $username = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $password2 = $_POST['password2'];
        // evitar campos vacios
        if((empty($username)) || (empty($email)) || (empty($password)) || (empty($password2))){
            header("Location: http://localhost/prueba/SignUp.php?signup=empty");
            exit();
        }
        // contraseñas coincidan
        if(($password !== $password2)){
            header("Location: http://localhost/prueba/SignUp.php?signup=password");
            exit();
        }
        // consulta de los usrnames y correos de la dtabase 
        $sql = "select name from usuario;" or die('error de conexion con la database');
        $sql2 = "select correo from usuario;" or die('error de conexion con la database');
        // checkea si el nombre de usuario dado esta ya usado en la database
        if($resultado = mysqli_query($con,$sql)){
            while($registro = mysqli_fetch_row($resultado)){
                $max = count($registro);
                for($i=0; $i<=$max; $i++){
                    if($registro[$i] == $username){
                        header("Location: http://localhost/prueba/SignUp.php?signup=name");
                        exit();
                    }
                }
            }
        }
        // checkea si el correo dado ya esta usado en la database
        if($resultado = mysqli_query($con,$sql2)){
            while($registro = mysqli_fetch_row($resultado)){
                $max = count($registro);
                for($i=0; $i<=$max; $i++){
                    if($registro[$i] == $email){
                        header("Location: http://localhost/prueba/SignUp.php?signup=email");
                        exit();
                    }
                }
            }
        }
        // inserta en la dtabase los datos aportados si la validacion es correcta
        $SQL = "INSERT INTO usuario (name, password, correo) VALUES
        ('$username','$password','$email');";
        mysqli_query($con,$SQL);
        // inicio de sesion automatico
        session_start();
        $_SESSION["username"] = $username;
        $_SESSION["password"] = $password;
        $_SESSION["email"] = $email;
        header("Location: http://localhost/prueba/back.php");
    }

?>