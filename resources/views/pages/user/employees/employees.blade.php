@extends('layouts.app')

@section('content')

    <div class="card row col-12 mx-0 p-3 border-radius">
        <div class="table-responsive">
            <table id="employees" class="display">
                <thead>
                <tr>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Speciality</th>
                    <th>Phone</th>
                </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>

    <script
        src="https://code.jquery.com/jquery-3.5.1.min.js"
        integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
        crossorigin="anonymous">
    </script>

    <script>

        $(document).ready(function () {
            $('#employees').DataTable();
        });

    </script>

@endsection
