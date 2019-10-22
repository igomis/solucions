<?php
include_once "config.php";

use Ejercicios\Form;
use Ejercicios\SIInput;
session_start();

$formulari = new Form([new SIInput('Usuari','usuario'),new SIInput('Password','password','password')]);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try{
        $sth = $conn->prepare( "SELECT * FROM usuarios WHERE usuario = :usuario");
        $sth->bindParam(':usuario',$_POST['usuario']);
        $sth->execute();
        if (!$sth->rowCount()) throw new Exception('Usuario no encontrado');
        $usuario = $sth->fetch(PDO::FETCH_OBJ);
        if ($usuario->password != md5($_POST['password'])) throw  new Exception('Password no valida');
        $_SESSION['usuario'] = $usuario->usuario;
        header('Location:main.php');

    }
    catch (Exception $e){
        $error = $e->getMessage();
    }
    catch (Error $e){
        $error = 'Error en la consulta '.$e->getMessage();
    }
}

$titulo = "Login";
include_once "./../view/cabecera.php";
if (isset($error)) echo"<p class='error'>$error</p>";
echo $formulari->render();
echo("<br/><a href='registre.php'>Registre</a><br/><a href='remember.php'>Recordar contrasenya</a>");
include_once "./../view/pie.php";
