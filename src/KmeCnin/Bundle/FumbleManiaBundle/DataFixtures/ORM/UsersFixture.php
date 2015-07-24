<?php

namespace KmeCnin\Bundle\FumbleManiaBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use KmeCnin\Bundle\FumbleManiaBundle\Entity\User;

class UsersFixture extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $userTest = new User();
        $userTest
            ->setUsername('test')
            ->setPassword('test')
            ->setEmail('pierrechanel.gauthier@gmail.com')
            ->setEnabled(true);

        $manager->persist($userTest);
        $manager->flush();
    }

    /**
     * {@inheritDoc}
     */
    public function getOrder()
    {
        return 1;
    }
}