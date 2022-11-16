@extends('layouts.app')
@section('content')
       <!--/Banner-Start-->
       @if (Session::has('alert.config'))
       @if( $language == 'kl')
       <script>
        Swal.fire({!! Session::pull('alert.config') !!});

        $(".remove-from-cart").click(function (e) {
        e.preventDefault();
        var ele = $(this);
        if(confirm("tos imoche iwal kutit")) {
            $.ajax({
                url: '{{ route('lang',$language) }}',
                method: "GET",
            
                success: function (response) {
                    window.location.reload();
                }
            });
        }
    });
    </script> 
       @endif
       @if ($language =='ksw')
       <script>
        Swal.fire({!! Session::pull('alert.config') !!});

        $(".remove-from-cart").click(function (e) {
        e.preventDefault();
        var ele = $(this);
        if(confirm("Je wataka kubadili lugha")) {
            $.ajax({
                url: '{{ route('lang',$language) }}',
                method: "GET",
            
                success: function (response) {
                    window.location.reload();
                }
            });
        }
    });
    </script>
       @endif
    
  
@endif
       <div class="inner-banner py-5">
        <section class="w3l-breadcrumb text-left py-sm-5 ">
            <div class="container">
                <div class="w3breadcrumb-gids">
                    <div class="w3breadcrumb-left text-left">
                        <h2 class="inner-w3-title">{{__('Welcome')}} </h2>
                        <p class="inner-page-para mt-2">
                            
                        {{   __( 'Better Agriculture for Better Future.')}} </p>
                    </div>
                    <div class="w3breadcrumb-right">
                        <ul class="breadcrumbs-custom-path">
                            <li> 
                                <form   action="/search" method="GET">
                                <input class="form-control " name="search" type="search" placeholder="{{__('Search here...')}}"  required>
                                <button class="btn btn-style btn-secondary me-lg-3" type="submit">{{__('Search')}}</button>
                            </form></li>
                        
                        </ul>
                    </div>
                </div>

            </div>
        </section>
    </div>
    <!--//Banner-End-->
    <section class="w3l-features-4">
        <div class="features4-block py-5">
            <div class="container py-md-5">
                <div class="we-header text-center">
                    <h6 class="title-subw3hny">{{__('Available products')}}</h6>
                    <h3 class="title-w3l mb-5">{{__('Today')}}</h3>
                </div>
                <div class="row features4-grids">
                   @foreach ( $product as $product )
                  
                      <div class="col-lg-3 col-md-6 mt-4" >
                        

                        <div class="features4-grid">
                            <a href="products/{{ $product->id }} " class="grid-link">
                            <div class="imageprod">
                                <img style="height:200px; width:200px; object-fit:contain;" class="img-fluid" src="{{asset('images/' . json_decode($product->image1,true))}}" alt="">
                            </div>
                        </a><h5>{{__('Ksh')}}:{{$product->price}}</h5>
                            <h5><a href="/add-to-cart/{{ $product->id }} " class="fa fa-cart-plus" aria-hidden="true">{{__('Add to cart')}}</a></h5>
                        </div>
                  </div>
                  @endforeach
                
                    
                </div>
            </div>
        </div>
    </section>
   
   
@endsection