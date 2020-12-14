<?php
ob_start();
?>
<?php
session_start();
require_once 'autoload.php';
require_once 'config/database.php';
require_once 'config/parametros.php';
require_once 'views/layout/header.php';
require_once 'views/layout/sidebar.php';
$db = Database::conectar();
function show_errores()
{
          $error = new ErrorController();
          $error->index();
}
if (isset($_GET['controlador'])) {
          $nombre_contolador = $_GET['controlador'] . 'Controller';

} elseif (!isset($_GET['controlador']) && !isset($_GET['action'])) {
          $nombre_contolador = controller_default;
} else {
          show_errores();
}

if (class_exists($nombre_contolador)) {
          $controlador = new $nombre_contolador();
          if (isset($_GET['action']) && method_exists($controlador, $_GET['action'])) {
                    $accion = $_GET['action'];
                    $controlador->$accion();
          } elseif (!isset($_GET['controlador']) && !isset($_GET['action'])) {
                    $action_default = metodo_default;
                    $controlador->$action_default();
          } else {
                    show_errores();
          }

} else {
          show_errores();
}
?>
<?php
ob_end_flush();
