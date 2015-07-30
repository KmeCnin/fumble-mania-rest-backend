<?php

namespace KmeCnin\Bundle\FumbleManiaBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use KmeCnin\Bundle\FumbleManiaBundle\Entity\Campaign;

class CampaignsFixture extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        for ($i = 0; $i < 5; $i++) {
            $campaign = new Campaign();
            $campaign->setTitle('Campagne de test numéro '.($i+1));
            $manager->persist($campaign);
        }
        $manager->flush();
    }

    /**
     * {@inheritDoc}
     */
    public function getOrder()
    {
        return 2;
    }
}