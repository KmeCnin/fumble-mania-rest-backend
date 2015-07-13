<?php

namespace KmeCnin\Component\Manager;

/**
 * This interface is used in order to have agnostic dependencies methods
 * when working with objects/enties
 */
interface ManagerInterface 
{
    /**
     * Get object by id.
     * 
     * @param int
     * 
     * @return object|Collection
     */
    public function get($id = null);
    
    /**
     * Create or update object.
     * 
     * @param object
     * 
     * @return bool
     */
    public function set($object, $flush = true);
    
    /**
     * Delete object by id.
     * 
     * @param int
     * 
     * @return bool
     */
    public function remove($id);
    
    /**
     * Persist changes.
     */
    public function flush();
}
