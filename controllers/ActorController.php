<?php
require_once 'models/actor.php';

class Actorcontroller
{
          public function crear()
          {
                    require_once 'views/actores/crear.php';
          }
          public function save()
          {
                    if (isset($_POST)) {
                              $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : false;

                              if ($nombre) {
                                        $actor = new Actor();
                                        $actor->setNombre($nombre);
                                        $actor->save();
                              }
                    }
                    header('Location:' . base_url . 'Actor/crear');
          }
} // fin de la clase
