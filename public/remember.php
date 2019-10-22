<?php
include_once "config.php";

use Ejercicios\Form;
use Ejercicios\SIInput;
use PHPMailer\PHPMailer\PHPMailer;
session_start();

$formulari = new Form([new SIInput('Correu','email')]);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try{
        $sth = $conn->prepare( "SELECT * FROM usuarios WHERE email = :email");
        $sth->bindParam(':email',$_POST['email']);
        $sth->execute();
        if (!$sth->rowCount()) throw new Exception('No existe ese email en la bd');
        $usuario = $sth->fetch(PDO::FETCH_OBJ);
        $newPass = str_random();
        $sth = $conn->prepare( "UPDATE usuarios SET password = :password WHERE usuario = :usuario ");
        $hash = md5($newPass);
        $sth->bindParam(':password',$hash);
        $sth->bindParam(':usuario',$usuario->usuario);
        $sth->execute();
        if ($sth->rowCount() == 0) throw  new Exception('Error al modificar');
        //enviar correo
        $mail = new PHPMailer();
        $mail->IsSMTP();
        // cambiar a 0 para no ver mensajes de error
        $mail->SMTPDebug  = 2;
        $mail->SMTPAuth   = true;
        $mail->SMTPSecure = "tls";
        $mail->Host       = "smtp.gmail.com";
        $mail->Port       = 587;
        // introducir usuario de google


        $mail->Username   = "cipfpbatoi2daw@gmail.com";
        // introducir clave
        $mail->Password   = "2dawDWES";
        $mail->SetFrom('cipFpBatoi2DAW@gmail.com', 'Ignasi Gomis Mullor');
        // asunto
        $mail->Subject    = "Canvi de prova";
        // cuerpo
        $mail->MsgHTML("T'envie la nova contrasenya: $newPass");
        // destinatario
        $address = $usuario->email;
        $mail->AddAddress($address, $usuario->usuario);
        // enviar
        $resul = $mail->Send();
        if(!$resul) throw  new Exception("No s'ha pogut enviar el fitxer");

        header('Location:login.php');

    }
    catch (Exception $e){
        $error = $e->getMessage();
    }
    catch (Error $e){
        $error = 'Error en la consulta '.$e->getMessage();
    }
}

$titulo = "Recordar contrasenya";
include_once "./../view/cabecera.php";
if (isset($error)) echo"<p class='error'>$error</p>";
$formulari->render();
include_once "./../view/pie.php";