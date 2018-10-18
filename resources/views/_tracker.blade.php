<script>
window.onerror = function(error, url, line) {
    console.log(error, url, line, '{{Request::path()}}');

    var data = {
        error   : error,
        url     : url,
        line    : line,
        page    : '{{Request::path()}}',
        _token  : '{{csrf_token()}}'
    };

    $.ajax({
        type:'POST',
        url:"errors/report",
        data:data,
        success:function(data){
            console.log(data);
        }
    });
};
</script>
