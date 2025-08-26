<?php

namespace Modules\Community\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Modules\Community\Http\Requests\CommunityCreateRequest;
use Modules\Community\Models\Communities;
use Modules\Community\Models\Communityproducts;
use Modules\Community\Services\CommunityService;
use Modules\Save\Models\Favories;

class CommunityController extends Controller
{
    public function __construct(public CommunityService $CommunityService) {}

    public function communityIndex()
    {
        return view('community::frontend.index');
    }

    public function communityCreate()
    {

        return view('community::frontend.create');
    }

    public function communityStore(CommunityCreateRequest $request)
    {
       $validated = $request->validated();
       $community = $this->CommunityService->createCommunity($validated);

       return redirect()->route('community.create.save', ['community_token' => $community->community_token])
           ->with('success', 'Topluluk başarıyla oluşturuldu. Lütfen detayları kaydedin.');
    }

    public function communityCreateSave($community_token)
    {
        $data = $this->CommunityService->getCommunityByToken($community_token);

        if (!$data) {
            return redirect()->route('community.index')->with('error', 'Topluluk bulunamadı.');
        }

        $product = Communityproducts::where('user_id', Auth::id())
            ->where('community_id', $data->id)
            ->get();

        return view('community::frontend.create-detail', compact('data', 'product'));
    }

    public function userCommunityDetail($id)
    {
        $user = User::where('username', $id)->first();

        if (!$user) {
            return redirect()->route('community.index')->with('error', 'Topluluk bulunamadı.');
        }

        $data = Communities::where('user_id', $user->id)
            ->orderBy('created_at', 'desc')
            ->get();

        return view('community::frontend.user-detail', compact('user','data'));
    }

    public function communityDetail($community_token)
    {
        $data = $this->CommunityService->getCommunityByToken($community_token);

        if (!$data) {
            return redirect()->route('community.index')->with('error', 'Topluluk bulunamadı.');
        }

        $products = Communityproducts::where('community_id', $data->id)->get();

        return view('community::frontend.detail', compact('data', 'products'));
    }

}
