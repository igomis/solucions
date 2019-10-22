<?php
include("header.php");
?>
<body>
	<nav class="navbar navbar-default navbar-fixed-top">
		<?php include("nav.php");?>
	</nav>
	<div class="container">
		<div class="content">
			<h2>Dades del cliente &raquo; Agregar dades</h2>
			<hr />

			<?php
			if(isset($_POST['add'])){
				$dni = strip_tags($_POST["dni"],ENT_QUOTES);
                $nombre = strip_tags($_POST["nombre"],ENT_QUOTES);
                $direccion = strip_tags($_POST["direccion"],ENT_QUOTES);
                $telefono = strip_tags($_POST["telefono"],ENT_QUOTES);

                try{
                    addClient($conn,$dni,$nombre,$direccion,$telefono);
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
						<input type="text" name="dni" class="form-control" placeholder="DNI" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Nom</label>
					<div class="col-sm-4">
						<input type="text" name="nombre" class="form-control" placeholder="Nom" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Adreça</label>
					<div class="col-sm-4">
						<input type="text" name="direccion" class="form-control" placeholder="Adreça" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Telèfon</label>
					<div class="col-sm-3">
						<input type="text" name="telefono" class="form-control" placeholder="Telèfon" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">&nbsp;</label>
					<div class="col-sm-6">
						<input type="submit" name="add" class="btn btn-sm btn-primary" value="Guardar datos">
						<a href="index.php" class="btn btn-sm btn-danger">Cancelar</a>
					</div>
				</div>
			</form>
		</div>
	</div>
    <?php include_once "footer.php" ?>
</body>
</html>
