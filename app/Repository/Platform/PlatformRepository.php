<?php

namespace App\Repository\Platform;

use App\Entity\Platform\PlatformEntity;
use App\Repository\Repository;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

/**
 * Class PlatformRepository
 * @package App\Repository\Platform
 */
class PlatformRepository extends Repository
{
    /**
     * @param $id
     * @return mixed
     */
    public function getFromId($id)
    {
        $queryBuilder = $this->newQuery();
        $queryBuilder->where('id', $id);

        return $queryBuilder->get()->first();
    }

    public function getByName($name)
    {
        $queryBuilder = $this->newQuery();
        $queryBuilder->select('name', 'developer', 'generation', 'release_jp', 'release_us', 'release_br', 'media_type');
        $queryBuilder->where('name', 'LIKE', "%{$name}%");

        return $queryBuilder->get();
    }

    /**
     * @return Builder[]|Collection
     */
    public function getAll()
    {
        $queryBuilder = $this->newQuery();
        return $queryBuilder->get();
    }

    /**
     * @return Builder[]|Collection
     */
    public function getNameAll()
    {
        $queryBuilder = $this->newQuery();
        $queryBuilder->select('id', 'name');
        return $queryBuilder->get();
    }

    /**
     * @return string
     */
    public function getEntityClass(): string
    {
        return PlatformEntity::class;
    }
}
