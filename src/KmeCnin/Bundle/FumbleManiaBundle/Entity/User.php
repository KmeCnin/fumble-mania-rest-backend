<?php

namespace KmeCnin\Bundle\FumbleManiaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use FOS\UserBundle\Entity\User as BaseUser;

/**
 * User.
 * 
 * @ORM\Entity
 * @ORM\Table(name="fos_user")
 */
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    
    /**
     * First name.
     * 
     * @ORM\Column(name="firstName", type="string", length=50)
     * 
     * @Assert\NotBlank(
     *      message = "assert.not_blank.message"
     * )
     * @Assert\Length(
     *      max = "50",
     *      maxMessage = "assert.length.max_message (50)"
     * )
     */
    protected $firstName;
    
    /**
     * Last name.
     * 
     * @ORM\Column(name="lastName", type="string", length=50)
     * 
     * @Assert\NotBlank(
     *      message = "assert.not_blank.message"
     * )ert\Length(
     *      max = "50",
     *      maxMessage = "assert.length.max_message (50)"
     * )
     */
    protected $lastName;
    
    /**
     * Get firstName.
     * 
     * @return string 
     */
    public function getFirstName()
    {
        return $this->firstName;
    }
    
    /**
     * Get lastName.
     * 
     * @return string 
     */
    public function getLastName()
    {
        return $this->lastName;
    }
    
    /**
     * Set firstName.
     *
     * @param string
     * 
     * @return User 
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
        return $this;
    }

    /**
     * Set lastName.
     *
     * @param string
     * 
     * @return User 
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
        return $this;
    }
    
    public function __toString() 
    {
        return (string) $this->firstName;
    }
}
