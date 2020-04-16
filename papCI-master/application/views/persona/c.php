<div class="container">

<h1>Nueva persona</h1>

<form action="<?=base_url()?>persona/cPost" method="post" enctype="multipart/form-data">

	<label for="id-log">Loginname</label>
	<input id="id-log" type="text" name="loginname" required="required"/>
	<br/>
	
	<label for="id-pwd">Contraseña</label>
	<input id="id-pwd" type="password" name="password" required="required"/>
	<br/>
	
	<label for="id-nombre">Nombre</label>
	<input id="id-nombre" type="text" name="nombre" required="required"/>
	<br/>
	
	<label for="id-altura">Altura (en cm)</label>
	<input id="id-altura" type="number" name="altura" required="required" min="0" max="400" value="175" />
	<br/>
	
	<label for="id-fnac">Fecha de Nacimiento</label>
	<input id="id-fnac" type="date" name="fechaNacimiento" required="required" value="2000-02-29"/>
	<br/>
	
	<label for="id-foto">Foto</label>
	<input id="id-foto" type="file" name="foto"/>
	
	<label for="id-pais">Pais</label>
	<select id="id-pais" name="pais">
		<option selected="selected" value="">----</option>
	</select>
	<br/>
	
	<input type="submit"/>
</form>

</div>