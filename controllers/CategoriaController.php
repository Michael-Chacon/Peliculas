<?php
require_once 'models/categoria.php';

class CategoriaController
{
          public function crear()
          {
                    require_once 'views/categoria/crear.php';
          }
          public function save()
          {
                    if (isset($_POST)) {
                              $nombre = isset($_POST['genero']) ? $_POST['genero'] : false;
                              if ($nombre) {
                                        $genero = new Categoria();
                                        $genero->setNombre($nombre);
                                        $genero->save();
                              }
                    }
                    header('Location: ' . base_url . 'Categoria/crear');
          }
} //fin de la clase
