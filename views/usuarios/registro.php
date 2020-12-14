<h1>Registro de usuarios</h1>

<form action="<?=base_url?>Usuario/save" method="POST">

	<label for="nombre">Nombre</label>
	<input type="text" name="nombre">

	<label for="apellidos">Apellidos</label>
	<input type="text" name="apellidos">

	<label for="email">Correo</label>
	<input type="text" name="email">

	<label for="password">Contraseña</label>
	<input type="text" name="password">

	<input type="submit" value="Registrar">

</form>
