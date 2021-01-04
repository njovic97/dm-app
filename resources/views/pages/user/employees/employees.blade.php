@extends('layouts.app')

@section('content')

    <div class="card row col-12 mx-0 p-4 border-radius">
        <div class="col-2 ml-auto addButtonContainer">
            <button id="addEmployeeBtn" class="btn btn-info mb-4 float-right">Add Employee</button>
        </div>
        <div class="table-responsive">
            <table id="employees" class="display">
                <thead>
                <tr>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Speciality</th>
                    <th>Phone</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($employees as $employee)
                    <tr>
                        <td>{{$employee->first_name}}</td>
                        <td>{{$employee->last_name}}</td>
                        <td>{{$employee->speciality}}</td>
                        <td>{{$employee->phone}}</td>
                        <td>
                            <button class="btn bnt-sm rounded-circle btn-success m-auto removeEmployee"
                                    data-employee-uuid="{{$employee->employee_uuid}}"><i class="fa fa-trash text-info"
                                                                                         aria-hidden="true"></i>
                            </button>
                            <button class="btn bnt-sm rounded-circle btn-success m-auto editEmployee"
                                    data-employee-uuid="{{$employee->employee_uuid}}"><i class="fa fa-pencil text-info"
                                                                                         aria-hidden="true"></i>
                            </button>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

    @include('modals.modal-edit-employee')
    @include('modals.modal-addEmployee')

    <script
        src="https://code.jquery.com/jquery-3.5.1.min.js"
        integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
        crossorigin="anonymous">
    </script>

    <script>

        $(document).ready(function () {
            $('#employees').DataTable({
                dom: 'fBlrtp',
                oLanguage: {
                    sProcessing: '<div class="dt-loader"></div>',
                    sSearch: '<i class="fa fa-search text-info dtSearchIcon mr-2" aria-hidden="true"></i>',
                },
                language: {
                    searchPlaceholder: "Search...",
                    lengthMenu: "Show:  _MENU_"
                },
            });

            $('.removeEmployee').click(function () {
                var employee_uuid = $(this).attr('data-employee-uuid');
                $.ajax({
                    url: '/employees/remove',
                    type: 'get',
                    data: {
                        employee_uuid: employee_uuid,
                    },
                    "_token": "{{ csrf_token() }}",
                    headers: {'X-CSRF-TOKEN': "{{ csrf_token() }}"},
                }).done(function () {
                    location.reload();
                });
            });

            $('.editEmployee').click(function () {
                var employee_uuid = $(this).attr('data-employee-uuid');
                $('#editEmployee').modal('show');
                $('#editEmployee').attr('data-employee-uuid', employee_uuid);
            });

            $('#addEmployeeBtn').click(function () {
                $('#addEmployee').modal('show');
            });

        });

    </script>

@endsection
