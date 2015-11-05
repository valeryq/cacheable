<?php namespace Valeryq\Cacheable\Contracts;

use Illuminate\Contracts\Cache\Repository;

/**
 * Interface Cacheable
 * @package Valeryq\Cacheable\Contracts
 */
interface Cacheable
{
    /**
     * Check if force is on or off
     *
     * @return boolean
     */
    public function isForce();

    /**
     * Set flag as get a data. If with force it will without cached
     *
     * @param bool $force
     *
     * @return $this
     */
    public function setForce($force);

    /**
     * Set cache repository
     *
     * @param Repository $repository
     */
    public function setRepository(Repository $repository);

    /**
     * Get cache repository
     *
     * @return Repository
     */
    public function cache();
}
