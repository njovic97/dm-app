<div class="modal fade modal-danger" id="addPrice" role="dialog" aria-labelledby="addPrice" aria-hidden="true"
     tabindex="-1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    Add Price
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">close</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="input-group mb-4 w-100">
                    <label>Select Employee:</label>
                    <select id="priceCreateEmployee" class="employeeSelect w-100" name="empSelect">
                    </select>
                </div>
                <hr>
                <div class="input-group mb-3 mt-4">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="perHour">Per Hour / $</span>
                    </div>
                    <input id="perHourInpCreate" type="number" class="form-control" aria-label="perHour"
                           aria-describedby="perHour">
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="fixedCreate">Fixed / $</span>
                    </div>
                    <input id="fixedInpCreate" type="number" class="form-control" aria-label="fixedCreate"
                           aria-describedby="fixedCreate">
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-outline pull-left btn-light" type="button" data-dismiss="modal">Cancel</button>
                <button class="btn pull-right btn-info confirmPriceCreate" type="button">Create</button>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {

        $(document).ready(function () {
            $('.employeeSelect').select2();
        });

        $('#addPrice').on('shown.bs.modal', function () {
            showLoader({el: '.modal-body', background: 'rgb(255 255 255);', color: "#c38d9e", destroy: "false"});
            $.ajax({
                url: '/prices/get-employee-options',
                type: 'get',
                "_token": "{{ csrf_token() }}",
                headers: {'X-CSRF-TOKEN': "{{ csrf_token() }}"},
            }).done(function (result) {
                $('#priceCreateEmployee').html(result.emp_options);
                hideLoader();
            });
        });

        $('.confirmPriceCreate').click(function () {
            var employee_id = $('#priceCreateEmployee').val();
            var per_hour = $('#perHourInpCreate').val();
            var fixed = $('#fixedInpCreate').val();
            $.ajax({
                url: '/prices/create',
                type: 'post',
                data: {
                    employee_id: employee_id,
                    per_hour: per_hour,
                    fixed: fixed
                },
                "_token": "{{ csrf_token() }}",
                headers: {'X-CSRF-TOKEN': "{{ csrf_token() }}"},
            }).done(function (result) {
                window.location.href = "/prices";
            });
        });

    });
</script>
