<div class="card">
    <div class="card-body text-center">
        <a href="javascript:submitSave('{{route('admin.'.$path.'.save', ['type' => 'save'])}}')" class="btn btn-app">
            <i class="fas fa-edit"></i> Save
        </a>
        <a href="javascript:submitSave('{{route('admin.'.$path.'.save', ['type' => 'new'])}}')" class="btn btn-app">
            <i class="fas fa-edit"></i> Save & New
        </a>
        <a href="javascript:submitSave('{{route('admin.'.$path.'.save',['type' => 'close'])}}')" class="btn btn-app">
            <i class="fas fa-edit"></i> Save & Close
        </a>
        <a href="{{route('admin.'.$path.'.index')}}" class="btn btn-app">
            <i class="fas fa-edit"></i> Close
        </a>
    </div>
</div>