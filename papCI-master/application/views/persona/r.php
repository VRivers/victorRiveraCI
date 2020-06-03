<div class="container">

<h1>Lista de personas</h1>

<a href="<?=base_url()?>persona/c"><button>Nueva</button></a>
<a href="<?=base_url()?>"><button>Volver</button></a>
<table border="1">
		<tr>
			<th>Foto</th>
			<th>Loginname</th>
			<th>Pais de Nacimiento</th>
			<th>Fecha de Nacimiento</th>
			<th>Altura</th>
			<th>Acción</th>
		</tr>

	
	<?php foreach ($personas as $persona): ?>
		<tr>
		
		<td>Foto</td>
		<td><?= $persona->loginname?></td>
		<td><?= $persona->nace!=null?$persona->nace->nombre:'--'?></td>
		<td><?= $persona->fechaNacimiento?></td>
		<td><?= $persona->altura?></td>
		<td>
			<form action="<?=base_url()?>persona/dPost" method="post">
				<input type="hidden" name="id" value="<?=$persona->id?>">
				<button onclick="submit()">
					<img src="<?=base_url()?>/assets/img/basura.png" height="20"
						width="20">
				</button>
			</form>
			<form action="<?=base_url()?>persona/u" method="get">
				<input type="hidden" name="id" value="<?=$persona->id?>">
				<button onclick="submit()">
					<img src="<?=base_url()?>/assets/img/lapiz.png" height="20"
						width="20">
				</button>
			</form>
		</td>

	</tr>
	<?php endforeach;?>
</table>

</div>

