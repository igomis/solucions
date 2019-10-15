<?php
require dirname(__FILE__) . "/../vendor/autoload.php";
$whoops = new \Whoops\Run;
$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
$whoops->register();
session_start();
if (isset($_SESSION['diccionari'])) $paraules = $_SESSION['diccionari'];
else $paraules = array();
?>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $spanish = htmlspecialchars(trim($_POST["spanish"]));
    $english = htmlspecialchars(trim($_POST["english"]));
    $paraules[$english] = $spanish;
    $_SESSION['diccionari'] = $paraules;
}
?>
<!DOCTYPE html>
<html lang='es'>

    <head>
        <title>Introducción de traducciones</title>
        <meta charset='utf-8'>

    </head>

    <!-- ~~~~~~~~~~~~~~~~~~~~~✦✦✦✦✦✦✦✦✦✦ B O D Y ✦✦✦✦✦✦✦✦✦✦~~~~~~~~~~~~~~~~~~~~~ -->
    <body>
        <style>#header_wrap{background:#222;background:-moz-linear-gradient(top,#373737,#212121);background:-webkit-linear-gradient(top,#373737,#212121);background:-ms-linear-gradient(top,#373737,#212121);background:-o-linear-gradient(top,#373737,#212121);background:linear-gradient(to top,#373737,#212121)}#header_wrap .inner{padding:50px 10px 30px 10px}.inner{position:relative;max-width:640px;padding:20px 10px;margin:0 auto}#project_title{margin:0;color:#fff;font-size:42px;font-weight:700;text-shadow:#111 0px 0px 10px}#project_tagline{color:#fff;font-size:24px;font-weight:300;background:none;text-shadow:#111 0px 0px 10px}input[type=text]:focus{background-color:#4B8;color:white}input[type=text]{border:3px solid#555;text-align:center;height:26px;width:145px}select{text-align-last:center}input[type=number]:focus{background-color:#4B8;color:white}input[type=number]{border:3px solid#555;text-align:center;height:26px;width:145px}input[type="submit"]{width:75px;height:25px;background-color:white;color:black;border:2px solid#E43}input[type="submit"]:hover{background-color:#E43;color:white;text-align:center}body{margin:0;padding:0}.main{max-height:550px;;background-color:#233;color:white;font-size:38pt;text-align:center;line-height:550px}footer{bottom:0}.footer-distributed{background-color:#222;box-shadow:0 1px 1px 0#0000001E;box-sizing:border-box;width:100%;text-align:left;font:bold 16px sans-serif;padding:55px 50px;margin-top:80px}.footer-distributed .footer-left,.footer-distributed .footer-center,.footer-distributed .footer-right{display:inline-block;vertical-align:top}.footer-distributed .footer-left{width:40%}.footer-distributed h3{color:#FFF;font:normal 36px 'Cookie',cursive;margin:0}.footer-distributed h3 span{color:#58C}.footer-distributed .footer-links{color:#FFF;margin:20px 0 12px;padding:0}.footer-distributed .footer-links a{display:inline-block;line-height:1.8;text-decoration:none;color:inherit}.footer-distributed .footer-company-name{color:#899;font-size:14px;font-weight:normal;margin:0}.footer-distributed .footer-center{width:35%}.footer-distributed .footer-center i{background-color:#333;color:#FFF;font-size:25px;width:38px;height:38px;border-radius:50%;text-align:center;line-height:42px;margin:10px 15px;vertical-align:middle}.footer-distributed .footer-center i.fa-envelope{font-size:17px;line-height:38px}.footer-distributed .footer-center p{display:inline-block;color:#FFF;vertical-align:middle;margin:0}.footer-distributed .footer-center p span{display:block;font-weight:normal;font-size:14px;line-height:2}.footer-distributed .footer-center p a{color:#58C;text-decoration:none}.footer-distributed .footer-right{width:20%}.footer-distributed .footer-company-about{line-height:20px;color:#999;font-size:13px;font-weight:normal;margin:0}.footer-distributed .footer-company-about span{display:block;color:#FFF;font-size:14px;font-weight:bold;margin-bottom:20px}.footer-distributed .footer-icons{margin-top:25px}.footer-distributed .footer-icons a{display:inline-block;width:35px;height:35px;cursor:pointer;background-color:#333;border-radius:2px;font-size:20px;color:#FFF;text-align:center;line-height:35px;margin-right:3px;margin-bottom:5px}@media(max-width:880px){.footer-distributed{font:bold 14px sans-serif;}.footer-distributed .footer-left,.footer-distributed .footer-center,.footer-distributed .footer-right{display:block;width:100%;margin-bottom:40px;text-align:center;}.footer-distributed .footer-center i{margin-left:0;}.main{line-height:normal;font-size:auto;}}</style>

        <!-- HEADER -->
        <div id="header_wrap" class="outer">
            <header class="inner">
                <h1 id="project_title">"03-Introducción Traducciones.php"</h1>
                <h2 id="project_tagline">Solucio</h2>
            </header>
        </div>
        <br>

        <h1><mark>Ejercicio Fes un formulari per a introduir les dades de l’array de traduccions de l’exercisi 2.2.</mark></h1>

        <form method="POST">
            <p><strong>Introduce una palabra en español y su traducción en inglés.</strong></p>
            <input type="text" name="spanish" placeholder="Palabra en valencia" required/> =
            <input type="text" name="english" placeholder="Palabra en inglés" required/>
            <input type="submit" name="submit"/><br>
        </form>




        <table>
            <tr>
                <th>Valencià</th><th>Anglés</th>
            </tr>
            <?php
            foreach ($paraules as $castellano => $angles)
            {
                ?>
                <tr>
                    <td><?= $castellano ?></td>
                    <td><?= $angles ?></td>
                </tr>
            <?php
            }
            ?>
        </table>
        <a href="diccionari.php" >Tornar al joc</a>
    </body>

</html>