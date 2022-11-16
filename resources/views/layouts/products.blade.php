@extends('layouts.app')
@section('content')

@foreach ($products as $product)
<table  class="table table-hover table-condensed">
    <thead>
        <tr>
            <th style="width:50%">{{__('Product')}}</th>
            <th style="width:10%">{{__('Price')}}</th>
            <th style="width:8%">{{__('Edit')}}</th>
            <th style="width:22%" class="text-center">{{__('Delete')}}</th>
            <th style="width:10%"></th>
        </tr>
    </thead>
    <tbody>
<tr>
    <td data-th="Product">
        <div class="row">
            <div class="col-sm-3 ">
                <img src="{{ asset('images/'. json_decode($product->image1,true) )}}"  class="img-responsive"/></div>
            <div class="col-sm-9">
                <h4 class="nomargin">{{ $product->name }}</h4>
            </div>
        </div>
    </td>
    <td> Ksh:{{$product->price  }}</td>
    <td><a href="products/{{ $product->id }}/edit"> {{__('Edit')}}</a></td>
    <td>

        <form action ="/products/{{ $product->id }}" method="POST">
            @csrf
            @method('delete')
            <button type="submit" class="btn btn-danger" value="Delete"><i class="fas fa-trash-alt"></i></button>
               </form>
      </td>
</tr>
</tbody>
</table>

@endforeach

