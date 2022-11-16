@extends('layouts.app')
@section('content')
   

<section class="w3l-circles py-5" id="services">
    <div class="container py-md-5 py-2">
        <!--/row-2-->
        <div class="row w3l-circles">
            <div class="col-lg-6 circles-left">
                @foreach ($product as $product)
                <img src="{{ asset('images/'. json_decode($product->image1,true) )}}"  class=" image-fluid"/>
                @endforeach
             
            </div>
           
            <div class="col-lg-6 circles-right mt-lg-0 mt-5 align-self  position-relative">
                 <p class="">{{__('Message')}}:::{{$message->message}}</p>
                <h6 class="title-subw3hny">{{__('Date')}}:{{date('d-m-Y H:i:s',strtotime($message->created_at))}}</h6>
                
                <div id="app" v-cloak>
                @foreach ($user as $user)
                   <div class="w3banner-content-btns">

                    <a href="#" class="btn btn-style btn-primary mt-lg-5 mt-4 me-2">{{__('Sender')}}:{{$user->name}}
                         <i class="fas fa-user ms-2"></i></a>
                         <button  @click="toggle" class="btn btn-style btn-primary mt-lg-5 mt-4 me-2">{{__('Reply message')}}</button>
                      
                </div> 
                @endforeach
                <div  v-if="isVisible">
                    <div class="progress-right">
                        <h4>{{__('REPLY')}}</h4>
                        <form action="/message" method="post">
                            @csrf
                            <div class="form-top1">

                                <div class="form-top">
                                    <div class="form-top-righ">
                                        <textarea name="message" id="Message" placeholder="{{__('Message')}}*" required=""></textarea>
                                    </div>
                                  <input hidden type="text"name="to" value="{{$message->from}}">
                                  <input hidden type="text"name="on" value="{{$product->id}}">
                                </div>
                                <div class="text-center mt-5">
                                    <button type="submit" class="btn btn-style btn-primary">{{ __('Submit Now') }} <i class="far fa-paper-plane ml-lg-3"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
                
            </div>
        </div>
        <!--//row-2-->
    </div>
</section>

@endsection
@section('scripts')
<script src="https://unpkg.com/vue@next"></script>
<script src="{{ asset('js/toggler.js')}}" ></script>
@endsection