<?php

namespace App\Http\Controllers;

use App\Models\namelang;
use App\Models\order;
use App\Models\product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PHPUnit\Util\Json;

class othercontroller extends Controller
{
    public function search(Request $request)
    {


$empty="No products found";
$searched=$request->input('search');
        $product=product::where('name','LIKE','%'.$searched.'%')->get();
        return view('layouts.search' ,['product'=>$product,'empty'=>$empty]);
    }

    public function plants(Request $request)
    {


$empty="No products found";
        $product=product::where('category','plants')->get();
        return view('layouts.search' ,['product'=>$product,'empty'=>$empty]);
    }

    public function livestock(Request $request)
    {


$empty="No products found";
        $product=product::where('category','livestock')->get();
        return view('layouts.search' ,['product'=>$product,'empty'=>$empty]);
    }


    public function orders(){
        $id=Auth::user()->id;
        $orders=order::all();
    $myorders=order::where('seller',$id)->get();
    if ($myorders) {
      $product=product::where('user_id',$id)->get();
    }
    
return view("layouts.orders",['myorders'=>$myorders,'product'=>$product]);

    }
    public function names(){
        $namelang=namelang::all();
        return view('layouts.namelangshow',['namelang'=>$namelang]);
    }

    
}
