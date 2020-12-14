<?php
require_once 'models/usuario.php';

class UsuarioController
{
          public function registrar()
          {
                    require_once 'views/usuarios/registro.php';
          }

          public function save()
          {
                    if (isset($_POST)) {
                              $nombre    = $_POST['nombre'];
                              $apellidos = $_POST['apellidos'];
                              $email     = $_POST['email'];
                              $password  = $_POST['password'];

                              if ($nombre && $apellidos && $email && $password) {
                                        $usuario = new Usuario();
                                        $usuario->setNombre($nombre);
                                        $usuario->setApellidos($apellidos);
                                        $usuario->setEmail($email);
                                        $usuario->setPassword($password);
                                        $usuario->save();
                              }
                    }
          } //fin save

          public function login()
          {
                    if (isset($_POST)) {
                              $email    = $_POST['email'];
                              $password = $_POST['password'];
                              if ($email && $password) {
                                        $usuario = new Usuario();
                                        $usuario->setEmail($email);
                                        $usuario->setPassword($password);

                                        $user = $usuario->login();

                                        if ($user && is_object($user)) {
                                                  $_SESSION['user'] = $user;

                                                  if ($user->rol == 'admin') {
                                                            $_SESSION['admin'] = true;
                                                  }
                                        }
                              }
                    }
                    // var_dump($_SESSION['admin']->nombre);
                    // die();
                    header('Location:' . base_url);
          } //fin login

          public function logout()
          {
                    if (isset($_SESSION['user'])) {
                              unset($_SESSION['user']);
                    }

                    if (isset($_SESSION['admin'])) {
                              unset($_SESSION['admin']);
                    }
                    header('Location:' . base_url);
          }
} // final de la clase
