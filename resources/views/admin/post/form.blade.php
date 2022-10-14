@php
    $select_status = Form::select('form[status]', config('myconfig.template.status'), @$item['status'], ['class' => 'form-control']);
    
    $categories = \App\Models\Categories::where('status', 'active')->orderBy('id','DESC')->get()->pluck('name','id');

    
    $select_category = Form::select('form[categories_id]', $categories, @$item['categories_id'], ['class' => 'form-control']);
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
                                                <label>Name</label>
                                                    <input onchange="toSlug(this)" value="{{@$item['name']}}" name="form[name]" type="text" class="form-control">
                                                <div class="form-group">
                                                    <label>Description</label>
                                                    <textarea  name="form[description]" class="form-control" rows="3">{{@$item['description']}}</textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label>Content</label>
                                                    <textarea id="ck_editor"  name="form[content]" class="form-control" rows="3">{{@$item['content']}}</textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label>Danh mục:</label>
                                                    {{$select_category}}
                                                </div>
                                                <div class="form-group">
                                                    <label>Status:</label>
                                                    {{$select_status}}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Picture</label>
                                                <input name="picture"  type="file" class="form-control">
                                                @if (isset($item['picture']))
                                                    <img src="{{@$item->getImg('thumb')}}" alt="">
                                                @endif
                                            </div>
                                            <div class="form-group">
                                                <label>Tag: </label>
                                                <div class="input-group mb-3">
                                                    <input id="txtTag" type="text" class="form-control">
                                                    <a href="javascript:addTagAjax('{{route('admin.tags.addTag')}}')" class="btn btn-success">Add</a>
                                                </div>
                                                @php
                                                    $arrTag = \App\Models\Tags::orderBy('id', 'DESC')->get();
                                                @endphp
                                                
                                                <div id="listTag">
                                                    @foreach ($arrTag as $key => $val)
                                                    @php
                                                        $check = '';
                                                        if (!empty($item)){
                                                            if($item->tags->contains($val->id)){
                                                                $check = 'checked';
                                                            }
                                                        }
                                                    @endphp
                                                        <div class="form-check">
                                                            <label class="form-check-label">
                                                                <input {{$check}} name="tagId[]" type="checkbox" class="form-check-input" value="{{$val->id}}">{{$val->tagname}}
                                                                <a href="javascript:removeTagAjax('{{route('admin.tags.removeTag')}}',{{$val->id}})" class="btn btn-danger btn-xs">X</a>
                                                            </label>
                                                        </div>
                                                    @endforeach
                                                </div>
                                                
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