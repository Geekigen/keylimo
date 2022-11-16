<?php

namespace App\Http\Controllers;

use App\Models\product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class productscotroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   $product=product::all();
        return view('welcome')
        ->with('product',$product);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    return view('layouts.pcreate');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name'=>'Required',
            'description'=>'Required',
            'location'=>'Required',
            'price' =>'Required|integer',
            'quantity' =>'Required|string',
            'category' =>'Required|string',
            'image.*'=> 'mimes:jpeg,png,jpg|max:500'
            ]);
            foreach ($request->file('image') as $image) {
                $newImageName=time().'_'.rand(1,100).'.'.$image->extension();
            $image->move(public_path('images'),$newImageName);
            $data[]=$newImageName;

        }
        $product= new product;

            $product->name=$request->input('name');
            $product->description=$request->input('description');
            $product->price=$request->input('price');
            $product->location=$request->input('location');
            $product->quantity=$request->input('quantity');
            $product->category=$request->input('category');
            $product->image1=json_encode($data[0]);
            $product->image2=json_encode($data[1]);
            $product->image3=json_encode($data[2]);
            $product->user_id=Auth::user()->id;
            $product->save();

            return redirect('/');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product=product::find($id);

        return view('layouts.pshow')
        ->with('product',$product);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tempo=product::find($id)->first();
        return view('layouts.pedit')
        ->with('tempo',$tempo);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name'=>'Required',
            'description'=>'Required',
            'price' =>'Required|integer',
            'quantity' =>'Required|string',
            'category' =>'Required|string',
            'image.*'=> 'mimes:jpeg,png,jpg|max:500'
            ]);
            foreach ($request->file('image') as $image) {
                $newImageName=time().'_'.rand(1,100).'.'.$image->extension();
            $image->move(public_path('images'),$newImageName);
            $data[]=$newImageName;
    
        }
            $prod=product::where('id',$id)
            ->update([
                'name'=>$request->input('name'),
                'price'=>$request->input('price'),
                'quantity'=>$request->input('quantity'),
                'description'=>$request->input('description'),
                'location'=>$request->input('location'),
                'category'=>$request->input('category'),
                'user_id'=>Auth::user()->id,
                'image1'=>json_encode($data[0]),
                'image2'=>json_encode($data[1]),
                'image3'=>json_encode($data[2]),
    
            ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
            $temp=product::find($id);
            $temp->delete();
            return back()->with('status',__('Product deleted'));
    }
}
