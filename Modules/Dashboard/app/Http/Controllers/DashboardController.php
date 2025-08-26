<?php

namespace Modules\Dashboard\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Member\Models\Follows;
use Modules\Product\Models\Products;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
public function dashboardIndex()
{
    $user = auth()->user();

    $followingIds = Follows::where('follower_id', $user->id)->pluck('following_id');

    // sadece takip ettiklerinin içeriklerini al
    $feedItems = collect(); // default boş

    if ($followingIds->isNotEmpty()) {
        $feedItems = Products::whereIn('user_id', $followingIds)->latest()->get();
    }

    return view('dashboard::frontend.index', [
        'feedItems' => $feedItems,
        'hasFollowing' => $followingIds->isNotEmpty(),
        'user' => $user
    ]);
}




}
