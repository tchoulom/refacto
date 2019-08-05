<?php

namespace Refacto\Entity;

class Destination
{
    public $id;
    public $countryName;
    public $conjunction;
    public $name;
    public $computerName;

    /**
     * Destination constructor.
     *
     * @param $id
     * @param $countryName
     * @param $conjunction
     * @param $computerName
     */
    public function __construct($id, $countryName, $conjunction, $computerName)
    {
        $this->id = $id;
        $this->countryName = $countryName;
        $this->conjunction = $conjunction;
        $this->computerName = $computerName;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getCountryName()
    {
        return $this->countryName;
    }

    /**
     * @param mixed $countryName
     * @return Destination
     */
    public function setCountryName($countryName)
    {
        $this->countryName = $countryName;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getConjunction()
    {
        return $this->conjunction;
    }

    /**
     * @param mixed $conjunction
     * @return Destination
     */
    public function setConjunction($conjunction)
    {
        $this->conjunction = $conjunction;
        return $this;
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
     * @return Destination
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getComputerName()
    {
        return $this->computerName;
    }

    /**
     * @param mixed $computerName
     * @return Destination
     */
    public function setComputerName($computerName)
    {
        $this->computerName = $computerName;
        return $this;
    }
}
