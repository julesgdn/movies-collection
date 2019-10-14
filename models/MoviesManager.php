<?php

class MoviesManager {

    public function addMovie(Movie $movie) {
        $connection = connect_bd();

        $sql = "INSERT INTO FILMS (Titre, AnneeRea, Genre, Studio, Synopsys, Realisateur, AfficheUrl, UtiliseApi) 
VALUES (:titre, :anneeRea, :genre, :studio, :synopsis, :realisateur, :afficheUrl, :utiliseApi)";
        $stmt = $connection->prepare($sql);

        $stmt->bindParam(':titre', $movie->getName());
        $stmt->bindParam(':anneeRea', $movie->getRealizationYear());
        $stmt->bindParam(':genre', $movie->getGenre());
        $stmt->bindParam(':studio', $movie->getStudio());
        $stmt->bindParam(':synopsis', $movie->getSynopsis());
        $stmt->bindParam(':realisateur', $movie->getDirectorId());
        $stmt->bindParam(':afficheUrl', $movie->getPosterUrl());
        $stmt->bindParam(':utiliseApi', $movie->useApi());


    }

    public function getMovie($id) {

    }

    public function getMoviesByName($name) {

    }

    public function getAllMovies() {

    }
}