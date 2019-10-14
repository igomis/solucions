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
	<title>Activitat 4. Formularis - Conversor</title>
</head>
<body>
	<h1>Activitat 4. Formularis - Conversor</h1>
	<form action="<?= $_SERVER["PHP_SELF"]; ?>" method="POST">
		<h2>Conversor de moneda:</h2>
		<strong>Convertir la cantidad de: </strong> <input type="number" name="monedaConvertir" min="0"/> <br/>
		<strong>a:</strong>
		<select name="moneda">
			<option value="Euros">Euros</option>
			<option value="Pesetas">Pesetas</option>
		</select>
		<!-- ENVIO DEL FORM -->
		<br><br>
		<input type="submit" value="Enviar" style="text-transform: uppercase;">
		<input type="reset" value="Reset" style="text-transform: uppercase;">
	</form>

	<h2>Resultados:</h2>
	<?php 
	//*****MOSTRAR RESULTADOS*****
	echo "<strong>El resultado de la conversion es:</strong> " . round(conversion($_POST['monedaConvertir'] ?? '', $_POST['moneda'] ?? ''), 2);

	function conversion($monedaConvertir, $moneda) {
		$monedaConvertir = (float)($monedaConvertir);
		$pesetaEuro = 166.386;
		if ($moneda == 'Pesetas') {
			return $monedaConvertir * $pesetaEuro;
		}
		return $monedaConvertir / $pesetaEuro;
	}
	?>
</body>
</html>