<script src="{{ asset('dist-admin/js/jquery-3.6.3.min.js') }}"></script>
<script src="{{ asset('dist-admin/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('dist-admin/js/feather.min.js') }}"></script>
<script src="{{ asset('dist-admin/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('dist-admin/js/dataTables.bootstrap5.min.js') }}"></script>
<script src="{{ asset('dist-admin/tinymce/tinymce.min.js') }}"></script>
<script src="{{ asset('dist-admin/js/select2.min.js') }}"></script>
<script src="{{ asset('dist-admin/js/iziToast.js') }}"></script>
<script src="{{ asset('dist-admin/js/custom.js') }}"></script>

@if ($errors->any())
@foreach ($errors->all() as $error)
  <script>
    iziToast.show({
      message: '{{ $error }}',
      color: 'red',
       position: 'topRight'
    });
  </script>
@endforeach
@endif

@if (session('error'))
<script>
  iziToast.show({
    message: '{{ session('error') }}',
    color: 'red',
     position: 'topRight'
  });
</script>
@endif

@if (session('success'))
<script>
  iziToast.show({
    message: '{{ session('success') }}',
    color: 'green',
     position: 'topRight'
  });
</script>
@endif