<!-- Zaira Bravo Sánchez - 2nd DAW -->

<?php
require dirname(__FILE__) . "/../vendor/autoload.php";
$whoops = new \Whoops\Run;
$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
$whoops->register();
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="style.css">
	<title>Activitat 4. Formularis - Datos personales</title>
</head>
<body>
	<h1>Activitat 4. Formularis</h1>
	<form action="<?= $_SERVER["PHP_SELF"]; ?>" method="POST">
		<h2>Datos personales:</h2>
		<strong>Nombre: </strong><input type="text" name="nombre" placeholder="Tu nombre"><br>
		<strong>Apellidos: </strong><input type="text" name="apellidos" placeholder="Tus apellidos"><br>
		<strong>Hombre </strong><input type="radio" name="genero" value="Hombre"> <br>
		<strong>Mujer </strong><input type="radio" name="genero" value="Mujer"><br>
		<strong>Hobbie: </strong>
		<select name="hobbie">
			<option value="Dibujar">Dibujar
			</option>
			<option value="Nadar">Nadar
			</option>
			<option value="Música">Música
			</option>
			<option value="Videojuegos">Videojuegos
			</option>
		</select>
		<!-- ENVIO DEL FORM -->
		<br><br>
		<input type="submit" value="Enviar" style="text-transform: uppercase;">
		<input type="reset" value="Reset" style="text-transform: uppercase;">
	</form>

	<h2>Resultados:</h2>
	<?php 
	//*****MOSTRAR RESULTADOS*****
	echo datos($_POST['nombre'] ?? '', $_POST['apellidos'] ?? '', $_POST['genero'] ?? '', $_POST['hobbie'] ?? '');

	//*****DATOS PERSONALES*****
	function datos($nombre, $apellidos, $genero, $hobbie){
		$datosPersona = [
			'Nombre' => $nombre,
			'Apellidos' => $apellidos,
			'Genero' => $genero,
			'Hobbie' => $hobbie
		];
		//Mostrar datos:
		echo "<strong>Datos:</strong><br>";
		foreach ($datosPersona as $key => $value) {
			echo "--".$key.": ".$value."<br>";
		}
	}
	?>
</body>
</html>