@extends('layouts.auth')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    {{-- <div class=" products text-center" id="tab-products-1" role="tabpanel"> --}}

                    @foreach ($products as $product)
                        <div >
                                <a href="#" class="imageContainer"><img src="{{ asset('images')."/".$product->image}}"></a>
                                <a href="#"class="text-center"><div>{{ $product->title }}</div></a>
                                <a href="#"class="text-center"><div>{{ $product->description }}</div></a>
                     	</div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection