<?php


class Director
{
    private $name;
    private $birthDate;

    /**
     * Director constructor.
     * @param $name
     */
    public function __construct($name)
    {
        $this->name = $name;
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