<?php

namespace Modules\Post\Repositories;

use Modules\Post\Interfaces\PostRepositoryInterface;
use Modules\Post\Models\Discussions;
use Modules\Post\Models\Posts;
use Modules\Post\Models\Reviewdiscussions;
use Modules\Product\Models\Products;

class PostRepository implements PostRepositoryInterface
{
    public function store(array $data)
    {
        return Products::create($data);
    }

    public function storeDiscussion(array $data)
    {
        return Products::create($data);
    }

    public function findDiscussion(string $slug)
    {
        return Products::where('slug', $slug)->firstOrFail();
    }


}
