@extends('layouts.app')
@section('content')
<section class="w3l-contact-main" id="contact">
    <div class="contact-infhny py-5">
        <div class="container py-md-5">
            <div class="title-content text-center mb-md-5 mb-4">
                <h6 class="title-subw3hny">{{__('Edit message')}}</h6>
                <h3 class="title-w3l mx-lg-5">{{__('Keep In Touch With clients')}}.</h3>
            </div>
            <div class="top-map">
                <div class="map-content-9">
                    <form method="POST" action="/message/{{ $message->id }}" method="POST"    >
                        @csrf
                        @method('PUT')
                        <div class="form-top1">

                            <div class="form-top">
                                <div class="form-top-righ">
                                    <textarea name="message" id="Message" placeholder="{{__('Edit')}};;;{{$message->message}}" required=""></textarea>
                                </div>
                              <input hidden type="text"name="to" value="{{$message->to}}">
                              <input hidden type="text"name="on" value="{{$message->on}}">
                            </div>
                            <div class="text-center mt-5">
                                <button type="submit" class="btn btn-style btn-primary">{{__('Edit message')}}<i class="far fa-paper-plane ml-lg-3"></i></button>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection