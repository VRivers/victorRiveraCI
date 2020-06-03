<div class="container">
	<h1>Nuevo producto</h1>
	<a href="/">
		<button>Cancelar</button>
	</a>

<form action="<?=base_url()?>producto/cPost" class="form" method="post" enctype="multipart/form-data">
	
	Nombre
	<input type="text" name="nombre" required/><br>
	
	Stock
	<input type="number" name="stock"  value=10 required/><br>
	
	Precio
	<input type="number" name="precio" min=0 max=1000 value=50 required/><br>
	
	Categoria
	<select id="id-categoria" name="categoria">
		<option selected="selected" value=-1>---</option>
		<?php foreach ($categorias as $categoria):?>
		<option value="<?=$categoria->id?>"><?= $categoria->nombre?></option>
		<?php endforeach;?>
	</select>
	<br>
	
	<!-- JAVASCRIPT PARA VISUALIZAR LA FOTO -->
	<script>
	$(window).on("load", (function (){
		$(function() {
			$("#id-foto").change(function(e) {addImage(e);});

		function addImage (e){
			var file = e.target.files[0];
			var imageType = /image.*/;

			if (!file.type.match(imageType)) return;

			var reader = new FileReader();
			reader.onload = fileOnLoad;
			reader.readAsDataURL(file);
			
		}

		function fileOnLoad(e) {
			var result=e.target.result;
			$('#id-out-foto').attr("src",result);
		}});}));
	</script>
	
	<label for="id-foto">Foto</label>
	<input id="id-foto" type="file" name="foto"/><br>
	<img class="offset-1 col-2" id="id-out-foto" width="10%" height="10%" src="" alt=""/><br><br>
	
	<input type="submit" value="Registrar"/>
	</form>
</div>