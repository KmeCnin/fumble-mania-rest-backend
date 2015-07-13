<?php

namespace KmeCnin\Component\Model;

/**
 * Campaign.
 */
class Campaign
{
    /**
     * @var integer
     */
    private $id;

    
    /**
     * @var string 
     */
    protected $title;

    /**
     * Get id.
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
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
}
