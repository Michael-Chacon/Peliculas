<h1>Peliculas ramdom</h1>



<?php while ($pelicula = $pelis->fetch_object()): ?>
 <div class="product">
                <a href="<?=base_url?>Peliculas/ver&id=<?=$pelicula->id?>">
                    <img src="<?=base_url?>uploads/image/<?=$pelicula->img?>" alt="" class="image">
                    <h4><?=$pelicula->titulo?></h4>
                    </a>
                    <p><?=$pelicula->genero?></p>
                    <a href="<?=base_url?>Carrito/add&id=<?=$pelicula->año?>" class="button"><?=$pelicula->año?></a>
            </div>

        <?php endwhile;?>
