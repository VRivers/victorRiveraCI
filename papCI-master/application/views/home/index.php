<div class="container">
	<h1>Aplicacion P.A.P Victor Rivera</h1>
	<?php if ($rol == 'auth'):?>
    	<code>(vista de usuario)</code>
    	<br/>
    	<a href="<?= base_url()?>persona/r">
    		<button>Persona</button>
    	</a>
	<?php elseif ($rol == 'admin'): ?>
    	<code>(vista de administrador)</code>
    	<br>
    	<a href="<?=base_url()?>pais/r">
    		<button>Pais</button>
    	</a>
	<?php else: ?>
		<h3>Debes hacer login o registrarte para poder empezar a operar</h3>
	<?php endif;?>
</div>
