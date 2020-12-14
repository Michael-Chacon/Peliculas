<?php

class Actor
{
          public $nombre;
          public $db;

          public function __construct()
          {
                    $this->db = Database::conectar();
          }

          //metosos get
          public function getNombre()
          {
                    return $this->nombre;
          }

          //metodos set
          public function setNombre($nombre)
          {
                    $this->nombre = $nombre;
          }

          //mis  metodos

          public function save()
          {
                    $sql       = "INSERT INTO actores VALUES(null, '{$this->getNombre()}');";
                    $guadar    = $this->db->query($sql);
                    $resultado = false;
                    if ($guadar) {
                              $resultado = true;
                    }
                    return $resultado;
          }

          public function getAll()
          {
                    $sql     = "SELECT *  FROM actores;";
                    $guardar = $this->db->query($sql);

                    $resultado = false;
                    if ($guardar) {
                              $resultado = $guardar;
                    }
                    return $resultado;
          }
} //din de la clase
