<div id="loader" class="justify-content-center">
    <div class="spinner-grow text-danger loader" role="status">
        <span class="sr-only">Loading...</span>
    </div>
</div>

<script
    src="https://code.jquery.com/jquery-3.5.1.min.js"
    integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
    crossorigin="anonymous">
</script>

<script type="text/javascript">
    $(window).on('load', function () {
        $('#loader').hide();
        $('#contentLoading').show();
    });
</script>
