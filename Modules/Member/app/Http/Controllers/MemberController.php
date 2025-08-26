<?php

namespace Modules\Member\Http\Controllers;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Modules\Product\Models\Products;

class MemberController extends Controller
{
    public function myProfile()
    {
        $productCount = Products::where('user_id', Auth::id())->count();
        return view('member::frontend.profile',compact('productCount'));
    }

    public function profileEdit()
    {
        $user = Auth::user();
        return view('member::frontend.edit-profile', compact('user'));
    }

    public function userAccount($username)
    {
        $user = User::where('username', $username)->firstOrFail();
        if (!$user) {
            return redirect()->route('dashboard.index')->with('error', 'Kullanıcı bulunamadı.');
        }
        $productCount = Products::where('user_id', $user->id)->count();
        return view('member::frontend.out', compact('user', 'productCount'));
    }



    public function profileUpdate(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users,username,' . $user->id,
            'bio' => 'nullable|string|max:500',
            'gender' => 'nullable|in:male,female',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ], [
            'name.required' => 'Adınız zorunludur.',
            'username.required' => 'Kullanıcı adı zorunludur.',
            'username.unique' => 'Bu kullanıcı adı zaten alınmış.',
            'avatar.image' => 'Yüklenen dosya bir resim olmalıdır.',
            'avatar.max' => 'Resim boyutu en fazla 2MB olabilir.',
        ]);


        $user->name = $request->name;
        $user->username = $request->username;
        $user->bio = $request->bio;
        $user->gender = $request->gender;

        if ($request->hasFile('avatar')) {

            if ($user->avatar && Storage::exists($user->avatar)) {
                Storage::delete($user->avatar);
            }

            $path = $request->file('avatar')->store('avatars', 'public');
            $user->avatar = $path;
        }

        $user->save();
        return redirect()->route('my.profile')->with('success', 'Profiliniz başarıyla güncellendi.');
    }

    public function passwordChange(Request $request)
    {

        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|min:6|confirmed',
        ], [
            'old_password.required' => 'Lütfen mevcut şifrenizi giriniz.',
            'new_password.required' => 'Yeni şifre alanı zorunludur.',
            'new_password.min' => 'Yeni şifre en az 6 karakter olmalıdır.',
            'new_password.confirmed' => 'Yeni şifre ile şifre onayı uyuşmuyor.',
        ]);

        $user = Auth::user();

        if (!Hash::check($request->old_password, $user->password)) {
            return back()->withErrors(['old_password' => 'Eski şifre yanlış']);
        }


        $user->password = Hash::make($request->new_password);
        $user->save();

        return back()->with('success', 'Şifreniz başarıyla güncellendi.');
    }

    public function reRe()
    {
        return view('member::frontend.re');
    }

    public function follow(User $user)
    {
        if (Auth::id() === $user->id) {
            return back()->with('error', 'Kendinizi takip edemezsiniz.');
        }

        Auth::user()->followings()->syncWithoutDetaching([$user->id]);
        return back()->with('success', 'Takip edildi.');
    }

    public function unfollow(User $user)
    {
        Auth::user()->followings()->detach($user->id);
        return back()->with('success', 'Takipten çıkıldı.');
    }

    public function follower()
    {
        $followers = Auth::user()->followers()->paginate(10);
        return view('member::frontend.follower', compact('followers'));
    }

    public function following()
    {
        $followings = Auth::user()->followings()->paginate(10);
        return view('member::frontend.following', compact('followings'));
    }

    public function followerDelete($id)
    {
        $follower = Auth::user()->followers()->findOrFail($id);
        Auth::user()->followers()->detach($follower->id);
        return back()->with('success', 'Takipçi başarıyla silindi.');
    }

    public function followingDelete($id)
    {
        $following = Auth::user()->followings()->findOrFail($id);
        Auth::user()->followings()->detach($following->id);
        return back()->with('success', 'Takipten çıkıldı.');
    }

}
