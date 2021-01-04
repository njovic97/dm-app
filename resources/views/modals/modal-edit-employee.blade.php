<div class="modal fade modal-danger" id="editEmployee" role="dialog" aria-labelledby="editEmployee" aria-hidden="true"
     tabindex="-1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    Edit Employee
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">close</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="firstName">First Name</span>
                    </div>
                    <input id="fnInp" type="text" class="form-control" aria-label="First Name"
                           aria-describedby="firstName">
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="lastName">Last Name</span>
                    </div>
                    <input id="lnInp" type="text" class="form-control" aria-label="Last Name"
                           aria-describedby="lastName">
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="speciality">Speciality</span>
                    </div>
                    <input id="specInp" type="text" class="form-control" aria-label="Speciality"
                           aria-describedby="speciality">
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="phone">Phone</span>
                    </div>
                    <input id="phoneInp" type="text" class="form-control" aria-label="Phone" aria-describedby="phone">
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
        $('#editEmployee').on('shown.bs.modal', function () {
            employee_uuid = $(this).attr('data-employee-uuid');
            showLoader({el: '.modal-body', background: 'rgb(255 255 255);', color: "#c38d9e", destroy: "false"});
            $.ajax({
                url: '/employees/info',
                type: 'get',
                data: {
                    employee_uuid: employee_uuid,
                },
                "_token": "{{ csrf_token() }}",
                headers: {'X-CSRF-TOKEN': "{{ csrf_token() }}"},
            }).done(function (result) {
                $('#phoneInp').val(result.employee.phone);
                $('#specInp').val(result.employee.speciality);
                $('#lnInp').val(result.employee.last_name);
                $('#fnInp').val(result.employee.first_name);
                hideLoader();
            });
        });

        $('.confirmEdit').click(function () {
            var employee_uuid = $('#editEmployee').attr('data-employee-uuid');
            var phone = $('#phoneInp').val();
            var speciality = $('#specInp').val();
            var last_name = $('#lnInp').val();
            var first_name = $('#fnInp').val();
            $.ajax({
                url: '/employees/edit',
                type: 'post',
                data: {
                    employee_uuid: employee_uuid,
                    phone: phone,
                    speciality: speciality,
                    last_name: last_name,
                    first_name: first_name
                },
                "_token": "{{ csrf_token() }}",
                headers: {'X-CSRF-TOKEN': "{{ csrf_token() }}"},
            }).done(function (result) {
                location.reload();
            });
        });
    });
</script>
