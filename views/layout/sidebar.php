        <!-- barra lateral -->
        <aside id="lateral">
            <?php if (isset($_SESSION['user'])): ?>
            <h3><?=$_SESSION['user']->nombre;?></h3>
        <?php endif;?>

            <div id="login" class="block-aside">
<?php if (!isset($_SESSION['user'])): ?>
                <h3>Entrar a la web</h3>
                <form action="<?=base_url?>Usuario/login" method="post">
                    <label for="email">Email:</label>
                    <input type="email" name="email">
                    <label for="password">Passeword:</label>
                    <input type="password" name="password">
                    <input type="submit" value="Ingresar">
                </form>
                <a href="<?=base_url?>Usuario/registrar">
                           Registrate aqui
                        </a>
<?php endif;?>

                <ul>
<?php if (isset($_SESSION['admin'])): ?>
                         <li>
                        <a href="<?=base_url?>Peliculas/index">
                           Crear peliculas
                        </a>
                    </li>
                    <li>
                        <a href="<?=base_url?>/Actor/crear">
                           Ingresar actores
                        </a>
                    </li>
                    <li>
                        <a href="<?=base_url?>Categoria/crear">
                            Crear Categoria
                        </a>
                    </li>

                      <li>
                        <a href="#">
                            mis pedidos
                        </a>
                    </li>
                <?php endif;?>
                      <li>
                        <a href="<?=base_url?>Usuario/logout">
                           Cerrar sesion
                        </a>

                </ul>
            </div>
        </aside>
        <!-- contenido central -->
        <div id="central">
