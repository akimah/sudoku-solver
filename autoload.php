<?php

function autoload($className)
{

    $paths = array();

    // INCLUDE HERE NEW DIRS
    array_push($paths, "../application/models/");
    array_push($paths, "../application/models/quadrants/");

    foreach ($paths as $path) {
        if (is_file($path . $className . ".php")) {
            require $path . $className . ".php";
        }
    }
}

spl_autoload_register('autoload');