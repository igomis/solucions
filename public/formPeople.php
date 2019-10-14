<?php
require dirname(__FILE__) . "/../vendor/autoload.php";
$whoops = new \Whoops\Run;
$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
$whoops->register();


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $DNI = htmlspecialchars(trim($_POST["DNI"]));
    $Nombre = htmlspecialchars(trim($_POST["Nombre"]));
    $Edad = htmlspecialchars(trim($_POST["Edad"]));
    $Sexo = $_POST["sexo"];
    $Hobbies = $_POST["hobbies"];
    $nombre_imagen = $_FILES["imagen"]["name"];
    $tipo_imagen = $_FILES["imagen"]["type"];
    $ruta = "images/";

    try {
        if ($tipo_imagen != "image/jpeg" && $tipo_imagen != "image/png" && $tipo_imagen != "image/gif") throw new Exception("Sube una imagen de tipo: jpegs, pngs o gifs...");
        if ($Edad < 0 || $Edad > 100) throw new Exception("Datos incorrectos, por favor, introduce una edad correcta.");
        if (strlen($DNI) != 9) throw new Exception( "Datos incorrectos, por favor, introduce DNI correcto.");
    }
    catch(Exception $e){
        $error = $e->getMessage();
    };
    if (!isset($error)) {
        move_uploaded_file($_FILES["imagen"]["tmp_name"], $ruta . $nombre_imagen);
        $personas = array(
            array('DNI' => $DNI, 'Nombre' => $Nombre, 'Edad' => $Edad, 'Sexo' => $Sexo, 'Hoobies' => $Hobbies, 'Imagen' => $nombre_imagen),
        );
    }
}
?>
<!DOCTYPE html>
<html lang='es'>

    <head>
        <title>Introducción de Personas</title>
        <meta charset='utf-8'>

    </head>

    <!-- ~~~~~~~~~~~~~~~~~~~~~✦✦✦✦✦✦✦✦✦✦ B O D Y ✦✦✦✦✦✦✦✦✦✦~~~~~~~~~~~~~~~~~~~~~ -->
    <body>
        <style>#header_wrap{background:#222;background:-moz-linear-gradient(top,#373737,#212121);background:-webkit-linear-gradient(top,#373737,#212121);background:-ms-linear-gradient(top,#373737,#212121);background:-o-linear-gradient(top,#373737,#212121);background:linear-gradient(to top,#373737,#212121)}#header_wrap .inner{padding:50px 10px 30px 10px}.inner{position:relative;max-width:640px;padding:20px 10px;margin:0 auto}#project_title{margin:0;color:#fff;font-size:42px;font-weight:700;text-shadow:#111 0px 0px 10px}#project_tagline{color:#fff;font-size:24px;font-weight:300;background:none;text-shadow:#111 0px 0px 10px}input[type=text]:focus{background-color:#4B8;color:white}input[type=text]{border:3px solid#555;text-align:center;height:26px;width:145px}select{text-align-last:center}input[type=number]:focus{background-color:#4B8;color:white}input[type=number]{border:3px solid#555;text-align:center;height:26px;width:145px}input[type="submit"]{width:75px;height:25px;background-color:white;color:black;border:2px solid#E43}input[type="submit"]:hover{background-color:#E43;color:white;text-align:center}body{margin:0;padding:0}.main{max-height:550px;;background-color:#233;color:white;font-size:38pt;text-align:center;line-height:550px}footer{bottom:0}.footer-distributed{background-color:#222;box-shadow:0 1px 1px 0#0000001E;box-sizing:border-box;width:100%;text-align:left;font:bold 16px sans-serif;padding:55px 50px;margin-top:80px}.footer-distributed .footer-left,.footer-distributed .footer-center,.footer-distributed .footer-right{display:inline-block;vertical-align:top}.footer-distributed .footer-left{width:40%}.footer-distributed h3{color:#FFF;font:normal 36px 'Cookie',cursive;margin:0}.footer-distributed h3 span{color:#58C}.footer-distributed .footer-links{color:#FFF;margin:20px 0 12px;padding:0}.footer-distributed .footer-links a{display:inline-block;line-height:1.8;text-decoration:none;color:inherit}.footer-distributed .footer-company-name{color:#899;font-size:14px;font-weight:normal;margin:0}.footer-distributed .footer-center{width:35%}.footer-distributed .footer-center i{background-color:#333;color:#FFF;font-size:25px;width:38px;height:38px;border-radius:50%;text-align:center;line-height:42px;margin:10px 15px;vertical-align:middle}.footer-distributed .footer-center i.fa-envelope{font-size:17px;line-height:38px}.footer-distributed .footer-center p{display:inline-block;color:#FFF;vertical-align:middle;margin:0}.footer-distributed .footer-center p span{display:block;font-weight:normal;font-size:14px;line-height:2}.footer-distributed .footer-center p a{color:#58C;text-decoration:none}.footer-distributed .footer-right{width:20%}.footer-distributed .footer-company-about{line-height:20px;color:#999;font-size:13px;font-weight:normal;margin:0}.footer-distributed .footer-company-about span{display:block;color:#FFF;font-size:14px;font-weight:bold;margin-bottom:20px}.footer-distributed .footer-icons{margin-top:25px}.footer-distributed .footer-icons a{display:inline-block;width:35px;height:35px;cursor:pointer;background-color:#333;border-radius:2px;font-size:20px;color:#FFF;text-align:center;line-height:35px;margin-right:3px;margin-bottom:5px}@media(max-width:880px){.footer-distributed{font:bold 14px sans-serif;}.footer-distributed .footer-left,.footer-distributed .footer-center,.footer-distributed .footer-right{display:block;width:100%;margin-bottom:40px;text-align:center;}.footer-distributed .footer-center i{margin-left:0;}.main{line-height:normal;font-size:auto;}}</style>

        <!-- HEADER -->
        <div id="header_wrap" class="outer">
            <header class="inner">
                <h1 id="project_title">"04-Introducción Persona.php"</h1>
                <h2 id="project_tagline">Solució</h2>
            </header>
        </div>
        <br>

        <h1><mark>Fes un formulari per a introduir les dades de persones en un array semblant al del exercisi 2.2. Utilitza un check per al sexe i un desplegable per arreplar dades dels seus hobbies. Afegix la foto de la persona que guardaras a una carpeta del servidor.Mostra per pantalla l’últim introduït.</mark></h1><br>




        <?php
            if (isset($error)) echo $error;
        ?>


        <form method="POST" enctype="multipart/form-data">
            <p><strong>Introduce tus datos, por favor.</strong></p>
            <input type="text" name="DNI" placeholder="DNI" required/>
            <input type="text" name="Nombre" placeholder="Nombre" required/>
            <input type="text" name="Edad" placeholder="Edad" required/>
            <p>Sexo:
                <input type="radio" name="sexo" value="Hombre" checked="checked"> Hombre
                <input type="radio" name="sexo" value="Mujer"> Mujer
            </p>
            <select name="hobbies">
                <option value="correr">Correr</option>
                <option value="escalar">Escalar</option>
                <option value="videojuegos">Videojuegos</option>
                <option value="tv">Ver la Televisión</option>
                <option value="dormir">Dormir</option>
                <option value="estudiar">Estudiar</option>
            </select>
            <input name="imagen" size="20" type="file" name="fichero">
            <input type="submit" name="submit"/><br>
        </form>





        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST" && !isset($error)){
       ?>
            <table style='border: 1px solid black'>
            <tr>
                <td align='center' style='border: 1px solid black'> DNI
                <td align='center' style='border: 1px solid black'> Nombre
                <td align='center' style='border: 1px solid black'> Edad
                <td align='center' style='border: 1px solid black'> Sexo
                <td align='center' style='border: 1px solid black'> Hoobies
                <td align='center' style='border: 1px solid black'> Imagen
             <tr/>
            <?php
                foreach ($personas as $persona) {
            ?>
                <tr>
                    <td><?= $persona['DNI'] ?></td>
                    <td><?= $persona['Nombre'] ?></td>
                    <td><?= $persona['Edad'] ?></td>
                    <td><?= $persona['Sexo'] ?></td>
                    <td><?= $persona['Hoobies'] ?></td>
                    <td><img src="<?= $ruta.$persona['Imagen'] ?>"</td>
                </tr>
            <?php } ?>
            </table><hr>
        <?php } ?>
    </body>
</html>