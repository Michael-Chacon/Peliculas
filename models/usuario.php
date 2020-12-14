<?php
class Usuario
{
          private $nombre;
          private $apellidos;
          private $email;
          private $password;

          private $db;

          public function __construct()
          {
                    $this->db = Database::conectar();
          }

          //metodos get
          public function getNombre()
          {
                    return $this->nombre;
          }

          public function getApellidos()
          {
                    return $this->apellidos;
          }

          public function getEmail()
          {
                    return $this->email;
          }

          public function getPassword()
          {
                    return $this->password;
          }

          //metodos set

          public function setNombre($nombre)
          {
                    $this->nombre = $nombre;
          }

          public function setApellidos($apellidos)
          {
                    $this->apellidos = $apellidos;
          }

          public function setEmail($email)
          {
                    $this->email = $email;
          }

          public function setPassword($password)
          {
                    $this->password = $password;
          }

          //merodos mios
          public function save()
          {
                    $sql     = "INSERT INTO usuarios VALUES(null, '{$this->getNombre()}', '{$this->getApellidos()}', '{$this->getEmail()}', '{$this->getPassword()}', 'normal');";
                    $guardar = $this->db->query($sql);

                    $resultado = false;
                    if ($guardar) {
                              $resultado = true;
                    }

                    return $resultado;
          } //fin del  metodo save

          public function login()
          {
                    $result = false;
                    $sql    = "SELECT *  FROM usuarios WHERE email = '{$this->getEmail()}';";
                    $login  = $this->db->query($sql);
                    if ($login && $login->num_rows == 1) {
                              $usuario = $login->fetch_object();

                              if ($this->getPassword() == $usuario->password) {
                                        $result = $usuario;
                              }
                    }

                    return $result;
          }
} //fin de la clase
