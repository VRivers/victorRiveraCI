<div class="container">
	<form action="<?=base_url()?>hdu/anonymous/initPost" method="post">
    <?php if (!$vacia):?>
     	<h1>¡¡ Peligro !!. BD no vacía</h1>
		<h3>Introduce "admin" para borrar la BD</h3>
		<input type="password" name="pwd" />
    <?php endif; ?>
	<br/>
	<input type="submit" value="BORRAR" />
	</form>
</div>