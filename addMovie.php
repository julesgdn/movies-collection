<?php

include 'vendor/autoload.php';

try {
    $loader = new Twig_Loader_Filesystem('templates');
    $twig = new Twig_Environment($loader);
    $template = $twig->loadTemplate('AdditionPage.html');
    echo $template->render(array());
} catch (Exception $e) {
    die('ERROR: ' . $e->getMessage());
}