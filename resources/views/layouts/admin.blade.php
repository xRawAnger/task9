@extends('layouts.auth')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    <div class="container">
                        <form action="{{ route('saveproducts') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            Title:
                            <input type="input" class="form-control mt-2" name="title" id="itemName">
                            description:
                            <textarea name="description" class="form-control mt-2" id="desc"></textarea>

                            <input type="file" name="image" od="image" class="form-control mt-2">

                            <button  class="btn btn-primary" {{-- type="button" --}} {{-- href="{{ route('registerpage') }}" --}}>Add</button>
                        </form>
                    </div>
                    <div class="container">
{{--                     @foreach ($products as $product)
                        <div >
                                <a href="#" class="imageContainer"><img src="{{ asset('images')."/".$product->image}}"></a>
                                <a href="#"class="text-center"><div>{{ $product->title }}</div></a>
                                <a href="#"class="text-center"><div>{{ $product->description }}</div></a>
                        </div>
                    @endforeach    --}}                     
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
