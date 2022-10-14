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
              <th>User</th>
            </tr>
          </thead>
          <tbody>
            
          </tbody>
        </table>
        @csrf
      </form>
    </div>
</div>

