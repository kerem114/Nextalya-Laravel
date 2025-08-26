<?php

namespace Modules\Poll\Repositories;

use Modules\Poll\Interfaces\PollRepositoryInterface;
use Modules\Product\Models\Products;

class PollRepository implements PollRepositoryInterface
{
    public function store(array $data)
    {
        return Products::create($data);
    }
}
