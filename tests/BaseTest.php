<?php

use Illuminate\Support\Facades\Artisan;
use Laravel\Lumen\Testing\DatabaseMigrations;

/**
 * Class BaseTest
 */
abstract class BaseTest extends TestCase
{

    use DatabaseMigrations;

    /**
     * Actions before test
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();

        Artisan::call('db:seed');
    }

}
