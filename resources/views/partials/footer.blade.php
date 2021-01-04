<footer class="bg-light text-center text-lg-start">
    <div class="text-center text-white p-3" style="background-color: #41B3A3">
        © 2020 Copyright:
        <a class="text-white" href="#">Dasa Matic</a>
    </div>
</footer>

<script>
    function showLoader(options) {
        if (options === undefined) {
            options = {
                color: "#007bff",
                background: "rgba(298, 294, 290, 0.9)",
                el: "body",
                destroy: "true",
                small: "false"
            };
        } else {
            if (options.background === undefined) {
                options.background = "rgba(298, 294, 290, 0.9)";
            }
            if (options.color === undefined) {
                options.color = "#007bff";
            }
            if (options.el === undefined) {
                options.el = "body";
            }
            if (options.destroy === undefined) {
                options.destroy = "true";
            }
            if (options.destroy === undefined) {
                options.small = "false";
            }
        }

        if (options.destroy === "true") {
            hideLoader();
        }

        console.log(options);
        if (options.small === "true") {
            $(options.el).append('<div class="loading-overlay-small" style="background-color:' + options.background + ';"><div class="loader-box-small"><div style="width: 20px; height: 20px;" class="circle-loader"></div></div></div>');
            $(options.el).append('<style class="notify-styling">.circle-loader:before { border-top-color: ' + options.color + '; }</style>');
        } else {
            $(options.el).append('<div class="loading-overlay" style="background-color:' + options.background + ';"><div class="loader-box"><div class="circle-loader"></div></div></div>');
            $(options.el).append('<style class="notify-styling">.circle-loader:before { border-top-color: ' + options.color + '; }</style>');
        }

    }

    function hideLoader() {
        $(".loading-overlay, .notify-styling, .loading-overlay-small").remove();
    }
</script>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"
        integrity="sha512-T/tUfKSV1bihCnd+MxKD0Hm1uBBroVYBOYSk1knyvQ9VyZJpc/ALb4P0r6ubwVPSGB2GvjeoMAJJImBG12TiaQ=="
        crossorigin="anonymous"></script>
