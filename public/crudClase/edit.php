<?<?php
include("header.php");
?>
<body>
	<nav class="navbar navbar-default navbar-fixed-top">
		<?php include("nav.php");?>
	</nav>
	<div class="container">
		<div class="content">
			<h2>Dades del cliente &raquo; Modificar dades</h2>
			<hr />

			<?php
			try {
			    $nik = strip_tags($_GET["nik"],ENT_QUOTES);
			    $cliente = Cliente::find($nik);
			}catch (Exception $e){
                echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'.$e->getMessage().' !</div>';
                exit();
            }

			if(isset($_POST['update'])){
				//$cliente->dni = strip_tags($_POST["dni"],ENT_QUOTES);
                $cliente->nombre = strip_tags($_POST["nombre"],ENT_QUOTES);
                $cliente->direccion = strip_tags($_POST["direccion"],ENT_QUOTES);
                $cliente->telefono = strip_tags($_POST["telefono"],ENT_QUOTES);

                try{

                    $cliente->update();
                    echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Bien hecho! Los datos han sido guardados con éxito.</div>';
                }catch (Exception $e){
                    echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'.$e->getMessage().' !</div>';

                }
			}
			?>

			<form class="form-horizontal" action="" method="post">
				<div class="form-group">
					<label class="col-sm-3 control-label">Dni</label>
					<div class="col-sm-2">
						<input type="text" disabled name="dni" class="form-control" placeholder="DNI" value="<?=$cliente->dni?>" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Nom</label>
					<div class="col-sm-4">
						<input type="text" name="nombre" class="form-control" placeholder="Nom"  value="<?=$cliente->nombre?>" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Adreça</label>
					<div class="col-sm-4">
						<input type="text" name="direccion" class="form-control" placeholder="Adreça"  value="<?=$cliente->direccion?>" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Telèfon</label>
					<div class="col-sm-3">
						<input type="text" name="telefono" class="form-control" placeholder="Telèfon"  value="<?=$cliente->telefono?>" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">&nbsp;</label>
					<div class="col-sm-6">
						<input type="submit" name="update" class="btn btn-sm btn-primary" value="Guardar datos">
						<a href="index.php" class="btn btn-sm btn-danger">Cancelar</a>
					</div>
				</div>
			</form>
		</div>
	</div>
    <?php include_once "footer.php" ?>
</body>
</html>
