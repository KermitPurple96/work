<?php
if(!isset($_SESSION['username'])){

header("Location: http://localhost/prueba/login.php?");
exit();
}

?>