@extends('layouts.app')
@section('content')
<H3>{{__('These are your orders')}}</H3>
@foreach ($myorders as $product)
<table  class="table table-hover table-condensed">
    <thead>
        <tr>
            <th style="width:50%">{{__('Product')}}</th>
            <th style="width:10%">{{__('Location')}}</th>
            <th style="width:8%">{{__('Ammount')}}</th>
            <th style="width:22%" class="text-center">{{__('Date')}}</th>
            <th style="width:10%"></th>
        </tr>
    </thead>
    <tbody>
<tr>
    <td data-th="Product">
        <div class="row">
            <div class="col-sm-3 ">
                <img src="{{ asset('images/'. json_decode($product->image,true) )}}"  class="img-responsive"/></div>
            <div class="col-sm-9">
                <h4 class="nomargin">{{ $product->name }}</h4>
            </div>
        </div>
    </td>
    <td>{{__('On')}}:{{$product->location}}</td>
    <td>{{__('Pieces')}}:{{$product->quantity  }} {{__('at')}}  {{__('Ksh')}} :{{$product->price}}</td>
    <td>

        {{__('On')}} {{__('Date')}}:{{date('d-m-Y H:i:s',strtotime($product->created_at))}}
      </td>
      <td>
    <a href="tel:{{$product->number}}">{{__('Call buyer')}}</a>
      </td>
</tr>
</tbody>
</table>

@endforeach
@endsection
