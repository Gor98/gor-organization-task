<?php

namespace App\Repositories;

use App\Common\Bases\Repository;
use App\Models\Organization;

class OrganizationRepository extends Repository
{
    /**
     * @return string
     */
    protected function model(): string
    {
        return Organization::class;
    }
}
