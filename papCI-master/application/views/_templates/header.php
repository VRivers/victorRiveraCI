<div class="container">
<?php if ($header['persona']!=null):?>
	Hola <?=$header['persona']->loginname?> /
	<a href="<?=base_url()?>hdu/anonymous/logout">Salir</a>
<?php else:?>
	<a href="<?=base_url()?>persona/c">Registro</a> / 
	<a href="<?=base_url()?>hdu/anonymous/login">Login</a>
<?php endif;?>
</div>