<?php

namespace App\Services;

use App\DTO\ListItemsDTO;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;

/**
 * Class BaseEntityService
 * @package App\Services
 */
abstract class BaseEntityService extends BaseService
{
    /**
     * Get repository instance
     *
     * @return BaseRepository
     */
    abstract protected function getRepository() : BaseRepository;

}
