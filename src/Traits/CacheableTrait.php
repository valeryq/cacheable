<?php namespace Valeryq\Cacheable\Traits;

use Closure;
use Illuminate\Contracts\Cache\Repository;

/**
 * Class CacheableTrait
 * @package Valeryq\Cacheable\Traits
 */
trait CacheableTrait
{
    /**
     * Force by default is false
     *
     * @var bool
     */
    private $force = false;

    /**
     * @var Repository
     */
    private $repository;

    /**
     * Check if force is on or off
     *
     * @return boolean
     */
    public function isForce()
    {
        return $this->force;
    }

    /**
     * Set flag as get a data. If with force it will without cached
     *
     * @param boolean $force
     *
     * @return $this
     */
    public function setForce($force)
    {
        $this->force = $force;

        return $this;
    }

    /**
     * Set cache repository
     *
     * @param Repository $repository
     */
    public function setRepository(Repository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Get cache repository
     *
     * @return Repository
     */
    public function cache()
    {
        if (!$this->repository) {
            $this->repository = app(Repository::class);
        }

        return $this->repository;
    }

    /**
     * Get an item from the cache, or store the default value.
     *
     * @param  string $key
     * @param  \DateTime|int $minutes
     * @param  \Closure $callback
     *
     * @return mixed
     */
    public function remember($key, $minutes, Closure $callback)
    {
        if ($this->isForce()) {
            return $callback();
        }

        return $this->cache()->remember($key, $minutes, $callback);
    }

    /**
     * Get an item from the cache, or store the default value forever.
     *
     * @param  string $key
     * @param \Closure $callback
     *
     * @return mixed
     */
    public function rememberForever($key, Closure $callback)
    {
        if ($this->isForce()) {
            return $callback();
        }

        return $this->cache()->rememberForever($key, $callback);
    }
}
