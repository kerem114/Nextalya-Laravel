<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = Auth::user();
        
        // Takip edilen kullanıcıların içerikleri
        $followingIds = $user->followings()->pluck('id');
        
        $feedItems = collect();
        
        if ($followingIds->isNotEmpty()) {
            // Burada gerçek veri çekme mantığı olacak
            // Şimdilik boş bırakıyoruz
        }
        
        return view('dashboard.index', [
            'feedItems' => $feedItems,
            'user' => $user
        ]);
    }
}