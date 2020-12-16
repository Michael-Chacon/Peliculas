<h1>Peliculas del genero: <?=$gen->nombre?></h1>

<?php while ($pelicula = $pelis->fetch_object()): ?>
 <div class="product">
                <a href="<?=base_url?>Peliculas/ver&id=<?=$pelicula->id?>">
                    <img src="<?=base_url?>uploads/image/<?=$pelicula->img?>" alt="" class="image">
                    <h4><?=$pelicula->titulo?></h4>
                    </a>
                    <a href="<?=base_url?>" class="button"><?=$pelicula->año?></a>
            </div>

        <?php endwhile;?>