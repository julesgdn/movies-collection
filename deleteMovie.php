<?php

require_once 'models/MoviesManager.php';

$movieManager = new MoviesManager();

$movieManager->delMovie($_GET['id']);

header('Location: yourCollection.php');
exit();