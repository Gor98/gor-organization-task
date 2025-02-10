<?php

namespace App\Contracts;

use Illuminate\Support\Collection;

interface BuildingServiceContract
{
    public function all(): Collection;
}
