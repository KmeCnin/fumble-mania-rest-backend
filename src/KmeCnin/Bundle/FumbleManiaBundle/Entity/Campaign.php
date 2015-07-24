<?php

namespace KmeCnin\Bundle\FumbleManiaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use KmeCnin\Component\Model\Campaign as BaseCampaign;

/**
 * Campaign.
 *
 * @ORM\Entity(repositoryClass="KmeCnin\Bundle\FumbleManiaBundle\Repository\CampaignRepository")
 * @ORM\Table(name="campaign")
 */
class Campaign extends BaseCampaign
{
    /**
     * @{inheritdoc}
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    
    /**
     * @{inheritdoc}
     * 
     * @ORM\Column(name="title", type="string", length=50)
     * 
     * @Assert\NotBlank(
     *      message = "assert.not_blank.message"
     * )
     * @Assert\Length(
     *      max = "50",
     *      maxMessage = "assert.length.max_message (50)"
     * )
     */
    protected $title;
}
