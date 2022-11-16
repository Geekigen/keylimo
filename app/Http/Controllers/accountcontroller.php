<?php

namespace App\Http\Controllers;

use App\Models\product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class accountcontroller extends Controller
{
   public function myaccount(){
    $admin=User::where('email','maze@mailinator.com')->get();

    
return view('layouts.account',['admin'=>$admin]);
    }
    
    public function prod(){
        $id=Auth::user()->id;
        $products=product::where('user_id',$id)->get();
        return view('layouts.products',['products'=>$products]);
    }

    public function finance(){
        return view('layouts.finances');
    }
}
