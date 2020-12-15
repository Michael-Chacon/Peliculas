<h1>Pantalla  por defecto</h1>
<form action="<?=base_url?>Peliculas/save" method="POST" enctype="multipart/form-data">
<?php
if (!isset($_SESSION['actores'])) {

} else {
          var_dump($_SESSION['actores']);
}?>
	<label for="nombre">Nombre</label>
	<input type="text" name="nombre">

	<label for="descripcion">Descripcion</label>
	<textarea name="descripcion" cols="15" rows="	"></textarea>

	<label for="imagen">Portada de la pelicula</label>
		<input type="file" name="imagen">

	<label for="fecha">Fecha de estreno</label>
	<input type="text" name="fecha">

	<label for="genero">Genero</label>
	<select name="genero">
		<?php
if (isset($generos)):
          while ($genero = $generos->fetch_object()):
          ?>
				<option value="<?=$genero->nombre?>">
				<?=$genero->nombre?>
				</option>
					<?php
endwhile;
endif;
?>
	</select>
	<br>
	<hr>
	<h2>Actores</h2>
<?php
if (isset($actores)):
          while ($actor = $actores->fetch_object()):
          ?>
			<div class="act">
			<input type="checkbox" name="actor[<?=$actor->id;?>]" value="<?=$actor->id;?>">
				<label for="enero" ><?=$actor->nombre?></label>
			</div>
			<?php
endwhile;
endif;?>
<br>
<hr>
<input type="submit" value="Registrar">
</form>