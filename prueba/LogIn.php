<!DOCTYPE html>
<html lang="es">
<head>                          <!-- interfaz para logearse con una cuenta  -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Subida de archivos</title>
</head>
<body> <!-- titulo -->
    <header style="width:100%;text-align:center;margin-top:5%;">
        <h1>LOG IN</h1>
    </header>
    <div class="container"> <!-- contenedor de todo -->
        <div class="row">   <!-- contenedor de la unica fila -->
            <div style="width:35%;">    <!-- contenedor de columna izq -->
            </div>
            <div style="width:30%;background-color:rgba(128, 128, 128, 0.678);border-radius:10px;margin-top:5vh;"> <!-- contenedor de columna del medio -->
                <form class="px-4 py-3" action="http://localhost/prueba/LogIn.inc.php" method="POST">
                    <div class="mb-3">  <!-- usuario -->
                        <label for="username" class="form-label"></label>
                        <input type="text" name="username" class="form-control" id="exampleDropdownFormEmail1" placeholder="Username">
                    </div>
                    <div class="mb-3">  <!-- contraseña -->
                        <label for="exampleDropdownFormPassword1" class="form-label"></label>
                        <input type="password" name="password" class="form-control" id="exampleDropdownFormPassword1" placeholder="Password">
                    </div>
                    <div class="mb-3"> 
                    <div id="passwordHelpBlock" class="form-text" style="color:white;padding-top:5%;">
                     Your password must be 8-20 characters long, contain letters, numbers and
                     special characters, and must not contain spaces.
                    </div>
                    <div style="margin-top:10%;">   <!-- boton submit -->
                        <button type="submit" name="login" class="btn btn-primary">Sign in</button>
                    </div>
                    <div style="margin-top:10%;a:link"> <!-- link para crear cuenta -->
                        <a style="color:blue;" href="http://localhost/prueba/SignUp.php">No tienes cuenta?</a>
                    </div>
                </form>
            </div>
            <div style="width:35%;"><!-- contenedor de columna derecha-->
            </div>    
        </div>

        <?php 
        // mensajes de alerta de error al logearse

            $URL = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

            if(strpos($URL, "login=empty") == true){ //algun campo vacio
                echo "<div style='width:30%;margin-inline:35%;'>
                <p style='width:fit-content;padding-inline:5%;padding-top:2%;padding-bottom:2%;
                border-radius:10px;border:solid;border-color:rgba(112, 0, 0, 0.822)
                ;margin:0 auto;margin-top:15%;background-color:rgba(228, 83, 83, 0.692);'>
                Debes rellenar todos los campos</p></div>";
            }
            if(strpos($URL, "login=error") == true){ // error de contraseña o usuario
                echo "<div style='width:30%;margin-inline:35%;'>
                <p style='text-align:center;width:fit-content;padding-inline:5%;padding-top:2%;padding-bottom:2%;
                border-radius:10px;border:solid;border-color:rgba(112, 0, 0, 0.822)
                ;margin:0 auto;margin-top:15%;background-color:rgba(228, 83, 83, 0.692);'>
                Contraseña o usuario incorrectos</p></div>";
            }
        ?>
    </div>
</body>
</html>
