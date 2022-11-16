@extends('layouts.app')
@section('content')
<section class="w3l-features-4">
    <div class="features4-block py-5">
        <div class="container py-md-5">
            <div class="we-header text-center">
                <h6 class="title-subw3hny">{{__('Hello')}}:{{ Auth::user()->name }}</h6>
                <h3 class="title-w3l mb-5">{{__('Get quick loans')}}</h3>
            </div>
            <div class="row features4-grids">
                <div class="col-lg-4 col-md-6">
                   <a href="https://equitygroupholdings.com/ke/borrow">
                     <div class="features4-grid active">
                        <div class="feature-images">
                       <img style="height:100px; width:100px;" class="image-fluid" src="{{asset('images/equity.png')}}" alt="">
                        </div>
                        <h5>Equity {{__('Bank')}}</h5>
                        
                    </div></a>
                </div>
                <div class="col-lg-4 col-md-6 mt-lg-0 mt-4">
                    <a href="https://ke.kcbgroup.com/for-you/get-a-loan/unsecured-loan/salary-advance?gclid=Cj0KCQjw6_CYBhDjARIsABnuSzqr5W25zdmHj4ZCItaqXH5UdKakr8RZ0xD9MrXfEmRS6z19h_BDADAaAuldEALw_wcB">
                        <div class="features4-grid active">
                           <div class="feature-images">
                          <img style="height:100px; width:100px;" class="image-fluid" src="{{asset('images/kcb.png')}}" alt="">
                           </div>
                           <h5>KCB {{__('Bank')}}</h5>
                           
                       </div></a>
                </div>
                
                <div class="col-lg-4 col-md-6 mt-lg-0 mt-4">
                    <a href="https://www.stanbicbank.co.ke/kenya/personal/products-and-services/borrow-for-your-needs/unsecured-personal-loan">
                        <div class="features4-grid active">
                           <div class="feature-images">
                          <img 
                          style="height:100px; width:100px;" class="image-fluid" src="{{asset('images/stanbic.jpeg')}}" alt="">
                           </div>
                           <h5>Stanbic {{__('Bank')}}</h5>
                           
                       </div></a>
                </div>
            
        
               
            </div>
        </div>
    </div>
</section>
    
@endsection