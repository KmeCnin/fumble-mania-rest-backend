<?php

namespace KmeCnin\Component\Model;

/**
 * Campaign.
 */
class Campaign
{
    /**
     * @var int
     */
    private $id;

    
    /**
     * @var string 
     */
    protected $title;

    /**
     * Get id.
     *
     * @return int 
     */
    public function getId()
    {
        return $this->id;
    }
    
    /**
     * Stringify.
     * 
     * @return string
     */
    public function __toString() 
    {
        return $this->title;
    }

    /**
     * Get title.
     *
     * @return string 
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set title.
     *
     * @param string
     * 
     * @return Campaign 
     */
    public function setTitle($title)
    {
        $this->title = $title;
        return $this;
    }
}
