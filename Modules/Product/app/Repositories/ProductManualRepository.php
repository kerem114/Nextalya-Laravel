<?php

namespace Modules\Product\Repositories;

use Modules\Product\Interfaces\ProductManualRepositoryInterface;
use Modules\Product\Models\Productfeatures;
use Modules\Product\Models\Productlikes;
use Modules\Product\Models\Products;

class ProductManualRepository implements ProductManualRepositoryInterface
{
    public function store(array $data)
    {
        return Products::create($data);
    }

    public function detail($slug)
    {
        return Products::where('slug',$slug)->first();
    }

    public function feature($id)
    {
        return Productfeatures::where('product_id', $id)->get();
    }

    public function toggleLike(int $userId, int $productId): bool
    {
        $like = Productlikes::where('user_id', $userId)
                            ->where('product_id', $productId)
                            ->first();

        if ($like) {
            $like->delete();
            return false;
        } else {
            Productlikes::create([
                'user_id' => $userId,
                'product_id' => $productId,
            ]);
            return true;
        }
    }

}
