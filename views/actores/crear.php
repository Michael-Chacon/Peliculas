<h1>Registrar un nuevo actor</h1>

<form action="<?=base_url?>Actor/save" method="POST">
	<label for="nombre">Nombre del actor:</label>
	<input type="text" name="nombre">
	<input type="submit" value="Registrar">
</form>
