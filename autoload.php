<?php

function autoload($className)
{

    $paths = array();

    // INCLUDE HERE NEW DIRS
    array_push($paths, "../application/models/");
    array_push($paths, "../application/models/quadrants/");
    array_push($paths, "../application/examples/");
    array_push($paths, "../application/view/");
    array_push($paths, "../application/controllers/");
    array_push($paths, "../application/models/interfaces/");

    foreach ($paths as $path) {
        if (is_file($path . $className . ".php")) {
            require $path . $className . ".php";
        }
    }
}

spl_autoload_register('autoload');