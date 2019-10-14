<?php

include 'vendor/autoload.php';

try {
    $loader = new Twig_Loader_Filesystem('templates');
    $twig = new Twig_Environment($loader);
    $template = $twig->loadTemplate('AdditionPage.html');

    $genres = ["Action", "Animation", "Aventure", "Catastrophe", "Comedie", "Documentaire", "Drame", "Fantaisie", "Horreur", "Science-fiction", "Western"];

    echo $template->render(array(
        'genres' => $genres
    ));
} catch (Exception $e) {
    die('ERROR: ' . $e->getMessage());
}