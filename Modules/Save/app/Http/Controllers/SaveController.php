<?php

namespace Modules\Save\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Modules\Notification\Models\Customlogs;
use Modules\Product\Models\Products;
use Modules\Save\Models\Favories;

class SaveController extends Controller
{
    public function saveIndex()
    {
        $savedItems = Favories::where('user_id', Auth::id())
            ->whereHas('getProduct', function ($query) {
                $query->where('type', 'product');
            })
            ->with('getProduct')
            ->get();

        $countSavedItems = $savedItems->count();

        return view('save::frontend.index', compact('savedItems', 'countSavedItems'));
    }

    public function productFavories($id)
    {
        if (Auth::check()) {

            $c = Products::where('id', $id)->count();
            if ($c != 0) {

                $control = Favories::where('product_id', $id)
                    ->where('user_id', Auth::id())
                    ->count();

                if ($control == 0) {
                    // Favoriye ekleme
                    Favories::create([
                        'product_id' => $id,
                        'user_id'    => Auth::id()
                    ]);

                    // log kaydı oluştur
                    $product = Products::find($id);
                    Customlogs::create([
                        'user_id' => $product->user_id,
                        'type'    => 'favorite',
                        'content' => $product->title . ' ürünü ' . Auth::user()->name . ' tarafından favorilere eklendi.',
                        'status'  => 'unread',
                    ]);

                    return back()->with('success', 'Favorilere Eklendi.!');

                } else {
                    // Favoriden kaldırma (log eklenmeyecek)
                    Favories::where('product_id', $id)
                        ->where('user_id', Auth::id())
                        ->delete();

                    return back()->with('error', 'Favorilerden Kaldırıldı.!');
                }

            } else {
                abort(404);
            }
        } else {
            return back()->with('error', 'Lütfen Giriş Yapın.!');
        }
    }

    public function favoriesDelete(Request $request,$id)
    {
        if(Auth::check()){
            Favories::where('id', $id)->where('user_id', Auth::id())->delete();
            return back()->with('success', 'Favori ürün kaldırıldı.');
        } else {
            return back()->with('error', 'Lütfen giriş yapın.');
        }
    }
}
