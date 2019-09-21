<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Desarrollo Web con PHP 7 y MVC</title>
    <style>
        table, tr, td, th{
            border: 1px solid black;
        }
    </style>
</head>
<body>
    <h1>Tema 1: Actividad 3</h1>
<?php

    // Dades inicials
    $nombres = [
        'Alejandro',
        'María',
        'Carlos',
        'Raquel'
    ];
    $miNombre = 'Alejandro';
    $alumnos = [
        ['id' => 1, 'nombre' => 'Sara', 'edad' => 19],
        ['id' => 2, 'nombre' => 'Pablo', 'edad' => 18],
        ['id' => 3, 'nombre' => 'Manuel', 'edad' => 19],
        ['id' => 4, 'nombre' => 'Yolanda', 'edad' => 20],
    ];
    $numeros = [5, 7, 3, 4, 1, 6, 8, 2, 9, 0];
    $paraules = ['mesa'=>'table','lapiz'=>'pencil','chica'=>'girl','chico'=>'boy','telefono'=>'telephon'];

    //operacion amb $nombres
    $numNombres = count($nombres);
    $strNombres = implode(' ', $nombres);
    $nombresOrdenados = $nombres;
    asort($nombresOrdenados);
    $strNombresOrdenados = implode(' ', $nombresOrdenados);
    $nombresInvertido = array_reverse($nombres);
    $strNombresInvertido = implode(' ', $nombresInvertido);
    $posicionNombre = array_search($miNombre, $nombres);

    //operacions amb $alumnos
    $nombresAlumnos = array_column($alumnos, 'nombre');
    $strNombresAlumnos = implode(' ', $nombresAlumnos);

    //operacions amb $numeros
    $suma = array_sum($numeros);
?>

    <p>Número de nombres: <?= $numNombres ?></p>
    <p>Nombres inicial: <?= $strNombres ?></p>
    <p>Nombres ordenados: <?= $strNombresOrdenados ?></p>
    <p>Nombres invertido: <?= $strNombresInvertido ?></p>
    <p>Mi nombre <?= $miNombre ?> está en la posición <?= $posicionNombre+1 ?></p>

    <hr/>
    <table>
        <tr>
            <th>ID</th><th>NOMBRE</th><th>EDAD</th>
        </tr>
        <?php
            foreach ($alumnos as $alumno)
            {
        ?>
                <tr>
                    <td><?= $alumno['id'] ?></td>
                    <td><?= $alumno['nombre'] ?></td>
                    <td><?= $alumno['edad'] ?></td>
                </tr>
        <?php
            }
        ?>
    </table>
    <p>Nombres alumnos: <?= $strNombresAlumnos ?></p>
    <hr/>
    <h2>Diccionario</h2>
    <table>
        <tr>
            <th>Castellano</th><th>Inglés</th>
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
    <hr/>
    La suma de  <?= implode(' + ', $numeros)  ?>   es  <?= $suma ?>
</body>
</html>