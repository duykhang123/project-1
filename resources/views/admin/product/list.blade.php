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
              <th>Name</th>
              <th>Thương hiệu</th>
              <th>Danh mục</th>
              <th>Giới tính</th>
              <th>Price</th>
              <th>Sale off (%)</th>
              <th>Picture</th>
              <th>Ordering</th>
              <th>Status</th>
              <th>Nổi Bật</th>
            </tr>
          </thead>
          <tbody>
            @if ($item->count() > 0)
                @foreach ($item as $key => $val)
                  @php
                      $id = $val->id;
                      $name = $val->name;
                      $description = $val->description;
                      $gender = $val->gender;
                      $price =  number_format($val->price);
                      $sale = number_format($val->sale_off);
                      $picture = $val->getImg();
                      $ordering = $val->ordering;
                      $linkEdit = route('admin.'.$path.'.form', ['id' => $id]);
                      $link = route('admin.'.$path.'.changeStatus', ['status' => $val->status]);
                      $status = Template::showStatus($val->status,$id,$link);
                      $link = route('admin.'.$path.'.changeSpecial', ['special' => $val->special]);
                      $special = Template::showSpecial($val->special,$id,$link);
                      $brandName = $val->brand->name;
                      $productName = $val->productcategory->name;
                  @endphp
                <tr>
                  <th><input name="cid[]" type="checkbox" value="{{$id}}"></th>
                  <td><a href="{{$linkEdit}}">{{$name}}</a></td>
                  <td>{{$brandName}}</td>
                  <td>{{$productName}}</td>
                  <td>{!!$gender!!}</td>
                  <td>{{$price}}</td>
                  <td>{{$sale}}</td>
                  <td><img width="150px" src="{{$picture}}" alt=""></td>
                  <td><input name="ord[{{$id}}]" class="form-ordering" value="{{$ordering}}" type="number"></td>
                  <td>{!!$status!!}</td>
                  <td>{!!$special!!}</td>
                  
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