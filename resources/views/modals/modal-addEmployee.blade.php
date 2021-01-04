<div class="modal fade modal-danger" id="addEmployee" role="dialog" aria-labelledby="addEmployee" aria-hidden="true"
     tabindex="-1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    Add Employee
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">close</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="firstNameCreate">First Name</span>
                    </div>
                    <input id="fnInpCreate" type="text" class="form-control" aria-label="First Name"
                           aria-describedby="firstNameCreate">
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="lastNameCreate">Last Name</span>
                    </div>
                    <input id="lnInpCreate" type="text" class="form-control" aria-label="Last Name"
                           aria-describedby="lastNameCreate">
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="specialityCreate">Speciality</span>
                    </div>
                    <input id="specInpCreate" type="text" class="form-control" aria-label="Speciality"
                           aria-describedby="specialityCreate">
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="phoneCreate">Phone</span>
                    </div>
                    <input id="phoneInpCreate" type="text" class="form-control" aria-label="Phone"
                           aria-describedby="phoneCreate">
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

        $('.confirmCreate').click(function () {
            var phone = $('#phoneInpCreate').val();
            var speciality = $('#specInpCreate').val();
            var last_name = $('#lnInpCreate').val();
            var first_name = $('#fnInpCreate').val();
            $.ajax({
                url: '/employees/create',
                type: 'post',
                data: {
                    phone: phone,
                    speciality: speciality,
                    last_name: last_name,
                    first_name: first_name
                },
                "_token": "{{ csrf_token() }}",
                headers: {'X-CSRF-TOKEN': "{{ csrf_token() }}"},
            }).done(function (result) {
                window.location.href = "/employees";
            });
        });

    });
</script>
