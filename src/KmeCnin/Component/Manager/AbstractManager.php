<?php

namespace KmeCnin\Component\Manager;

use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\Persistence\ObjectRepository;

abstract class AbstractManager implements ManagerInterface
{
    /**
     * @var ObjectRepository 
     */
    protected $repository;
    
    /**
     * @var ObjectManager
     */
    protected $manager;
    
    public function __construct(ObjectRepository $repository, ObjectManager $manager)
    {
        $this->repository = $repository;
        $this->manager = $manager;
    }
    
    /**
     * @{inheritdoc}
     */
    public function get($id = null) 
    {
        if (null !== $id) {
            return $this->repository->find($id);
        }
        return $this->repository->findAll();
    }
    
    /**
     * @{inheritdoc}
     */
    public function set($object, $flush = true)
    {
        $this->manager->persist($object);
        if ($flush) {
            $this->flush();
        }
        return true;
    }
    
    /**
     * @{inheritdoc}
     */
    public function remove($id) 
    {
        
    }
    
    /**
     * @{inheritdoc}
     */
    public function flush()
    {
        $this->manager->flush();
    }
}
