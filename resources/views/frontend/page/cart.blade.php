@extends('frontend.main')

@section('header')
<link href="{{asset('frontend/css/style.css')}}" rel="stylesheet">
@endsection
@section('content')
{{-- <section id="cart_items">
    <div class="container">
        <div class="row">
            <div class="col-sm-9">
                <div class="breadcrumbs">
                    <ol class="breadcrumb">
                      <li><a href="#">Home</a></li>
                      <li class="active">Shopping Cart</li>
                    </ol>
                </div>
                <div class="table-responsive cart_info">
                    <table class="table table-condensed">
                        <thead>
                            <tr class="cart_menu">
                                <td class="image">Item</td>
                                <td class="description"></td>
                                <td class="price">Price</td>
                                <td class="quantity">Quantity</td>
                                <td class="total">Total</td>
                                <td></td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="cart_product">
                                    <a href=""><img src="images/cart/one.png" alt=""></a>
                                </td>
                                <td class="cart_description">
                                    <h4><a href="">Colorblock Scuba</a></h4>
                                    <p>Web ID: 1089772</p>
                                </td>
                                <td class="cart_price">
                                    <p>$59</p>
                                </td>
                                <td class="cart_quantity">
                                    <div class="cart_quantity_button">
                                        <a class="cart_quantity_up" href=""> + </a>
                                        <input class="cart_quantity_input" type="text" name="quantity" value="1" autocomplete="off" size="2">
                                        <a class="cart_quantity_down" href=""> - </a>
                                    </div>
                                </td>
                                <td class="cart_total">
                                    <p class="cart_total_price">$59</p>
                                </td>
                                <td class="cart_delete">
                                    <a class="cart_quantity_delete" href=""><i class="fa fa-times"></i></a>
                                </td>
                            </tr>
        
                            <tr>
                                <td class="cart_product">
                                    <a href=""><img src="images/cart/two.png" alt=""></a>
                                </td>
                                <td class="cart_description">
                                    <h4><a href="">Colorblock Scuba</a></h4>
                                    <p>Web ID: 1089772</p>
                                </td>
                                <td class="cart_price">
                                    <p>$59</p>
                                </td>
                                <td class="cart_quantity">
                                    <div class="cart_quantity_button">
                                        <a class="cart_quantity_up" href=""> + </a>
                                        <input class="cart_quantity_input" type="text" name="quantity" value="1" autocomplete="off" size="2">
                                        <a class="cart_quantity_down" href=""> - </a>
                                    </div>
                                </td>
                                <td class="cart_total">
                                    <p class="cart_total_price">$59</p>
                                </td>
                                <td class="cart_delete">
                                    <a class="cart_quantity_delete" href=""><i class="fa fa-times"></i></a>
                                </td>
                            </tr>
                            <tr>
                                <td class="cart_product">
                                    <a href=""><img src="images/cart/three.png" alt=""></a>
                                </td>
                                <td class="cart_description">
                                    <h4><a href="">Colorblock Scuba</a></h4>
                                    <p>Web ID: 1089772</p>
                                </td>
                                <td class="cart_price">
                                    <p>$59</p>
                                </td>
                                <td class="cart_quantity">
                                    <div class="cart_quantity_button">
                                        <a class="cart_quantity_up" href=""> + </a>
                                        <input class="cart_quantity_input" type="text" name="quantity" value="1" autocomplete="off" size="2">
                                        <a class="cart_quantity_down" href=""> - </a>
                                    </div>
                                </td>
                                <td class="cart_total">
                                    <p class="cart_total_price">$59</p>
                                </td>
                                <td class="cart_delete">
                                    <a class="cart_quantity_delete" href=""><i class="fa fa-times"></i></a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        
    </div>
</section> --}}

<section class="shopping-cart spad">
    <div class="container">
        <div class="row">
            <div class="col-sm-9" id="list-cart">
                <div class="cart-table">
                    <table>
                        <thead>
                            <tr>
                                <th>Image</th>
                                <th class="p-name">Product Name</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Total</th>
                                <th>Delete</th>
                                <th>Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (session()->has('Cart') != null)
                            @php
                                $cart = session()->get('Cart')->products;
                            @endphp
                            @foreach ($cart as $key)
                            <tr>
                                <td class="cart-pic first-row"><img src="{{$key['productInfo']->getImg('thumb')}}" alt=""></td>
                                <td class="cart-title first-row">
                                    <h5>{{$key['productInfo']->name}}</h5>
                                </td>
                                <td class="p-price first-row">{{number_format($key['productInfo']->price)}}</td>
                                <td class="qua-col first-row">
                                    <div class="quantity">
                                        <div class="pro-qty">
                                            <input type="text" value="{{$key['quanty']}}">
                                        </div>
                                    </div>
                                </td>
                                <td class="total-price first-row">{{number_format($key['price'])}}</td>
                                <td class="close-td first-row"><i onclick="DelItemCart({{$key['productInfo']->id}})" class="fa fa-times"></i></td>
                                <td class="close-td first-row"><i class="fa fa-save"></i></td>
                            </tr>
                            @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
                <div class="row">
                    <div class="col-lg-4 offset-lg-8">
                        <div class="proceed-checkout">
                            @if (session()->has('Cart') != null)
                            <ul>
                                <li class="subtotal">Subtotal <span>{{number_format(session()->get('Cart')->totalPrice)}}</span></li>
                                <li class="cart-total">Total <span>{{number_format(session()->get('Cart')->totalPrice)}}</span></li>
                            </ul>
                            @endif
                            <a href="#" class="proceed-btn">PROCEED TO CHECK OUT</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
