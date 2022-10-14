@php
    use App\Helper\Template;
@endphp
<div class="card">
    <div class="card-body">
      <form action="#" id="frmList" method="POST">
        <table class="table">
          <thead>
            <tr>
              <th><input type="checkbox" id="checked"></th>
              <th>Id</th>
              <th>Name</th>
              <th>Description</th>
              <th>Picture</th>
              <th>Category</th>
              <th>Ordering</th>
              <th>Status</th>
              <th>Updated_at</th>
              <th>Created_at</th>
            </tr>
          </thead>
          <tbody>
            @if ($item->count() > 0)
                @foreach ($item as $key => $val)
                  @php
                      $id = $val->id;
                      $name = $val->name;
                      $description = $val->description;
                      $picture = $val->getImg();
                      $ordering = $val->ordering;
                      $linkEdit = route('admin.'.$path.'.form', ['id' => $id]);
                      $link = route('admin.'.$path.'.changeStatus', ['status' => $val->status]);
                      $status = Template::showStatus($val->status,$id,$link);
                      $updated_at = $val->updated_at;
                      $created_at = $val->created_at;
                      $categoryName = $val->categories->name;
                  @endphp
                <tr>
                  <th><input name="cid[]" type="checkbox" value="{{$id}}"></th>
                  <td>{{$id}}</td>
                  <td><a href="{{$linkEdit}}">{{$name}}</a></td>
                  <td>{{$description}}</td>
                  <td><img width="150px" src="{{$picture}}" alt=""></td>
                  <td>{{$categoryName}}</td>
                  <td><input name="ord[{{$id}}]" class="form-ordering" value="{{$ordering}}" type="number"></td>
                  <td>{!!$status!!}</td>
                  <td>{{$updated_at}}</td>
                  <td>{{$created_at}}</td>
                </tr>
                @endforeach
            @endif
          </tbody>
        </table>
        @csrf
      </form>
    </div>
</div>

{{ $item->links() }}