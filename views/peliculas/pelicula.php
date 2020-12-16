<h1>Infromacion de: <?=$p->titulo?></h1>

<div class="info">
	<h2 class="titulo"><?=$p->titulo?>  <small>(<?=$p->año?>)</small> </h2>
	<br>
<p>Sinopsis:</p>
<p><?=$p->descipcion?></p>
<p class="g">Generos:</p>
<?php while ($generos = $genero->fetch_object()): ?>
	<a href="<?=base_url?>Peliculas/pgenero&id=<?=$generos->id?>" class="actores"><?=$generos->nombre?>   | </a>
	<?php endwhile;?>
<p>Actores:</p>
<?php while ($actores = $a->fetch_object()): ?>
	<a href="<?=base_url?>Peliculas/pactor&id=<?=$actores->id?>" class="actores"><?=$actores->nombre?>   | </a>
<?php endwhile;?>
</div>
<img src="<?=base_url?>uploads/image/<?=$p->img?>" alt="" class="info-img">
