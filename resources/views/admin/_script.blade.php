<!--Template-->
<script src="{{ url('/js/admin/vendor.js') }}"></script>
<script src="{{ url('/js/admin/bundle.js') }}"></script>

<!-- jQuery -->
<script src="{{ url('../node_modules/jquery/dist/jquery.min.js')}}"></script>

<!-- Bootstrap -->
<script src="{{ url('../node_modules/bootstrap/dist/js/bootstrap.min.js')}}"></script>

<!-- jQueryUI -->
<script src="{{ url('js/plugins/select/bootstrap-select.min.js')}}"></script>


<!-- CKEditor -->
<script src="{{ url('js/plugins/ckeditor/ckeditor.js')}}"></script>


<script>

    $(function(){
        CKEDITOR.replace('ckeditor');
    });


</script>
