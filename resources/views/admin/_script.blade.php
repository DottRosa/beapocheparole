<!--Template-->
<script src="{{ url('/js/admin/vendor.js') }}"></script>
<script src="{{ url('/js/admin/bundle.js') }}"></script>

<!-- jQuery -->
<script src="{{ url('../node_modules/jquery/dist/jquery.min.js')}}"></script>

<!-- Bootstrap -->
<script src="{{ url('../node_modules/bootstrap/dist/js/bootstrap.min.js')}}"></script>

<!-- jQueryUI -->
<script src="{{ url('js/plugins/select/bootstrap-select.min.js')}}"></script>


<!-- jQueryUI -->
<script src="{{ url('../node_modules/@ckeditor/ckeditor5-build-decoupled-document/build/ckeditor.js')}}"></script>


<script>

    $(function(){
        DecoupledEditor
            .create( document.querySelector( '#editor' ) )
            .then( editor => {
                const toolbarContainer = document.querySelector( '#toolbar-container' );

                toolbarContainer.appendChild( editor.ui.view.toolbar.element );
            })
            .catch( error => {
            console.error( error );
        });
    });


</script>
