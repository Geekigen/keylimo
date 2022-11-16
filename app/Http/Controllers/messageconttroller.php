<?php

namespace App\Http\Controllers;

use App\Models\message;
use App\Models\product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class messageconttroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id=Auth::user()->id;
        $messages=message::where('to',$id)->get();
        $sentmessages=message::where('from',$id)->get();
    // foreach ($messages as $messages ) {
    //   
        return view('layouts.messages',['messages'=>$messages,'sentmessages'=>$sentmessages]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    //    return view('layouts.createmessage');
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
            'message'=>'string'
            ]);
            $to=$request->input('to');
            $invalid=$to == Auth::user()->id;
            if (!$invalid) {
               $message=new message();
            $message->message=$request->input('message');
            
            $message->to=$request->input('to');
            $message->on=$request->input('on');
            $message->from=Auth::user()->id;
            $message->save();

            return back()->with('status',__('Message sent')); 
            }
            else {
                return back()->with('status',__('You cannot send a messsage to yourself'));
            }
          
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      
        $message=message::find($id);
        $allowed=message::where('to',Auth::user()->id);
        $from=$message->from;
        
            $on=$message->on;
        
          if (!$allowed) {return back()->with('status',__('Access denied'));
          } else {
             $user=User::where('id',$from)->get();
            $product=product::where('id',$on)->get();
        return view('layouts.showmessage')
        ->with('message',$message)
        ->with('user',$user)
        ->with('product',$product) ;
          }
          
           
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       
        $message=message::find($id)->first();
            return view('layouts.editmessage')
        ->with('message',$message);
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
            'message'=>'string'
            ]);
        
            $message=message::where('id',$id)
            ->update([
'message'=>$request->input('message'),
            
            'to'=>$request->input('to'),
            'on'=>$request->input('on'),
            'from'=>Auth::user()->id
            
            
            ]);return back()->with('status',__('message updated'));

            
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $message=message::find($id);
        $message->delete();
        return back()->with('status',__('Message  deleted'));
    }
}
