<?php

namespace App\Services;

use App\Repositories\BaseRepository;
use App\Repositories\UsersRepository;

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
}
