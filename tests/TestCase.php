<?php

namespace Tests;

use Laravel\Lumen\Application;
use Laravel\Lumen\Testing\TestCase as BaseTestCase;

/**
 * Class TestCase
 * @package Tests\Unit
 */
abstract class TestCase extends BaseTestCase
{
    /**
     * Creates the application.
     *
     * @return Application
     */
    public function createApplication()
    {
        return require __DIR__.'/../bootstrap/app.php';
    }
}
