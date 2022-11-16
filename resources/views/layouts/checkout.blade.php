

@extends('layouts.app')

@section('content')


    <section id="cart" >
        <table  class="table table-hover table-condensed">
    <thead>
        <tr>
            <th style="width:50%">{{__('Product')}}</th>
            <th style="width:10%">{{__('Price')}}</th>
            <th style="width:8%">{{__('Quantity')}}</th>
            <th style="width:22%" class="text-center">{{__('Subtotal')}}</th>
            <th style="width:10%"></th>
        </tr>
    </thead>
    <tbody>
        @php $total = 0 @endphp
        @if(session('cart'))
            @foreach(session('cart') as $id => $details)
                @php $total += $details['price'] * $details['quantity'] @endphp
                <tr data-id="{{ $id }}">
                    <td data-th="Product">
                        <div class="row">
                            <div class="col-sm-3 ">
                                <img src="{{ asset('images/'. json_decode($details['image'],true) )}}"  class="img-responsive"/></div>
                            <div class="col-sm-9">
                                <h4 class="nomargin">{{ $details['name'] }}</h4>
                            </div>
                        </div>
                    </td>
                    <td data-th="Price">ksh{{ $details['price'] }}</td>
                    <td data-th="Quantity">
                        <input type="number" value="{{ $details['quantity'] }}" class="form-control quantity update-cart" />
                    </td>
                    <td data-th="Subtotal" class="text-center">ksh {{ $details['price'] * $details['quantity'] }}</td>
                    <td class="actions" data-th="">
                        <button class="btn btn-danger btn-sm remove-from-cart"><i class="fas fa-trash"></i></button>
                    </td>
                </tr>
            @endforeach
        @endif
    </tbody>
    <tfoot>
        <tr>
            <td colspan="5" class="text-right"><h3><strong>{{__('Total ksh')}}:{{ $total }}</strong></h3></td>
        </tr>
        <tr>
            <td colspan="5" class="text-right">
                @foreach ($errors->all() as $error )

                <ul>
<div style="color: red">
{{ $error}}
</div>


                </ul>

        @endforeach
                <form action="/checkout" method="post">

                    @csrf
                    <div class="form-top1">

                        <div class="form-top">
                            <div class="form-top-left">
                                <input type="text" name="location" id="location" placeholder="{{__('Location')}}" required="">
                                <input type="number" name="number" placeholder="{{__('Your phone number')}}" required="">

                            </div>

                        </div>
                        <div class="text-center mt-5">
                            <button type="submit" class="btn btn-style btn-primary">{{__('CONFIRM PURCHASE')}}<i class="far fa-paper-plane ml-lg-3"></i></button>
                        </div>
                    </div>
                </form>

            </td>
        </tr>
    </tfoot>
</table>
@endsection

@section('scripts')
<script type="text/javascript">

    $(".update-cart").change(function (e) {
        e.preventDefault();

        var ele = $(this);

        $.ajax({
            url: '{{ route('update.cart') }}',
            method: "patch",
            data: {
                _token: '{{ csrf_token() }}',
                id: ele.parents("tr").attr("data-id"),
                quantity: ele.parents("tr").find(".quantity").val()
            },
            success: function (response) {
               window.location.reload();
            }
        });
    });

    $(".remove-from-cart").click(function (e) {
        e.preventDefault();

        var ele = $(this);

        if(confirm("Are you sure want to remove?")) {
            $.ajax({
                url: '{{ route('remove.from.cart') }}',
                method: "DELETE",
                data: {
                    _token: '{{ csrf_token() }}',
                    id: ele.parents("tr").attr("data-id")
                },
                success: function (response) {
                    window.location.reload();
                }
            });
        }
    });
</script>

</div>
</section>

@endsection

