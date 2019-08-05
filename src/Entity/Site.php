<?php

namespace Refacto\Entity;

class Site
{
    public $id;
    public $url;

    /**
     * Site constructor.
     *
     * @param $id
     * @param $url
     */
    public function __construct($id, $url)
    {
        $this->id = $id;
        $this->url = $url;
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
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @param mixed $url
     * @return Site
     */
    public function setUrl($url)
    {
        $this->url = $url;
        return $this;
    }
}
