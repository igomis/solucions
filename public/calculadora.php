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
	<title>Activitat 4. Formularis - Calculadora</title>
</head>
<body>
	<h1>Activitat 4. Formularis - Calculadora</h1>
	<form action="<?= $_SERVER["PHP_SELF"]; ?>" method="POST">
		<h2>Calculadora</h2>
		<input type="number" name="operando1" placeholder="Num 1" style="width:70px;">
		<select name="operador">
			<option value="+">+
			</option>
			<option value="-">-
			</option>
			<option value="*">*
			</option>
			<option value="/">/
			</option>
		</select>
		<input type="number" name="operando2" placeholder="Num 2" style="width:70px;">
		<br><br>
		<input type="submit" value="Enviar" style="text-transform: uppercase;">
		<input type="reset" value="Reset" style="text-transform: uppercase;">
	</form>

	<h2>Resultados:</h2>
	<?php 
	//*****MOSTRAR RESULTADOS*****
	echo "<strong>El resultado de la operacion es:</strong> ".calculadora($_POST['operando1'] ?? '', $_POST['operando2'] ?? '', $_POST['operador'] ?? '');

	//*****CACLCULADORA*****
	function calculadora($operando1, $operando2, $operador) {
		$operando1 = (float)($operando1);
		$operando2 = (float)($operando2);
		$operador = $operador;
		$solucion = 0;
		if($operador == "+"){
			$solucion = round($operando1 + $operando2);
		}else if($operador == "-"){
			$solucion = round($operando1 - $operando2);
		}else if($operador == "*"){
			$solucion = round($operando1 * $operando2);
		}else if($operador == "/"){
			$solucion = round($operando1 / $operando2);
		}
		return $solucion;
	}
	?>
</body>
</html>