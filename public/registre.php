<?php
include_once "config.php";

use Ejercicios\Form;
use Ejercicios\SIInput;
session_start();

$formulari = new Form([new SIInput('Usuari','usuario'),new SIInput('Correu','email'),new SIInput('Password','password','password')]);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try{
        $sth = $conn->prepare( "SELECT * FROM usuarios WHERE usuario = :usuario OR email = :email");
        $sth->bindParam(':usuario',$_POST['usuario']);
        $sth->bindParam(':email',$_POST['email']);
        $sth->execute();
        if ($sth->rowCount()) throw new Exception('Usuario con esos datos ya dado de alta');
        $sth = $conn->prepare( "INSERT INTO usuarios(usuario,email,password) VALUES(:usuario,:email,:password)");
        $hash = md5($_POST['password']);
        $sth->bindParam(':usuario',$_POST['usuario']);
        $sth->bindParam(':email',$_POST['email']);
        $sth->bindParam(':password',$hash);
        $sth->execute();
        if ($sth->rowCount() == 0) throw  new Exception('Error al insertar');
        header('Location:login.php');

    }
    catch (Exception $e){
        $error = $e->getMessage();
    }
    catch (Error $e){
        $error = 'Error en la consulta '.$e->getMessage();
    }
}

$titulo = "Registre";
include_once "./../view/cabecera.php";
if (isset($error)) echo"<p class='error'>$error</p>";
echo $formulari->render();
include_once "./../view/pie.php";