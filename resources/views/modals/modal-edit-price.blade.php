<div class="modal fade modal-danger" id="editPrice" role="dialog" aria-labelledby="editPrice" aria-hidden="true"
     tabindex="-1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    Edit Price
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">close</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="input-group mb-4 w-100">
                    <label>Select Employee:</label>
                    <select id="priceEditEmployee" class="employeeSelect w-100" name="empSelect">
                    </select>
                </div>
                <hr>
                <div class="input-group mb-3 mt-4">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="perHourEdit">Per Hour / $</span>
                    </div>
                    <input id="perHourInpEdit" type="number" class="form-control" aria-label="perHourEdit"
                           aria-describedby="perHour">
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="fixedEdit">Fixed / $</span>
                    </div>
                    <input id="fixedInpEdit" type="number" class="form-control" aria-label="fixedEdit"
                           aria-describedby="fixedEdit">
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-outline pull-left btn-light" type="button" data-dismiss="modal">Cancel</button>
                <button class="btn pull-right btn-info confirmEdit" type="button">Edit</button>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {

        $('#editPrice').on('shown.bs.modal', function () {
            showLoader({el: '.modal-body', background: 'rgb(255 255 255);', color: "#c38d9e", destroy: "false"});
            $.ajax({
                url: '/prices/get-employee-options',
                type: 'get',
                "_token": "{{ csrf_token() }}",
                headers: {'X-CSRF-TOKEN': "{{ csrf_token() }}"},
            }).done(function (result) {
                $('#priceEditEmployee').html(result.emp_options)
            });
            price_id = $(this).attr('data-price-id');
            $.ajax({
                url: '/prices/info',
                type: 'get',
                data: {
                    price_id: price_id,
                },
                "_token": "{{ csrf_token() }}",
                headers: {'X-CSRF-TOKEN': "{{ csrf_token() }}"},
            }).done(function (result) {
                $('#perHourInpEdit').val(result.price.per_hour);
                $('#fixedInpEdit').val(result.price.fixed);
                $('#priceEditEmployee').val(result.price.employee_id);
                $('#priceEditEmployee').trigger('change');
                hideLoader();
            });
        });

        $('.confirmEdit').click(function () {
            var price_id = $('#editPrice').attr('data-price-id');
            var per_hour = $('#perHourInpEdit').val();
            var fixed = $('#fixedInpEdit').val();
            var employee_id = $('#priceEditEmployee').val();
            $.ajax({
                url: '/prices/edit',
                type: 'post',
                data: {
                    employee_id: employee_id,
                    fixed: fixed,
                    per_hour: per_hour,
                    price_id: price_id,
                },
                "_token": "{{ csrf_token() }}",
                headers: {'X-CSRF-TOKEN': "{{ csrf_token() }}"},
            }).done(function (result) {
                location.reload();
            });
        });

    });
</script>
