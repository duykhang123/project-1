@php
    $info_status = Form::select('fillter_status', config('myconfig.template.status'), $param['fillter']['status'], ['class' => 'form-control']);

    $select_status = [
        'all' => 'All',
        'id'  => 'Id',
        'name' => 'Name',
        'description' => 'Description'
    ]
    
@endphp
@extends('admin.layout')
@section('content')
@include('admin.component.content-header',['title' => 'Danh sách'])
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <!-- /.col-md-6 -->
            <div class="col-md-12">
                @include('admin.'.$controllerName.'.btnIndex')
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <form action="{{route('admin.'.$path.'.index')}}" class="form-inline">
                                    <div class="form-group">
                                        <label for="disableSelect">Fillter Status: </label>
                                        {!! $info_status !!}
                                    </div>
                                </form>
                            </div>
                            <div class="col-md-8">
                                <form id="form_option" action="{{route('admin.'.$path.'.index')}}" class="form-inline">
                                    <div class="form-group">
                                        <div class="dropdown show">
                                            <a id="option_value" class="btn btn-default dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                Search by {{$param['search']['fill']}}
                                            </a>
                                          
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                @foreach ($select_status as $key => $val)
                                                    <a class="dropdown-item" href="javascript:submitFill('{{$key}}', '{{$val}}')">{{$val}}</a>
                                                @endforeach
                                            </div>
                                            <input name="search_value" value="{{$param['search']['value']}}" type="text" class="form-control">
                                            <button type="submit" class="btn btn-default">Search</button>
                                            <a href="javascript:clear()" class="btn btn-default">Clear</a>
                                        </div>
                                    </div>
                                    <input type="hidden" class="form-control" name="search_fill" value="{{$param['search']['fill']}}">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                @include('admin.'.$path.'.list')
            </div>
            <!-- /.col-md-6 -->
        </div>
    </div>
</div>
@endsection