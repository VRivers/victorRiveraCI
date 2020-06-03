<div class="container">
	<?php if ($rol == 'auth'):?>
    	<h2>Bienvenido <b><?= $datosGenerales['persona']->loginname?></b></h2>
    	<br/>
    	<a href="<?= base_url()?>persona/r">
    		<code>Caso no contemplado en el modelo PAP</code>
    		<button>Persona</button>
    	</a>
	<?php elseif ($rol == 'admin'): ?>
    	<h2>Bienvenido <b>Administrador</b></h2>
    	<br>
    	<a href="<?=base_url()?>persona/r">
    		<button>Persona</button>
    	</a>
    	<a href="<?=base_url()?>pais/r">
    		<button>Pais</button>
    	</a>
    	<a href="<?=base_url()?>producto/r">
    		<button>Producto</button>
    	</a>
    	<a href="<?=base_url()?>categoria/r">
    		<button>Categoría</button>
    	</a>
    	
	<?php else: ?>
		<h2>Debes hacer login o registrarte para poder empezar a operar</h2>
	<?php endif;?>
</div>
