<div class="container">
<?php if ($datosGenerales['persona']!=null):?>
	Hola <?=$datosGenerales['persona']->loginname?> /
	<a href="<?=base_url()?>hdu/anonymous/logout">Salir</a>
<?php else:?>
	<a href="<?=base_url()?>hdu/anonymous/registrar">Registro</a> / 
	<a href="<?=base_url()?>hdu/anonymous/login">Login</a>
<?php endif;?>
</div>