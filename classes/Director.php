<?php


class Director
{
    private $id;    // Vide si non instancié avec "withId"
    private $name;
    private $birthDate;

    /**
     * Director constructor.
     * @param $name
     * @param $birthDate
     */
    public function __construct($name)
    {
        $this->name = $name;
    }

    /**
     * @param $id
     * @param $name
     * @param $birthDate
     * @return Director
     */
    public static function withId($id, $name) {
        $instance = new self($name);
        $instance->setId($id);
        return $instance;
    }

    /**
     * @param $name
     * @param $birthDate
     * @return Director
     */
    public static function withBirthDate($name, $birthDate) {
        $instance = new self($name);
        $instance->setBirthDate($birthDate);
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
    public function setId($id)
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
    public function getBirthDate()
    {
        return $this->birthDate;
    }

    /**
     * @param mixed $birthDate
     */
    public function setBirthDate($birthDate)
    {
        $this->birthDate = $birthDate;
    }




}