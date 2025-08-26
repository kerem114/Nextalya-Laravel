<?php

namespace Modules\Product\Services;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Modules\Product\Interfaces\ProductManualRepositoryInterface;
use Modules\Product\Models\Productfeatures;
use Modules\Product\Models\Productlikes;
use Maatwebsite\Excel\Facades\Excel;

class ProductManualService
{
    protected $ProductManualRepository;

    public function __construct(ProductManualRepositoryInterface $ProductManualRepository)
    {
        $this->ProductManualRepository = $ProductManualRepository;
    }

    public function createProduct(array $data, $imageFile = null)
    {
        $data['base_token'] = Str::random(16);
        $data['user_id'] = Auth::user()->id;
        $data['slug'] = Str::slug($data['title']) . '-' . $data['base_token'];
        $data['type'] = 'product';
        $data['visibility'] = 'everyone';

        if($imageFile) {
            $fileName = uniqid() . '.' . $imageFile->getClientOriginalExtension();
            $path = $imageFile->storeAs('product',$fileName,'public');
            $data['image'] = $fileName;
        }

        $product = $this->ProductManualRepository->store($data);

        foreach ($data['features'] as $feature) {
            Productfeatures::create([
                'product_id' => $product->id,
                'feature_name' => $feature,
            ]);
        }

        return $product;
    }

    public function getDetail($slug)
    {
        return $this->ProductManualRepository->detail($slug);
    }

    public function fetchFeatures($id)
    {
        return $this->ProductManualRepository->feature($id);
    }

    public function toggleLike(int $productId): array
    {
        $userId = Auth::id();

        $liked = $this->ProductManualRepository->toggleLike($userId, $productId);

        return ['liked' => $liked];
    }
}
