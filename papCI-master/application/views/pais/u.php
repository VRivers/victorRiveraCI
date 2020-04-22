<div class="container">
<?php if ($_SESSION['persona']->loginname=='admin'):?>
<h1>Editar País</h1>

<form action="<?=base_url()?>pais/uPost" method="post">
	<input type="hidden" name="id" value="<?=$pais->id?>"/>
	<label for="idp">Nombre</label>
	<input id="idp" type="text" name="nombre" value="<?=$pais->nombre?>"/>
	<input type="submit"/>
</form>
 <?php else: ?>
<h1>Funcionalidad no disponible</h1>
<?php endif;?>
 </div>