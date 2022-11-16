@extends('layouts.app')
@section('content')
<section class="w3l-features-4">
    <div class="features4-block py-5">
        <div class="container py-md-5">
            <div class="we-header text-center">
                <h6 class="title-subw3hny">{{__('Hello')}}  {{ Auth::user()->name }}</h6>
                <h3 class="title-w3l mb-5">{{__('Admin Panel')}}</h3>
            </div>
            <div class="row features4-grids">
                <div class="col-lg-4 col-md-6">
                   <a href="/admin/create">
                     <div class="features4-grid active">
                        <div class="feature-images">
                            <span class="fas fa-arrow-right"></span>
                        </div>
                        <h5>{{__('Add name and language')}}</h5>
                        
                    </div></a>
                </div>
                <div class="col-lg-4 col-md-6 mt-lg-0 mt-4">
                    <a href="/names"><div class="features4-grid">
                        <div class="feature-images">
                            <span class="fas fa-user"></span>
                        </div>
                        <h5>{{__('Manage added  names')}}</h5>
                        
                    </div></a>
                </div>
            
     
               
            </div>
        </div>
    </div>
</section>
    
@endsection