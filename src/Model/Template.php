<?php

namespace Refacto\Model;

/**
 * Class Template
 */
class Template
{
    protected $id;
    protected $subject;
    protected $content;

    /**
     * Template constructor.
     *
     * @param $id
     * @param $subject
     * @param $content
     */
    public function __construct($id, $subject, $content)
    {
        $this->id = $id;
        $this->subject = $subject;
        $this->content = $content;
    }

    /**
     * Gets the Id.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Gets the subject.
     *
     * @return mixed
     */
    public function getSubject()
    {
        return $this->subject;
    }

    /**
     * Sets the subject.
     *
     * @param mixed $subject
     *
     * @return Template
     */
    public function setSubject($subject)
    {
        $this->subject = $subject;

        return $this;
    }

    /**
     * Gets the content.
     *
     * @return mixed
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Sets the content.
     *
     * @param mixed $content
     *
     * @return Template
     */
    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }
}
