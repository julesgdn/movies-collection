<?php

use buibr\tmdbapi\TMDB;

require_once 'models/tmdb-api.php';

class Movie
{
    protected $id;    // Vide si non instancié avec "withId"
    protected $name;
    protected $realizationYear;
    protected $genre;
    protected $studio;
    protected $synopsis;      // Vide si une API tierce est utilisée.
    protected $director;
    protected $posterUrl;    // Vide si une API tierce est utilisée.
    protected $useApi;

    /**
     * Movie constructor.
     * @param $name
     * @param $realizationYear
     * @param $genre
     * @param $studio
     * @param $synopsis
     * @param $director
     * @param $posterUrl
     * @param $useApi
     */
    public function __construct($name, $realizationYear, $genre, $studio, $synopsis, $director, $posterUrl, $useApi)
    {
        $this->name = $name;
        $this->realizationYear = $realizationYear;
        $this->genre = $genre;
        $this->studio = $studio;
        $this->synopsis = $synopsis;
        $this->director = $director;
        $this->posterUrl = $posterUrl;
        $this->useApi = $useApi;
    }

    /**
     * @param $id
     * @param $name
     * @param $realizationYear
     * @param $genre
     * @param $studio
     * @param $synopsis
     * @param $director
     * @param $posterUrl
     * @param $useApi
     * @return Movie
     */
    public static function withId($id, $name, $realizationYear, $genre, $studio, $synopsis, $director, $posterUrl, $useApi) {
        $instance = new self($name, $realizationYear, $genre, $studio, $synopsis, $director, $posterUrl, $useApi);
        $instance->setId($id);
        return $instance;

    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    private function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getRealizationYear()
    {
        return $this->realizationYear;
    }

    /**
     * @param mixed $realizationYear
     */
    public function setRealizationYear($realizationYear)
    {
        $this->realizationYear = $realizationYear;
    }

    /**
     * @return mixed
     */
    public function getGenre()
    {
        return $this->genre;
    }

    /**
     * @param mixed $genre
     */
    public function setGenre($genre)
    {
        $this->genre = $genre;
    }

    /**
     * @return mixed
     */
    public function getStudio()
    {
        return $this->studio;
    }

    /**
     * @param mixed $studio
     */
    public function setStudio($studio)
    {
        $this->studio = $studio;
    }

    /**
     * @return mixed
     */
    public function getSynopsis()
    {
        return $this->synopsis;
    }

    /**
     * @param mixed $synopsis
     */
    public function setSynopsis($synopsis)
    {
        $this->synopsis = $synopsis;
    }

    /**
     * @return mixed
     */
    public function getDirector()
    {
        return $this->director;
    }

    /**
     * @param mixed $director
     */
    public function setDirector($director)
    {
        $this->director = $director;
    }

    /**
     * @return mixed
     */
    public function getPosterUrl()
    {
        return $this->posterUrl;
    }

    /**
     * @param mixed $posterUrl
     */
    public function setPosterUrl($posterUrl)
    {
        $this->posterUrl = $posterUrl;
    }

    /**
     * @return mixed
     */
    public function useApi()
    {
        return $this->useApi;
    }

    public function getPosterIdFromAPI() {
        $tmdb = new TMDB([
            'apikey' => API_KEY,
            'lang' => 'fr',
            'timezone' => 'Europe/Paris',
            'debug' => false,
        ]);

        $movies = $tmdb->searchMovie($this->getName());

        foreach($movies as $movie) {
            if($movie->getTitle() == $this->getName()) {
                return $movie->getPoster();
            }
        }
    }
}