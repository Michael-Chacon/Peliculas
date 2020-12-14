<h1>Infromacion de: <?=$p->titulo?></h1>

<?php while ($actores = $a->fetch_object()): ?>
	<h2><?=$actores->nombre?></h2>
	<?php endwhile;?>

	<p><?=$p->descipcion?></p>