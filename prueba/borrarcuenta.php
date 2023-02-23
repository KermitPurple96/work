<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
<?php
    require_once 'conexion.php';
    $username = $_SESSION['username'];
    $sql = "delete from usuario where name = '$username';" or die('error de conexion con la database');

    unset($_SESSION["username"]); 
    unset($_SESSION["password"]); 
    unset($_SESSION["email"]); 
    session_destroy();

    echo 
    "<div class='alert alert-success' role='alert' 
    style='width:10%;margin-left:auto;margin-right:auto;text-align:center;margin-top:20%;'>
    Cuenta borrada.
    </div>";
    header( "Refresh:2; url=LogIn.php");
    exit();

?>
</body>
</html>