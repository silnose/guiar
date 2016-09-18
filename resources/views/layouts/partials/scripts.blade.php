<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 2.1.4 -->
<script src="{{ asset('/plugins/jQuery/jQuery-2.1.4.min.js') }}"></script>
<!-- Bootstrap 3.3.2 JS -->
<script src="{{ asset('/js/bootstrap.min.js') }}" type="text/javascript"></script>
<!-- AdminLTE App -->
<script src="{{ asset('/js/app.min.js') }}" type="text/javascript"></script>
<!-- Sweet Alert -->
<script src="{{ asset('/bower_components/sweetalert/dist/sweetalert.min.js') }}" type="text/javascript"></script>

@include('sweet::alert')

<script>
    $(function () {

        $('.gdelete').on('click',function() {
            var id= $(this).data('id');

            console.log(id)
            var txt;
            var r = confirm("¿Esta seguro que desea borrar el registro?");
            if (r == true) {
                $('#form-delete-'+id).submit();
            }
        });
    });
</script>

<!-- Optionally, you can add Slimscroll and FastClick plugins.
      Both of these plugins are recommended to enhance the
      user experience. Slimscroll is required when using the
      fixed layout. -->