@php
    $slide = \App\Models\Banner::where('status', 'active')->orderBy('id','DESC')->limit(3)->get();
@endphp

<section id="slider"><!--slider-->
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div id="slider-carousel" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
                        <li data-target="#slider-carousel" data-slide-to="1"></li>
                        <li data-target="#slider-carousel" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner">
                        @php
                            $i = 0;
                        @endphp
                        
                        @foreach ($slide as $key => $item)
                        @php
                            $name = $item->name;
                            $description = $item->description;
                            $picture = $item->getImg();
                            $i++;
                        @endphp
                       
                        <div class="item {{$i == 1 ? 'active' : ''}}">
                            <div class="col-sm-6">
                                <h2>{{$name}}</h2>
                                <p>{{$description}}</p>
                                <button type="button" class="btn btn-default get">Get it now</button>
                            </div>
                            <div class="col-sm-6">
                                <img src="{{$picture}}" class="girl img-responsive" alt="" />
                            </div>
                        </div>
                        @endforeach
                    </div>
                    
                    <a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
                        <i class="fa fa-angle-left"></i>
                    </a>
                    <a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
                        <i class="fa fa-angle-right"></i>
                    </a>
                </div>
                
            </div>
        </div>
    </div>
</section><!--/slider-->