<?php

namespace App\Http\Controllers;

use App\Models\product;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session as FacadesSession;

class locallizationcontroller extends Controller
{
    public function switchLang($lang)
    {
        if (! in_array($lang, ['en','kl','ksw'])) {
            abort(400);
        }
        FacadesSession::put('applocale', $lang);

        return Redirect::back();

        
    }
}
