<?php

class Database
{
          public static function conectar()
          {
                    $conexion = new mysqli("localhost", "root", "", "peliculas", 3308);
                    $conexion->query("SET NAMES 'utf8'");
                    return $conexion;
          }
}
