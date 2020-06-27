<?php

namespace App\Services;

/**
 * Class BaseService
 * @package App\Services
 */
abstract class BaseService
{
    /**
     * Get service instance
     *
     * @return mixed
     */
    public static function getInstance()
    {
        return new static();
    }
}
