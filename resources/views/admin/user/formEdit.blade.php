@php
    $select_status = Form::select('form[status]', config('myconfig.template.status'), @$item['status'], ['class' => 'form-control']);
    
@endphp

@extends('admin.layout')
@section('content')
@include('admin.component.content-header',['title' => 'Thêm/Sửa'])
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <!-- /.col-md-6 -->
            
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
                        
                            <div class="nav nav-tabs">
                                <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab">Home</a>
                                <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab">Mật khẩu</a>
                            </div>
                            <div class="tab-content">
                                <div class="tab-pane fade show active" id="nav-home">
                                    <form action="{{route('admin.'.$path.'.changeProfile')}}" method="POST" enctype="multipart/form-data">
                                        <div class="row">
                                            <div class="col-md-12 text-center">
                                                <button class="btn btn-success" type="submit">Thay đổi</button>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <label>Full Name</label>
                                                        <input value="{{@$item['name']}}" name="form[name]" type="text" class="form-control">
                                                    <div class="form-group">
                                                        <label>User Name</label>
                                                        <textarea  name="form[username]" class="form-control" rows="3">{{@$item['username']}}</textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Email</label>
                                                        <textarea  name="form[email]" class="form-control" rows="3">{{@$item['email']}}</textarea>
                                                    </div>
                                                    <div class="form-group">
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
                                            </div>
                                        </div>
                                        <input type="hidden" name="id" value="{{$item['id']}}">
                                        @csrf
                                    </form>
                                </div>
                                <div class="tab-pane fade" id="nav-profile">
                                    <form action="{{route('admin.'.$path.'.changePass')}}" method="POST">
                                        <div class="row">
                                            <div class="col-md-12 text-center">
                                                <button class="btn btn-success" type="submit">Thay đổi</button>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Mật khẩu mới</label>
                                            <textarea  name="password" class="form-control" rows="3"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>NHập lại mật khẩu mới</label>
                                            <textarea  name="password_confirmation" class="form-control" rows="3"></textarea>
                                        </div>
                                        <input type="hidden" name="id" value="{{$item['id']}}">
                                        @csrf
                                    </form>
                                </div>
                            </div>
                            @if (isset($item['id']))
                                <input type="hidden" name="id" class="form-control" value="{{$item['id']}}">
                            @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection