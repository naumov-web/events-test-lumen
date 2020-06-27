<?php

use App\Services\UsersService;
use Illuminate\Database\Seeder;

/**
 * Class UsersSeeder
 */
final class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = config('defaults.users');
        UsersService::getInstance()
            ->importUsers($users);
    }
}
