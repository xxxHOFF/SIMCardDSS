@if(session('success'))
    <div class="alert alert-success" id="success-alert" style="width: 300px; margin: 0 auto;">
        {{ session('success') }}
    </div>
@endif

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    function hideAlert() {
        const successAlert = $('#success-alert');
        if (successAlert) {
            successAlert.fadeOut(1000, function() {
                successAlert.remove();
            });
        }
    }

    $(document).ready(function() {
        setTimeout(hideAlert, 4000);
    });
</script>
