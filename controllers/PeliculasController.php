<?php
require_once 'models/pelicula.php';
require_once 'models/actor.php';
require_once 'models/categoria.php';

class PeliculasController
{
          public function principal()
          {
                    $allpeliculas = new Pelicula();
                    $pelis        = $allpeliculas->pelis_ramdom();
                    require_once 'views/peliculas/principal.php';
          }

          public function index()
          {
                    $genero  = new Categoria();
                    $generos = $genero->getGeneros();

                    $actor   = new Actor();
                    $actores = $actor->getAll();

                    require_once 'views/peliculas/index.php';
          }

          public function save()
          {

                    if (isset($_POST)) {
                              $nombre      = $_POST['nombre'];
                              $descripcion = $_POST['descripcion'];
                              $fecha       = $_POST['fecha'];
                              // $genero              = $_POST['genero'];
                              $_SESSION['actores'] = $_POST['actor'];
                              $_SESSION['generos'] = $_POST['genero'];

                              if ($nombre && $descripcion && $fecha) {
                                        $pelicula = new Pelicula();
                                        $pelicula->setNombre($nombre);
                                        $pelicula->setDescripcion($descripcion);
                                        $pelicula->setFecha($fecha);
                                        // $pelicula->setGenero($genero);

                                        if (isset($_FILES['imagen'])) {
                                                  $file     = $_FILES['imagen'];
                                                  $filename = $file['name'];
                                                  $mimetype = $file['type'];

                                                  if ($mimetype == "image/jpg" || $mimetype == "image/jpeg" || $mimetype == "image/png" || $mimetype == "image/gif") {

                                                            if (!is_dir('uploads/image/')) {
                                                                      mkdir('uploads/image/', 0777, true);
                                                            }
                                                            move_uploaded_file($file['tmp_name'], 'uploads/image/' . $filename);
                                                            $pelicula->setImg($filename);
                                                  }
                                        } //img
                                        $pelicula->save();

                                        $ok = $pelicula->generos_actor();
                                        if ($ok) {
                                                  unset($_SESSION['actores']);
                                                  unset($_SESSION['generos']);
                                        }

                              }
                              //giardar la imagen
                    }
                    header('Location:' . base_url . 'Peliculas/index');
          }
          //metod para ver la info de 1 sola pelicua y tambien trae los actores de esa peli
          public function ver()
          {
                    $pelis = new Pelicula();
                    $pelis->setId($_GET['id']);
                    $p      = $pelis->verAlone();
                    $a      = $pelis->verActor();
                    $genero = $pelis->getGeneros();

                    require_once 'views/peliculas/pelicula.php';

          }

          public function pactor()
          {
                    if (isset($_GET)) {
                              $id_actor = $_GET['id'];
                              $actor    = new Actor();
                              $actor->setId($id_actor);
                              $nombre_actor = $actor->getAlone();

                              $pelicula = new Pelicula();
                              $pelicula->setId($id_actor);
                              $peliculas = $pelicula->pelis_actor();

                    }
                    require_once 'views/peliculas/pelisactor.php';
          }
} //fin de la clase
