<?php
include("header.php");
?>
<body>
	<nav class="navbar navbar-default navbar-fixed-top">
		<?php include('nav.php');?>
	</nav>
	<div class="container">
		<div class="content">
			<h2>Llista de clients</h2>
			<hr />

			<?php
			if(isset($_GET['aksi']) == 'delete'){
			    $nik = strip_tags($_GET["nik"],ENT_QUOTES);
                try {
                    $cliente = findClient($conn, $nik);
                    deleteClient($conn,$nik);
                    echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Dades eliminades correctament.</div>';
                }
                catch (Exception $e){
                    echo '<div class="alert alert-info alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'.$e->getMessage().'</div>';
                }
			}
            $clientes = allClients($conn);
            ?>
			<div class="table-responsive">
			<table class="table table-striped table-hover">
				<tr>
                    <th>DNI</th>
					<th>Nom</th>
                    <th>Adreça</th>
                    <th>Telèfon</th>
                    <th>Accions</th>
				</tr>
                <?php
                    foreach ($clientes as $cliente) {
                ?>
                        <tr>
                            <td><?= $cliente->dni ?></td>
                            <td><?= $cliente->nombre ?></td>
                            <td><?= $cliente->direccion ?></td>
                            <td><?= $cliente->telefono ?></td>
                            <td>
                                <a href="edit.php?nik=<?= $cliente->dni ?>" title="Editar datos" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
                                <a href="index.php?aksi=delete&nik=<?= $cliente->dni ?>" title="Eliminar"  class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
                            </td>
                        </tr>
                <?php
                    }
				?>
			</table>
			</div>
		</div>
	</div>
    <?php include_once "footer.php" ?>
</body>
</html>
