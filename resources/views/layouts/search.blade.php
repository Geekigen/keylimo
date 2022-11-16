@extends('layouts.app')
@section('content')
<section class="w3l-features-4">
    <div class="features4-block py-5">
        <div class="container py-md-5">
            <div class="we-header text-center">
                <h6 class="title-subw3hny">{{__('Available products')}}</h6>
                <h3 class="title-w3l mb-5">{{__('Today')}}</h3>
            </div>
            <div class="row features4-grids">
                @forelse ($product as $product)
                      <div class="col-lg-3 col-md-6 mt-4" >
                    

                        <div class="features4-grid">
                            <a href="products/{{ $product->id }} " class="grid-link">
                            <div class="imageprod">
                                <img style="height:200px; width:200px; object-fit:contain;" class="img-fluid" src="{{asset('images/' . json_decode($product->image1,true))}}" alt="">
                            </div></a>
                            <h5>{{__('Ksh')}}:{{$product->price}}</h5>
                            <h5><a href="/add-to-cart/{{ $product->id }} " class="fa fa-cart-plus" aria-hidden="true">{{__('Add to cart')}}</a></h5>
                        </div>
              </div>
                @empty
                    <h4>{{__('Product not found!')}}</h4>
                @endforelse
               
              
                
            
                
            </div>
        </div>
    </div>
</section>
@endsection