<script>
    $(document).ready(function(){
        $('body').on('click', '#save', function(e) {
        
        e.preventDefault();
        var formData = new FormData($('#quiz')[0]);
        $.ajax({
            type: 'POST',
            url: "{{ route('send.result')}}",
            data: formData,

            processData: false,
            contentType: false,
            cache: false,
            success: function(data) {
                if (data.status == true) {
                    $('#success_msg').show();
                }
            },
            error: function(reject) {
                var response = $.parseJSON(reject.responseText);
                $.each(response.errors, function(key, val) {
                    $("#" + key).text(val[0]);

                });
            },
        });
    });
    });
   
</script>
<script>
    $(window).on('load',function(){
        setTimeout(function(){
            Response.Expires = 0;
        },2000)
    })
</script>