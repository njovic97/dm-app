<div class="modal fade modal-danger" id="editJob" role="dialog" aria-labelledby="editJob" aria-hidden="true"
     tabindex="-1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    Edit Job
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">close</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="input-group mb-4 w-100">
                    <label>Select Employee:</label>
                    <select id="jobEditEmployee" class="employeeSelect w-100" name="empSelect">
                    </select>
                </div>
                <div class="input-group mb-4 w-100">
                    <label>Select Price:</label>
                    <select id="jobEditPrice" class="employeeSelect w-100" name="priceSelect">
                    </select>
                </div>
                <div class="input-group mb-4 w-100">
                    <label>Select Status:</label>
                    <select id="jobEditStatus" class="employeeSelect w-100" name="statusSelect">
                        <option value='1'>In Progress</option>
                        <option value='0'>Done</option>
                    </select>
                </div>
                <hr>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="titleEdit">Title</span>
                    </div>
                    <input id="titleEditInp" type="text" class="form-control" aria-label="First Name"
                           aria-describedby="titleEdit">
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="dueDateEdit">Due Date</span>
                    </div>
                    <input id="dueDateEditInp" type="text" class="form-control" aria-label="Due Date"
                           aria-describedby="dueDateEdit">
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="contactEdit">Contact</span>
                    </div>
                    <input id="contactEditInp" type="text" class="form-control" aria-label="Contact"
                           aria-describedby="contactEdit">
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

        $("#dueDateEditInp").datepicker();
        $('.employeeSelect').select2();


        $('#editJob').on('shown.bs.modal', function () {
            showLoader({el: '.modal-body', background: 'rgb(255 255 255);', color: "#c38d9e", destroy: "false"});
            $.ajax({
                url: '/jobs/get-employee-options',
                type: 'get',
                "_token": "{{ csrf_token() }}",
                headers: {'X-CSRF-TOKEN': "{{ csrf_token() }}"},
            }).done(function (result) {
                $('#jobEditEmployee').html(result.emp_options);
                getPriceForSelectedEmployee();
            });
        });

        function getPriceForSelectedEmployee() {
            var employee_id = $('#jobEditEmployee').val();
            $.ajax({
                url: '/jobs/get-prices-options',
                type: 'get',
                data: {employee_id: employee_id},
                "_token": "{{ csrf_token() }}",
                headers: {'X-CSRF-TOKEN': "{{ csrf_token() }}"},
            }).done(function (result) {
                $('#jobEditPrice').html(result.prices_options);
                getJobInfo();
            });
        }

        function getJobInfo() {
            var job_id = $('#editJob').attr('data-job-id');
            $.ajax({
                url: '/jobs/get-job-info',
                type: 'get',
                data: {job_id: job_id},
                "_token": "{{ csrf_token() }}",
                headers: {'X-CSRF-TOKEN': "{{ csrf_token() }}"},
            }).done(function (result) {
                $('#jobEditEmployee').val(result.job.employee_id);
                $('#jobEditPrice').val(result.job.price_id);
                $('#jobEditStatus').val(result.job.status);
                $('#titleEditInp').val(result.job.title);
                $('#dueDateEditInp').val(result.due_date);
                $('#contactEditInp').val(result.job.contact);
                hideLoader();
            });
        }

        $('#jobEditEmployee').change(function () {
            showLoader({el: '.modal-body', background: 'rgb(255 255 255);', color: "#c38d9e", destroy: "false"});
            getPriceForSelectedEmployee();
        });

        $('.confirmEdit').click(function () {
            var job_id = $('#editJob').attr('data-job-id');
            var employee_id = $('#jobEditEmployee').val();
            var price_id = $('#jobEditPrice').val();
            var status = $('#jobEditStatus').val();
            var title = $('#titleEditInp').val();
            var due_date = $('#dueDateEditInp').val();
            var contact = $('#contactEditInp').val();
            $.ajax({
                url: '/jobs/edit',
                type: 'post',
                data: {
                    job_id: job_id,
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
