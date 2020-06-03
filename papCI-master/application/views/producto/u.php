<div class="container">
	<h1>Editar producto</h1>

    <form action="<?=base_url()?>categoria/uPost" method="post">
    	<input type="hidden" name="id" value="<?=$producto->id?>"/>
    	<label for="idp">Nombre</label>
    	<input id="idp" type="text" name="nombre" value="<?=$producto->nombre?>"/>
    	
    	<label for="idp">stock</label>
    	<input id="idp" type="text" name="nombre" value="<?=$producto->stock?>"/>
    	
    	<label for="idp">Precio</label>
    	<input id="idp" type="text" name="nombre" value="<?=$producto->precio?>"/>
    	
    	<label for="idp">Categoria</label>
    	
    	<select id="id-categoria" name="categoria">
		<option selected="selected" value=0>---</option>
		<?php foreach ($categorias as $categoria):?>
		<option value="<?=$categoria->id?>"><?= $categoria->nombre?></option>
		<?php endforeach;?>
		
	</select>
    	
    	<input type="submit"/>
	</form>
</div>