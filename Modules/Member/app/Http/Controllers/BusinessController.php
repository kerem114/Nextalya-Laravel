<?php

namespace Modules\Member\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Member\Models\Businessrequests;

class BusinessController extends Controller
{
    public function businessAccount()
    {
        $hasBusinessRequest = Businessrequests::where('user_id', auth()->id())->exists();
        return view('member::frontend.transition',compact('hasBusinessRequest'));
    }

}
