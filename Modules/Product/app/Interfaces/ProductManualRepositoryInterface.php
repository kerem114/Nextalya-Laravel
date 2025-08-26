<?php

namespace Modules\Product\Interfaces;

interface ProductManualRepositoryInterface
{
    public function store(array $data);
    public function detail($slug);
    public function feature($id);

    public function toggleLike(int $userId, int $productId): bool;
}
