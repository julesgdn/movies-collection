<?php

require_once 'classes/Director.php';
require_once 'classes/Movie.php';
require_once 'connection.php';

class MoviesManager {

    /**
     * @param Movie $movie
     */
    public function addMovie(Movie $movie) {

        try {
            $connection = connect_bd();

            $sql = "INSERT INTO FILMS(Titre, AnneeRea, Genre, Studio, Synopsis, Realisateur, AfficheUrl, UtiliseApi) VALUES (:titre, :anneeRea, :genre, :studio, :synopsis, :realisateur, :afficheUrl, :utiliseApi)";
            $stmt = $connection->prepare($sql);

            $name =$movie->getName();
            $realizationYear = $movie->getRealizationYear();
            $genre = $movie->getGenre();
            $studio = $movie->getStudio();
            $synopsis = $movie->getSynopsis();
            $director = $movie->getDirector();
            $posterUrl = $movie->getPosterUrl();
            $useApi = $movie->useApi();

            $stmt->bindParam(':titre', $name, PDO::PARAM_STR);
            $stmt->bindParam(':anneeRea', $realizationYear, PDO::PARAM_STR);
            $stmt->bindParam(':genre', $genre, PDO::PARAM_STR);
            $stmt->bindParam(':studio', $studio, PDO::PARAM_STR);
            $stmt->bindParam(':synopsis', $synopsis, PDO::PARAM_STR);
            $stmt->bindParam(':realisateur', $director, PDO::PARAM_STR);
            $stmt->bindParam(':afficheUrl', $posterUrl, PDO::PARAM_STR);
            $stmt->bindParam(':utiliseApi', $useApi, PDO::PARAM_BOOL);

            $stmt->execute();

            $connection = null;


            echo "Le film a été ajouté!";

        } catch (PDOException $e) {
            echo "Une erreur est survenue lors de l'ajout du film : " . $e->getMessage();
        }
    }

    public function getMovie($id) {

        try {
            $connection = connect_bd();
            $movie = null;

            $sql = "SELECT * FROM FILMS WHERE Id=:id";
            $stmt = $connection->prepare($sql);

            $stmt->bindParam(':id', $id, PDO::PARAM_STR);
            $stmt->execute();

            if(!$stmt) throw new MovieHandlingException();
            else {
                if($stmt->rowCount()!=0) {
                    foreach($stmt as $row) {
                        $movie = Movie::withId($row['Id'], $row['Titre'], $row['AnneeRea'], $row['Genre'], $row['Studio'],
                            $row['Synopsis'], $row['Realisateur'], $row['AfficheUrl'], $row['UtiliseApi']);
                    }
                }
            }

            return $movie;

        } catch (Exception $e) {
            echo "Une erreur est survenue lors de l'accès à la liste des films : " . $e->getMessage();
        }
    }

    public function getMoviesByName($name) {
        // TODO
    }

    /**
     * @return array
     */
    public function getAllMovies() {

        $filmsArray = array();

        try{
            $connexion = connect_bd();
            $recherche = "SELECT * FROM FILMS";
            $films = $connexion->query($recherche);
            while ($film = $films->fetchObject()) {
                $current = Movie::withId(
                    $film->Id,
                    $film->Titre,
                    $film->AnneeRea,
                    $film->Genre,
                    $film->Studio,
                    $film->Synopsis,
                    $film->Realisateur,
                    $film->AfficheUrl,
                    $film->UtiliseApi
                );
                array_push($filmsArray, $current);
            }

            $connexion = null;

            return $filmsArray;
        }
        catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function getRandomMovies($nb) {
        $movies = $this->getAllMovies();
        $random = null;
        if(sizeof($movies) <= $nb+1) {
            $random = $movies;
        } else {
            $random = array_rand($movies, $nb);
        }
        return $random;
    }

    public function getRecentlyAddedFilms() {
        $filmsArray = array();

        try{
            $connexion = connect_bd();
            $recherche = "SELECT * FROM FILMS ORDER BY Id DESC";
            $films = $connexion->query($recherche);
            while ($film = $films->fetchObject()) {
                $current = Movie::withId(
                    $film->Id,
                    $film->Titre,
                    $film->AnneeRea,
                    $film->Genre,
                    $film->Studio,
                    $film->Synopsis,
                    $film->Realisateur,
                    $film->AfficheUrl,
                    $film->UtiliseApi
                );
                array_push($filmsArray, $current);
            }

            $connexion = null;

            return $filmsArray;
        }
        catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function delMovie($id) {
        try {
            $connection = connect_bd();
            $movie = null;

            $sql = "DELETE FROM FILMS WHERE Id=:id";
            $stmt = $connection->prepare($sql);

            $stmt->bindParam(':id', $id, PDO::PARAM_STR);
            $stmt->execute();

        } catch (Exception $e) {
            echo "Une erreur est survenue lors de l'accès à la liste des films : " . $e->getMessage();
        }
    }
}