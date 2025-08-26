<?php

namespace Modules\Comment\Http\Controllers;

use \Modules\Comment\Models\Comments;
use \Modules\Product\Models\Products;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Notification\Models\Customlogs;

class CommentController extends Controller
{

    public function commentStore(Request $request, $id)
    {
        $message = [
            'comment.required' => 'Yorum alanı boş bırakılamaz.',
            'comment.string'   => 'Yorum alanı metin olmalıdır.',
            'comment.max'      => 'Yorum alanı en fazla 1000 karakter olabilir.',
        ];

        $request->validate([
            'comment' => 'required|string|max:1000',
        ], $message);

        $product = Products::find($id);

        Comments::create([
            'user_id' => auth()->id(),
            'product_id' => $id,
            'comment' => $request->comment,
        ]);

        if ($product) {
            Customlogs::create([
                'user_id' => $product->user_id,
                'type'    => 'comment',
                'content' => $product->title . ' ürününüze ' . auth()->user()->name . ' tarafından yorum yapıldı.',
                'status'  => 'unread',
            ]);
        }

        return redirect()->back()->with('success', 'Yorumunuz başarıyla eklendi.');
    }
}
