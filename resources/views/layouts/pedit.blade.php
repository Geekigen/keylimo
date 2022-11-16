@extends('layouts.app')
@section('content')
<div class="card">
<div class="card-header">{{ __('Edit product') }}</div>
@foreach ($errors->all() as $error )

<ul class="text-danger">

       {{ $error}}

</ul>

@endforeach
<div class="card-body">
    <form method="POST" action="/products/{{ $tempo->id }}" method="POST"    enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row mb-3">
            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Product Name') }}</label>

            <div class="col-md-6">
                <input id="name" type="text" placeholder="{{$tempo->name}}" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="row mb-3">
            <label for="image" class="col-md-4 col-form-label text-md-end">{{ __('3 images') }}</label>

            <div class="col-md-6">
                <input name="image[]" id="image" type="file"  multiple="multiple" value="{{ old('image[]') }}">

                @error('image')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="row mb-3">
            <label for="quantity" class="col-md-4 col-form-label text-md-end">{{ __('Quantity') }}</label>

            <div class="col-md-6">
                <input id="quantity" type="text"  placeholder="{{$tempo->quantity}}"  class="form-control @error('quantity') is-invalid @enderror" name="quantity" value="{{ old('quantity') }}" required autocomplete="quantity" autofocus>

                @error('quantity')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="row mb-3">
            <label for="description" class="col-md-4 col-form-label text-md-end">{{ __('Product Description') }}</label>

            <div class="col-md-6">
                <input id="description" type="text"  placeholder="{{$tempo->description}}"  class="form-control @error('description') is-invalid @enderror" name="description" value="{{ old('description') }}" required autocomplete="description" autofocus>

                @error('description')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="row mb-3">
            <label for="price" class="col-md-4 col-form-label text-md-end">{{ __('Product price') }}</label>

            <div class="col-md-6">
                <input id="price" type="text"  placeholder="{{$tempo->price}}"  class="form-control @error('price') is-invalid @enderror" name="price" value="{{ old('price') }}" required autocomplete="price" autofocus>

                @error('price')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="row mb-3">
            <label for="category" class="col-md-4 col-form-label text-md-end">{{ __('Category') }}</label>

            <div class="col-md-6">
                <select name="category" id="category"  value="{{ old('category') }}" >
                    <option value="livestock">{{ __('Livestock') }}</option>
                    <option value="plants">{{ __('Plants') }}</option>
                </select>
                @error('category')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="row mb-3">
            <label for="location" class="col-md-4 col-form-label text-md-end">{{ __('Your location') }}</label>

            <div class="col-md-6">
                <input id="location" type="text"  placeholder="{{$tempo->location}}"  class="form-control @error('price') is-invalid @enderror" name="location" value="{{ old('location') }}" required autocomplete="location" autofocus>

                @error('location')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="row mb-0">
            <div class="text-center mt-5">
                <button type="submit" class="btn btn-style btn-primary">{{ __('Post') }}<i class="far fa-paper-plane ml-lg-3"></i></button>
            </div>
        </div>
    </form>
</div>
</div>
@endsection