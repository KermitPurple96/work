<?php
    require_once 'conexion.php';

    // conexion con la database
?>
<!DOCTYPE html>
<html lang="en">
<head>         <!-- interfaz de mi cuenta  -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
       <!-- titulo -->
    <header style="width:100%;text-align:center;margin-top:2%;">
        <h1>Mi cuenta</h1>
    </header>
       <!-- contenedor de los columns -->
    <div class="row">
           <!-- column izq con nombre de usuario-->
        <div style="width:37.5%;">
            <div style='width:30%;background-color:rgba(16, 189, 0, 0.432);text-align:center;margin-left:12vw;border-radius:5px;
                    border:solid;border-width:2px;border-color:green;margin-top:3%;'>
                    <p style='margin-top:4px;margin-bottom:0px;'>Sesión iniciada:</p>
                    <b><p style='font-size:larger;margin-bottom:4px;'>
                    <?php if(!empty($_SESSION['username'])){ echo $_SESSION['username'];}?></p></b>
            </div>
        </div>
        <!-- columna del medio con el campo nombre de usuario -->
        <div style="width:25%;display:flex;background-color:rgba(128, 128, 128, 0.678);border-radius:10px;margin-top:1%;padding-top:1%;
            font-size:x-large">
            <p style="width:50%;text-align:right;padding-right:1%;">Nombre: </p><br>
            <p style="width:50%;padding-left:1%;"> <?php if(!empty($_SESSION['username'])){ echo $_SESSION['username'];}?></p>
        </div>
        <div style="width:37.5%;"></div>
        <!-- column izq con boton a formulario-->
        <div style="width:37.5%;">
            <button onclick="location.href='http://localhost/prueba/back.php'" style='width:30%;margin-left:12vw;margin-top:2.5vh;font-size:larger;'
                    class="btn btn-info">Publicar post
            </button>
        </div>
        <!-- columna del medio con el campo correo -->
        <div style="width:25%;display:flex;background-color:rgba(128, 128, 128, 0.678);border-radius:10px;margin-top:1%;padding-top:1%;
             font-size:x-large">
            <p style="width:30%;text-align:right;padding-right:1%;">Email: </p><br>
            <p style="width:70%;padding-left:1%;text-align:left;"> <?php if(!empty($_SESSION['email'])){ echo $_SESSION['email'];}?></p>
        </div>
        <div style="width:37.5%;"></div>
        <!-- column izq con boton a Posts-->
        <div style="width:37.5%;">
            <button onclick="location.href='http://localhost/prueba/index.php'" style='width:30%;margin-top:2.5vh;margin-left:12vw;'
                        class="btn btn-primary btn-lg">Posts
            </button>
            <button onclick="location.href='http://localhost/prueba/galeria.php'" style='width:30%;margin-top:2.5vh;margin-left:12vw;'
                    class="btn btn-success">Galeria
            </button>
        </div>
        <!-- column del medio con boton para borrar cuenta / cerrar sesion-->
        <div style="width:25%;background-color:rgba(128, 128, 128, 0.678);border-radius:10px;margin-top:1%;padding:1%;">
            <button type="button" id="boton" class="btn btn-danger" style="width:40%;margin-top:2px;margin-left:5%;margin-bottom:2px;"
                onclick="borrarcuenta()">Borrar cuenta</button>
            <button type="button" id="boton2" class="btn btn-warning" style="width:40%;margin-top:2px;margin-left:5%;margin-bottom:2px;"
                onclick="cerrarsesion()">Cerrar sesion</button>
        </div>
        <div style="width:37.5%;">
        </div>
        <div style="width:37.5%;">
        </div>
        <!-- alerta d eseguridad para borrar la cuenta -->
        <div id="borrar" style="width:25%;background-color:rgba(128, 128, 128, 0.678);margin-top:1%;text-align:center;
                border-radius:10px;padding:0.5%;display:none;">
                <p>¿Estas seguro de borrar la cuenta?</p>
                <div >
                    <button type="button" class="btn btn-danger" style='margin-inline:5%;'
                          onclick="location.href='http://localhost/prueba/borrarcuenta.php'">Borrar</button>
                    <button type="button" class="btn btn-light" style='margin-inline:5%;'>Cancelar</button>
                </div>
        </div>
        <div style="width:37.5%;">
        </div>
        <div style="width:37.5%;">
        </div>
        <!-- alerta de seguridad para cerrar sesion -->
        <div id="cerrar" style="width:25%;background-color:rgba(128, 128, 128, 0.678);margin-top:1%;text-align:center;
                border-radius:10px;padding:0.5%;display:none;">
                <p>¿Estas seguro de cerrar sesion?</p>
                <div >
                    <button type="button" class="btn btn-warning" style='margin-inline:5%;'
                          onclick="location.href='http://localhost/prueba/cerrarsesion.php'">Salir</button>
                    <button type="button" class="btn btn-light" style='margin-inline:5%;'>Cancelar</button>
                </div>
        </div>
        <div style="width:37.5%;">

        </div>
    </div>
</body>
<script>
//  alerta d eseguridad para borrar la cuenta 
    function borrarcuenta(){

        let input = document.getElementById("borrar");
        let displayinput = input.style.display;
        if(displayinput == 'none'){
            input.style.display = '';
        }
        if(displayinput == ''){
            input.style.display = 'none';
        }
    }
    //  alerta d eseguridad para cerrar sesion
    function cerrarsesion(){

        let input = document.getElementById("cerrar");
        let displayinput = input.style.display;
        if(displayinput == 'none'){
            input.style.display = '';
        }
        if(displayinput == ''){
            input.style.display = 'none';
        }
    }
</script>
</html>


