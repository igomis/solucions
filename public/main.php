<?php
session_start();



if (!isset($_SESSION['usuario'])) header('Location:login.php');


$titulo = "Login Correcto:Usuari ".$_SESSION['usuario'];
include_once "./../view/cabecera.php";
?>
<form action='logout.php' method="post">
    <input type="submit" name="Logout" value="logout">
</form>
<?php include_once "./../view/pie.php"; ?>