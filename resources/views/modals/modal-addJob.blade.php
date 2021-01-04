<div class="modal fade modal-danger" id="addJob" role="dialog" aria-labelledby="addJob" aria-hidden="true"
     tabindex="-1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    Add Job
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">close</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="input-group mb-4 w-100">
                    <label>Select Employee:</label>
                    <select id="jobCreateEmployee" class="employeeSelect w-100" name="empSelect">
                    </select>
                </div>
                <div class="input-group mb-4 w-100">
                    <label>Select Price:</label>
                    <select id="jobCreatePrice" class="employeeSelect w-100" name="priceSelect">
                    </select>
                </div>
                <div class="input-group mb-4 w-100">
                    <label>Select Status:</label>
                    <select id="jobCreateStatus" class="employeeSelect w-100" name="statusSelect">
                        <option value='1'>In Progress</option>
                        <option value='0'>Done</option>
                    </select>
                </div>
                <hr>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="titleCreate">Title</span>
                    </div>
                    <input id="titleInp" type="text" class="form-control" aria-label="First Name"
                           aria-describedby="titleCreate">
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="dueDateCreate">Due Date</span>
                    </div>
                    <input id="dueDateInp" type="text" class="form-control" aria-label="Due Date"
                           aria-describedby="dueDateCreate">
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="contactCreate">Contact</span>
                    </div>
                    <input id="contactCreateInp" type="text" class="form-control" aria-label="Contact"
                           aria-describedby="contactCreate">
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-outline pull-left btn-light" type="button" data-dismiss="modal">Cancel</button>
                <button class="btn pull-right btn-info confirmCreate" type="button">Create</button>
            </div>
        </div>
    </div>
</div>

<script>

    $(document).ready(function () {

        $("#dueDateInp").datepicker();
        $('.employeeSelect').select2();


        $('#addJob').on('shown.bs.modal', function () {
            showLoader({el: '.modal-body', background: 'rgb(255 255 255);', color: "#c38d9e", destroy: "false"});
            $.ajax({
                url: '/jobs/get-employee-options',
                type: 'get',
                "_token": "{{ csrf_token() }}",
                headers: {'X-CSRF-TOKEN': "{{ csrf_token() }}"},
            }).done(function (result) {
                $('#jobCreateEmployee').html(result.emp_options);
                getPriceForSelectedEmployee();
            });
        });

        function getPriceForSelectedEmployee() {
            var employee_id = $('#jobCreateEmployee').val();
            $.ajax({
                url: '/jobs/get-prices-options',
                type: 'get',
                data: {employee_id: employee_id},
                "_token": "{{ csrf_token() }}",
                headers: {'X-CSRF-TOKEN': "{{ csrf_token() }}"},
            }).done(function (result) {
                $('#jobCreatePrice').html(result.prices_options);
                hideLoader();
            });
        }

        $('#jobCreateEmployee').change(function () {
            showLoader({el: '.modal-body', background: 'rgb(255 255 255);', color: "#c38d9e", destroy: "false"});
            getPriceForSelectedEmployee();
        });

        $('.confirmCreate').click(function () {
            var employee_id = $('#jobCreateEmployee').val();
            var price_id = $('#jobCreatePrice').val();
            var status = $('#jobCreateStatus').val();
            var title = $('#titleInp').val();
            var due_date = $('#dueDateInp').val();
            var contact = $('#contactCreateInp').val();
            $.ajax({
                url: '/jobs/create',
                type: 'post',
                data: {
                    employee_id: employee_id,
                    price_id: price_id,
                    status: status,
                    title: title,
                    due_date: due_date,
                    contact: contact
                },
                "_token": "{{ csrf_token() }}",
                headers: {'X-CSRF-TOKEN': "{{ csrf_token() }}"},
            }).done(function (result) {
                window.location.href = "/jobs";
            });
        });

    });

</script>
