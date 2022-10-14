<div class="card">
    <div class="card-body text-center">
        <a href="{{route('admin.'.$path.'.form')}}" class="btn btn-app">
            <i class="fas fa-edit"></i> Add
        </a>
        <a href="javascript:submitForm('{{route('admin.'.$path.'.delete')}}')" class="btn btn-app">
            <i class="fas fa-edit"></i> Delete
        </a>
        <a href="javascript:submitIndex('{{route('admin.'.$path.'.changePublic',['status' => 'active'])}}')" class="btn btn-app">
            <i class="fas fa-edit"></i> Public
        </a>
        <a href="javascript:submitIndex('{{route('admin.'.$path.'.changePublic',['status' => 'inactive'])}}')" class="btn btn-app">
            <i class="fas fa-edit"></i> UnPublic
        </a>
        <a href="javascript:submitIndex('{{route('admin.'.$path.'.changeOrdering')}}')" class="btn btn-app">
            <i class="fas fa-edit"></i> Ordering
        </a>
    </div>
</div>