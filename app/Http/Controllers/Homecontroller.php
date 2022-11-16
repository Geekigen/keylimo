<?php

namespace App\Http\Controllers;

use App\Models\namelang;
use App\Models\product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use RealRashid\SweetAlert\ToSweetAlert;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth','verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // echo '<script type="text/javascript">',
//      'jsfunction();',
//      '</script>'
// ;
        return view('home')
        ;
    }
    public function welcome(){
        $username=Auth::user()->name;
        $lang=namelang::where('name','LIKE','%'.$username.'%')
        ->where('language','kalenjin')->exists();
        $ksw=namelang::where('name','LIKE','%'.$username.'%')
        ->where('language','ksw')->exists();

        
        if ($lang) {
            $product=product::all();
                $language='kl';
                Alert::html('Wal kutit.Metee otko walat', ' <button class="btn btn-danger btn-sm remove-from-cart" >Chil yu si kowalak</button>', 'success');
    
                return view('welcome',['product'=>$product,'language'=>$language])
                ;
        }
                elseif ($ksw) {
                    $product=product::all();
                    $language='ksw';
                    Alert::html('Badili lugha.Puuza kama ishabadilika', ' <button class="btn btn-danger btn-sm remove-from-cart" >Bonyeza hapa ili kubadili</button>', 'success');
        
                    return view('welcome',['product'=>$product,'language'=>$language])
                    ;
                }
          
        else {
           $product=product::all();
            return view('welcome',['product'=>$product])
            ;
        }
        
       
        
       
        
      

    }
}
