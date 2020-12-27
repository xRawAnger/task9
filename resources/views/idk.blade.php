<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	                    @foreach ($products as $product)
                        <div >
                                <a href="#" class="imageContainer"><img src="{{ asset('images')."/".$product->image}}"></a>
                                <a href="#"class="text-center"><div>{{ $product->title }}</div></a>
                                <a href="#"class="text-center"><div>{{ $product->description }}</div></a>
                        </div>
                    @endforeach

</body>
</html>