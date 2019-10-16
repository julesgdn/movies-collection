<?php

include 'vendor/autoload.php';
require_once 'models/MoviesManager.php';

try {
    $loader = new Twig_Loader_Filesystem('templates');
    $twig = new Twig_Environment($loader);
    $template = $twig->loadTemplate('MoviePage.html');

    $moviesManager = new MoviesManager();
    $movie = $moviesManager->getMovie($_GET['id']);

    echo $template->render(array(
        'movie' => $movie
    ));
} catch (Exception $e) {
    die('ERROR: ' . $e->getMessage());
}