@php
    $name = $item->name;
    $picture = $item->getImg('stander');
    $price = number_format($item->price);
    $link = route('product', ['slug' => $item->slug]);
    $brand = $item->brand->name;
    $detail = $item->productcategory->name;
    
@endphp

@extends('frontend.main')

@section('header')
    <link rel="stylesheet" href="{{asset('frontend/xZoom/example/css/xzoom.css')}}">
    <script src="{{asset('frontend/xZoom/example/js/vendor/jquery.js')}}"></script>
    <script src="{{asset('frontend/xZoom/dist/xzoom.min.js')}}"></script>
    <script src="{{asset('frontend/xZoom/example/js/setup.js')}}"></script>
@endsection

@section('content')
<div class="col-sm-9 padding-right">
	<div class="product-details"><!--product-details-->
        <div class="col-sm-5">
            {{-- <div class="view-product">
                <img src="{{$picture}}" alt="" />
                <h3>ZOOM</h3>
            </div>
            <div id="similar-product" class="carousel slide" data-ride="carousel">
                @php
                    $gallery = unserialize($item->gallery);
                @endphp
                  <!-- Wrapper for slides -->
                    <div class="carousel-inner">
                        
                            <div class="item active ">
                                @foreach ($gallery as $key => $item)
                                <a href=""><img src="{{asset('image/product/'.$item)}}" alt=""></a>
                                @endforeach
                            </div>
                        
                    </div>

                  <!-- Controls -->
                  <a class="left item-control" href="#similar-product" data-slide="prev">
                    <i class="fa fa-angle-left"></i>
                  </a>
                  <a class="right item-control" href="#similar-product" data-slide="next">
                    <i class="fa fa-angle-right"></i>
                  </a>
            </div> --}}
            @php
                $gallery = unserialize($item->gallery);
                $imgFirst = $gallery[0];
            @endphp
            <div class="view-product">
                <img class="xzoom" src="{{asset('image/product/thumb/'.$imgFirst)}}" xoriginal="{{asset('image/product/thumb/'.$imgFirst)}}" />
            </div>
            <div id="similar-product" class="carousel slide">
                <div class="xzoom-thumbs">
                    @foreach ($gallery as $key => $item)
                        <a href="{{asset('image/product/'.$item)}}">
                            <img class="xzoom-gallery" width="80" src="{{asset('image/product/thumb/'.$item)}}"  xpreview="{{asset('image/product/thumb/'.$item)}}">
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="col-sm-7">
            <div class="product-information"><!--/product-information-->
                <img src="images/product-details/new.jpg" class="newarrival" alt="" />
                <h2>{{$name}}</h2>
                <p>Web ID: 1089772</p>
                <img src="images/product-details/rating.png" alt="" />
                <form id="frmSave" action="{{URL::to('/save-cart')}}" method="POST">
                    <span>
                        <span>{{$price}}</span>
                        <label>Quantity:</label>
                        <input type="number" min="1" value="1" />
                        <button type="submit" class="btn btn-fefault cart">
                            <i class="fa fa-shopping-cart"></i>
                            Thêm vào giỏ hàng
                        </button>
                    </span>
                    @csrf
                </form>
                <p><b>Danh mục:</b>{{$detail}}</p>
                <p><b>Thương hiệu:</b>{{$brand}}</p>
                <a href=""><img src="images/product-details/share.png" class="share img-responsive"  alt="" /></a>
            </div><!--/product-information-->
        </div>
    </div><!--/product-details-->
    
    <div class="category-tab shop-details-tab"><!--category-tab-->
        <div class="col-sm-12">
            <ul class="nav nav-tabs">
                <li><a href="#details" data-toggle="tab">Details</a></li>
                <li><a href="#companyprofile" data-toggle="tab">Company Profile</a></li>
                <li><a href="#tag" data-toggle="tab">Tag</a></li>
                <li class="active"><a href="#reviews" data-toggle="tab">Reviews (5)</a></li>
            </ul>
        </div>
        <div class="tab-content">
            <div class="tab-pane fade" id="details" >
                @foreach ($productRelative as $key => $val)
                    @include('frontend.template.main-product-details', ['val' => $val])
                @endforeach
            </div>
            
            
            <div class="tab-pane fade" id="companyprofile" >
                <div class="col-sm-3">
                    <div class="product-image-wrapper">
                        <div class="single-products">
                            <div class="productinfo text-center">
                                <img src="images/home/gallery1.jpg" alt="" />
                                <h2>$56</h2>
                                <p>Easy Polo Black Edition</p>
                                <button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="product-image-wrapper">
                        <div class="single-products">
                            <div class="productinfo text-center">
                                <img src="images/home/gallery3.jpg" alt="" />
                                <h2>$56</h2>
                                <p>Easy Polo Black Edition</p>
                                <button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="product-image-wrapper">
                        <div class="single-products">
                            <div class="productinfo text-center">
                                <img src="images/home/gallery2.jpg" alt="" />
                                <h2>$56</h2>
                                <p>Easy Polo Black Edition</p>
                                <button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="product-image-wrapper">
                        <div class="single-products">
                            <div class="productinfo text-center">
                                <img src="images/home/gallery4.jpg" alt="" />
                                <h2>$56</h2>
                                <p>Easy Polo Black Edition</p>
                                <button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="tab-pane fade" id="tag" >
                <div class="col-sm-3">
                    <div class="product-image-wrapper">
                        <div class="single-products">
                            <div class="productinfo text-center">
                                <img src="images/home/gallery1.jpg" alt="" />
                                <h2>$56</h2>
                                <p>Easy Polo Black Edition</p>
                                <button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="product-image-wrapper">
                        <div class="single-products">
                            <div class="productinfo text-center">
                                <img src="images/home/gallery2.jpg" alt="" />
                                <h2>$56</h2>
                                <p>Easy Polo Black Edition</p>
                                <button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="product-image-wrapper">
                        <div class="single-products">
                            <div class="productinfo text-center">
                                <img src="images/home/gallery3.jpg" alt="" />
                                <h2>$56</h2>
                                <p>Easy Polo Black Edition</p>
                                <button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="product-image-wrapper">
                        <div class="single-products">
                            <div class="productinfo text-center">
                                <img src="images/home/gallery4.jpg" alt="" />
                                <h2>$56</h2>
                                <p>Easy Polo Black Edition</p>
                                <button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="tab-pane fade active in" id="reviews" >
                <div class="col-sm-12">
                    <ul>
                        <li><a href=""><i class="fa fa-user"></i>EUGEN</a></li>
                        <li><a href=""><i class="fa fa-clock-o"></i>12:41 PM</a></li>
                        <li><a href=""><i class="fa fa-calendar-o"></i>31 DEC 2014</a></li>
                    </ul>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
                    <p><b>Write Your Review</b></p>
                    
                    <form action="#">
                        <span>
                            <input type="text" placeholder="Your Name"/>
                            <input type="email" placeholder="Email Address"/>
                        </span>
                        <textarea name="" ></textarea>
                        <b>Rating: </b> <img src="images/product-details/rating.png" alt="" />
                        <button type="button" class="btn btn-default pull-right">
                            Submit
                        </button>
                    </form>
                </div>
            </div>
            
        </div>
    </div><!--/category-tab-->
    
    <div class="recommended_items"><!--recommended_items-->
        <h2 class="title text-center">recommended items</h2>
        
        <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="item active">	
                    <div class="col-sm-4">
                        <div class="product-image-wrapper">
                            <div class="single-products">
                                <div class="productinfo text-center">
                                    <img src="images/home/recommend1.jpg" alt="" />
                                    <h2>$56</h2>
                                    <p>Easy Polo Black Edition</p>
                                    <button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="product-image-wrapper">
                            <div class="single-products">
                                <div class="productinfo text-center">
                                    <img src="images/home/recommend2.jpg" alt="" />
                                    <h2>$56</h2>
                                    <p>Easy Polo Black Edition</p>
                                    <button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="product-image-wrapper">
                            <div class="single-products">
                                <div class="productinfo text-center">
                                    <img src="images/home/recommend3.jpg" alt="" />
                                    <h2>$56</h2>
                                    <p>Easy Polo Black Edition</p>
                                    <button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item">	
                    <div class="col-sm-4">
                        <div class="product-image-wrapper">
                            <div class="single-products">
                                <div class="productinfo text-center">
                                    <img src="images/home/recommend1.jpg" alt="" />
                                    <h2>$56</h2>
                                    <p>Easy Polo Black Edition</p>
                                    <button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="product-image-wrapper">
                            <div class="single-products">
                                <div class="productinfo text-center">
                                    <img src="images/home/recommend2.jpg" alt="" />
                                    <h2>$56</h2>
                                    <p>Easy Polo Black Edition</p>
                                    <button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="product-image-wrapper">
                            <div class="single-products">
                                <div class="productinfo text-center">
                                    <img src="images/home/recommend3.jpg" alt="" />
                                    <h2>$56</h2>
                                    <p>Easy Polo Black Edition</p>
                                    <button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
             <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
                <i class="fa fa-angle-left"></i>
              </a>
              <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
                <i class="fa fa-angle-right"></i>
              </a>			
        </div>
    </div><!--/recommended_items-->
	
</div>
@endsection
@section('script')
    <script>
        $('.xzoom, .xzoom-gallery').xzoom({zoomWidth: 400, title: true, tint: '#333', Xoffset: 15});
    </script>
@endsection