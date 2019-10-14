<?php


class Movie
{
    private $name;
    private $realizationYear;
    private $genre;
    private $studio;
    private $synopsis;
    private $director;
    private $posterUrl;    // Vide si une API tierce est utilisée.
    private $useApi;

    /**
     * Movie constructor.
     * @param $titre
     * @param $anneeRealisation
     * @param $genre
     * @param $studio
     * @param $synopsis
     * @param $realisateur
     */
    public function __construct($titre, $anneeRealisation, $genre, $studio, $synopsis, $realisateur, $afficheUrl, $completeParAPI)
    {
        $this->name = $titre;
        $this->realizationYear = $anneeRealisation;
        $this->genre = $genre;
        $this->studio = $studio;
        $this->synopsis = $synopsis;
        $this->director = $realisateur;
        $this->posterUrl = $afficheUrl;
        $this->useApi = $completeParAPI;
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
}