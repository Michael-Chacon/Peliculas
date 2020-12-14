<?php

function autocarga($clase)
{
          include 'controllers/' . $clase . '.php';
}

spl_autoload_register('autocarga');
