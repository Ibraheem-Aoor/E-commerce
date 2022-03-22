<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LangController extends Controller
{


    public function changeLang()
    {
        session(['lang' => app()->getLocale()]);
        return redirect()->back();
    }


}
