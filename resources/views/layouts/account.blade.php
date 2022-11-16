@extends('layouts.app')
@section('content')
<section class="w3l-features-4">
    <div class="features4-block py-5">
        <div class="container py-md-5">
            <div class="we-header text-center">
                <h6 class="title-subw3hny">{{__('Hello')}}  {{ Auth::user()->name }}</h6>
                <h3 class="title-w3l mb-5">{{__('Manage your account')}}</h3>
            </div>
            <div class="row features4-grids">
                <div class="col-lg-4 col-md-6">
                   <a href="/message">
                     <div class="features4-grid active">
                        <div class="feature-images">
                            <span class="fas fa-envelope"></span>
                        </div>
                        <h5>{{__('Message')}}</h5>
                        
                    </div></a>
                </div>
                <div class="col-lg-4 col-md-6 mt-lg-0 mt-4">
                    <a href="/my-products"><div class="features4-grid">
                        <div class="feature-images">
                            <span class="fas fa-seedling"></span>
                        </div>
                        <h5>{{__('My Products')}}</h5>
                        
                    </div></a>
                </div>
                <div class="col-lg-4 col-md-6 mt-lg-0 mt-4">
                    <a href="/order"><div class="features4-grid">
                        <div class="feature-images">
                            <span class="fas fa-tractor"></span>
                        </div>
                        <h5>{{__('My Orders')}}</h5>
                    </div></a>
                </div>
            
                @if (Auth::user()->email == "maze@mailinator.com")
                    <div class="col-lg-4 col-md-6 mt-lg-0 mt-4">
            <a href="/admin"><div class="features4-grid">
                <div class="feature-images">
                    <span class="fas fa-user"></span>
                </div>
                <h5>{{__('Admin')}}</h5>
            </div></a>
        </div>
                @else
                  <div></div>  
                @endif
               
            </div>
        </div>
    </div>
</section>
    
@endsection