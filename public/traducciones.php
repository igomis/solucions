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
	<title>Activitat 4. Formularis</title>
</head>
<body>
	<h1>Activitat 4. Formularis - Traducciones</h1>
	<form action="<?= $_SERVER["PHP_SELF"]; ?>" method="POST">
		<!-- TRADUCCIONES -->
		<h2>Traducciones:</h2>
		<table>
			<tr>
				<td>Español</td>
				<td><input type="text" name="esp1"></td>
				<td><input type="text" name="esp2"></td>
			</tr>
			<tr>
				<td>Ingles</td>
				<td><input type="text" name="en1"></td>
				<td><input type="text" name="en2"></td>
			</tr>
		</table>
		<br><br>
		<input type="submit" value="Enviar" style="text-transform: uppercase;">
		<input type="reset" value="Reset" style="text-transform: uppercase;">
	</form>

	<h2>Resultados:</h2>
	<?php 
	//*****MOSTRAR RESULTADOS*****
	echo "<br><strong>Traducciones dadas:</strong>";
	echo traducciones($_POST['esp1'] ?? '', $_POST['esp2'] ?? '', $_POST['en1'] ?? '', $_POST['en2'] ?? '');

	//*****TRADUCCIONES DEL USUARIO*****
	function traducciones($esp1, $esp2, $en1, $en2){
		$idiomas = [
			$esp1 => $en1, 
			$esp2 => $en2 
		];
		//Mostrar idiomas:
		echo "<table>";
		echo "<tr><td><strong>ESPAÑOL</strong></td><td><strong>INGLES</strong></td></tr>";
		foreach ($idiomas as $key => $value) {
			echo "<tr><td>".$key."</td><td>".$value."</td></tr>";
		}
		echo "</table>";
	}
	
	?>
</body>
</html>