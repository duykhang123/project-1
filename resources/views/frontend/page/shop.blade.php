
@extends('frontend.main')

@section('content')
<div class="col-sm-9 padding-right">
    <div class="features_items"><!--features_items-->
        <h2 class="title text-center">Sản phẩm</h2>
        @foreach ($productRelative as $key => $item)
        @php
            $name = $item->name;
            $price  = number_format($item->price);
            //$picture = $item->getImg('stander');
            $link = route('product', ['slug' => $item->slug]);
        @endphp
            <div class="col-sm-4">
                <div class="product-image-wrapper">
                    <div class="single-products">
                        <div class="productinfo text-center">
                            <a href="{{$link}}"><img src="{{asset('image/product/thumb/'.$item->picture)}}" alt="" /></a>
                            <h2>{{$price}}</h2>
                            <p>{{$name}}</p>
                            <a href="{{$link}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                        </div>
                    </div>
                    <div class="choose">
                        <ul class="nav nav-pills nav-justified">
                            <li><a href=""><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
                            <li><a href=""><i class="fa fa-plus-square"></i>Add to compare</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        @endforeach
        
        
        <ul class="pagination">
            <li class="active"><a href="">1</a></li>
            <li><a href="">2</a></li>
            <li><a href="">3</a></li>
            <li><a href="">&raquo;</a></li>
        </ul>
    </div><!--features_items-->
</div>
@endsection