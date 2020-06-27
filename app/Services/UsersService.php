<?php

namespace App\Services;

use App\Repositories\BaseRepository;
use App\Repositories\UsersRepository;
use Illuminate\Support\Facades\Hash;

/**
 * Class UsersService
 * @package App\Services
 */
final class UsersService extends BaseEntityService
{

    /**
     * @inheritDoc
     */
    protected function getRepository(): BaseRepository
    {
        return new UsersRepository();
    }

    /**
     * Import multiple users
     *
     * @param array $users
     * @return void
     */
    public function importUsers(array $users): void
    {
        foreach ($users as $user) {
            $user_model = $this->getRepository()->getFirstByFilters([
                ['email', $user['email']]
            ]);

            if (!$user_model) {
                $this->getRepository()->store([
                    'email' => $user['email'],
                    'password' => Hash::make($user['password'])
                ]);
            }
        }
    }
}
