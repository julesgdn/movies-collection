<?php

include 'vendor/autoload.php';
require_once 'models/MoviesManager.php';

try {
    $loader = new Twig_Loader_Filesystem('templates');
    $twig = new Twig_Environment($loader);
    $template = $twig->loadTemplate('CollectionPage.html');

    $moviesManager = new MoviesManager();
    $movies = $moviesManager->getAllMovies();

    echo $template->render(array(
        'movies' => $movies,
    ));
} catch (Exception $e) {
    die('ERROR: ' . $e->getMessage());
}