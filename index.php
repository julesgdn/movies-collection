<?php

include 'vendor/autoload.php';
require_once 'models/MoviesManager.php';

try {
    $loader = new Twig_Loader_Filesystem('templates');
    $twig = new Twig_Environment($loader);
    $template = $twig->loadTemplate('Homepage.html');

    $moviesManager = new MoviesManager();
    $random = $moviesManager->getRandomMovies(3);
    $recent = $moviesManager->getRecentlyAddedFilms();

    echo $template->render(array(
        'randomFilms' => $random,
        'recentFilms' => $recent
    ));
} catch (Exception $e) {
    die('ERROR: ' . $e->getMessage());
}