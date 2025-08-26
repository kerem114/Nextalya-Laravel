<?php

namespace Modules\Product\Services;

use Modules\Product\Interfaces\ProductRepositoryInterface;

class ProductService
{
    protected $ProductRepository;

    public function __construct(ProductRepositoryInterface $ProductRepository)
    {
        $this->ProductRepository = $ProductRepository;
    }

    public function randomProduct()
    {
        return $this->ProductRepository->getAllProducts();
    }
}
