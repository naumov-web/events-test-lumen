<?php

use Illuminate\Database\Seeder;

/**
 * Class DatabaseSeeder
 */
final class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call('UsersSeeder');
        $this->call('CitiesSeeder');
        $this->call('EventsSeeder');
    }
}
