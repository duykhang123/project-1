@php
    $danhmucsanpham = \App\Models\ProductCategories::where('status', 'active')->orderBy('id','DESC')->limit(10)->get();
    $sanphammoi = \App\Models\Product::where('status', 'active')->orderBy('id','DESC')->limit(10)->get();
	
    $thuonghieusanphan = \App\Models\Brand::where('status', 'active')->orderBy('id','DESC')->limit(10)->get();
@endphp
<div class="col-sm-3">
    <div class="left-sidebar">
        <h2>Danh mục sản phẩm</h2>
        
            <div class="panel-group category-products" id="accordian"><!--category-productsr-->
                @foreach ($danhmucsanpham as $key => $item)
                    @php
                    $name = $item->name;
                    $description = $item->description;
                    $picture = $item->getImg();
                    //$link = route('product', ['slug' => $item->slug]);

                    
                @endphp
                
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title"><a href="{{URL::to('/danh-muc-san-pham/'.$item->slug.'/'.$item->id)}}">{{$name}}</a></h4>
                    </div>
                </div>
                @endforeach
            </div><!--/category-products-->
     
    
        <div class="brands_products"><!--brands_products-->
            <h2>Thương hiệu sản phẩm</h2>
            <div class="brands-name">
                <ul class="nav nav-pills nav-stacked">
                    @foreach ($thuonghieusanphan as $key => $item)
                        @php
                        $link = route('product', ['slug' => $item->slug]);
                        $name = $item->name;
                        $description = $item->description;
                        $picture = $item->getImg();
                        @endphp
                        <li><a href="{{URL::to('/thuong-hieu-san-pham/'.$item->slug.'/'.$item->id)}}">{{$name}}</a></li>
                    @endforeach	
                </ul>
            </div>
        </div><!--/brands_products-->

        <div class="brands_products"><!--brands_products-->
            <h2>Giới tính</h2>
            <div class="brands-name">
                <ul class="nav nav-pills nav-stacked">
                    <li><a href="#">Nam</a></li>
                    <li><a href="#">Nữ</a></li>
                </ul>
            </div>
        </div><!--/brands_products-->
        
        <div class="price-range"><!--price-range-->
            <h2>Price Range</h2>
            <div class="well text-center">
                 <input type="text" class="span2" value="" data-slider-min="0" data-slider-max="600" data-slider-step="5" data-slider-value="[250,450]" id="sl2" ><br />
                 <b class="pull-left">$ 0</b> <b class="pull-right">$ 600</b>
            </div>
        </div><!--/price-range-->
        
        <div class="shipping text-center"><!--shipping-->
            <img src="images/home/shipping.jpg" alt="" />
        </div><!--/shipping-->
    
    </div>
</div>