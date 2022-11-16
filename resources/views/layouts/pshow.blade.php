@extends('layouts.app')
@section('content')

<section class="w3l-circles py-5" id="circles">
    <div class="container py-md-5 py-2">
        <!--/row-2-->
        <div class="row w3l-circles">
            <div class="col-lg-6 circles-left">
                <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                      <div class="carousel-item active" data-bs-interval="10000">
                        <img class="img-fluid" src="{{asset('images/' . json_decode($product->image1,true))}}"  class="d-block w-100" alt="...">
                      </div>
                      <div class="carousel-item" data-bs-interval="2000">
                        <img class="img-fluid" src="{{asset('images/' . json_decode($product->image2,true))}}" class="d-block w-100" alt="...">
                      </div>
                      <div class="carousel-item">
                        <img class="img-fluid" src="{{asset('images/' . json_decode($product->image3,true))}}" class="d-block w-100" alt="...">
                      </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                      <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
                      <span class="carousel-control-next-icon" aria-hidden="true"></span>
                      <span class="visually-hidden">Next</span>
                    </button>
                  </div>
            </div>
            <div class="col-lg-6 circles-right mt-lg-0 mt-5 align-self  position-relative">
                <h6 class="title-subw3hny">{{ __('Product Description') }}</h6>
                <h3 class="title-w3l mb-4">{{ __('Product Name') }}:{{$product->name}}</h3>
                <h3 class="title-w3l mb-4">{{__('Price')}}:{{__('Ksh')}}{{$product->price}}</h3>
                <p class="mb-5">{{ __('Product Description') }}:{{$product->description}}</p>
                <p class="mb-5">{{__('Location')}}:{{$product->location}}</p>
                <p class="mb-5">{{ __('Quantity') }} :{{$product->quantity}}</p>
                <h5><a href="/add-to-cart/{{ $product->id }} " class="fa fa-cart-plus" aria-hidden="true">{{__('Add to cart')}}</a></h5>
                <div class="progress-circles-grids">
                    <div class="progress-circles">
                        <div class="progress-left">
                          
                            <div class="progress-right">
                                <h4>{{ __('TEXT SELLER') }}</h4>
                                <form action="/message" method="post">
                                    @csrf
                                    <div class="form-top1">
        
                                        <div class="form-top">
                                            <div class="form-top-righ">
                                                <textarea name="message" id="Message" placeholder="{{__('Message')}}*" required=""></textarea>
                                            </div>
                                          <input hidden type="text"name="to" value="{{$product->user_id}}">
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
        </div>
        <!--//row-2-->
    </div>
</section>
<!--//circles-section-->
@endsection 