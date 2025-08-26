<?php

namespace Modules\Product\Repositories;

use Modules\Product\Interfaces\ProductRepositoryInterface;
use Modules\Product\Models\Products;

class ProductRepository implements ProductRepositoryInterface
{
    public function getAllProducts()
    {
        return Products::where('type','product')->inRandomOrder()->get();
    }
}
