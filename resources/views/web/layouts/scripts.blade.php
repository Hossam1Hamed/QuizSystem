<script>
    $(document).ready(function() {
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
    $(window).on('load', function() {
        setTimeout(function() {
            Response.Expires = 0;
        }, 2000)
    })
</script>
<script>
    $(document).ready(function() {
        $('body').on('click', '#save', function(e) {

            e.preventDefault();
            var formData = new FormData($('#create-quiz')[0]);
            $.ajax({
                type: 'POST',
                url: "{{ route('quiz.store')}}",
                data: formData,

                processData: false,
                contentType: false,
                cache: false,
                success: function(data) {
                    if (data.status == true) {
                        $('#alert').show();
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
    $(document).ready(function() {
        $("#alert").hide();
        $("#myWish").click(function showAlert() {
            $("#success-alert").alert();
            window.setTimeout(function() {
                $("#success-alert").alert('close');
            }, 2000);
        });
    });
</script>
<script type="text/javascript">
    $('.show_confirm').click(function(e) {
        e.preventDefault();

        $('#DeleteModal').modal('show');
    });
</script>
<!-- Modal -->
<div class="modal fade" id="DeleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete Category</h5>
                <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h5>Are you sure you want to delete Category ?</h5>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn bg-gradient-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>