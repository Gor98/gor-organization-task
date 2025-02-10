<?php

namespace App\Contracts;

use Illuminate\Support\Collection;

interface ActivityServiceContract
{
    public function all(): Collection;
}
