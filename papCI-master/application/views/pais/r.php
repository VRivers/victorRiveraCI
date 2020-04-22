
<div class="container">

<?php if ($_SESSION['persona']->loginname=='admin'):?>
	<h1>Lista de países</h1>

	<a href="<?=base_url()?>pais/c"><button class="button">Nuevo</button></a>
	<a href="<?=base_url()?>"><button class="button">Volver</button></a>

	<table class="table table-striped table-hover">
		<tr>
			<th>Nombre</th>
			<th>Numero de Habitantes</th>
			<th>Acciones</th>
		</tr>
	
	<?php foreach ($paises as $pais): ?>
		<tr>
			<td><?= $pais->nombre?></td>
			
			<td><?= $pais->numero_habitantes?></td>
			<td>
			<?php if (($pais->numero_habitantes)== 0): ?>
				<form action="<?=base_url()?>pais/dPost" method="post">
					<input type="hidden" name="id" value="<?=$pais->id?>">
					<button onclick="submit()">
						<img src="<?=base_url()?>/assets/img/basura.png" height="20"
							width="20">
					</button>
				</form>
			<?php endif;?>
				
				<form action="<?=base_url()?>pais/u" method="get">
					<input type="hidden" name="id" value="<?=$pais->id?>">
					<button onclick="submit()">
						<img src="<?=base_url()?>/assets/img/lapiz.png" height="20"
							width="20">
					</button>
				</form>
			</td>
		</tr>
	<?php endforeach;?>
</table>
<?php else: ?>
<h1>Funcionalidad no disponible</h1>
<?php endif;?>
</div>


