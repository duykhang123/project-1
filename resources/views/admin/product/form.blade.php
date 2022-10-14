@php
    $select_status = Form::select('form[status]', config('myconfig.template.status'), @$item['status'], ['class' => 'form-control']);

    
    $select_gender = Form::select('form[gender]', config('myconfig.template.gender'), @$item['gender'], ['class' => 'form-control']);

    
    $products = \App\Models\ProductCategories::where('status', 'active')->orderBy('id','DESC')->get()->pluck('name','id');

    $brand = \App\Models\Brand::where('status', 'active')->orderBy('id','DESC')->get()->pluck('name','id');

    $select_category = Form::select('form[categories_id]', $products, @$item['categories_id'], ['class' => 'form-control']);

    $select_brand = Form::select('form[brand_id]', $brand, @$item['brand_id'], ['class' => 'form-control']);
@endphp

@extends('admin.layout')
@section('content')
@include('admin.component.content-header',['title' => 'Thêm/Sửa Bài Viết'])
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <!-- /.col-md-6 -->
            <div class="col-md-12">
                @include('admin.'.$controllerName.'.btnForm')
            </div>
            <!-- /.col-md-6 -->
            <div class="col-md-12">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <form id="frmSave" action="{{route('admin.'.$path.'.form')}}" method="POST" enctype="multipart/form-data">
                            <div class="nav nav-tabs">
                                <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab">Home</a>
                                <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab">Meta</a>
                            </div>
                            <div class="tab-content">
                                <div class="tab-pane fade show active" id="nav-home">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <div class="form-group">
                                                    <label>Name</label>
                                                    <input onchange="toSlug(this)" value="{{@$item['name']}}" name="form[name]" type="text" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label>Price</label>
                                                    <input value="{{@$item['price']}}" name="form[price]" type="text" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label>Sale off (%)</label>
                                                    <input value="{{@$item['sale_off']}}" name="form[sale_off]" type="text" class="form-control">
                                                </div>
                                                <div >
                                                    <label>Description</label>
                                                    <textarea  name="form[description]" class="form-control" rows="3">{{@$item['description']}}</textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label>Content</label>
                                                    <textarea id="ck_editor"  name="form[content]" class="form-control" rows="3">{{@$item['content']}}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Danh mục:</label>
                                                {{$select_category}}
                                            </div>
                                            <div class="form-group">
                                                <label>Thương hiệu sản phẩm:</label>
                                                {{$select_brand}}
                                            </div>
                                            <div class="form-group">
                                                <label>Status:</label>
                                                {{$select_status}}
                                            </div>

                                            <div class="form-group">
                                                <label>Giới tính:</label>
                                                {{$select_gender}}
                                            </div>
                                            
                                            <div class="form-group">
                                                <label>Picture</label>
                                                <input name="picture"  type="file" class="form-control">
                                                @if (isset($item['picture']))
                                                    <img src="{{@$item->getImg('thumb')}}" alt="">
                                                @endif
                                            </div>
                                            <div class="form-group">
                                                <label>Gallery</label>
                                                <input multiple name="gallery[]"  type="file" class="form-control">
                                               
                                                @if (isset($item['picture']))
                                                    @php
                                                        $arrGallery = unserialize($item['gallery']);
                                                    @endphp
                                                    @foreach($arrGallery as $key => $val)
                                                        <img style="max-width:100%;" src="{{asset('image/product/'.$val)}}" alt="">
                                                    @endforeach
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="nav-profile">
                                    @include('admin.component.meta')
                                </div>
                            </div>
                            @if (isset($item['id']))
                                <input type="hidden" name="id" class="form-control" value="{{$item['id']}}">
                            @endif
                            @csrf
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection