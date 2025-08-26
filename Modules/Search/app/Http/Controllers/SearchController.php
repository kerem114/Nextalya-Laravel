<?php

namespace Modules\Search\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Modules\Community\Models\Communities;
use Modules\Post\Models\Posts;
use Modules\Product\Models\Products;
use Modules\Product\Services\ProductService;

class SearchController extends Controller
{
    public function __construct(public ProductService $ProductService) {}

    public function discoverIndex()
    {
        $data = $this->ProductService->randomProduct();
        return view('search::frontend.index', compact('data'));
    }


    public function search(Request $request)
    {
        $query = $request->input('q');

        $products = Products::where('title', 'like', '%' . $query . '%')->get();
        $users = User::where('name', 'like', '%' . $query . '%')->get();
        $communities = Communities::where('name', 'like', '%' . $query . '%')->get();


        $posts = $products->where('type', 'post');
        $polls = $products->where('type', 'poll');
        $realProducts = $products->where('type', 'product');

        return view('search::frontend.search', compact('products', 'users','communities', 'query', 'posts', 'polls', 'realProducts'));
    }

}
