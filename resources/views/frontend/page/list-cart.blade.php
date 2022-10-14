@if (session()->has('Cart') != null)
@php
    $cart = session()->get('Cart')->products;
@endphp
@foreach ($cart as $key)
<div class="select-items">
    <table>
        <tbody>
            <tr>
                <td class="si-pic"><img src="{{$key['productInfo']->getImg('thumb')}}" alt=""></td>
                <td class="si-text">
                    <div class="product-selected">
                        <p>{{number_format($key['productInfo']->price)}}₫ x {{$key['quanty']}}</p>
                        <h6>{{$key['productInfo']->name}}</h6>
                    </div>
                </td>
                <td class="si-close">
                    <a onclick="DelCart({{$key['productInfo']->id}})" href="javascript:"><i class="fa fa-times"></i></a>
                </td>
            </tr>
        </tbody>
    </table>
</div>
@endforeach

<div class="select-total">
    <span>total:</span>
    <h5>{{number_format(session()->get('Cart')->totalPrice)}}₫</h5>
    <input type="hidden" id="check-quanty" value="{{session()->get('Cart')->totalQuanty}}">
</div>
@endif