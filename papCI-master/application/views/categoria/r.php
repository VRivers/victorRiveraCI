<div class="container">

	<h1>Lista de categorías</h1>
	
	<table class="table">
		<tr>
			<th>Nombre</th>
		</tr>
		
			<?php foreach ($categorias as $categoria):?>
			<tr>
				<td><?=$categoria->nombre?></td>
			</tr>
			<?php endforeach;?>
	</table>
</div>