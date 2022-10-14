<script src="{{asset('admin/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('admin/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('admin/dist/js/adminlte.min.js')}}"></script>
<script src="{{asset('admin/dist/js/script.js')}}"></script>
<script src="{{asset('admin/dist/js/app.js')}}"></script>
<script src="{{asset('admin/toastr-master/toastr.js')}}"></script>
<script src="{{asset('admin/ckeditor/ckeditor.js')}}"></script>

<script>
    CKEDITOR.replace( 'ck_editor',{
    filebrowserBrowseUrl: '/admin/ckfinder/ckfinder.html',
    filebrowserUploadUrl: '/admin/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
});
</script>


@if (\Session::has('success'))
    <script>
        toastr.success('{{ \Session::get("success") }}', 'Đã xóa thành công');
    </script>
@endif