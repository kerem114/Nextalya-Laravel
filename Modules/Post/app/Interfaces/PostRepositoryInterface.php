<?php

namespace Modules\Post\Interfaces;

interface PostRepositoryInterface
{
    public function store(array $data);
    public function storeDiscussion(array $data);
    public function findDiscussion(string $slug);

}
