<?php

include 'vendor/autoload.php';
require_once 'models/MoviesManager.php';
require_once 'models/DirectorsManager.php';
require_once 'classes/Director.php';
require_once 'classes/Movie.php';

if($_SERVER['REQUEST_METHOD'] == "GET"){
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
} else {

    $name = null;
    $realizationYear = null;
    $genre = null;
    $studio = null;
    $synopsis = null;
    $directorName = null;
    $posterUrl = null;  // TODO
    $useApi = null;

    $moviesManager = new MoviesManager();
    $directorsManager = new DirectorsManager();

    if(!empty($_POST['movieName']) && strlen($_POST['movieName'])<=100) {
        $name = $_POST['movieName'];
    } else {
        showError();
        return;
    }

    if(!empty($_POST['movieYear']) && $_POST['movieYear'] > 1800) {
        $realizationYear = $_POST['movieYear'];
    } else {
        showError();
        return;
    }

    if(!empty($_POST['movieDirector']) && strlen($_POST['movieDirector'])<=100) {
        $directorName = $_POST['movieDirector'];
    } else {
        showError();
        return;
    }

    if(!empty($_POST['movieStudio']) && strlen($_POST['movieStudio'])<=100) {
        $studio = $_POST['movieStudio'];
    } else {
        showError();
        return;
    }

    if(!empty($_POST['movieGenre'])) {
        $genre = $_POST['movieGenre'];
    } else {
        showError();
        return;
    }

    if(strlen($_POST['movieSynopsis'])<=300) {
        $synopsis = $_POST['movieSynopsis'];
    } else {
        showError();
        return;
    }

//    if(!isset($_POST['useAPI']) || $_POST['useAPI'] != "on") {
//        $useApi = false;
//    } else {
//        $useApi = true;
//    }

    $useApi = true;

    if(is_null($directorsManager->getDirector($directorName))) {
        $director = new Director($directorName);
        $directorsManager->addDirector($director);
    }

    $movie = new Movie($name, $realizationYear, $genre, $studio, $synopsis, $directorName, $synopsis, $useApi);

    $moviesManager->addMovie($movie);

    header('Location: yourCollection.php');
    exit();
}

function showError() {
    echo "Une erreur est survenue lors de l'ajout du film.";
}