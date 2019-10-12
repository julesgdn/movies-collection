<?php


class Film
{
    private $titre;
    private $anneeRealisation;
    private $genre;
    private $studio;
    private $synopsis;
    private $realisateur;

    /**
     * Film constructor.
     * @param $titre
     * @param $anneeRealisation
     * @param $genre
     * @param $studio
     * @param $synopsis
     * @param $realisateur
     */
    public function __construct($titre, $anneeRealisation, $genre, $studio, $synopsis, $realisateur)
    {
        $this->titre = $titre;
        $this->anneeRealisation = $anneeRealisation;
        $this->genre = $genre;
        $this->studio = $studio;
        $this->synopsis = $synopsis;
        $this->realisateur = $realisateur;
    }

    /**
     * @return mixed
     */
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * @param mixed $titre
     */
    public function setTitre($titre)
    {
        $this->titre = $titre;
    }

    /**
     * @return mixed
     */
    public function getAnneeRealisation()
    {
        return $this->anneeRealisation;
    }

    /**
     * @param mixed $anneeRealisation
     */
    public function setAnneeRealisation($anneeRealisation)
    {
        $this->anneeRealisation = $anneeRealisation;
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
    public function getRealisateur()
    {
        return $this->realisateur;
    }

    /**
     * @param mixed $realisateur
     */
    public function setRealisateur($realisateur)
    {
        $this->realisateur = $realisateur;
    }
}