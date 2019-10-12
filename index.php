<?php

include 'vendor/autoload.php';

try {
    $loader = new Twig_Loader_Filesystem('static/templates');
    $twig = new Twig_Environment($loader);
    $template = $twig->loadTemplate('Homepage.html');
    echo $template->render(array());
} catch (Exception $e) {
    die('ERROR: ' . $e->getMessage());
}