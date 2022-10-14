@php
    $id = $item->id;
    $name = ucfirst($item->name);
    $picture = $item->getImg('thumb');
    $price = number_format($item->price);
    $link = route('product', ['slug' => $item->slug]);
@endphp

<div class="col-sm-4">
    <div class="product-image-wrapper">
        <div class="single-products">
                <div class="productinfo text-center">
                    <a href="{{$link}}"><img src="{{$picture}}" alt="" /></a>
                    <h2>{{$price}}</h2>
                    <p>{{$name}}</p>
                    <a href="{{$link}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Chi tiết sản phẩm</a>
                </div>
                {{-- <div class="product-overlay">
                    <div class="overlay-content">
                        <h2>{{$price}}</h2>
                        <p>{{$name}}</p>
                        <a href="{{$link}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Thêm vào giỏ hàng</a>
                    </div>
                </div> --}}
        </div>
        <div class="choose">
            <ul class="nav nav-pills nav-justified">
                <li><a onclick="AddCart({{$id}})" href="javascript:"><i class="fa fa-plus-square"></i>Thêm vào giỏ hàng</a></li>
                <li><a href="#"><i class="fa fa-plus-square"></i>Add to compare</a></li>
            </ul>
        </div>
    </div>
</div>