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
                    $sql = "INSERT INTO pelicula VALUES(null, '{$this->getNombre()}', '{$this->getDescripcion()}', '{$this->getImg()}', '{$this->getFecha()}', '{$this->getGenero()}');";
                    var_dump($sql);
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
                    $sql     = "SELECT *  FROM pelicula";
                    $guardar = $this->db->query($sql);
                    return $guardar;
          }

          public function verAlone()
          {
                    $sql     = "SELECT * FROM pelicula  WHERE id = '{$this->getId()}';";
                    $guardar = $this->db->query($sql);
                    return $guardar->fetch_object();

          }

          public function verActor()
          {
                    $guardar = $this->db->query("SELECT ap.*, a.* FROM actores_peliculas ap
                                                                                INNER JOIN actores a ON a.id = ap.id_actor
                                                                                WHERE ap.id_pelicula = '{$this->getId()}';");
                    return $guardar;
          }

          public function pelis_actor()
          {
                    $sql = "SELECT p.* FROM pelicula p
                         INNER JOIN actores_peliculas ap ON ap.id_pelicula = p.id
                         WHERE  ap.id_actor = '{$this->getId()}';";

                    $guardar = $this->db->query($sql);
                    return $guardar;
          }

} //fin de la clase
