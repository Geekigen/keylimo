@extends('layouts.app')
@section('content')

@foreach ($namelang as $product)
<table  class="table table-hover table-condensed">
    <thead>
        <tr>
            <th style="width:50%">{{__('Product')}}</th>
            <th style="width:10%">{{__('Price')}}</th>
            <th style="width:22%" class="text-center">{{__('Delete')}}</th>
            <th style="width:10%"></th>
        </tr>
    </thead>
    <tbody>
<tr>
    <td> Ksh:{{$product->name  }}</td>
    <td> Ksh:{{$product->language  }}</td>
    <td>

        <form action ="/admin/{{ $product->id }}" method="POST">
            @csrf
            @method('delete')
            <button type="submit" class="btn btn-danger" value="Delete"><i class="fas fa-trash-alt"></i></button>
               </form>
      </td>
</tr>
</tbody>
</table>

@endforeach
@endsection
