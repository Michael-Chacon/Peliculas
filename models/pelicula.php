<?php

class Pelicula
{
          public $id;
          public $nombre;
          public $descripcion;
          public $img;
          public $fecha;
          public $genero;
          public $db;

          public function __construct()
          {
                    $this->db = Database::conectar();
          }

          //metodos get

          public function getId()
          {
                    return $this->id;
          }

          public function getNombre()
          {
                    return $this->nombre;
          }

          public function getDescripcion()
          {
                    return $this->descripcion;
          }

          public function getImg()
          {
                    return $this->img;
          }

          public function getFecha()
          {
                    return $this->fecha;
          }

          public function getGenero()
          {
                    return $this->genero;
          }

//metodos set
          public function setId($id)
          {
                    $this->id = $id;
          }

          public function setNombre($nombre)
          {
                    $this->nombre = $nombre;
          }

          public function setDescripcion($descripcion)
          {
                    $this->descripcion = $descripcion;
          }

          public function setImg($img)
          {
                    $this->img = $img;
          }

          public function setFecha($fecha)
          {
                    $this->fecha = $fecha;
          }

          public function setGenero($genero)
          {
                    $this->genero = $genero;
          }

          public function save()
          {
                    $sql     = "INSERT INTO pelicula VALUES(null, '{$this->getNombre()}', '{$this->getDescripcion()}', '{$this->getImg()}', '{$this->getFecha()}', '{$this->getGenero()}');";
                    $guardar = $this->db->query($sql);

                    $resutado = false;
                    if ($guardar) {
                              $resutado = true;
                    }
                    return $resutado;
          }

          public function pelicula_actor()
          {
                    $sql         = "SELECT LAST_INSERT_ID() AS 'actor' ";
                    $consulta    = $this->db->query($sql);
                    $pelicula_id = $consulta->fetch_object()->actor;

                    foreach ($_SESSION['actores'] as $value) {
                              $insert  = "INSERT INTO actores_peliculas VALUES($value, $pelicula_id);";
                              $guardar = $this->db->query($insert);

                    }
                    $result = false;
                    if ($guardar) {
                              $result = true;
                    }
                    return $result;
          }

          public function pelis_ramdom()
          {
                    $sql     = "SELECT *  FROM pelicula ORDER BY RAND() LIMIT 6";
                    $guardar = $this->db->query($sql);
                    return $guardar;
          }

          public function verAlone()
          {
                    $guardar = $this->db->query("SELECT *  FROM pelicula  WHERE  id = '{$this->getId()}';");
                    return $guardar->fetch_object();
          }

          public function verActor()
          {

                    $id_actor = $this->db->query("SELECT id_actor FROM actores_peliculas WHERE id_pelicula = '{$this->getId()}'");
                    $cont     = 0;
                    $b        = array();
                    while ($ac = $id_actor->fetch_object()) {
                              $c     = $cont++;
                              $b[$c] = $ac->id_actor;
                    }
                    var_dump($b);
                    var_dump($cont);
                    echo 'nombres';
                    $contador = 0;
                    $nombre   = array();
                    foreach ($b as $value) {
                              $m          = $contador++;
                              $consulta   = $this->db->query("SELECT nombre FROM actores WHERE id = $b[$m]");
                              $nombre[$m] = $consulta->fetch_object();
                    }
                    $k = $consulta->fetch_object();
                    // var_dump($nombre);
                    // die();
                    return $nombre;
          }

} //fin de la clase
