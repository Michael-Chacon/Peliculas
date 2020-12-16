<?php

class Categoria
{
          public $id;
          public $nombre;
          public $db;

          public function __construct()
          {
                    $this->db = Database::conectar();
          }

          //METODOS GET
          public function getId()
          {
                    return $this->id;
          }

          public function getNombre()
          {
                    return $this->nombre;
          }

          //METODOS SET
          public function setId($id)
          {
                    $this->id = $id;
          }

          public function setNombre($nombre)
          {
                    $this->nombre = $nombre;
          }

//otros metodos
          public function save()
          {
                    $sql     = "INSERT INTO generos VALUES(null, '{$this->getNombre()}');";
                    $guardar = $this->db->query($sql);

                    $resultado = false;
                    if ($guardar) {
                              $resultado = true;
                    }
                    return $resultado;
          }

          public function getGeneros()
          {
                    $sql     = "SELECT * FROM generos;";
                    $guardar = $this->db->query($sql);

                    $resultado = false;
                    if ($guardar) {
                              $resultado = $guardar;
                    }
                    return $resultado;
          }

          public function infogenero()
          {
                    $sql     = "SELECT * FROM generos WHERE id = '{$this->getId()}';";
                    $guardar = $this->db->query($sql);
                    return $guardar->fetch_object();
          }

} //fin de la clase
