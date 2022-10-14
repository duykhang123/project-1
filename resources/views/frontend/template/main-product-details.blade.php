@php
    $name = ucfirst($val->name);
    $picture = $val->getImg('thumb');
    $price = number_format($val->price);
    $link = route('product', ['slug' => $val->slug]);
@endphp


    <div class="col-sm-3">
        <div class="product-image-wrapper">
            <div class="single-products">
                <div class="productinfo text-center">
                    <a href="{{$link}}"><img src="{{$picture}}" alt="" /></a>
                    <h2>{{$price}}</h2>
                    <p>{{$name}}</p>
                    <a href="{{$link}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Thêm vào giỏ hàng</a>
                </div>
            </div>
        </div>
    </div>

