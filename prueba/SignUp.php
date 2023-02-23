<!DOCTYPE html>
<html lang="es">
<head>                                       <!-- interfaz para registrarse -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Document</title>
</head>

<body> <!-- titulo-->
    <header style="width:100%;text-align:center;margin-top:2%;">
        <h1>Sign Up</h1>
    </header>
    <div class="container"><!-- contenedor de todo -->
        <div class="row"> <!-- contenedor de la unica fila -->
            <div style="width:35%;"> <!-- contenedor de columna izq -->
            </div>      
                             <!-- contenedor del formulario -->
            <div style="width:30%;background-color:rgba(128, 128, 128, 0.678);border-radius:10px;margin-top:5vh;padding:5%;"> 
                <form action="SignUp.inc.php" method="POST">
                    <div class="mb-3"> <!-- nombbre -->
                        <label for="formGroupExampleInput" class="form-label">Nombre</label>
                        <input type="text" name="name" class="form-control">
                    </div>
                    <div class="mb-3"> <!-- correo-->
                        <label for="formGroupExampleInput" class="form-label">Correo electrónico</label>
                        <input type="email" name="email" class="form-control" id="formGroupExampleInput">
                    </div>
                    <div class="mb-3"> <!-- password -->
                        <label for="formGroupExampleInput" class="form-label">Contraseña</label>
                        <input type="password" name="password" class="form-control" id="formGroupExampleInput">
                    </div>
                    <div class="mb-3"> <!-- password check-->
                        <label for="formGroupExampleInput" class="form-label">Repite la contraseña</label>
                        <input type="password" name="password2" class="form-control" id="formGroupExampleInput">
                    </div>
                    <div> <!-- boton submit-->
                        <button type="submit" name="signin" class="btn btn-success" style="width:40%;margin-top:20px;margin-inline:4%;margin-bottom:10px;">Sign In</button>
                        <button type="reset" class="btn btn-danger" style="width:40%;margin-top:20px;margin-inline:4%;margin-bottom:10px;">Borrar</button>
                    </div> <!-- link para el login-->
                    <div style="margin-top:10%;a:link">
                        <a style="color:blue;" href="http://localhost/prueba/LogIn.php">Ya tienes cuenta?</a>
                    </div>
                </form>                    
            </div>
            <div style="width:35%;">

            </div>     
            <?php
            // mensajes de alerta si el registro es incorrecto
                $URL = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
                // campos vacios
                if(strpos($URL, "signup=empty") == true){
                    echo "<div style='width:30%;margin-inline:35%;'>
                    <p style='width:fit-content;padding-inline:5%;padding-top:2%;padding-bottom:2%;
                    border-radius:10px;border:solid;border-color:rgba(112, 0, 0, 0.822)
                    ;margin:0 auto;margin-top:15%;background-color:rgba(228, 83, 83, 0.692);'>
                    Debes rellenar todos los campos</p></div>";
                }
                // contraseñas no coinciden
                if(strpos($URL, "signup=password") == true){
                    echo "<div style='width:30%;margin-inline:35%;'>
                    <p style='width:fit-content;padding-inline:5%;padding-top:2%;padding-bottom:2%;
                    border-radius:10px;border:solid;border-color:rgba(112, 0, 0, 0.822)
                    ;margin:0 auto;margin-top:15%;background-color:rgba(228, 83, 83, 0.692);'>
                    Las contraseñas no coinciden</p></div>";
                }
                // el nombre de usuario ya esta en uso en la database
                if(strpos($URL, "signup=name") == true){
                    echo "<div style='width:30%;margin-inline:35%;'>
                    <p style='width:fit-content;padding-inline:5%;padding-top:2%;padding-bottom:2%;
                    border-radius:10px;border:solid;border-color:rgba(112, 0, 0, 0.822)
                    ;margin:0 auto;margin-top:15%;background-color:rgba(228, 83, 83, 0.692);'>
                    El nombre ya está en uso</p></div>";
                }
                //  el email ya esta en uso en la database
                if(strpos($URL, "signup=email") == true){
                    echo "<div style='width:30%;margin-inline:35%;'>
                    <p style='width:fit-content;padding-inline:5%;padding-top:2%;padding-bottom:2%;
                    border-radius:10px;border:solid;border-color:rgba(112, 0, 0, 0.822)
                    ;margin:0 auto;margin-top:15%;background-color:rgba(228, 83, 83, 0.692);'>
                    El email ya está en uso</p></div>";
                }
            ?>  
        </div>
    </div>
</body>
</html>