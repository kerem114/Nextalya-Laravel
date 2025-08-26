<?php

namespace Modules\Page\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function aboutus()
    {
        return view('page::frontend.about');
    }

    public function privacyPolicy()
    {
        return view('page::frontend.privacy-policy');
    }

    public function carrierIndex()
    {
        return view('page::frontend.carrier');
    }

    public function kvkkIndex()
    {
        return view('page::frontend.kvkk');
    }

    public function userPolicy()
    {
        return view('page::frontend.user-policy');
    }

    public function communityRule()
    {
        return view('page::frontend.community-rule');
    }

    public function help()
    {
        return view('page::frontend.help');
    }
}
