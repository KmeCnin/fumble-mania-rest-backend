<?php

namespace KmeCnin\Component\Manager;

/**
 * This interface is used in order to have agnostic dependencies methods
 * when working with objects/enties
 */
interface ManagerInterface 
{
    public function find();
}
